<?php
   include_once("../../controleur/admin.php");
   session_start();
    $n=$_SESSION['username'];
    $p=$_SESSION['password'];
   $a=new admin($n,$p);
   $res=$a->getadmin();
   if(!$res){
     header("location: ../../.");
   }
   if(isset($_POST['deconnecte'])){
    $_SESSION = array();
    session_destroy();
    header("location: ../../.");
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Auto-ecole</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/auto_ecole/static/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  </head>
<body class="bg-primary-subtle mb-5">
  <nav class="navbar navbar-expand-lg bg-primary bg-gradient">
    <div class="container-fluid">
      <a class="navbar-brand fw-bolder fs-4" href="http://localhost/auto_ecole/views/dashboard">Admin auto-ecole</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-light" href="http://localhost/auto_ecole/views/candidat">Candidat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="http://localhost/auto_ecole/views/seance_de_code">Seance code</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="http://localhost/auto_ecole/views/seance_conduit">Seance conduit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="http://localhost/auto_ecole/views/vehicules">Vehicule</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="http://localhost/auto_ecole/views/ingenieure">Ingenieure</a>
          </li>
        </ul>
        <form class="d-flex align-items-center gap-2" method="post">
          <span class="fw-bold fs-4">
            <?php echo $_SESSION['username'] .'<span style="text-transform: uppercase;">('.$_SESSION['role'].')</span>'; ?>
          </span>
          <button name="deconnecte" class="btn btn-outline-danger fw-bold text-light">Deconnecte</button>
        </form>
      </div>
    </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>