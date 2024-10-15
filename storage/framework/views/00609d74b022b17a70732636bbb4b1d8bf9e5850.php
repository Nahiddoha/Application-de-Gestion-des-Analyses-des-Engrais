<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiche moyenne tsp</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/moyennetspaffiche.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <header class="bg-light">
        <a href="#" class="logo" style="text-decoration:none;">
            <img src="images/logo_ferti.png">
        </a>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('accueil_analyste')); ?>">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('ajouter_lign')); ?>">Ajout_Tableau</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?php echo e(route('toutes-heurestsp')); ?>">Afficher produit TSP</a>
                                <a class="dropdown-item" href="<?php echo e(route('toutes-heuresproduit')); ?>">Afficher produits</a>
                                <a class="dropdown-item" href="<?php echo e(route('toutes-moyennestsp')); ?>">Afficher moyenne TSP</a>
                                <a class="dropdown-item" href="<?php echo e(route('toutes-moyennes')); ?>">Afficher moyennes</a>
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


    <!-- affichage moyenne tsp -->


    <div class="container" id="marg">

        <div class="col-md-4">
            <form method="GET">
                <label for="search-date">Date de saisie:</label>
                <input type="date" id="search-date" name="search_date" class="form-control">
                <button type="submit" class="btn btn-primary mt-2">Rechercher</button>
            </form>
        </div>
        <?php if(isset($resultattsps)): ?>
        <?php if(isset($_GET['search_date'])): ?>
        <?php $__currentLoopData = $resultattsps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultattsp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($resultattsp['date_saisi'] == $_GET['search_date']): ?>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="coleur">Résultats des moyennes par TSP et ligne de production</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="border">
                                    <th colspan="3" class="border">Saiseur : <?php echo e($resultattsp['saiseur']); ?></th>
                                    <th colspan="3" class="border">Nom D'unite : <?php echo e($resultattsp['nom_ligne']); ?></th>
                                    <th colspan="3" class="border">Nom de produit : <?php echo e($resultattsp['nom_produit']); ?></th>
                                    <th colspan="4" class="border">Date de saisi : <?php echo e($resultattsp['date_saisi']); ?></th>
                                    <th class="border"></th>
                                </tr>
                                <tr>
                                    <th class="border">AL</th>
                                    <th class="border">P2O5_SE</th>
                                    <th class="border">p2O5_SE_C</th>
                                    <th class="border">TOT</th>
                                    <th class="border">H2O_T</th>
                                    <th class="border">H2O_B</th>
                                    <th class="border">sup_6_3</th>
                                    <th class="border">sup_5</th>
                                    <th class="border">sup_4</th>
                                    <th class="border">sup_3_15</th>
                                    <th class="border">sup_2_5</th>
                                    <th class="border">sup_2</th>
                                    <th class="border">sup_1</th>
                                    <th class="border">action1</th>
                                    <th class="border">action2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border">
                                    <td class="border"><?php echo e($resultattsp['AL']); ?></td>
                                    <td class="border"><?php echo e($resultattsp['P2O5_SE']); ?></td>
                                    <td class="border"><?php echo e($resultattsp['p2O5_SE_C']); ?></td>
                                    <td class="border"><?php echo e($resultattsp['TOT']); ?></td>
                                    <td class="border"><?php echo e($resultattsp['H2O_T']); ?></td>
                                    <td class="border"><?php echo e($resultattsp['H2O_B']); ?></td>
                                    <td class="border"><?php echo e($resultattsp['sup_6_3']); ?></td>
                                    <td class="border"><?php echo e($resultattsp['sup_5']); ?></td>
                                    <td class="border"><?php echo e($resultattsp['sup_4']); ?></td>
                                    <td class="border"><?php echo e($resultattsp['sup_3_15']); ?></td>
                                    <td class="border"><?php echo e($resultattsp['sup_2_5']); ?></td>
                                    <td class="border"><?php echo e($resultattsp['sup_2']); ?></td>
                                    <td class="border"><?php echo e($resultattsp['sup_1']); ?></td>
                                    <td class="border">  
                                              <form action="<?php echo e(route('delete_resultattsp', $resultattsp['id_moytsp'])); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form></td>
                                    <td class="border"><a href="#">update</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <?php $__currentLoopData = $resultattsps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultattsp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="top">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" id="coleur">Résultats des moyennes par TSP et ligne de production</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr class="border">
                                        <th colspan="3" class="border">Saiseur : <?php echo e($resultattsp['saiseur']); ?></th>
                                        <th colspan="3" class="border">Nom D'unite : <?php echo e($resultattsp['nom_ligne']); ?></th>
                                        <th colspan="3" class="border">Nom de produit : <?php echo e($resultattsp['nom_produit']); ?></th>
                                        <th colspan="4" class="border">Date de saisi : <?php echo e($resultattsp['date_saisi']); ?></th>
                                        <th class="border"></th>
                                        <th class="border"></th>
                                    </tr>
                                    <tr>
                                        <th class="border">AL</th>
                                        <th class="border">P2O5_SE</th>
                                        <th class="border">p2O5_SE_C</th>
                                        <th class="border">TOT</th>
                                        <th class="border">H2O_T</th>
                                        <th class="border">H2O_B</th>
                                        <th class="border">>= 6.3</th>
                                        <th class="border">>= 5</th>
                                        <th class="border">>= 4</th>
                                        <th class="border">>= 3.15</th>
                                        <th class="border">>= 2.5</th>
                                        <th class="border">>= 2</th>
                                        <th class="border">>= 1</th>
                                        <th class="border">action1</th>
                                        <th class="border">action2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border">
                                        <td class="border"><?php echo e($resultattsp['AL']); ?></td>
                                        <td class="border"><?php echo e($resultattsp['P2O5_SE']); ?></td>
                                        <td class="border"><?php echo e($resultattsp['p2O5_SE_C']); ?></td>
                                        <td class="border"><?php echo e($resultattsp['TOT']); ?></td>
                                        <td class="border"><?php echo e($resultattsp['H2O_T']); ?></td>
                                        <td class="border"><?php echo e($resultattsp['H2O_B']); ?></td>
                                        <td class="border"><?php echo e($resultattsp['sup_6_3']); ?></td>
                                        <td class="border"><?php echo e($resultattsp['sup_5']); ?></td>
                                        <td class="border"><?php echo e($resultattsp['sup_4']); ?></td>
                                        <td class="border"><?php echo e($resultattsp['sup_3_15']); ?></td>
                                        <td class="border"><?php echo e($resultattsp['sup_2_5']); ?></td>
                                        <td class="border"><?php echo e($resultattsp['sup_2']); ?></td>
                                        <td class="border"><?php echo e($resultattsp['sup_1']); ?></td>
                                        <td class="border">  
                                              <form action="<?php echo e(route('delete_resultattsp', $resultattsp['id_moytsp'])); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form></td>
                                        <td class="border"><a href="#" class="btn btn-success btn-sm">update</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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

</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/Affiche_moyennestsp.blade.php ENDPATH**/ ?>