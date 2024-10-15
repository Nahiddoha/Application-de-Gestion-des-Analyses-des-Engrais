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
  var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
    return new bootstrap.Dropdown(dropdownToggleEl)
  });
</script>
</body>
<div id="foot">
<?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/cont_moyennestsp.blade.php ENDPATH**/ ?>