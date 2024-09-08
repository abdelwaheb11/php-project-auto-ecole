<?php
    include_once("../../controleur/candidat.php");
    $id=$_GET['id'];
    $cl=new candidat_cont();
    $res=$cl->delete($id);
    if($res){
        header("Location: .");
    }
?>