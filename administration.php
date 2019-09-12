<head>
 <meta charset="UTF-8">
 <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
 <link rel="stylesheet" href="js/JVectorMap/jquery-jvectormap-2.0.3.css" type="text/css" media="screen" />
 <script src="js/jquery-3.4.1.min.js"></script>
 <script src="js/JVectorMap/jquery-jvectormap-2.0.3.min.js"></script>
 <script src="js/JVectorMap/jquery-jvectormap-world-mill.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 <a class="navbar-brand" href="index.php">Accueil</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav mr-auto">
     <li class="nav-item active">
       <a class="nav-link" href="index.php">Retour <span class="sr-only">(current)</span></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="addVille.php">Ajouter un ville</a>
     </li>
     <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Dropdown
       </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <a class="dropdown-item" href="#">Action</a>
         <a class="dropdown-item" href="#">Another action</a>
         <div class="dropdown-divider"></div>
         <a class="dropdown-item" href="#">Something else here</a>
       </div>
     </li>
     <li class="nav-item">
       <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
     </li>
   </ul>
 </div>
</nav><br>
<?php
require 'connect.php';
require 'function.php';$pdo = new PDO('mysql:host=localhost;dbname=tpvoyage', 'root', '');
$pdo->exec('SET NAMES utf8');$sql = "SELECT villes.nom, Climat, typeActivite, TypeBudget, villes.Code, pays.Nom, villes.IDVille
FROM pays
INNER JOIN CorrPPC ON CorrPPC.Code = pays.Code
INNER JOIN villes ON villes.Code = pays.code
INNER JOIN corrvpb ON corrvpb.IDVille = villes.IDVille
INNER JOIN corrva ON CorrVA.IDVille = villes.IDVille
INNER JOIN activites ON corrva.IDActivite = activites.IDActivite";    
$req = $pdo->query($sql);
echo '<div class="row">';
   while($row = $req->fetch()){
       echo '<form method="POST" action="modifier.php">
               <div class="card mr-5" style="width: 18rem;">
               <img src="img/'.$row["Nom"].'" class="card-img-top" alt="...">
               <div class="card-body">
                   <h5 class="card-title">'.$row["nom"].'</h5>
                   <p class="card-text">
                       <ul class="list-group list-group-flush">
                           <li class="list-group-item">'.$row["Climat"].'</li>
                           <li class="list-group-item">'.$row["typeActivite"].'</li>
                           <li class="list-group-item">'.$row["TypeBudget"].'</li>
                       </ul>
                   </p>
                   <button type="submit name="modif" class="btn btn-primary">Modifier les informations</button>
               </div>
               </div>
               <input name="IDVille" type="hidden" value="'.$row["IDVille"].'">
               <input name="nom" type="hidden" value="'.$row["nom"].'">
               </form>';
   }?>
   </div>