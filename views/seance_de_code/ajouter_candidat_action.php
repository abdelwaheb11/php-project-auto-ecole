<?php
include_once("../../controleur/etude_code.php");
include_once("../../model/etude_code.php");
    $id=$_GET['id'];
    $id1=$_GET['id1'];
    $m=new etude();
    $e=new etude_code();
    $m=new etude($id1,$id);
    $e->insert($m);
    
    header("Location: ajouter_candidat.php?id=".$id1);
?>