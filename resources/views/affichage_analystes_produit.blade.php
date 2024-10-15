<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">   
    <title>Tableau_Affichage</title>
</head>
<body>
<table border="2" class="container">
            <tr class="border">
                <td colspan="3" >Prestations de prélèvement et d’analyse de pilotage de l’entité Engrais de l’OCP Jorf
                    Lasfar (OCP Nord)</td>
            </tr>
        
            <tr class="border">
                <td class="border">A- Liquides Lavage et Produit Fini:Ponctuel</td>
                <th class="border"> Ligne : {{ session('nom_ligne') }}</th>
                <th class="border">Date : {{ session('date_production') }}</th>
            </tr>
  
        </table>

       <table border="2">
        <tr>
            <th colspan="2" class="border">Heure</th>
            <th rowspan="3" class="border">Bouillie (Cuve D'attaque)</th>
            <th rowspan="3" class="border">sortie granulateur</th>
            <th rowspan="7" class="border">Titre TSP</th>
            <th rowspan="7" class="border">Granulometre TSP</th>
            <th class="border">Nom du saiseur</th>
        </tr>

        <tr>
            <th class="border">
                    <p class="ths" id="prob">densite</p>
            </th>
            <th class="border">
                    <p class="ths" id="prob">A.L</p>
            </th>
            <th class="border">
                    <p class="ths" id="prob">P2O5(S.E)</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">A.L</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">p2o5_SE</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">H2O</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">H2O</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">A.L</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">P2O5(S.E)</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">P2O5(S.E+cit)</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">Tot</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">h2O_T</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">h2O_B</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">>=6.3</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">>=5</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">>=4</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">>=3.15</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">>=2.5</p>
            </th>

            <th class="border">
                    <p class="ths" id="prob">>=2</p>
            </th>
            
            <th class="border">
                    <p class="ths" id="prob">>=1</p>
            </th>
        </tr>
  

        <tr>
            <td>{{ $donnees['heure'] }}</td>
            <td>{{ $donnees['bouillie']->densite }}, {{ $donnees['bouillie']->AL_B }}, {{ $donnees['bouillie']->P2O5_SE_B }}</td>
            <td>{{ $donnees['sortiegranul']->AL }}, {{ $donnees['sortiegranul']->P2O5_SE }}, {{ $donnees['sortiegranul']->H2O }}</td>
            <td>{{ $donnees['titretsp']->titrage }}, {{ $donnees['titretsp']->valeur }} </td>
            <td>{{ $donnees['granulometrestsp']->tamis }}, {{ $donnees['granulometrestsp']->poids }}, {{ $donnees['granulometrestsp']->retenu }}</td>
        </tr>
              
</table>

</body>
</html>