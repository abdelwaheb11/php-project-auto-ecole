<?php include_once("../navbar.php"); 
session_start();
if($_SESSION['role']!='admin'){
    header("location: ../not_access");
}
include_once("../../controleur/candidat.php");
$id=$_GET['id'];
$cl=new candidat_cont();
$res=$cl->getcandidat($id);
if($res){
echo'<form action="modefieraction.php?id='.$id.'" method="post" class="w-50 mt-5 m-auto">
    <input type="text" value="'.$res['cin'].'" placeholder="Modefier numero de cin "  name="cin" class="form-control mb-1">
    <input type="text" value="'.$res['nom'].'" placeholder="Modefier nom" name="nom" class="form-control mb-1">
    <input type="text" value="'.$res['prenom'].'" placeholder="Modefier prenom" name="pre" class="form-control mb-3">
    <input type="submit" value="Modefier" class="btn btn-primary w-100">
</form>';
}else{
    echo '<div class="alert alert-danger mt-5 w-50 m-auto text-center" role="alert">aucune candidat avec cette id!</div>';

}

?>