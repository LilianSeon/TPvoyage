<?php
require 'connect.php';
?>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
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
<form>
<div class="row">
  <div class="form-group col-md-3 mt-3">
    <label for="exampleFormControlSelect1">Budget</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Entre 0€ et 300€</option>
      <option>Entre 300€ et 500€</option>
      <option>Plus de 500€</option>
    </select>
  </div>
  <div class="form-group col-md-3 mt-3">
    <label for="exampleFormControlSelect1">Climat</label>
    <select class="form-control" id="exampleFormControlSelect1">
    <?php
    $sql = 'SELECT * FROM corrppc';
    $req = $pdo->query($sql);
    while($row = $req->fetch()){
        echo '<option>'.$row['Climat'].'</option>';
    }
    $req->closeCursor();
    ?>
    </select>
  </div>
  <div class="form-group col-md-3 mt-3">
    <label for="exampleFormControlSelect1">Activité</label>
    <select class="form-control" id="exampleFormControlSelect1">
    <?php
    $sql = 'SELECT * FROM activites';
    $req = $pdo->query($sql);
    while($row = $req->fetch()){
        echo '<option>'.$row['TypeActivite'].'</option>';
    }
    $req->closeCursor();
    ?>
    </select>
  </div>
  <div class="col-md-3 mt-5">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </div>
</div>
</form>
</div>
</html>