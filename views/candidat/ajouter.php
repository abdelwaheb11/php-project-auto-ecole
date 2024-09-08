<?php include_once("../navbar.php"); ?>

<?php
    session_start();
    if($_SESSION['role']!='admin'){
        header("location: ../not_access");
    }
?>

<form action="ajouetraction.php" method="post" class="w-50 mt-5 m-auto">
    <input type="text" placeholder="Entre numero de cin " name="cin" class="form-control mb-1">
    <input type="text" placeholder="Entre nom" name="nom" class="form-control mb-1">
    <input type="text" placeholder="Entre prenom" name="pre" class="form-control mb-3">
    <input type="submit" value="Ajouter" class="btn btn-primary w-100">
</form>