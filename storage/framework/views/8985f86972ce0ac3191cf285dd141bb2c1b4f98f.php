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
  <a href="#" class="logo" style="text-decoration:none;">
    <img src="images/logo_ferti.png">
  </a>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('accueil_controleur')); ?>">Accueil</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="menuTSP" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              TSP
            </a>
            <ul class="dropdown-menu" aria-labelledby="menuTSP">
              <li><a class="dropdown-item" href="<?php echo e(route('toutes-heurestspcont')); ?>">Toutes les TSP</a></li>
              <li><a class="dropdown-item" href="<?php echo e(route('toutes-moyennestspcont')); ?>">Moyenne TSP</a></li>
              <li><a class="dropdown-item" href="<?php echo e(route('chartTspcont')); ?>">Courbes TSP</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="menuProduits" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Produits
            </a>
            <ul class="dropdown-menu" aria-labelledby="menuProduits">
              <li><a class="dropdown-item" href="<?php echo e(route('toutes-heuresproduitcont')); ?>">Toutes les Produits</a></li>
              <li><a class="dropdown-item" href="<?php echo e(route('toutes-moyennescont')); ?>">Moyennes</a></li>
              <li><a class="dropdown-item" href="<?php echo e(route('chartcont')); ?>">Courbes</a></li>
            </ul>
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
            <td colspan="3"class="border">Saiseur : <?php echo e($resultatproduit['saiseur']); ?></th>
            <th colspan="3"class="border">Nom d'unite : <?php echo e($resultatproduit['nom_ligne']); ?></th>
            <th colspan="3" class="border">Nom produit : <?php echo e($resultatproduit['nom_produit']); ?></th>
            <th colspan="5" class="border">date de saisi :  <?php echo e($resultatproduit['date_saisi']); ?></th>
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
            <td colspan="3"class="border">Saiseur : <?php echo e($resultatproduit['saiseur']); ?></th>
            <th colspan="3"class="border">Nom d'unite : <?php echo e($resultatproduit['nom_ligne']); ?></th>
            <th colspan="3" class="border">Nom produit : <?php echo e($resultatproduit['nom_produit']); ?></th>
            <th colspan="5" class="border">date de saisi :  <?php echo e($resultatproduit['date_saisi']); ?></th>
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
  var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
    return new bootstrap.Dropdown(dropdownToggleEl)
  });
</script>
</body>
<div id="foot">
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/cont_moyennes.blade.php ENDPATH**/ ?>