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
       <a class="nav-link" href="administration.php">Retour <span class="sr-only">(current)</span></a>
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
<div class="container">
<form method="POST">
<div class="row">
    <div class="form-group col-md-4">
        <label for="inputState">Pays</label>
        <select name="pays" id="inputState" class="form-control">
        <option value="EG">Egypt</option>
        <option value="TN">Tunisie</option>
        <option value="MA">Maroc</option>
        <option value="GR">Grèce</option>
        <option value="CA">Canada</option>
        <option value="GB">Angleterre</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">Activité</label>
        <select name="activite" id="inputState" class="form-control">
        <option value="1">Tourisme</option>
        <option value="2">Culturelle</option>
        <option value="3">Randonnée</option>
        <option value="4">Balnéaire</option>
        </select>
    </div>
</div>
  <div class="form-group">
    <label for="formGroupExampleInput">Nom de la ville</label>
    <input type="text" class="form-control" id="formGroupExampleInput" name="ville" placeholder="ville...">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Longitude</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" name="long" placeholder="longitude">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput3">Latitude</label>
    <input type="text" class="form-control" id="formGroupExampleInput3" name="lat" placeholder="latitude">
  </div>
  <button name="add" type="submit" class="btn btn-primary">Ajouter</button>
</form>
</div>
<?php
require 'function.php';

if(isset($_POST['add'])){
    add($_POST['pays'], $_POST["ville"], $_POST["long"], $_POST["lat"], $_POST["activite"]);
}


?>