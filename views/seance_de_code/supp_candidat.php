<?php
include_once("../../controleur/etude_code.php");
include_once("../../model/etude_code.php");
    $id=$_GET['id'];
    $id1=$_GET['id1'];
    $m=new etude();
    $e=new etude_code();
    $m->setcandidat($id);
    $m->setcode($id1);
    $r = $e->delete($m);
    
    header("Location: voir_candidat.php?id=".$id1);
?>