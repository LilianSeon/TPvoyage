

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

</button>

​

<div class="collapse navbar-collapse" id="navbarSupportedContent">

  <ul class="navbar-nav mr-auto">

    <li class="nav-item active">

      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>

    </li>

    <li class="nav-item">

      <a class="nav-link" href="administration.php">Administration</a>

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

​

<?php

require 'connect.php';

require 'function.php';

var_dump($_POST);
?>
<div class="container">
<div class="row">
  <h1 class="mx-auto col-md-12 text-center">Modification de <?= $_POST['nom'] ?></h1>
</div>
<br>
<form method="POST">
 <div class="form-group row">
   <label for="colFormLabel" class="col-sm-2 col-form-label">Budget : </label>
   <div class="col-sm-10">
     <input type="number" class="form-control" id="colFormLabel" name="budget" placeholder="Nouveau budget...">
   </div>
 </div>
 <button name="modif" type="submit" class="btn btn-primary">Modifier</button>
 <input name="nom" type="hidden" value="<?= $_POST['nom'] ?>">
 <input name="IDVille" type="hidden" value="<?= $_POST['IDVille'] ?>">
</form>
</div>
<?php

if (isset($_POST['modif'])) {
  modif($_POST['IDVille'], $_POST['budget']);
}

?>

