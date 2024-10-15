<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/produit_css.css">
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>update produits</title>

</head>

<body>

<header class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo e(route('accueil_analyste')); ?>">
        <img src="images/logo_ferti.png" alt="Logo Ferti" height="50">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('accueil_analyste')); ?>">Accueil</a>
          </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('ajouter_lign')); ?>">AjoutTableau</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('ajouter_moyenne')); ?>">AjoutMoyenne </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('ajouter_acide')); ?>">Acide </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?php echo e(route('toutes-heurestsp')); ?>">Afficher Produit TSP</a>
                                <a class="dropdown-item" href="<?php echo e(route('toutes-heuresproduit')); ?>">Afficher Produits</a>
                                <a class="dropdown-item" href="<?php echo e(route('toutes-moyennestsp')); ?>">Afficher Moyenne TSP</a>
                                <a class="dropdown-item" href="<?php echo e(route('toutes-moyennes')); ?>">Afficher Moyennes</a>
                                <a class="dropdown-item" href="<?php echo e(route('chartTsp')); ?>">Afficher courbes TSP</a>
                                <a class="dropdown-item" href="<?php echo e(route('chart')); ?>">Afficher courbes Produits</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#foot">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('logout')); ?>">Deconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="d1">
        <table class="table table-striped" id="mar">
        <form method="POST" action="<?php echo e(route('update_produits')); ?>">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="id_produit" value="<?php echo e($pn->id_produit); ?>">
                <input type="hidden" name="id_pn" value="<?php echo e($pn->id_pn); ?>">
                <input type="hidden" name="id_sag" value="<?php echo e($sag->id_sag); ?>">
                <input type="hidden" name="id_d03" value="<?php echo e($d03->id_d03); ?>">
                <input type="hidden" name="id_d05" value="<?php echo e($d05->id_d05); ?>">
                <input type="hidden" name="id_d09" value="<?php echo e($d09->id_d09); ?>">
                <input type="hidden" name="id_d10" value="<?php echo e($d10->id_d10); ?>">
                <input type="hidden" name="id_r02" value="<?php echo e($r02->id_r02); ?>">
                <input type="hidden" name="id_titre" value="<?php echo e($titre->id_titre); ?>">
                <input type="hidden" name="id_gran" value="<?php echo e($granulometre->id_gran); ?>">
                
            <tr class="border">
                <td><img src="images/oubaba.png"></td>
                <td>
                    <h3>Analyses Produit fini et les liquides de lavage Secteur 1 </h3>
                </td>
                <td class="image1"> <img src="images/ocp.png"></td>
            </tr>
            <tr class="border">
                <td colspan="3">Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP Jorf
                    Lasfar (OCP Nord)</td>
            </tr>

            <tr class="border">
                    <td class="border">A- Liquides Lavage et Produit Fini:Ponctuel</td>
                    <th class="border"> Ligne :<input type="hidden" name="nom_ligne" value="<?php echo e($pn->nom_ligne); ?>"> </th>
                    <th class="border">Date : <input type="hidden" name="date_saisi" value="<?php echo e($pn->date_saisi); ?>"></th>
                    </tr>

                    <tr class="border">
                        <th class="border">Nom du saiseur : <input type="hidden" name="saiseur" value="<?php echo e($pn->saiseur); ?>"></th>
                        <th class="border">Nom du Produit : <input type="hidden" name="nom_produit" value="<?php echo e($pn->nom_produit); ?>"></th>
                        <th colspan="2" class="border">L'heure : <input type="hidden" name="heure" value="<?php echo e($pn->heure); ?>">H</th>
                    </tr>
        </table>

            <div class="container">
                <table class="table table-striped">
                    <tr>
                        <th colspan="3" class="border"><em>Les echantillons</em></th>
                    </tr>
                    <tr>
                        <th rowspan="2" class="border">
                            <p class="tds">PN</p>
                        </th>
                        <td class="border">
                            <p class="tds"> RM </p>
                        </td>
                        <td class="border"><input type="text" value="<?php echo e($pn->pn_rm); ?>" name="pn_rm" class="inp2"></td>
                    </tr>
                    <tr>
                        <td class="border">
                            <p class="tds">Densite</p>
                        </td>
                        <td class="border"><input type="text" value="<?php echo e($pn->pn_densite); ?>" name="pn_densite" class="inp2"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="tds">SAG</p>
                        </th>
                        <td class="border">
                            <p class="tds">RM</p>
                        </td>
                        <td class="border"><input type="text" value="<?php echo e($sag->sag_rm); ?>" name="sag_rm" class="inp2"></td>
                    </tr>

                    <tr>
                        <th rowspan="2" class="border">
                            <p class="tds">D09</p>
                        </th>
                        <td class="border">
                            <p class="tds">RM</p>
                        </td>
                        <td class="border"><input type="text" value="<?php echo e($d09->d09_rm); ?>" name="d09_rm" class="inp2"></td>
                    </tr>
                    <tr>
                        <td class="border">
                            <p class="tds">Densite</p>
                        </td>
                        <td class="border"><input type="text" value="<?php echo e($d09->d09_densite); ?>" name="d09_densite" class="inp2"></td>
                    </tr>

                    <tr>
                        <th rowspan="2" class="border">
                            <p class="tds">R02</p>
                        </th>
                        <td class="border">
                            <p class="tds">RM</p>
                        </td>
                        <td class="border"><input type="text" value="<?php echo e($r02->r02_rm); ?>" name="r02_rm" class="inp2"></td>
                    </tr>
                    <tr>
                        <td class="border">
                            <p class="tds">Densite</p>
                        </td>
                        <td class="border"><input type="text" value="<?php echo e($r02->r02_densite); ?>" name="r02_densite" class="inp2"></td>
                    </tr>

                    <tr>
                        <th rowspan="2" class="border">D05</p>
                        </th>
                        <td class="border">
                            <p class="tds">RM</p>
                        </td>
                        <td class="border"><input type="text" value="<?php echo e($d05->d05_rm); ?>" name="d05_rm" class="inp2"></td>
                    </tr>
                    <tr>
                        <td class="border">
                            <p class="tds">Densite</p>
                        </td>
                        <td class="border"><input type="text" value="<?php echo e($d05->d05_densite); ?>" name="d05_densite" class="inp2"></td>
                    </tr>

                    <tr>
                        <th rowspan="2" class="border">
                            <p class="tds">D03</p>
                        </th>
                        <td class="border">
                            <p class="tds">RM</p>
                        </td>
                        <td class="border"><input type="text" value="<?php echo e($d03->d03_rm); ?>" name="d03_rm" class="inp2"></td>
                    </tr>
                    <tr>
                        <td class="border">
                            <p class="tds">Densite</p>
                        </td>
                        <td class="border"><input type="text" value="<?php echo e($d03->d03_densite); ?>" name="d03_densite" class="inp2"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="tds">D10</p>
                        </th>
                        <td class="border">
                            <p class="tds">PH</p>
                        </td>
                        <td class="border"><input type="text" value="<?php echo e($d10->d10_ph); ?>" name="d10_ph" class="inp2"></td>
                    </tr>
                </table>

                <table class="table table-striped">
                    <tr>
                        <th colspan="2" class="border"><em>Les Titres</em></th>
                    </tr>
                    <tr>
                        <th class="border">
                            <p class="ths">%N Ammoniacal</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="<?php echo e($titre->ammonical); ?>"  name="ammonical"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">%P2O5 SE+CIT</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="<?php echo e($titre->p2o5); ?>"  name="p2o5"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">%H2O Tel quel</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="<?php echo e($titre->h2o); ?>"  name="h2o"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">%Zn</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="<?php echo e($titre->zn); ?>"  name="zn"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">%S</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="<?php echo e($titre->s); ?>"  name="s"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">Cd(ppm)</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="<?php echo e($titre->cd); ?>"  name="cd"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">%P2O5 TOT</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="<?php echo e($titre->p2o5_tot); ?>"  name="p2o5_tot"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">Temperature</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" value="<?php echo e($titre->temperature); ?>"  name="temperature"></td>
                    </tr>
                </table>

                <table class="table table-striped">
                    <tr class="border">
                        <th colspan="2" class="border"><em>Les Granulometrie</em></th>
                    </tr>
                    <tr class="border">
                        <th class="border">
                            <p class="tds"> > 5</p>
                        </th>
                        <td class="border"><input type="text" class="inp" value="<?php echo e($granulometre->sup_5); ?>"  name="sup_5"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="tds"> > 4.75</p>
                        </th>
                        <td class="border"><input type="text" class="inp" value="<?php echo e($granulometre->sup_4_74); ?>"  name="sup_4_74"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="tds"> > 4</p>
                        </th>
                        <td class="border"><input type="text" class="inp" value="<?php echo e($granulometre->sup_4); ?>"  name="sup_4"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="tds"> > 3.15</p>
                        </th>
                        <td class="border"><input type="text" class="inp" value="<?php echo e($granulometre->sup_3_15); ?>"  name="sup_3_15"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="tds"> > 2.5</p>
                        </th>
                        <td class="border"><input type="text" class="inp" value="<?php echo e($granulometre->sup_2_5); ?>"  name="sup_2_5"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="tds"> > 2</p>
                        </th>
                        <td class="border"><input type="text" class="inp" value="<?php echo e($granulometre->sup_2); ?>"  name="sup_2"></td>
                    </tr>

                    <tr class="border">
                        <th class="border">
                            <p class="tds"> > 1</p>
                        </th>
                        <td class="border"><input type="text" class="inp" value="<?php echo e($granulometre->sup_1); ?>"  name="sup_1"></td>
                    </tr>
                </table>
              </div>
            <input type="submit" value="update" name="submit" class="btn btn-success" id="submit-btn">
        </form>
    </div>



    <script>
        // Initialiser le menu déroulant Bootstrap
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
        var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl)
        });
    </script>
</body>
<div id="foot">
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/update_produits.blade.php ENDPATH**/ ?>