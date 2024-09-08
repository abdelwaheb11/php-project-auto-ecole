<?php
    include_once("../../model/ingenieure.php");
    include_once("../../controleur/ingenieure.php");
    $id=$_GET['id'];
    $c=$_POST['cin'];
    $n=$_POST['nom'];
    $p=$_POST['pre'];
    $spe=$_POST['spe'];
    $i=new ingenieur($c,$n,$p,$spe);
    $i->setid($id);
    $cl=new ingenieure_cont();
    $res=$cl->update($i);
    if($res){
        header("Location: .");
    }
    else{
        header("Location: modefier.php?id=".$id);
    }
?>