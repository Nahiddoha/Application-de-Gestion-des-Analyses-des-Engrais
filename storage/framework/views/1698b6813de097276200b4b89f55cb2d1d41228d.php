<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Chargement des scripts nécessaires pour afficher les graphes -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="css/header.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">   
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <title>Visualisation</title>
        <link rel="stylesheet" href="css/css_visualisation.css">
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

<div class="d1">
        <div class="col-md-4">
            <form method="GET">
                <label for="search-date">Date de production:</label>
                <input type="date" id="search-date" name="search_date" class="form-control">
                <button type="submit" class="btn btn-primary mt-2">Rechercher</button>
            </form>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Visualisation des données</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Bouton pour afficher le graphe Bouille -->
                                <div class="col-md-2">
                                    <button class="btn btn-primary" id="btn-last">&lt;last</button>
                                </div>
                                <div class="col-md-8">
                                    <div class="row" id="graphe-Bouille">
                                        <?php if(isset($_GET['search_date'])): ?>
                                        <?php $__currentLoopData = $graphe_par_produit_Bouille; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_tsp => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($graph['date_production'] == $_GET['search_date']): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">Bouillie/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_Bouille_<?php echo e($id_tsp); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_Bouille = document.getElementById('chart_Bouille_<?php echo e($id_tsp); ?>').getContext('2d');
                                                    var chart_Bouille = new Chart(ctx_Bouille, {
                                                        type: 'bar',
                                                        data: JSON.parse('<?php echo addslashes(json_encode($graphe)); ?>'),
                                                        options: {
                                                            responsive: false,
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <?php $__currentLoopData = $graphe_par_produit_Bouille; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_tsp => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">Bouillie/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_Bouille_<?php echo e($id_tsp); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_Bouille = document.getElementById('chart_Bouille_<?php echo e($id_tsp); ?>').getContext('2d');
                                                    var chart_Bouille = new Chart(ctx_Bouille, {
                                                        type: 'bar',
                                                        data: JSON.parse('<?php echo addslashes(json_encode($graphe)); ?>'),
                                                        options: {
                                                            responsive: false,
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>


                                    <!-- Affichage du graphe SortieGranul-->
                                
                                    <div class="row" id="graphe-SortieGranul" style="display:none">
                                        <?php if(isset($_GET['search_date'])): ?>
                                        <?php $__currentLoopData = $graphe_par_produit_SortieGranul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_tsp => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($graph['date_production'] == $_GET['search_date']): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">SortieGranul/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_SortieGranul_<?php echo e($id_tsp); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_SortieGranul = document.getElementById('chart_SortieGranul_<?php echo e($id_tsp); ?>').getContext('2d');
                                                    var chart_SortieGranul = new Chart(ctx_SortieGranul, {
                                                        type: 'bar',
                                                        data: JSON.parse('<?php echo addslashes(json_encode($graphe)); ?>'),
                                                        options: {
                                                            responsive: false,
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <?php $__currentLoopData = $graphe_par_produit_SortieGranul; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_tsp => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">SortieGranul/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_SortieGranul_<?php echo e($id_tsp); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_SortieGranul = document.getElementById('chart_SortieGranul_<?php echo e($id_tsp); ?>').getContext('2d');
                                                    var chart_SortieGranul = new Chart(ctx_SortieGranul, {
                                                        type: 'bar',
                                                        data: JSON.parse('<?php echo addslashes(json_encode($graphe)); ?>'),
                                                        options: {
                                                            responsive: false,
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Affichage du graphe TitreTsp -->
                      
                                    <div class="row" id="graphe-TitreTsp" style="display:none">
                                        <?php if(isset($_GET['search_date'])): ?>
                                        <?php $__currentLoopData = $graphe_par_produit_TitreTsp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_tsp => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($graph['date_production'] == $_GET['search_date']): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">TitreTsp/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_TitreTsp_<?php echo e($id_tsp); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_TitreTsp = document.getElementById('chart_TitreTsp_<?php echo e($id_tsp); ?>').getContext('2d');
                                                    var chart_TitreTsp = new Chart(ctx_TitreTsp, {
                                                        type: 'bar',
                                                        data: JSON.parse('<?php echo addslashes(json_encode($graphe)); ?>'),
                                                        options: {
                                                            responsive: false,
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <?php $__currentLoopData = $graphe_par_produit_TitreTsp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_tsp => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">TitreTsp/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_TitreTsp_<?php echo e($id_tsp); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_TitreTsp = document.getElementById('chart_TitreTsp_<?php echo e($id_tsp); ?>').getContext('2d');
                                                    var chart_TitreTsp = new Chart(ctx_TitreTsp, {
                                                        type: 'bar',
                                                        data: JSON.parse('<?php echo addslashes(json_encode($graphe)); ?>'),
                                                        options: {
                                                            responsive: false,
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Affichage du graphe GranulometreTsp -->
                                  
                                    <div class="row" id="graphe-GranulometreTsp" style="display:none">
                                        <?php if(isset($_GET['search_date'])): ?>
                                        <?php $__currentLoopData = $graphe_par_produit_GranulometreTsp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_tsp => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($graph['date_production'] == $_GET['search_date']): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">GranulometreTsp/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_GranulometreTsp_<?php echo e($id_tsp); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_GranulometreTsp = document.getElementById('chart_GranulometreTsp_<?php echo e($id_tsp); ?>').getContext('2d');
                                                    var chart_GranulometreTsp = new Chart(ctx_GranulometreTsp, {
                                                        type: 'bar',
                                                        data: JSON.parse('<?php echo addslashes(json_encode($graphe)); ?>'),
                                                        options: {
                                                            responsive: false,
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                        <?php $__currentLoopData = $graphe_par_produit_GranulometreTsp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_tsp => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">GranulometreTsp/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_GranulometreTsp_<?php echo e($id_tsp); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_GranulometreTsp = document.getElementById('chart_GranulometreTsp_<?php echo e($id_tsp); ?>').getContext('2d');
                                                    var chart_GranulometreTsp = new Chart(ctx_GranulometreTsp, {
                                                        type: 'bar',
                                                        data: JSON.parse('<?php echo addslashes(json_encode($graphe)); ?>'),
                                                        options: {
                                                            responsive: false,
                                                        }
                                                    });
                                                </script>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                    </div>
                                <!-- Bouton pour afficher le graphe next -->
                                <div class="col-md-2">
                                    <button class="btn btn-primary" id="btn-next">Next &gt;</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<script src="js/visualisationtsp.js"></script>


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
</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/visualisationTspcont.blade.php ENDPATH**/ ?>