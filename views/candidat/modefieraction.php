<?php
    include_once("../../controleur/candidat.php");
    include_once("../../model/candidat.php");
    $id=$_GET['id'];
    $cin=$_POST['cin'];
    $n=$_POST['nom'];
    $p=$_POST['pre'];
    $cl=new candidat_cont();
    $c=new candidat($cin,$n,$p);
    $c->setid($id);
    $res=$cl->update($c);
    if($res){
        header("Location: .");
    }
    else{
        header("Location: modefier.php?id=".$id);
    }
?>