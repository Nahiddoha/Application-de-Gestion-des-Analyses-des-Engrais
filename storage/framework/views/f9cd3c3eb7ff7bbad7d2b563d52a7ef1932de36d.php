<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>affiche produits</title>
  <link rel="stylesheet" href="css/header.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    .card {
      border: none;
      border-radius: 0;
      transition: box-shadow 0.3s;
      box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2);
    }

    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .card-img-top {
      height: 200px;
      object-fit: cover;
    }

    * {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      scroll-behavior: smooth;
      text-align: center;
    }

    .affiche {
      padding-top: 80px;
    }

    .d {
      padding-bottom: 30px;
      padding-top: 130px;
    }

    #coleur,
    .coleur {
      color: green;
    }

    .top,
    .col-md-4 {
      margin-bottom: 80px;
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
              <a class="nav-link" href="<?php echo e(route('ajouter_lign')); ?>">Ajouter tableau</a>
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


  <!-- affichage des produits -->

  <div class="d">

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

    <!-- message de success -->
    <?php if(session()->has('success')): ?>
    <div class="alert alert-success">
      <?php echo e(session()->get('success')); ?>

    </div>
    <?php endif; ?>

    <?php if(isset($donnees_par_produit_et_par_heure)): ?>
    <?php if(isset($_GET['search_date']) && isset($_GET['nom_lign'])): ?>
    <?php $__currentLoopData = $donnees_par_produit_et_par_heure; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $donnees_par_produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($donnees_par_produit['date_saisi'] == $_GET['search_date'] && $donnees_par_produit['nom_ligne'] == $_GET['nom_lign']): ?>
    <div class="top">
      <table class="table table-striped">
        <tr class="border">
          <td><img src="images/oubaba.png"></td>
          <td>
            <h3 class="coleur">Analyses Produit fini et les liquides de lavage Secteur 1 </h3>
          </td>
          <td class="image1"> <img src="images/ocp.png"></td>
        </tr>
        <tr class="border">
          <td colspan="3">Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP Jorf
            Lasfar (OCP Nord)</td>
        </tr>

        <tr class="border">
          <th class="border">Nom produit : <?php echo e($donnees_par_produit['nom_produit']); ?></th>
          <th class="border">Nom Ligne : <?php echo e($donnees_par_produit['nom_ligne']); ?></th>
          <th class="border">Date : <?php echo e($donnees_par_produit['date_saisi']); ?></th>
        </tr>
      </table>

      <table class="table table-striped">
        <div class="contain">
          <tr class="border">
            <th rowspan="2" class="border">Heure</th>
            <th colspan="2" class="border">PN</th>
            <th rowspan="2" class="border">SAG(RM)</th>
            <th colspan="2" class="border">D03</th>
            <th colspan="2" class="border">D05</th>
            <th rowspan="2" class="border">D10(PH)</th>
            <th colspan="2" class="border">D09</th>
            <th colspan="2" class="border">R02</th>
            <th colspan="8" class="border">Titres</th>
            <th colspan="7" class="border">Granulometres</th>
            <th rowspan="2" class="border">saiseur</th>
            <th class="border">Action1</th>
          </tr>

          <tr class="border">
            <th class="border">densite</th>
            <th class="border">rm</th>

            <th class="border">densite</th>
            <th class="border">rm</th>

            <th class="border">densite</th>
            <th class="border">rm</th>

            <th class="border">densite</th>
            <th class="border">rm</th>

            <th class="border">densite</th>
            <th class="border">rm</th>

            <th class="border">N%</th>
            <th class="border">P2O5_SE_CIT</th>
            <th class="border">H2O</th>
            <th class="border">Zn</th>
            <th class="border">s</th>
            <th class="border">cd</th>
            <th class="border">P2O5</th>
            <th class="border">°C</th>

            <th class="border">>=5</th>
            <th class="border">>=4.75</th>
            <th class="border">>=4</th>
            <th class="border">>=3.15</th>
            <th class="border">>=2.5</th>
            <th class="border">>=2</th>
            <th class="border">>=1</th>
            <th class="border">
              <p class="ths" id="prob">Action2</p>
            </th>
          </tr>
          <?php $__currentLoopData = $donnees_par_produit['donnees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heure => $resultats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(count($resultats) > 0): ?>

          <?php $__currentLoopData = $resultats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr class="border">

            <th class="border"><?php echo e($heure); ?></th>
            <td class="border"><?php echo e($resultat->pn_rm); ?></td>
            <td class="border"><?php echo e($resultat->pn_densite); ?></td>
            <td class="border"><?php echo e($resultat->sag_rm); ?></td>
            <td class="border"><?php echo e($resultat->d03_rm); ?></td>
            <td class="border"><?php echo e($resultat->d03_densite); ?></td>
            <td class="border"><?php echo e($resultat->d05_rm); ?></td>
            <td class="border"><?php echo e($resultat->d05_densite); ?></td>
            <td class="border"><?php echo e($resultat->d10_ph); ?></td>
            <td class="border"><?php echo e($resultat->d09_rm); ?></td>
            <td class="border"><?php echo e($resultat->d09_densite); ?></td>
            <td class="border"><?php echo e($resultat->r02_rm); ?></td>
            <td class="border"><?php echo e($resultat->r02_densite); ?></td>
            <td class="border"><?php echo e($resultat->p2o5); ?></td>
            <td class="border"><?php echo e($resultat->ammonical); ?></td>
            <td class="border"><?php echo e($resultat->h2o); ?></td>
            <td class="border"><?php echo e($resultat->zn); ?></td>
            <td class="border"><?php echo e($resultat->s); ?></td>
            <td class="border"><?php echo e($resultat->cd); ?></td>
            <td class="border"><?php echo e($resultat->p2o5_tot); ?></td>
            <td class="border"><?php echo e($resultat->temperature); ?></td>
            <td class="border"><?php echo e($resultat->sup_5); ?></td>
            <td class="border"><?php echo e($resultat->sup_4_74); ?></td>
            <td class="border"><?php echo e($resultat->sup_4); ?></td>
            <td class="border"><?php echo e($resultat->sup_3_15); ?></td>
            <td class="border"><?php echo e($resultat->sup_2_5); ?></td>
            <td class="border"><?php echo e($resultat->sup_2); ?></td>
            <td class="border"><?php echo e($resultat->sup_1); ?></td>
            <td class="border"><?php echo e($resultat->saiseur); ?></td>
            <td class="border">
              <form action="<?php echo e(route('delete_produit')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <input type="hidden" name="id_produit" value="<?php echo e($resultat->id_produit); ?>">
                <input type="hidden" name="id_pn" value="<?php echo e($resultat->id_pn); ?>">
                <input type="hidden" name="id_sag" value="<?php echo e($resultat->id_sag); ?>">
                <input type="hidden" name="id_d03" value="<?php echo e($resultat->id_d03); ?>">
                <input type="hidden" name="id_d05" value="<?php echo e($resultat->id_d05); ?>">
                <input type="hidden" name="id_d09" value="<?php echo e($resultat->id_d09); ?>">
                <input type="hidden" name="id_d10" value="<?php echo e($resultat->id_d10); ?>">
                <input type="hidden" name="id_r02" value="<?php echo e($resultat->id_r02); ?>">
                <input type="hidden" name="id_titre" value="<?php echo e($resultat->id_titre); ?>">
                <input type="hidden" name="id_gran" value="<?php echo e($resultat->id_gran); ?>">
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
              <br>
              <form action="<?php echo e(route('update_produit')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id_produit" value="<?php echo e($resultat->id_produit); ?>">
                <input type="hidden" name="id_pn" value="<?php echo e($resultat->id_pn); ?>">
                <input type="hidden" name="id_sag" value="<?php echo e($resultat->id_sag); ?>">
                <input type="hidden" name="id_d03" value="<?php echo e($resultat->id_d03); ?>">
                <input type="hidden" name="id_d05" value="<?php echo e($resultat->id_d05); ?>">
                <input type="hidden" name="id_d09" value="<?php echo e($resultat->id_d09); ?>">
                <input type="hidden" name="id_d10" value="<?php echo e($resultat->id_d10); ?>">
                <input type="hidden" name="id_r02" value="<?php echo e($resultat->id_r02); ?>">
                <input type="hidden" name="id_titre" value="<?php echo e($resultat->id_titre); ?>">
                <input type="hidden" name="id_gran" value="<?php echo e($resultat->id_gran); ?>">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
              </form>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
          <p>Pas de résultats pour cette heure.</p>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </table>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <?php $__currentLoopData = $donnees_par_produit_et_par_heure; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id_produit => $donnees_par_produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="top">
      <table class="table table-striped">
        <tr class="border">
          <td><img src="images/oubaba.png"></td>
          <td>
            <h3 class="coleur">Analyses Produit fini et les liquides de lavage Secteur 1 </h3>
          </td>
          <td class="image1"> <img src="images/ocp.png"></td>
        </tr>
        <tr class="border">
          <td colspan="3">Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP Jorf
            Lasfar (OCP Nord)</td>
        </tr>

        <tr class="border">
          <th class="border">Nom produit : <?php echo e($donnees_par_produit['nom_produit']); ?></th>
          <th class="border">Nom Ligne : <?php echo e($donnees_par_produit['nom_ligne']); ?></th>
          <th class="border">Date : <?php echo e($donnees_par_produit['date_saisi']); ?></th>
        </tr>
      </table>

      <table class="table table-striped">
        <div class="contain">
          <tr class="border">
            <th rowspan="2" class="border">Heure</th>
            <th colspan="2" class="border">PN</th>
            <th rowspan="2" class="border">SAG(RM)</th>
            <th colspan="2" class="border">D03</th>
            <th colspan="2" class="border">D05</th>
            <th rowspan="2" class="border">D10(PH)</th>
            <th colspan="2" class="border">D09</th>
            <th colspan="2" class="border">R02</th>
            <th colspan="8" class="border">Titres</th>
            <th colspan="7" class="border">Granulometres</th>
            <th rowspan="2" class="border">saiseur</th>
            <th class="border">Action1</th>
          </tr>

          <tr class="border">
            <th class="border">densite</th>
            <th class="border">rm</th>

            <th class="border">densite</th>
            <th class="border">rm</th>

            <th class="border">densite</th>
            <th class="border">rm</th>

            <th class="border">densite</th>
            <th class="border">rm</th>

            <th class="border">densite</th>
            <th class="border">rm</th>

            <th class="border">N%</th>
            <th class="border">P2O5_SE_CIT</th>
            <th class="border">H2O</th>
            <th class="border">Zn</th>
            <th class="border">s</th>
            <th class="border">cd</th>
            <th class="border">P2O5</th>
            <th class="border">°C</th>

            <th class="border">>=5</th>
            <th class="border">>=4.75</th>
            <th class="border">>=4</th>
            <th class="border">>=3.15</th>
            <th class="border">>=2.5</th>
            <th class="border">>=2</th>
            <th class="border">>=1</th>
            <th class="border">
              <p class="ths" id="prob">Action2</p>
            </th>
          </tr>

          <?php $__currentLoopData = $donnees_par_produit['donnees']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heure => $resultats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(count($resultats) > 0): ?>

          <?php $__currentLoopData = $resultats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resultat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr class="border">

            <th class="border"><?php echo e($heure); ?></th>
            <td class="border"><?php echo e($resultat->pn_rm); ?></td>
            <td class="border"><?php echo e($resultat->pn_densite); ?></td>
            <td class="border"><?php echo e($resultat->sag_rm); ?></td>
            <td class="border"><?php echo e($resultat->d03_rm); ?></td>
            <td class="border"><?php echo e($resultat->d03_densite); ?></td>
            <td class="border"><?php echo e($resultat->d05_rm); ?></td>
            <td class="border"><?php echo e($resultat->d05_densite); ?></td>
            <td class="border"><?php echo e($resultat->d10_ph); ?></td>
            <td class="border"><?php echo e($resultat->d09_rm); ?></td>
            <td class="border"><?php echo e($resultat->d09_densite); ?></td>
            <td class="border"><?php echo e($resultat->r02_rm); ?></td>
            <td class="border"><?php echo e($resultat->r02_densite); ?></td>
            <td class="border"><?php echo e($resultat->p2o5); ?></td>
            <td class="border"><?php echo e($resultat->ammonical); ?></td>
            <td class="border"><?php echo e($resultat->h2o); ?></td>
            <td class="border"><?php echo e($resultat->zn); ?></td>
            <td class="border"><?php echo e($resultat->s); ?></td>
            <td class="border"><?php echo e($resultat->cd); ?></td>
            <td class="border"><?php echo e($resultat->p2o5_tot); ?></td>
            <td class="border"><?php echo e($resultat->temperature); ?></td>
            <td class="border"><?php echo e($resultat->sup_5); ?></td>
            <td class="border"><?php echo e($resultat->sup_4_74); ?></td>
            <td class="border"><?php echo e($resultat->sup_4); ?></td>
            <td class="border"><?php echo e($resultat->sup_3_15); ?></td>
            <td class="border"><?php echo e($resultat->sup_2_5); ?></td>
            <td class="border"><?php echo e($resultat->sup_2); ?></td>
            <td class="border"><?php echo e($resultat->sup_1); ?></td>
            <td class="border"><?php echo e($resultat->saiseur); ?></td>
            <td class="border">
              <form action="<?php echo e(route('delete_produit')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <input type="hidden" name="id_produit" value="<?php echo e($resultat->id_produit); ?>">
                <input type="hidden" name="id_pn" value="<?php echo e($resultat->id_pn); ?>">
                <input type="hidden" name="id_sag" value="<?php echo e($resultat->id_sag); ?>">
                <input type="hidden" name="id_d03" value="<?php echo e($resultat->id_d03); ?>">
                <input type="hidden" name="id_d05" value="<?php echo e($resultat->id_d05); ?>">
                <input type="hidden" name="id_d09" value="<?php echo e($resultat->id_d09); ?>">
                <input type="hidden" name="id_d10" value="<?php echo e($resultat->id_d10); ?>">
                <input type="hidden" name="id_r02" value="<?php echo e($resultat->id_r02); ?>">
                <input type="hidden" name="id_titre" value="<?php echo e($resultat->id_titre); ?>">
                <input type="hidden" name="id_gran" value="<?php echo e($resultat->id_gran); ?>">
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
              </form>
              <br>
              <form action="<?php echo e(route('update_produit')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id_produit" value="<?php echo e($resultat->id_produit); ?>">
                <input type="hidden" name="id_pn" value="<?php echo e($resultat->id_pn); ?>">
                <input type="hidden" name="id_sag" value="<?php echo e($resultat->id_sag); ?>">
                <input type="hidden" name="id_d03" value="<?php echo e($resultat->id_d03); ?>">
                <input type="hidden" name="id_d05" value="<?php echo e($resultat->id_d05); ?>">
                <input type="hidden" name="id_d09" value="<?php echo e($resultat->id_d09); ?>">
                <input type="hidden" name="id_d10" value="<?php echo e($resultat->id_d10); ?>">
                <input type="hidden" name="id_r02" value="<?php echo e($resultat->id_r02); ?>">
                <input type="hidden" name="id_titre" value="<?php echo e($resultat->id_titre); ?>">
                <input type="hidden" name="id_gran" value="<?php echo e($resultat->id_gran); ?>">
                <button type="submit" class="btn btn-success btn-sm">Update</button>
              </form>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
          <p>Pas de résultats pour cette heure.</p>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
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

</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/affiche_produits.blade.php ENDPATH**/ ?>