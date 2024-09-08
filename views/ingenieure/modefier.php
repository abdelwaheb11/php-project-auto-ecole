<?php
include_once("../navbar.php");
session_start();
    if($_SESSION['role']!='admin'){
        header("location: ../not_access");
    }
include_once("../../controleur/ingenieure.php");

$id = $_GET['id'];
$cl = new ingenieure_cont();
$res = $cl->getingenieure($id);

if ($res) {
    echo '<form action="modefieraction.php?id='.$id.'" method="post" class="w-50 mt-5 m-auto">
        <input type="text" value=' . $res['cin'] . ' placeholder="Entre numero de cin "  name="cin" class="form-control mb-1">
        <input type="text" value=' . $res['nom'] . ' placeholder="Entre nom" name="nom" class="form-control mb-1">
        <input type="text" value=' . $res['prenom'] . ' placeholder="Entre prenom" name="pre" class="form-control mb-1">
        <select class="form-select mb-3" name="spe">
            <option value="0">Specialite</option>
            <option ' . ($res['specialite'] === "moto" ? 'selected' : '') . ' value="moto">Moto</option>
            <option ' . ($res['specialite'] === "voiture" ? 'selected' : '') . ' value="voiture">Voiture</option>
            <option ' . ($res['specialite'] === "camion" ? 'selected' : '') . ' value="camion">Camion</option>
        </select>
        <input type="submit" value="Modifier" class="btn btn-primary w-100">
    </form>';
} else {
    echo '<div class="alert alert-danger mt-5 w-50 m-auto text-center" role="alert">Aucun candidat avec cette id!</div>';
}
?>
