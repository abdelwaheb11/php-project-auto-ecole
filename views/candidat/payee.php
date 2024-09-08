<?php
include_once("../../controleur/candidat.php");
$cl=new candidat_cont();
$id=$_GET['id'];  
$p = $_POST['prix'];
$res = $cl->setprix($id, (int)$p);
 header("location: view-candidat.php?id=".$id)

?>