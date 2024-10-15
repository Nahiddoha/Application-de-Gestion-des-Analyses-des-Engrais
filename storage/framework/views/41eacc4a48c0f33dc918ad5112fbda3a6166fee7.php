<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiche moyennes acides</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/moyennesaffiche.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menu
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?php echo e(route('toutes-heurestsp')); ?>">Afficher produit TSP</a>
                                <a class="dropdown-item" href="<?php echo e(route('toutes-heuresproduit')); ?>">Afficher produits</a>
                                <a class="dropdown-item" href="<?php echo e(route('AfficherAcide')); ?>">Afficher acides</a>
                                <a class="dropdown-item" href="<?php echo e(route('toutes-moyennestsp')); ?>">Afficher moyenne TSP</a>
                                <a class="dropdown-item" href="<?php echo e(route('toutes-moyennes')); ?>">Afficher moyennes</a>
                                <a class="dropdown-item" href="<?php echo e(route('AfficherMoyacide')); ?>">Afficher moyennes acides</a>
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



    <!-- afficher moyennes -->

    <div class="container" id="marg">

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

        <?php if(session()->has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session()->get('success')); ?>

        </div>
        <?php endif; ?>

        <?php if(isset($resultatmoyennes)): ?>
        <?php if(isset($_GET['search_date']) && isset($_GET['nom_lign'])): ?>
        <?php $__currentLoopData = $resultatmoyennes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultatmoyenne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($resultatmoyenne['date_saisi'] == $_GET['search_date'] && $resultatmoyenne['nom_ligne'] == $_GET['nom_lign']): ?>
        <table class="table table-striped">
            <thead>
                <tr class="border">
                    <td colspan="3" class="border" style="color:green">Saiseur : <strong><?php echo e($resultatmoyenne['saiseur']); ?></strong></td>
                    <td colspan="3" class="border" style="color:green">Nom d'unite : <strong> <?php echo e($resultatmoyenne['nom_ligne']); ?></strong></td>
                </tr>

                <tr>
                    <td colspan="3" class="border" style="color:green">Nom produit : <strong> <?php echo e($resultatmoyenne['nom_produit']); ?></strong></td>
                    <td colspan="5" class="border" style="color:green">date de saisi : <strong><?php echo e($resultatmoyenne['date_saisi']); ?></strong></td>
                </tr>


                <tr>

                    <th class="border">densite</th>
                    <th class="border">Tc</th>
                    <th class="border">P2O5</th>
                    <th class="border">TS</th>
                    <th class="border">SO4</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border">

                    <td class="border"><?php echo e($resultatmoyenne['densite']); ?></td>
                    <td class="border"><?php echo e($resultatmoyenne['Tc']); ?></td>
                    <td class="border"><?php echo e($resultatmoyenne['p2o5']); ?></td>
                    <td class="border"><?php echo e($resultatmoyenne['TS']); ?></td>
                    <td class="border"><?php echo e($resultatmoyenne['SO4']); ?></td>
                    <td class="border">

                        <form action="<?php echo e(route('delete_resultatmoyenne', $resultatmoyenne['id_moy'])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                    <td class="border">
                        <form action="<?php echo e(route('update_moyenneacide')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('POST'); ?>
                            <input type="hidden" name="id_moy" value="<?php echo e($resultatmoyenne['id_moy']); ?>">
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                        </form>
                    </td>

                </tr>
            </tbody>
        </table>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <?php $__currentLoopData = $resultatmoyennes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultatmoyenne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="top">
            <table class="table table-striped">
                <thead>
                    <tr class="border">
                        <td colspan="3" class="border" style="color:green">Saiseur : <strong><?php echo e($resultatmoyenne['saiseur']); ?></strong></td>
                        <td colspan="3" class="border" style="color:green">Nom d'unite : <strong> <?php echo e($resultatmoyenne['nom_ligne']); ?></strong></td>
                    </tr>

                    <tr>
                        <td colspan="3" class="border" style="color:green">Nom produit : <strong> <?php echo e($resultatmoyenne['nom_produit']); ?></strong></td>
                        <td colspan="5" class="border" style="color:green">date de saisi : <strong><?php echo e($resultatmoyenne['date_saisi']); ?></strong></td>
                    </tr>


                    <tr>

                        <th class="border">densite</th>
                        <th class="border">Tc</th>
                        <th class="border">P2O5</th>
                        <th class="border">TS</th>
                        <th class="border">SO4</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">

                        <td class="border"><?php echo e($resultatmoyenne['densite']); ?></td>
                        <td class="border"><?php echo e($resultatmoyenne['Tc']); ?></td>
                        <td class="border"><?php echo e($resultatmoyenne['p2o5']); ?></td>
                        <td class="border"><?php echo e($resultatmoyenne['TS']); ?></td>
                        <td class="border"><?php echo e($resultatmoyenne['SO4']); ?></td>
                        <td class="border">
                            <form action="<?php echo e(route('delete_resultatmoyenne', $resultatmoyenne['id_moy'])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                        <td class="border">
                            <form action="<?php echo e(route('update_moyenneacide')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('POST'); ?>
                                <input type="hidden" name="id_moy" value="<?php echo e($resultatmoyenne['id_moy']); ?>">
                                <button type="submit" class="btn btn-success btn-sm">Update</button>
                            </form>
                        </td>

                    </tr>
                </tbody>
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

</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/affiche_moyenneacide.blade.php ENDPATH**/ ?>