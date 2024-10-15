<?php

namespace App\Http\Controllers;

use App\Models\Bouille;
use Illuminate\Http\Request;
use App\Models\Ligne;
use App\Models\PN;
use App\Models\Produit;
use App\Models\TspsProduit;
use App\Models\Moy_acide;
use App\Models\Acide;
use Illuminate\Support\Facades\DB;

class ControllerTableau extends Controller
{
    public function ajouter_lige()
    {
        return view('ajouter_ligne');
    }

    public function ligne(Request $request)
    {
        $ligne = new Ligne;
        $ligne->nom_ligne = $request->input('nom_ligne');
        $ligne->date_production = $request->input('date_production');
        $ligne->nom_produit = $request->input('nom_produit');

        session([
            'date_production' => $ligne->date_production,
            'nom_ligne' => $ligne->nom_ligne,
            'nom_produit' => $ligne->nom_produit,
            'date_saisi' => $ligne->date_production,
        ]);

        // Recherche de la ligne dans la table de lignes
        $line = Ligne::where('date_production', $ligne->date_production)
            ->where('nom_ligne', $ligne->nom_ligne)
            ->where('nom_produit', $ligne->nom_produit)
            ->first();

        if ($ligne->nom_produit === 'tsp') {
            if ($line) {
                $id_ligne = $line->id_ligne;

                $tspsproduit = tspsProduit::join('lignes', 'tsps_produits.id_ligne', '=', 'lignes.id_ligne')
                    ->where('lignes.id_ligne', $id_ligne)
                    ->select('tsps_produits.*')
                    ->first();

                $id_tsp = $tspsproduit->id_tsp;

                $bouiles = Bouille::join('tsps_produits', 'bouilles.id_tsp', '=', 'tsps_produits.id_tsp')
                    ->where('tsps_produits.id_tsp', $id_tsp)
                    ->where('bouilles.id_tsp', $id_tsp)
                    ->latest('heure')
                    ->select('heure')
                    ->first();

                if ($bouiles) {
                    if ($bouiles->heure != 24 && $bouiles->heure != 6) {
                        $heure = $bouiles->heure;
                        $heure = $heure + 1; // ou $heure += 1;
                    } else if ($bouiles->heure === 24) {
                        $heure = 1;
                    } else if ($bouiles->heure === 6) {
                        return view('ajouter_ligne');
                    } else {
                        $heure = 7; // Valeur par défaut
                    }
                } else {
                    $heure = 7; // Valeur par défaut
                }

                session([
                    'id_tsp' => $id_tsp,
                    'heure' => $heure
                ]);

                return view('ajouter_produit_tsp');
            } else {
                $ligne->save();
                $id_ligne = $ligne->id;
                $tsp_produit = new tspsProduit;
                $tsp_produit->id_ligne = $id_ligne;
                $tsp_produit->save();

                $id_tsp = $tsp_produit->id;
                session([
                    'id_tsp' => $id_tsp,
                    'heure' => 7
                ]);
            }
            return view('ajouter_produit_tsp');
        } else {
            if ($line) {
                $id_ligne = $line->id_ligne;
                $produit = Produit::join('lignes', 'produits.id_ligne', '=', 'lignes.id_ligne')
                    ->where('lignes.id_ligne', $id_ligne)
                    ->select('produits.*')
                    ->first();
                $id_produit = $produit->id_produit;

                $pns = PN::join('produits', 'p_n_s.id_produit', '=', 'produits.id_produit')
                    ->where('produits.id_produit', $id_produit)
                    ->where('p_n_s.id_produit', $id_produit)
                    ->latest('heure')
                    ->select('heure')
                    ->first();

                if ($pns) {
                    if ($pns->heure != 24 && $pns->heure != 6) {
                        $heure = $pns->heure + 1;
                    } else if ($pns->heure === 24) {
                        $heure = 1;
                    } else if ($pns->heure === 6) {
                        return view('ajouter_ligne');
                    } else {
                        $heure = 7; // Valeur par défaut
                    }
                } else {
                    $heure = 7; // Valeur par défaut
                }
                session([
                    'heure' => $heure,
                    'id_produit' => $id_produit
                ]);

                return view('ajouter_produit');
            } else {
                $ligne->save();
                $id_ligne = $ligne->id;
                $produit = new Produit;
                $produit->id_ligne = $id_ligne;
                $produit->save();
                $id_produit = $produit->id;
                session([
                    'id_produit' => $id_produit,
                    'heure' => 7,
                ]);
                return view('ajouter_produit');
            }
        }
    }





                // acide
    //route d'acide
    public function ajouter_acide()
    {
        return view('acide');
    }
    // route moyenne acide
    public function ajouter_moyacide()
    {
        return view('MoyenneAcide');
    }
    //ajouter acide
    public function ajouter_acid(Request $request)
    {
        $acides = new Acide;
        $acides->Ref_bac = $request->input('Ref_bac');
        $acides->densite = $request->input('densite');
        $acides->temperature = $request->input('temperature');
        $acides->P2O5 = $request->input('P2O5');
        $acides->TS = $request->input('TS');
        $acides->SO4 = $request->input('SO4');
        $acides->cd = $request->input('cd');
        $acides->Mgo = $request->input('Mgo');
        $acides->Zn = $request->input('Zn');
        $acides->heure = $request->input('heure');
        $acides->saiseur = session('saiseur');
        $acides->id_produit = session('id_produit');


        $all_fields_filled = true;

        foreach ($request->all() as $key => $value) {
            if (empty($value)) {
                $all_fields_filled = false;
                break;
            }
        }

        if ($all_fields_filled) {
            $acides->save();
            return view('acide');
        } else {
            $message = "Tous les champs doivent être remplis.";
            return view('acide', ['message' => $message]);
        }
    }
    //moyenne acide
    public function ajouter_moyA(Request $request)
    {
        $acide = Acide::where('id_produit', session('id_produit'))->first();

        if (!$acide) {
            $message = "Tu dois remplir l'acide d'abord.";
            return view('MoyenneAcide', ['message' => $message]);
        }

        $all_fields_filled = true;

        foreach ($request->all() as $key => $value) {
            if (empty($value)) {
                $all_fields_filled = false;
                break;
            }
        }

        if (!$all_fields_filled) {
            $message = "Tous les champs doivent être remplis.";
            return view('MoyenneAcide', ['message' => $message]);
        }

        $id_acide = $acide->id_acide;
        $moy_acides = new Moy_acide;

        $moy_acides->densite = $request->input('densite');
        $moy_acides->Tc = $request->input('Tc');
        $moy_acides->p2o5 = $request->input('p2o5');
        $moy_acides->TS = $request->input('TS');
        $moy_acides->SO4 = $request->input('SO4');
        $moy_acides->date_saisi = session('date_saisi');
        $moy_acides->saiseur = session('saiseur');
        $moy_acides->id_acide = $id_acide; // Assigner la clé étrangère

        $moy_acides->save();
        return view('acide');
    }



    //afficher moyenne produit
   public function AfficherAcides()
   {
       $resultatacides = [];

       $produits = DB::table('produits')->get();

       foreach ($produits as $produit) {
           $id_ligne = $produit->id_ligne;
           $ligne = DB::table('lignes')->where('id_ligne', $id_ligne)->first();

           $id_produit = $produit->id_produit;
           $acide = DB::table('acides')->where('id_produit', $id_produit)->first();
 
           if ($acide) {
               $resultatacide = [
                   'nom_ligne' => $ligne->nom_ligne,
                   'nom_produit' => $ligne->nom_produit,
                   'date_saisi' => $ligne->date_production,
                   'heure' => $acide->heure,
                   'Ref_bac' => $acide->Ref_bac,
                   'densite' => $acide->densite,
                   'temperature' => $acide->temperature,
                   'P2O5' => $acide->P2O5,
                   'TS'    => $acide->TS,
                   'SO4' => $acide->SO4,
                   'cd' => $acide->cd,
                   'Mgo' => $acide->Mgo,
                   'Zn' => $acide->Zn,
                   'saiseur' => $acide->saiseur,
                   'id_acide' => $acide->id_acide,
                   'id_produit' => $id_produit,
               ];

               $resultatacides[] = $resultatacide;
           }
       }
       return  $resultatacides;
   }
   //analyste
   public function AfficherAcide()
   {

       $resultatacides = $this->AfficherAcides();
       return view('affiche_acide', ['resultatacides' => $resultatacides]);
   }

//controleur
   public function AfficherAcidecont()
   {

       $resultatacides = $this->AfficherAcides();
       return view('cont_acides', ['resultatacides' => $resultatacides]);
   }




   //afficher moyenne produit
   public function AfficherMoyacides()
   {
       $resultatmoyennes = [];
       $resultatmoyenne = [];

       $produits = DB::table('produits')->get();

       foreach ($produits as $produit) {
           $id_ligne = $produit->id_ligne;
           $ligne = DB::table('lignes')->where('id_ligne', $id_ligne)->first();
           
           $id_produit = $produit->id_produit;
           $acide = DB::table('acides')->where('id_produit', $id_produit)->first();
          
           if (isset($acide)) {
           $id_acide = $acide->id_acide;
           $moy_acides = DB::table('moy_acides')->where('id_acide', $id_acide)->first();

           if ($moy_acides) {
               $resultatmoyenne = [
                   'nom_ligne' => $ligne->nom_ligne,
                   'nom_produit' => $ligne->nom_produit,
                   'date_saisi' => $ligne->date_production,
                   'densite' => $moy_acides->densite,
                   'Tc' => $moy_acides->Tc,
                   'p2o5' => $moy_acides->p2o5,
                   'TS' => $moy_acides->TS,
                   'SO4' => $moy_acides->SO4,
                   'saiseur' => $moy_acides->saiseur,
                   'id_moy' => $moy_acides->id_moy,
                   'id_acide' => $id_acide,
               ];

               $resultatmoyennes[] = $resultatmoyenne;
           }
       }
    }
       return  $resultatmoyennes;
   }
   //analyste
   public function AfficherMoyacide()
   {

       $resultatmoyennes = $this->AfficherMoyacides();
    
       return view('affiche_moyenneacide', ['resultatmoyennes' => $resultatmoyennes]);
   }
   public function AfficherMoyacidecont()
   {

       $resultatmoyennes = $this->AfficherMoyacides();
    
       return view('afficher_moyacides', ['resultatmoyennes' => $resultatmoyennes]);
   }


}
