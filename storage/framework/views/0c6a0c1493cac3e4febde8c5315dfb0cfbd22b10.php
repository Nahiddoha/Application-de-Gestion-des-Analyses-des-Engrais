<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/produit_css.css">

    <title>Tableau</title>

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
        <table class="table table-striped" id="mar">
            <tr class="border">
                <td><img src="images/oubaba.png"></td>
                <td>
                    <h3>Analyses Acides phosphoriques Secteur 1 </h3>
                </td>
                <td class="image1"> <img src="images/ocp.png"></td>
            </tr>
            <tr class="border">
                <td colspan="3">Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP Jorf
                    Lasfar (OCP Nord)</td>
            </tr>

            <tr class="border">
                <td class="border">A- Liquides Lavage et Produit Fini:Ponctuel</td>
                <th class="border"> Ligne : <?php echo e(session('nom_ligne')); ?></th>
                <th class="border">Date : <?php echo e(session('date_production')); ?></th>
            </tr>



            <tr class="border">
                <th class="border">Nom du saiseur : <?php echo e(session('saiseur')); ?> </th>
                <th class="border">Nom du Produit : <?php echo e(session('nom_produit')); ?> </th>

            </tr>
        </table>

        <form method="POST" action="<?php echo e(route('ajouter_acid')); ?>" id="my-form">
            <?php echo csrf_field(); ?>
            <?php echo method_field('post'); ?>

            <?php if(isset($message)): ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php endif; ?>

            <div class="container">

                <table class="table table-striped">
                    <tr>
                        <th colspan="2" class="border"><em>Les Titres d'acide</em></th>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">heure</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="heure"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">Ref_bac</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="Ref_bac"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">densite</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="densite"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">T°c</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="temperature"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">P₂O₅%</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="P2O5"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">TS%</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="TS"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">SO4--</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="SO4"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">cd</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="cd"></td>
                    </tr>

                    <tr>
                        <th class="border">
                            <p class="ths">MgO</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="Mgo"></td>
                    </tr>
                    <tr>
                        <th class="border">
                            <p class="ths">Zn(ppm)</p>
                        </th>
                        <td class="border"><input type="text" class="inp1" name="Zn"></td>
                    </tr>
                </table>
            </div>
            <input type="submit" value="valider et passer a l'heure suivant" name="submit" class="btn btn-success" id="submit-btn">
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

</html><?php /**PATH C:\xampp\htdocs\projet_tarik_doha\projet_tarik_doha\resources\views/acide.blade.php ENDPATH**/ ?>