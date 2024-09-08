<?php
    include_once("../../model/vehicule.php");
    include_once("../../controleur/vehicule.php");
    $c=$_POST['num'];
    $n=$_POST['type'];
    $v=new vehicule($c,$n);
    $cl=new vehicule_cont($c,$n);
    $res=$cl->insert($v);
    if($res){
        header("Location: .");
    }
    else{
        header("Location: ajouter.php");
    }
?>