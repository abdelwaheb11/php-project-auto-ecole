<?php
    include_once("../../controleur/ingenieure.php");
    $id=$_GET['id'];
    $cl=new ingenieure_cont();
    $res=$cl->delete($id);
    if($res){
        header("Location: .");
    }
?>