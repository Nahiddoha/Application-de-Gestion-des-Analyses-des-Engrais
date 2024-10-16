<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Tableau_TSP</title>
    <style>
        * {
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .btn-success {
            width: 26%;
            text-align: center;
            background-color: rgba(86, 105, 86, 0.528);
            color: #fff;
            font-size: 1rem;
            padding: 0.6rem 1rem;
            border: none;
            border-radius: 0.35rem;
            cursor: pointer;
            padding-bottom: 40px;
            padding-right: 20px;
            margin-bottom: 25px;
            margin-top: 15px;
            padding-top: 15px;
        }

        input {
            width: 299px;
            height: 54px;
        }

        .inp1 {
            height: 57px;
        }

        .d1 {
            padding-top: 6%;
            width: 90%;
            margin-left: 80px;
        }

        .c1 {
            width: 100%;
        }

        #prob {
            width: 124px;
        }

        #prob1 {
            border: 2px solid black;
        }

        .em1 {
            font-family: cursive;
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
                            <a class="nav-link" href="<?php echo e(route('ajouter_tsp')); ?>">Ajout_T_Tsp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('ajouter_moyenne_tsp')); ?>">ajout_M_Tsp</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('ajouter_acide')); ?>">AjoutAcide </a>
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

    <div class="d1">
        <table class="table table-striped">
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
                <th class="border"> Ligne : <?php echo e(session('nom_ligne')); ?></th>
                <th class="border">Date : <?php echo e(session('date_production')); ?></th>
            </tr>

            <tr class="border">
                <th class="border">Nom du saiseur : <?php echo e(session('saiseur')); ?> </th>
                <th class="border">Nom du Produit : <?php echo e(session('nom_produit')); ?> </th>
                <th colspan="2" class="border">L'heure : <?php echo e(session('heure')); ?>H</th>
            </tr>
        </table>

        <div class="c1">
            <form method="POST" action="<?php echo e(route('ajouter_tsp_produit')); ?>" id="my-form">


                <?php if(isset($message)): ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php endif; ?>

                <?php echo csrf_field(); ?>
                <?php echo method_field('POST'); ?>
                <div class="container">
                    <table class="table table-striped">
                        <tr id="prob1">
                            <th colspan="2" class="border"><em>Echantillons</em></th>
                        </tr>
                        <tr id="prob1">
                            <td colspan="2" class="border"><em class="em1">Bouillie (Cuve D'attaque)</em></td>
                        </tr>
                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">densite</p>
                            </th>
                            <td class="border"><input type="text" class="inp1" name="densite" value="<?php echo e(old('densite')); ?>"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">A.L</p>
                            </th>
                            <td class="border"><input type="text" class="inp1" name="AL_B" value="<?php echo e(old('AL_B')); ?>"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">P2O5(S.E)</p>
                            </th>
                            <td class="border"><input type="text" class="inp1" name="P2O5_SE_B" value="<?php echo e(old('P2O5_SE_B')); ?>"></td>
                        </tr>

                        <tr id="prob1">
                            <td colspan="2" class="border"><em em class="em1">sortie granulateur</em></td>
                        </tr>
                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">A.L</p>
                            </th>
                            <td class="border"><input type="text" class="inp1" name="AL" value="<?php echo e(old('AL')); ?>"></td>
                        </tr>
                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">p2o5_SE</p>
                            </th>
                            <td class="border"><input type="text" class="inp1" name="P2O5_SE" value="<?php echo e(old('P2O5_SE')); ?>"></td>
                        </tr>
                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">H2O</p>
                            </th>
                            <td class="border"><input type="text" class="inp1" name="H2O" value="<?php echo e(old('H2O')); ?>"></td>
                        </tr>
                    </table>


                    <table class="table table-striped">
                        <tr id="prob1">
                            <th colspan="2" class="border"><em>Les Titres_TSP</em></th>
                        </tr>
                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">H2O</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="H2O" value="<?php echo e(old('H2O')); ?>"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">A.L</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="AL_T" value="<?php echo e(old('AL_T')); ?>"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">P2O5(S.E)</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="P2O5_SE_T" value="<?php echo e(old('P2O5_SE_T')); ?>"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">P2O5(S.E+cit)</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="P2O5_SE_CIT" value="<?php echo e(old('P2O5_SE_CIT')); ?>"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">Tot</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="TOT" value="<?php echo e(old('TOT')); ?>"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">h2O_T</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="h2O_T" value="<?php echo e(old('h2O_T')); ?>"></td>
                        </tr>

                        <tr>
                            <th class="border">
                                <p class="ths" id="prob">H2O_B</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="H2O_B" value="<?php echo e(old('H2O_B')); ?>"></td>
                        </tr>
                    </table>

                    <table class="table table-striped">
                        <tr id="prob1">
                            <th colspan="2" class="border"><em>Les Granulometrie_TSP</em></th>
                        </tr>
                        <tr class="border">
                            <th class="border">
                                <p class="tds" id="prob">>=6.3</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="sup_6_3" value="<?php echo e(old('sup_6_3')); ?>"></td>
                        </tr>

                        <tr class="border">
                            <th class="border">
                                <p class="tds" id="prob">>=5</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="sup_5" value="<?php echo e(old('sup_5')); ?>"></td>
                        </tr>

                        <tr class="border">
                            <th class="border">
                                <p class="tds" id="prob">>=4</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="sup_4" value="<?php echo e(old('sup_4')); ?>"></td>
                        </tr>

                        <tr class="border">
                            <th class="border">
                                <p class="tds" id="prob">>=3.15</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="sup_3_15" value="<?php echo e(old('sup_3_15')); ?>"></td>
                        </tr>

                        <tr class="border">
                            <th class="border">
                                <p class="tds" id="prob">>=2.5</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="sup_2_5" value="<?php echo e(old('sup_2_5')); ?>"></td>
                        </tr>

                        <tr class="border">
                            <th class="border">
                                <p class="tds" id="prob">>=2</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="sup_2" value="<?php echo e(old('sup_2')); ?>"></td>
                        </tr>

                        <tr class="border">
                            <th class="border">
                                <p class="tds" id="prob">>=1</p>
                            </th>
                            <td class="border"><input type="text" class="inp" name="sup_1" value="<?php echo e(old('sup_1')); ?>"></td>
                        </tr>
                    </table>
                </div>
                <input type="submit" value="valider et passer a l'heure suivant" name="submit" class="btn btn-success" id="submit-btn">
            </form>
        </div>
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

</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/ajouter_produit_tsp.blade.php ENDPATH**/ ?>