<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/moyenne.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Tableau Moyenne acides</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
                            <a class="nav-link" href="<?php echo e(route('ajouter_acide')); ?>">AjoutAcide </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('ajouter_moyacide')); ?>">Moyenne_acide</a>
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
        <form method="post" action="<?php echo e(route('update_moyacide', ['id' => $moyenne->id_moy])); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

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
                    <th class="border"> Ligne :<input type="hidden" name="nom_ligne" value="<?php echo e($moyenne->nom_ligne); ?>"> </th>
                    <th class="border">Date : <input type="hidden" name="date_saisi" value="<?php echo e($moyenne->date_saisi); ?>"></th>
                </tr>

                <tr class="border">
                    <th class="border">Nom du saiseur : <input type="hidden" name="saiseur" value="<?php echo e($moyenne->saiseur); ?>"></th>
                    <th class="border">Nom du Produit : <input type="hidden" name="nom_produit" value="<?php echo e($moyenne->nom_produit); ?>"></th>
                    <th colspan="2" class="border"></th>
                </tr>
            </table>

            <table class="table table-striped">

                <?php if(isset($message)): ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
                <?php endif; ?>

                <tr class="border">
                    <th colspan="2" class="moy"><em>Moyenne Acide</em></th>
                </tr>
                <tr class="border">
                    <th class="border" id="prb">
                        <p>densite</p>
                    </th>
                    <td class="border"><input type="text" name="densite" value="<?php echo e($moyenne->densite); ?>"></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p>Tc</p>
                    </th>
                    <td class="border"><input type="text" name="Tc" value="<?php echo e($moyenne->Tc); ?>"></td>
                </tr class="border">

                <tr class="border">

                    <th class="border" id="prb">
                        <p>P2O5 </p>
                    </th>
                    <td class="border"><input type="text" name="p2o5" value="<?php echo e($moyenne->p2o5); ?>"></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p class="ths">TS%</p>
                    </th>
                    <td class="border"><input type="text" name="TS" value="<?php echo e($moyenne->TS); ?>"></td>
                </tr>

                <tr class="border">
                    <th class="border" id="prb">
                        <p class="ths">SO4--</p>
                    </th>
                    <td class="border"><input type="text" name="SO4" value="<?php echo e($moyenne->SO4); ?>"></td>
                </tr>
            </table>
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

</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/update_moyenneacide.blade.php ENDPATH**/ ?>