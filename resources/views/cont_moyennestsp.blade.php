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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('accueil_analyste') }}">
        <img src="images/logo_ferti.png" alt="Logo Ferti" height="50">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('accueil_controleur') }}">Accueil</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="menuTSP" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              TSP
            </a>
            <ul class="dropdown-menu" aria-labelledby="menuTSP">
              <li><a class="dropdown-item" href="{{ route('toutes-heurestspcont') }}">Toutes les TSP</a></li>
              <li><a class="dropdown-item" href="{{ route('toutes-moyennestspcont') }}">Moyenne TSP</a></li>
              <li><a class="dropdown-item" href="{{ route('chartTspcont') }}">Courbes TSP</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="menuProduits" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Produits
            </a>
            <ul class="dropdown-menu" aria-labelledby="menuProduits">
              <li><a class="dropdown-item" href="{{ route('toutes-heuresproduitcont') }}">Toutes les Produits</a></li>
              <li><a class="dropdown-item" href="{{ route('toutes-moyennescont') }}">Moyennes</a></li>
              <li><a class="dropdown-item" href="{{ route('chartcont') }}">Courbes</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#foot">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">Deconnexion</a>
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
@if(isset($resultattsps))
@if(isset($_GET['search_date']))
    @foreach ($resultattsps as $resultattsp)
        @if($resultattsp['date_saisi'] == $_GET['search_date'])
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" id="coleur">Résultats des moyennes par TSP et ligne de production</div>
                        <div class="card-body">
                            <table class="table">
                                <thead> 
                                    <tr class="border">
                                     <th colspan="3" class="border">Saiseur : {{ $resultattsp['saiseur']  }}</th>
                                     <th colspan="3" class="border">Nom D'unite : {{ $resultattsp['nom_ligne']  }}</th>
                                     <th colspan="3" class="border">Nom de produit : {{ $resultattsp['nom_produit']  }}</th>
                                     <th colspan="4" class="border">Date de saisi : {{ $resultattsp['date_saisi']  }}</th>
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
                                        <td class="border">{{ $resultattsp['AL']  }}</td>
                                        <td class="border">{{ $resultattsp['P2O5_SE']  }}</td>
                                        <td class="border">{{ $resultattsp['p2O5_SE_C']  }}</td>
                                        <td class="border">{{ $resultattsp['TOT']  }}</td>
                                        <td class="border">{{ $resultattsp['H2O_T']  }}</td>
                                        <td class="border">{{ $resultattsp['H2O_B']  }}</td>
                                        <td class="border">{{ $resultattsp['sup_6_3']  }}</td>
                                        <td class="border">{{ $resultattsp['sup_5']  }}</td>
                                        <td class="border">{{ $resultattsp['sup_4']  }}</td>
                                        <td class="border">{{ $resultattsp['sup_3_15']  }}</td>
                                        <td class="border">{{ $resultattsp['sup_2_5'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_2'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_1'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>    
            @endif        
    @endforeach
    @else 
    @foreach ($resultattsps as $resultattsp)
    <div class="top">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" id="coleur">Résultats des moyennes par TSP et ligne de production</div>
                        <div class="card-body">
                            <table class="table">
                                <thead> 
                                    <tr class="border">
                                     <th colspan="3" class="border">Saiseur : {{ $resultattsp['saiseur']  }}</th>
                                     <th colspan="3" class="border">Nom D'unite : {{ $resultattsp['nom_ligne']  }}</th>
                                     <th colspan="3" class="border">Nom de produit : {{ $resultattsp['nom_produit']  }}</th>
                                     <th colspan="4" class="border">Date de saisi : {{ $resultattsp['date_saisi']  }}</th>
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
                                        <td class="border">{{ $resultattsp['AL']  }}</td>
                                        <td class="border">{{ $resultattsp['P2O5_SE']  }}</td>
                                        <td class="border">{{ $resultattsp['p2O5_SE_C']  }}</td>
                                        <td class="border">{{ $resultattsp['TOT']  }}</td>
                                        <td class="border">{{ $resultattsp['H2O_T']  }}</td>
                                        <td class="border">{{ $resultattsp['H2O_B']  }}</td>
                                        <td class="border">{{ $resultattsp['sup_6_3']  }}</td>
                                        <td class="border">{{ $resultattsp['sup_5']  }}</td>
                                        <td class="border">{{ $resultattsp['sup_4']  }}</td>
                                        <td class="border">{{ $resultattsp['sup_3_15']  }}</td>
                                        <td class="border">{{ $resultattsp['sup_2_5'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_2'] }}</td>
                                        <td class="border">{{ $resultattsp['sup_1'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>   
            </div>        
    @endforeach
    @endif 
@endif
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
@include('footer')
</div>
</html>