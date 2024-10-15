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

    * {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      scroll-behavior: smooth;
      text-align: center;
    }

    .affiche {
      margin-left: 5%;
      padding-top: 80px;
    }

    .d1 {
      margin-left: 5%;
      width: 90%;
      padding-top: 130px;
      padding-bottom: 30px;
    }

    .d {
      width: 96%;
      padding-bottom: 30px;
      padding-top: 130px;
    }

    #tail {
      width: 600px;
    }

    .d5 {
      width: 90%;
    }

    .contain {
      width: 600px;
      padding-right: 5%;
    }

    #coleur,
    .coleur {
      color: green;
    }

    .container {
      padding-top: 120px;
    }

    .sticky {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 9999;
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
                <li><a class="dropdown-item" href="<?php echo e(route('toutes-heuresproduitcont')); ?>">Toutes les produits</a></li>
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


  <h1>hello controleur</h1>




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

</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/accueil_controleur.blade.php ENDPATH**/ ?>