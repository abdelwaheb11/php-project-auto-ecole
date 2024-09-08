<?php
    include_once("../../controleur/vehicule.php");
    $id=$_GET['id'];
    $cl=new vehicule_cont();
    $res=$cl->delete($id);
    if($res){
        header("Location: .");
    }
?>