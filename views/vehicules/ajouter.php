<?php include_once("../navbar.php"); 
session_start();
if($_SESSION['role']!='admin'){
    header("location: ../not_access");
}
?>
<form action="ajouteraction.php" method="post" class="w-50 mt-5 m-auto">
    <input type="text" placeholder="Entre numero vehicule" name="num" class="form-control mb-1">
    <select class="form-select mb-3" name="type">
        <option selected value="0">Type</option>
        <option value="moto">Moto</option>
        <option value="voiture">Voiture</option>
        <option value="camian">Camian</option>
    </select>
    <input type="submit" value="Ajouter" class="btn btn-primary w-100">
</form>