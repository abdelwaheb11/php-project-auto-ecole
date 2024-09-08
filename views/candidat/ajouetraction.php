<?php
    include_once("../../controleur/candidat.php");
    include_once("../../model/candidat.php");
    $cin=$_POST['cin'];
    $n=$_POST['nom'];
    $p=$_POST['pre'];
    $c=new candidat($cin,$n,$p);
    $cl=new candidat_cont();
    $res=$cl->insert($c);
    if($res){
        header("location:.");
    }
    
?>