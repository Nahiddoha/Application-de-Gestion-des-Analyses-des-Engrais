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
    <link rel="stylesheet" href="css/css_visualisation.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Visualisation</title>
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

    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">Visualisation des données</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Affichage du graphe PN -->
                                <div class="col-md-2">
                                    <button class="btn btn-primary" id="btn-last">&lt;last</button>
                                </div>
                                <div class="col-md-8">
                                    <div class="row" id="graphe-pn">
                                    <?php if(isset($_GET['search_date']) && isset($_GET['nom_lign'])): ?>
                                    <?php $__currentLoopData = $graphe_par_produit_pn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign']): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">pn/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_pn_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_pn = document.getElementById('chart_pn_<?php echo e($id_produit); ?>').getContext('2d');
                                                    var chart_pn = new Chart(ctx_pn, {
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
                                        <?php $__currentLoopData = $graphe_par_produit_pn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">pn/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_pn_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_pn = document.getElementById('chart_pn_<?php echo e($id_produit); ?>').getContext('2d');
                                                    var chart_pn = new Chart(ctx_pn, {
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


                                    <!-- Affichage du graphe sag -->

                                    <div class="row" id="graphe-sag" style="display:none">
                                        <?php if(isset($_GET['search_date']) && isset($_GET['nom_lign'])): ?>
                                    <?php $__currentLoopData = $graphe_par_produit_sag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign']): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">sag/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_sag_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_sag = document.getElementById('chart_sag_<?php echo e($id_produit); ?>').getContext('2d');
                                                    var chart_sag = new Chart(ctx_sag, {
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
                                        <?php $__currentLoopData = $graphe_par_produit_sag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">sag/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_sag_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_sag = document.getElementById('chart_sag_<?php echo e($id_produit); ?>').getContext('2d');
                                                    var chart_sag = new Chart(ctx_sag, {
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

                                    <!-- Affichage du graphe d03 -->

                                    <div class="row" id="graphe-d03" style="display:none">
                                    <?php if(isset($_GET['search_date']) && isset($_GET['nom_lign'])): ?>
                                    <?php $__currentLoopData = $graphe_par_produit_d03; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign']): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">d03/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_d03_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_d03 = document.getElementById('chart_d03_<?php echo e($id_produit); ?>').getContext('2d');
                                                    var chart_d03 = new Chart(ctx_d03, {
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
                                        <?php $__currentLoopData = $graphe_par_produit_d03; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">d03/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_d03_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_d03 = document.getElementById('chart_d03_<?php echo e($id_produit); ?>').getContext('2d');
                                                    var chart_d03 = new Chart(ctx_d03, {
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

                                    <!-- Affichage du graphe d05 -->

                                    <div class="row" id="graphe-d05" style="display:none">
                                    <?php if(isset($_GET['search_date']) && isset($_GET['nom_lign'])): ?>
                                    <?php $__currentLoopData = $graphe_par_produit_d05; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign']): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">d05/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_d05_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_d05 = document.getElementById('chart_d05_<?php echo e($id_produit); ?>').getContext('2d');
                                                    var chart_d05 = new Chart(ctx_d05, {
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
                                        <?php $__currentLoopData = $graphe_par_produit_d05; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">d05/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_d05_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_d05 = document.getElementById('chart_d05_<?php echo e($id_produit); ?>').getContext('2d');
                                                    var chart_d05 = new Chart(ctx_d05, {
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

                                    <!-- Affichage du graphe d09 -->

                                    <div class="row" id="graphe-d09" style="display:none">
                                    <?php if(isset($_GET['search_date']) && isset($_GET['nom_lign'])): ?>
                                    <?php $__currentLoopData = $graphe_par_produit_d09; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign']): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">d09/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_d09_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_d09 = document.getElementById('chart_d09_<?php echo e($id_produit); ?>').getContext('2d');
                                                    var chart_d09 = new Chart(ctx_d09, {
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
                                        <?php $__currentLoopData = $graphe_par_produit_d09; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h2 class="text-center">d09/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                            </div>
                                            <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-6">
                                                <canvas id="chart_d09_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                                <script>
                                                    var ctx_d09 = document.getElementById('chart_d09_<?php echo e($id_produit); ?>').getContext('2d');
                                                    var chart_d09 = new Chart(ctx_d09, {
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

                                <!-- Affichage du graphe d10 -->

                                <div class="row" id="graphe-d10" style="display:none">
                                <?php if(isset($_GET['search_date']) && isset($_GET['nom_lign'])): ?>
                                    <?php $__currentLoopData = $graphe_par_produit_d10; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign']): ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="text-center">d10/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                        </div>
                                        <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6">
                                            <canvas id="chart_d10_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                            <script>
                                                var ctx_d10 = document.getElementById('chart_d10_<?php echo e($id_produit); ?>').getContext('2d');
                                                var chart_d10 = new Chart(ctx_d10, {
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
                                    <?php $__currentLoopData = $graphe_par_produit_d10; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="text-center">d10/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                        </div>
                                        <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6">
                                            <canvas id="chart_d10_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                            <script>
                                                var ctx_d10 = document.getElementById('chart_d10_<?php echo e($id_produit); ?>').getContext('2d');
                                                var chart_d10 = new Chart(ctx_d10, {
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

                                <!-- Affichage du graphe r02 -->

                                <div class="row" id="graphe-r02" style="display:none">
                                <?php if(isset($_GET['search_date']) && isset($_GET['nom_lign'])): ?>
                                    <?php $__currentLoopData = $graphe_par_produit_r02; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign']): ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="text-center">r02/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                        </div>
                                        <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6">
                                            <canvas id="chart_r02_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                            <script>
                                                var ctx_r02 = document.getElementById('chart_r02_<?php echo e($id_produit); ?>').getContext('2d');
                                                var chart_r02 = new Chart(ctx_r02, {
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
                                    <?php $__currentLoopData = $graphe_par_produit_r02; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="text-center">r02/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                        </div>
                                        <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6">
                                            <canvas id="chart_r02_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                            <script>
                                                var ctx_r02 = document.getElementById('chart_r02_<?php echo e($id_produit); ?>').getContext('2d');
                                                var chart_r02 = new Chart(ctx_r02, {
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

                                <!-- Affichage du graphe Titre -->

                                <div class="row" id="graphe-Titre" style="display:none">
                                <?php if(isset($_GET['search_date']) && isset($_GET['nom_lign'])): ?>
                                    <?php $__currentLoopData = $graphe_par_produit_Titre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign']): ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="text-center">Titre/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                        </div>
                                        <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6">
                                            <canvas id="chart_Titre_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                            <script>
                                                var ctx_Titre = document.getElementById('chart_Titre_<?php echo e($id_produit); ?>').getContext('2d');
                                                var chart_Titre = new Chart(ctx_Titre, {
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
                                    <?php $__currentLoopData = $graphe_par_produit_Titre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="text-center">Titre/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                        </div>
                                        <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6">
                                            <canvas id="chart_Titre_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                            <script>
                                                var ctx_Titre = document.getElementById('chart_Titre_<?php echo e($id_produit); ?>').getContext('2d');
                                                var chart_Titre = new Chart(ctx_Titre, {
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

                                <!-- Affichage du graphe Granulometre -->

                                <div class="row" id="graphe-Granulometre" style="display:none">
                                <?php if(isset($_GET['search_date']) && isset($_GET['nom_lign'])): ?>
                                    <?php $__currentLoopData = $graphe_par_produit_Granulometre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($graph['date_production'] == $_GET['search_date'] && $graph['nom_ligne'] == $_GET['nom_lign']): ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="text-center">Granulometrie/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                        </div>
                                        <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6">
                                            <canvas id="chart_Granulometre_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                            <script>
                                                var ctx_Granulometre = document.getElementById('chart_Granulometre_<?php echo e($id_produit); ?>').getContext('2d');
                                                var chart_Granulometre = new Chart(ctx_Granulometre, {
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
                                    <?php $__currentLoopData = $graphe_par_produit_Granulometre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2 class="text-center">Granulometrie/<?php echo e($graph['nom_produit']); ?>-<?php echo e($graph['nom_ligne']); ?>-<?php echo e($graph['date_production']); ?></h2>
                                        </div>
                                        <?php $__currentLoopData = $graph; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graphe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-6">
                                            <canvas id="chart_Granulometre_<?php echo e($id_produit); ?>" width="400" height="200"></canvas>
                                            <script>
                                                var ctx_Granulometre = document.getElementById('chart_Granulometre_<?php echo e($id_produit); ?>').getContext('2d');
                                                var chart_Granulometre = new Chart(ctx_Granulometre, {
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


    <script src="js/visualisation.js"></script>


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

</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/visualisation.blade.php ENDPATH**/ ?>