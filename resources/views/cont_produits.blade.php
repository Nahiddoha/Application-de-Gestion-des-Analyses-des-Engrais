<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Accueil controleur</title>
    <link rel="stylesheet" href="css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

*{  font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    scroll-behavior: smooth;
    text-align: center;
}
       .affiche{
           margin-left: 5%;
           padding-top: 80px;
       }
      .d1{
        margin-left: 5%;
        width: 90%;
        padding-top: 130px;
        padding-bottom: 30px;
      }
      .d{
        width: 96%;
        padding-bottom: 30px;
        padding-top: 130px;
      }
      #tail{
        width: 600px;
      }
      .d5{
        width: 90%;
      }
      .contain{
        width: 600px;
        padding-right: 5%;
      }
      #coleur,.coleur{
        color: green;
      }
      .container{
        padding-top: 120px;
      }
      .top,.col-md-4{
        margin-bottom: 60px;
      }
</style>
</head>

<body>

<header class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('accueil_analyste') }}">
        <img src="images/logo_ferti.png" alt="Logo Ferti" height="50">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('accueil_controleur') }}">Accueil</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="menuTSP" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              TSP
            </a>
            <ul class="dropdown-menu" aria-labelledby="menuTSP">
              <li><a class="dropdown-item" href="{{ route('toutes-heurestspcont') }}">Toutes les TSP</a></li>
              <li><a class="dropdown-item" href="{{ route('toutes-moyennestspcont') }}">Moyenne TSP</a></li>
              <li><a class="dropdown-item" href="{{ route('chartTspcont') }}">Courbes TSP</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="menuProduits" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Produits
            </a>
            <ul class="dropdown-menu" aria-labelledby="menuProduits">
              <li><a class="dropdown-item" href="{{ route('toutes-heuresproduitcont') }}">Toutes les Produits</a></li>
              <li><a class="dropdown-item" href="{{ route('toutes-moyennescont') }}">Moyennes</a></li>
              <li><a class="dropdown-item" href="{{ route('chartcont') }}">Courbes</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#foot">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">Deconnexion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>



<!-- affichage des produits -->

<div class="d">

<div class="col-md-4">
<form method="GET">
<label for="search-date">Date de saisie:</label>
<input type="date" id="search-date" name="search_date" class="form-control">
<button type="submit" class="btn btn-primary mt-2">Rechercher</button>
</form>
</div>

@if(isset($donnees_par_produit_et_par_heure))
@if(isset($_GET['search_date']))
@foreach($donnees_par_produit_et_par_heure as $id_produit => $donnees_par_produit)
@if($donnees_par_produit['date_saisi'] == $_GET['search_date'])
<div class="top">
<table class="table table-striped" >
    <tr class="border">
        <td ><img src="images/oubaba.png"></td>
        <td  >
            <h3 class="coleur">Analyses Produit fini et les liquides de lavage Secteur 1 </h3>
        </td>
        <td class="image1" > <img src="images/ocp.png"></td>
    </tr>
    <tr class="border">
        <td colspan="3" >Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP Jorf
            Lasfar (OCP Nord)</td>
    </tr>

    <tr class="border">
        <th class="border">Nom produit  : {{ $donnees_par_produit['nom_produit'] }}</th>
        <th class="border">Nom Ligne : {{ $donnees_par_produit['nom_ligne'] }}</th>
        <th class="border">Date : {{ $donnees_par_produit['date_saisi'] }}</th>
    </tr>
</table>

<table class="table table-striped" >
<div  class="contain">
<tr class="border">
<th rowspan="2" class="border" >Heure</th>
<th colspan="2" class="border">PN</th>
<th rowspan="2" class="border">SAG(RM)</th>
<th colspan="2" class="border">D03</th>
<th colspan="2" class="border">D05</th>
<th rowspan="2" class="border">D10(PH)</th>
<th colspan="2" class="border">D09</th>
<th colspan="2" class="border">R02</th>
<th colspan="8" class="border">Titres</th>
<th colspan="7" class="border">Granulometres</th>
<th rowspan="2" class="border">saiseur</th>
</tr>

<tr class="border">
<th class="border">densite</th>
<th class="border">rm</th>

<th class="border">densite</th>
<th class="border">rm</th>

<th class="border">densite</th>
<th class="border">rm</th>

<th class="border">densite</th>
<th class="border">rm</th>

<th class="border">densite</th>
<th class="border">rm</th>

<th class="border">N%</th>
<th class="border">P2O5_SE_CIT</th>
<th class="border">H2O</th>
<th class="border">Zn</th>
<th class="border">s</th>
<th class="border">cd</th>
<th class="border">P2O5</th>
<th class="border">°C</th>

<th class="border">>=5</th>
<th class="border">>=4.75</th>
<th class="border">>=4</th>
<th class="border">>=3.15</th>
<th class="border">>=2.5</th>
<th class="border">>=2</th>
<th class="border">>=1</th>
</tr>
@foreach ($donnees_par_produit['donnees'] as $heure => $resultats)
@if(count($resultats) > 0)

            @foreach($resultats as $resultat)
<tr class="border">

<th class="border">{{ $heure }}</th>
<td class="border">{{ $resultat->pn_rm }}</td>
<td class="border">{{ $resultat->pn_densite }}</td>
<td class="border">{{ $resultat->sag_rm }}</td>
<td class="border">{{ $resultat->d03_rm }}</td>
<td class="border">{{ $resultat->d03_densite }}</td>
<td class="border">{{ $resultat->d05_rm }}</td>
<td class="border">{{ $resultat->d05_densite }}</td>
<td class="border">{{ $resultat->d10_ph }}</td>
<td class="border">{{ $resultat->d09_rm }}</td>
<td class="border">{{ $resultat->d09_densite }}</td>
<td class="border">{{ $resultat->r02_rm }}</td>
<td class="border">{{ $resultat->r02_densite }}</td>
<td class="border">{{ $resultat->p2o5 }}</td>
<td class="border">{{ $resultat->ammonical }}</td>
<td class="border">{{ $resultat->h2o }}</td>
<td class="border">{{ $resultat->zn }}</td>
<td class="border">{{ $resultat->s }}</td>
<td class="border">{{ $resultat->cd }}</td>
<td class="border">{{ $resultat->p2o5_tot }}</td>
<td class="border">{{ $resultat->temperature }}</td>
<td class="border">{{ $resultat->sup_5 }}</td>
<td class="border">{{ $resultat->sup_4_74 }}</td>
<td class="border">{{ $resultat->sup_4 }}</td>
<td class="border">{{ $resultat->sup_3_15 }}</td>
<td class="border">{{ $resultat->sup_2_5 }}</td>
<td class="border">{{ $resultat->sup_2 }}</td>
<td class="border">{{ $resultat->sup_1 }}</td>
<td class="border">{{ $resultat->saiseur }}</td>
</tr>
@endforeach
@else
    <p>Pas de résultats pour cette heure.</p>
@endif
@endforeach
</div>
</table>
</div>
@endif
@endforeach
@else
@foreach($donnees_par_produit_et_par_heure as $id_produit => $donnees_par_produit)
<div class="top">
<table class="table table-striped" >
    <tr class="border">
        <td ><img src="images/oubaba.png"></td>
        <td  >
            <h3 class="coleur">Analyses Produit fini et les liquides de lavage Secteur 1 </h3>
        </td>
        <td class="image1" > <img src="images/ocp.png"></td>
    </tr>
    <tr class="border">
        <td colspan="3" >Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP Jorf
            Lasfar (OCP Nord)</td>
    </tr>

    <tr class="border">
        <th class="border">Nom produit  : {{ $donnees_par_produit['nom_produit'] }}</th>
        <th class="border">Nom Ligne : {{ $donnees_par_produit['nom_ligne'] }}</th>
        <th class="border">Date : {{ $donnees_par_produit['date_saisi'] }}</th>
    </tr>
</table>

<table class="table table-striped" >
<div  class="contain">
<tr class="border">
<th rowspan="2" class="border" >Heure</th>
<th colspan="2" class="border">PN</th>
<th rowspan="2" class="border">SAG(RM)</th>
<th colspan="2" class="border">D03</th>
<th colspan="2" class="border">D05</th>
<th rowspan="2" class="border">D10(PH)</th>
<th colspan="2" class="border">D09</th>
<th colspan="2" class="border">R02</th>
<th colspan="8" class="border">Titres</th>
<th colspan="7" class="border">Granulometres</th>
<th rowspan="2" class="border">saiseur</th>
</tr>

<tr class="border">
<th class="border">densite</th>
<th class="border">rm</th>

<th class="border">densite</th>
<th class="border">rm</th>

<th class="border">densite</th>
<th class="border">rm</th>

<th class="border">densite</th>
<th class="border">rm</th>

<th class="border">densite</th>
<th class="border">rm</th>

<th class="border">N%</th>
<th class="border">P2O5_SE_CIT</th>
<th class="border">H2O</th>
<th class="border">Zn</th>
<th class="border">s</th>
<th class="border">cd</th>
<th class="border">P2O5</th>
<th class="border">°C</th>

<th class="border">>=5</th>
<th class="border">>=4.75</th>
<th class="border">>=4</th>
<th class="border">>=3.15</th>
<th class="border">>=2.5</th>
<th class="border">>=2</th>
<th class="border">>=1</th>
</tr>
@foreach ($donnees_par_produit['donnees'] as $heure => $resultats)
@if(count($resultats) > 0)

            @foreach($resultats as $resultat)
<tr class="border">

<th class="border">{{ $heure }}</th>
<td class="border">{{ $resultat->pn_rm }}</td>
<td class="border">{{ $resultat->pn_densite }}</td>
<td class="border">{{ $resultat->sag_rm }}</td>
<td class="border">{{ $resultat->d03_rm }}</td>
<td class="border">{{ $resultat->d03_densite }}</td>
<td class="border">{{ $resultat->d05_rm }}</td>
<td class="border">{{ $resultat->d05_densite }}</td>
<td class="border">{{ $resultat->d10_ph }}</td>
<td class="border">{{ $resultat->d09_rm }}</td>
<td class="border">{{ $resultat->d09_densite }}</td>
<td class="border">{{ $resultat->r02_rm }}</td>
<td class="border">{{ $resultat->r02_densite }}</td>
<td class="border">{{ $resultat->p2o5 }}</td>
<td class="border">{{ $resultat->ammonical }}</td>
<td class="border">{{ $resultat->h2o }}</td>
<td class="border">{{ $resultat->zn }}</td>
<td class="border">{{ $resultat->s }}</td>
<td class="border">{{ $resultat->cd }}</td>
<td class="border">{{ $resultat->p2o5_tot }}</td>
<td class="border">{{ $resultat->temperature }}</td>
<td class="border">{{ $resultat->sup_5 }}</td>
<td class="border">{{ $resultat->sup_4_74 }}</td>
<td class="border">{{ $resultat->sup_4 }}</td>
<td class="border">{{ $resultat->sup_3_15 }}</td>
<td class="border">{{ $resultat->sup_2_5 }}</td>
<td class="border">{{ $resultat->sup_2 }}</td>
<td class="border">{{ $resultat->sup_1 }}</td>
<td class="border">{{ $resultat->saiseur }}</td>
</tr>
@endforeach
@else
    <p>Pas de résultats pour cette heure.</p>
@endif
@endforeach
</div>
</table>
</div>
@endforeach
@endif
@endif
</div>


    <script>
  // Initialiser le menu déroulant Bootstrap
  var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
  var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
    return new bootstrap.Dropdown(dropdownToggleEl)
  });
</script>
</body>
<div id="foot">
@include('footer')
</div>
</html>