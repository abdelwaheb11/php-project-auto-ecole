<?php
 include_once("./controleur/admin.php");
 session_start();
  
  if(isset($_SESSION['username']) && isset($_SESSION['password']) ){
  $n=$_SESSION['username'];
  $p=$_SESSION['password'];
  $a=new admin($n,$p);
  $res=$a->getadmin();
  if($res){
   header("location: ./views/dashboard");
  }
 }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

body {

  height:100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.form {
  width: 450px;
  padding-bottom: 70px;
  margin: 0 auto;
  border-radius:8px;
}
	


    </style>
</head>
<body class="bg-primary-subtle">

    <form class="form shadow bg-dark-subtle bg-gradient px-5 pt-4" method="post" action="./views/login.php">       
      <h2 class=" text-center fs-1 fw-bold text-primary mb-5 ">Login</h2>
      <input type="text" class="form-control mb-3" name="n" placeholder="User name" />
      <input type="password" class="form-control mb-2" name="p" placeholder="Password"/> 
      <?php
        if(isset($_GET['e'])){
          echo '<div class="text-danger text-center"> username ou password est incorrecter! </div>';
        }
      ?>
      <button class="btn btn-primary w-100 mt-4 fw-bolder fs-4" name="login" type="submit">Login</button>   
    </form>
  
</body>
</html>