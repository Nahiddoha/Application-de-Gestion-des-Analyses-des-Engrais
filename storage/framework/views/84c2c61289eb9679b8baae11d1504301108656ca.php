<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>affiche produit tsp</title>
        <link rel="stylesheet" href="css/header.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

                * {
                        font-family: 'Poppins', sans-serif;
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                        scroll-behavior: smooth;
                        text-align: center;
                }

                .d1 {
                        margin-bottom: 80px;
                        padding-top: 130px;
                }

                .d {
                        margin-top: 80px;
                }

                #coleur,
                .coleur {
                        color: green;
                }

                .top,
                .col-md-4 {
                        margin-bottom: 60px;
                }
        </style>
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
                                                        <a class="nav-link" href="<?php echo e(route('ajouter_lign')); ?>">Ajouter tableau</a>
                                                </li>
                                                <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Menu
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                                <a class="dropdown-item" href="<?php echo e(route('toutes-heurestsp')); ?>">Afficher produit TSP</a>
                                                                <a class="dropdown-item" href="<?php echo e(route('toutes-heuresproduit')); ?>">Afficher produits</a>
                                                                <a class="dropdown-item" href="<?php echo e(route('AfficherAcide')); ?>">Afficher acide</a>
                                                                <a class="dropdown-item" href="<?php echo e(route('toutes-moyennestsp')); ?>">Afficher moyenne TSP</a>
                                                                <a class="dropdown-item" href="<?php echo e(route('toutes-moyennes')); ?>">Afficher moyennes</a>
                                                                <a class="dropdown-item" href="<?php echo e(route('AfficherMoyacide')); ?>">Afficher moyenne acide</a>
                                                                <a class="dropdown-item" href="<?php echo e(route('chartTsp')); ?>">Afficher courbes TSP</a>
                                                                <a class="dropdown-item" href="<?php echo e(route('chart')); ?>">Afficher courbes</a>
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


        <!-- affichage des produits -->
        <div class="d1">

                <div class="col-md-4">
                        <form method="GET">
                                <label for="search-date">Date de saisie:</label>
                                <input type="date" id="search-date" name="search_date" class="form-control">
                                <label for="nom_lign">Nom de la ligne :</label>
                                <select name="nom_lign" id="nom_ligne" class="form-control">
                                        <option value="#">choisir une ligne</option>
                                        <option value="07A">07A</option>
                                        <option value="07B">07B</option>
                                        <option value="07C">07C</option>
                                        <option value="07D">07D</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Rechercher</button>
                        </form>
                </div>
                <!-- message de success -->
                <?php if(session()->has('success')): ?>
                <div class="alert alert-success">
                        <?php echo e(session()->get('success')); ?>

                </div>
                <?php endif; ?>

                <?php if(isset($donnees_par_tsp_et_par_heure)): ?>
                <?php if(isset($_GET['search_date']) && isset($_GET['nom_lign'])): ?>
                <?php $__currentLoopData = $donnees_par_tsp_et_par_heure; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_tsp => $donnees_par_tsp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($donnees_par_tsp['date_saisi'] == $_GET['search_date'] && $donnees_par_tsp['nom_ligne'] == $_GET['nom_lign']): ?>

                <table class="table table-striped">
                        <tr class="border">
                                <td class="border"><img src="images/oubaba.png"></td>
                                <td class="border">
                                        <h3 class="coleur">Analyses Produit fini et les liquides de lavage Secteur 1 </h3>
                                </td>
                                <td class="image1"> <img src="images/ocp.png"></td>
                        </tr>
                        <tr class="border">
                                <td colspan="3" class="border">Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP Jorf
                                        Lasfar (OCP Nord)</td>
                        </tr>

                        <tr class="border">
                                <th class="border">Nom produit : <?php echo e($donnees_par_tsp['nom_produit']); ?></th>
                                <th class="border">Nom Ligne : <?php echo e($donnees_par_tsp['nom_ligne']); ?></th>
                                <th class="border">Date : <?php echo e($donnees_par_tsp['date_saisi']); ?></th>
                        </tr>

                </table>

                <table class="table table-striped">
                        <tr>
                                <th rowspan="2" class="border">Heure</th>
                                <th colspan="3" class="border">Bouillie (Cuve D'attaque)</th>
                                <th colspan="3" class="border">sortie granulateur</th>
                                <th colspan="7" class="border">Titre TSP</th>
                                <th colspan="7" class="border">Granulometre TSP</th>
                                <th rowspan="2" class="border">Nom du saiseur</th>
                                <th class="border">Action1</th>
                        </tr>

                        <tr>
                                <th class="border">
                                        <p class="ths" id="prob">densite</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">A.L</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">P2O5(S.E)</p>
                                </th>

                                <th class="border">
                                        <p class="ths" id="prob">A.L</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">p2o5_SE</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">H2O</p>
                                </th>

                                <th class="border">
                                        <p class="ths" id="prob">H2O</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">A.L</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">P2O5(S.E)</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">P2O5(S.E+cit)</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">Tot</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">h2O_T</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">h2O_B</p>
                                </th>

                                <th class="border">
                                        <p class="ths" id="prob"> > 6.3</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 5</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 4</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 3.15</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 2.5</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 2</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 1</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">Action2</p>
                                </th>
                        </tr>

                        <?php $__currentLoopData = $donnees_par_tsp['donnees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heure => $resultats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($resultats) > 0): ?>

                        <?php $__currentLoopData = $resultats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border">
                                <th class="border"><?php echo e($heure); ?></th>
                                <td class="border"><?php echo e($resultat->densite); ?></td>
                                <td class="border"><?php echo e($resultat->AL_B); ?></td>
                                <td class="border"><?php echo e($resultat->P2O5_SE_B); ?></td>
                                <td class="border"><?php echo e($resultat->AL); ?></td>
                                <td class="border"><?php echo e($resultat->P2O5_SE); ?></td>
                                <td class="border"><?php echo e($resultat->H2O); ?></td>
                                <td class="border"><?php echo e($resultat->H2O); ?></td>
                                <td class="border"><?php echo e($resultat->AL_T); ?></td>
                                <td class="border"><?php echo e($resultat->P2O5_SE_T); ?></td>
                                <td class="border"><?php echo e($resultat->P2O5_SE_CIT); ?></td>
                                <td class="border"><?php echo e($resultat->TOT); ?></td>
                                <td class="border"><?php echo e($resultat->h2O_T); ?></td>
                                <td class="border"><?php echo e($resultat->H2O_B); ?></td>
                                <td class="border"><?php echo e($resultat->sup_6_3); ?></td>
                                <td class="border"><?php echo e($resultat->sup_5); ?></td>
                                <td class="border"><?php echo e($resultat->sup_4); ?></td>
                                <td class="border"><?php echo e($resultat->sup_3_15); ?></td>
                                <td class="border"><?php echo e($resultat->sup_2_5); ?></td>
                                <td class="border"><?php echo e($resultat->sup_2); ?></td>
                                <td class="border"><?php echo e($resultat->sup_1); ?></td>
                                <td class="border"><?php echo e($resultat->saiseur); ?></td>
                                <td class="border">
                                        <form action="<?php echo e(route('delete_produittsp')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <input type="hidden" name="id_bouillie" value="<?php echo e($resultat->id_bouillie); ?>">
                                                <input type="hidden" name="id_sortie" value="<?php echo e($resultat->id_sortie); ?>">
                                                <input type="hidden" name="id_titsp" value="<?php echo e($resultat->id_titsp); ?>">
                                                <input type="hidden" name="id_grantsp" value="<?php echo e($resultat->id_grantsp); ?>">
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        <br>
                                        <form action="<?php echo e(route('update_produit_tsp')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('POST'); ?>
                                                <input type="hidden" name="id_bouillie" value="<?php echo e($resultat->id_bouillie); ?>">
                                                <input type="hidden" name="id_sortie" value="<?php echo e($resultat->id_sortie); ?>">
                                                <input type="hidden" name="id_titsp" value="<?php echo e($resultat->id_titsp); ?>">
                                                <input type="hidden" name="id_grantsp" value="<?php echo e($resultat->id_grantsp); ?>">
                                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                                        </form>
                                </td>
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <p>Pas de résultats pour cette heure.</p>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        </table>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <?php $__currentLoopData = $donnees_par_tsp_et_par_heure; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_tsp => $donnees_par_tsp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="d">
                <table class="table table-striped">
                        <tr class="border">
                                <td class="border"><img src="images/oubaba.png"></td>
                                <td class="border">
                                        <h3 class="coleur">Analyses Produit fini et les liquides de lavage Secteur 1 </h3>
                                </td>
                                <td class="image1"> <img src="images/ocp.png"></td>
                        </tr>
                        <tr class="border">
                                <td colspan="3" class="border">Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP Jorf
                                        Lasfar (OCP Nord)</td>
                        </tr>

                        <tr class="border">
                                <th class="border">Nom produit : <?php echo e($donnees_par_tsp['nom_produit']); ?></th>
                                <th class="border">Nom Ligne : <?php echo e($donnees_par_tsp['nom_ligne']); ?></th>
                                <th class="border">Date : <?php echo e($donnees_par_tsp['date_saisi']); ?></th>
                        </tr>

                </table>

                <table class="table table-striped">
                        <tr>
                                <th rowspan="2" class="border">Heure</th>
                                <th colspan="3" class="border">Bouillie (Cuve D'attaque)</th>
                                <th colspan="3" class="border">sortie granulateur</th>
                                <th colspan="7" class="border">Titre TSP</th>
                                <th colspan="7" class="border">Granulometre TSP</th>
                                <th rowspan="2" class="border">Nom du saiseur</th>
                                <th class="border">Action1</th>
                        </tr>

                        <tr class="border">
                                <th class="border">
                                        <p class="ths" id="prob">densite</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">A.L</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">P2O5(S.E)</p>
                                </th>

                                <th class="border">
                                        <p class="ths" id="prob">A.L</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">p2o5_SE</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">H2O</p>
                                </th>

                                <th class="border">
                                        <p class="ths" id="prob">H2O</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">A.L</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">P2O5(S.E)</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">P2O5(S.E+cit)</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">Tot</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">h2O_T</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">h2O_B</p>
                                </th>

                                <th class="border">
                                        <p class="ths" id="prob"> > 6.3</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 5</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 4</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 3.15</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 2.5</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 2</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob"> > 1</p>
                                </th>
                                <th class="border">
                                        <p class="ths" id="prob">Action2</p>
                                </th>
                        </tr>
                        <?php $__currentLoopData = $donnees_par_tsp['donnees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heure => $resultats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($resultats) > 0): ?>

                        <?php $__currentLoopData = $resultats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border">
                                <th class="border"><?php echo e($heure); ?></th>
                                <td class="border"><?php echo e($resultat->densite); ?></td>
                                <td class="border"><?php echo e($resultat->AL_B); ?></td>
                                <td class="border"><?php echo e($resultat->P2O5_SE_B); ?></td>
                                <td class="border"><?php echo e($resultat->AL); ?></td>
                                <td class="border"><?php echo e($resultat->P2O5_SE); ?></td>
                                <td class="border"><?php echo e($resultat->H2O); ?></td>
                                <td class="border"><?php echo e($resultat->H2O); ?></td>
                                <td class="border"><?php echo e($resultat->AL_T); ?></td>
                                <td class="border"><?php echo e($resultat->P2O5_SE_T); ?></td>
                                <td class="border"><?php echo e($resultat->P2O5_SE_CIT); ?></td>
                                <td class="border"><?php echo e($resultat->TOT); ?></td>
                                <td class="border"><?php echo e($resultat->h2O_T); ?></td>
                                <td class="border"><?php echo e($resultat->H2O_B); ?></td>
                                <td class="border"><?php echo e($resultat->sup_6_3); ?></td>
                                <td class="border"><?php echo e($resultat->sup_5); ?></td>
                                <td class="border"><?php echo e($resultat->sup_4); ?></td>
                                <td class="border"><?php echo e($resultat->sup_3_15); ?></td>
                                <td class="border"><?php echo e($resultat->sup_2_5); ?></td>
                                <td class="border"><?php echo e($resultat->sup_2); ?></td>
                                <td class="border"><?php echo e($resultat->sup_1); ?></td>
                                <td class="border"><?php echo e($resultat->saiseur); ?></td>
                                <td class="border">
                                        <form action="<?php echo e(route('delete_produittsp')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <input type="hidden" name="id_bouillie" value="<?php echo e($resultat->id_bouillie); ?>">
                                                <input type="hidden" name="id_sortie" value="<?php echo e($resultat->id_sortie); ?>">
                                                <input type="hidden" name="id_titsp" value="<?php echo e($resultat->id_titsp); ?>">
                                                <input type="hidden" name="id_grantsp" value="<?php echo e($resultat->id_grantsp); ?>">
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        <br>
                                        <form action="<?php echo e(route('update_produit_tsp')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id_bouillie" value="<?php echo e($resultat->id_bouillie); ?>">
                                                <input type="hidden" name="id_sortie" value="<?php echo e($resultat->id_sortie); ?>">
                                                <input type="hidden" name="id_titsp" value="<?php echo e($resultat->id_titsp); ?>">
                                                <input type="hidden" name="id_grantsp" value="<?php echo e($resultat->id_grantsp); ?>">
                                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                                        </form>
                                </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <p>Pas de résultats pour cette heure.</p>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        </table>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php endif; ?>
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

</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/affiche_produittsp.blade.php ENDPATH**/ ?>