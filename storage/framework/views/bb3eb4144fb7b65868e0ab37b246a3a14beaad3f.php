<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Affiche moyennes</title>
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/moyennesaffiche.css">
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
              <a class="nav-link" href="<?php echo e(route('ajouter_lign')); ?>">AjoutTableau</a>
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



  <!-- afficher moyennes -->

  <div class="container" id="marg">

    <div class="col-md-4">
      <form method="GET">
        <label for="search-date">Date de saisie:</label>
        <input type="date" id="search-date" name="search_date" class="form-control">
        <button type="submit" class="btn btn-primary mt-2">Rechercher</button>
      </form>
    </div>

    <?php if(isset($resultatproduits)): ?>
    <?php if(isset($_GET['search_date'])): ?>
    <?php $__currentLoopData = $resultatproduits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultatproduit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($resultatproduit['date_saisi'] == $_GET['search_date']): ?>
    <table class="table table-striped">
      <thead>
        <tr class="border">
          <td colspan="3" class="border">Saiseur : <?php echo e($resultatproduit['saiseur']); ?></th>
          <th colspan="3" class="border">Nom d'unite : <?php echo e($resultatproduit['nom_ligne']); ?></th>
          <th colspan="3" class="border">Nom produit : <?php echo e($resultatproduit['nom_produit']); ?></th>
          <th colspan="5" class="border">date de saisi : <?php echo e($resultatproduit['date_saisi']); ?></th>
          <th class="border"></th>
          <th class="border"></th>
        </tr>
        <tr>
          <th class="border">Ammonical</th>
          <th class="border">P2O5</th>
          <th class="border">P2O5 tot</th>
          <th class="border">P2O5 SE/C</th>
          <th class="border">H2O</th>
          <th class="border">Zn</th>
          <th class="border">S</th>
          <th class="border">Sup 5</th>
          <th class="border">Sup 4.75</th>
          <th class="border">Sup 4</th>
          <th class="border">Sup 3.15</th>
          <th class="border">Sup 2.5</th>
          <th class="border">Sup 2</th>
          <th class="border">Sup 1</th>
          <th class="border">action1</th>
          <th class="border">action2</th>
        </tr>
      </thead>
      <tbody>
        <tr class="border">

          <td class="border"><?php echo e($resultatproduit['ammonical']); ?></td>
          <td class="border"><?php echo e($resultatproduit['p2o5']); ?></td>
          <td class="border"><?php echo e($resultatproduit['p2o5_tot']); ?></td>
          <td class="border"><?php echo e($resultatproduit['p2o5_SE_C']); ?></td>
          <td class="border"><?php echo e($resultatproduit['h2o']); ?></td>
          <td class="border"><?php echo e($resultatproduit['zn']); ?></td>
          <td class="border"><?php echo e($resultatproduit['s']); ?></td>
          <td class="border"><?php echo e($resultatproduit['sup_5']); ?></td>
          <td class="border"><?php echo e($resultatproduit['sup_4_75']); ?></td>
          <td class="border"><?php echo e($resultatproduit['sup_4']); ?></td>
          <td class="border"><?php echo e($resultatproduit['sup_3_15']); ?></td>
          <td class="border"><?php echo e($resultatproduit['sup_2_5']); ?></td>
          <td class="border"><?php echo e($resultatproduit['sup_2']); ?></td>
          <td class="border"><?php echo e($resultatproduit['sup_1']); ?></td>
          <td class="border">
            <form action="<?php echo e(route('delete_resultatproduit', $resultatproduit['id_moy'])); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </td>
          <td class="border"><a href="#" class="btn btn-success btn-sm">update</a></td>
        </tr>
      </tbody>
    </table>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <?php $__currentLoopData = $resultatproduits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultatproduit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="top">
      <table class="table table-striped">
        <thead>
          <tr class="border">
            <td colspan="3" class="border">Saiseur : <?php echo e($resultatproduit['saiseur']); ?></th>
            <th colspan="3" class="border">Nom d'unite : <?php echo e($resultatproduit['nom_ligne']); ?></th>
            <th colspan="3" class="border">Nom produit : <?php echo e($resultatproduit['nom_produit']); ?></th>
            <th colspan="5" class="border">date de saisi : <?php echo e($resultatproduit['date_saisi']); ?></th>
            <th class="border"></th>
            <th class="border"></th>
          </tr>
          <tr>
            <th class="border">Ammonical</th>
            <th class="border">P2O5</th>
            <th class="border">P2O5 tot</th>
            <th class="border">P2O5 SE/C</th>
            <th class="border">H2O</th>
            <th class="border">Zn</th>
            <th class="border">S</th>
            <th class="border">Sup 5</th>
            <th class="border">Sup 4.75</th>
            <th class="border">Sup 4</th>
            <th class="border">Sup 3.15</th>
            <th class="border">Sup 2.5</th>
            <th class="border">Sup 2</th>
            <th class="border">Sup 1</th>
            <th class="border">action1</th>
            <th class="border">action2</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border">

            <td class="border"><?php echo e($resultatproduit['ammonical']); ?></td>
            <td class="border"><?php echo e($resultatproduit['p2o5']); ?></td>
            <td class="border"><?php echo e($resultatproduit['p2o5_tot']); ?></td>
            <td class="border"><?php echo e($resultatproduit['p2o5_SE_C']); ?></td>
            <td class="border"><?php echo e($resultatproduit['h2o']); ?></td>
            <td class="border"><?php echo e($resultatproduit['zn']); ?></td>
            <td class="border"><?php echo e($resultatproduit['s']); ?></td>
            <td class="border"><?php echo e($resultatproduit['sup_5']); ?></td>
            <td class="border"><?php echo e($resultatproduit['sup_4_75']); ?></td>
            <td class="border"><?php echo e($resultatproduit['sup_4']); ?></td>
            <td class="border"><?php echo e($resultatproduit['sup_3_15']); ?></td>
            <td class="border"><?php echo e($resultatproduit['sup_2_5']); ?></td>
            <td class="border"><?php echo e($resultatproduit['sup_2']); ?></td>
            <td class="border"><?php echo e($resultatproduit['sup_1']); ?></td>
            <td class="border">
              <form action="<?php echo e(route('delete_resultatproduit', $resultatproduit['id_moy'])); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
            </td>
            <td class="border"><a href="#" class="btn btn-success btn-sm">update</a></td>
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

</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/Affiche_moyennesproduits.blade.php ENDPATH**/ ?>