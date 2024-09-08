<?php
    include_once("../../controleur/ingenieure.php");
    include_once("../../model/ingenieure.php");
    $c=$_POST['cin'];
    $n=$_POST['nom'];
    $p=$_POST['pre'];
    $s=$_POST['spe'];
    $i=new ingenieur($c,$n,$p,$s);
    $cl=new ingenieure_cont();
    $res=$cl->insert($i);
    if($res){
        header("Location: .");
    }
    else{
        header("Location: ajouter.php");
    }
?>