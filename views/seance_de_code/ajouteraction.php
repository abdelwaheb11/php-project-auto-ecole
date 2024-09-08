<?php
    include_once("../../controleur/code.php");
    include_once("../../model/seance.php");
    session_start();
    isset($_POST['date']) ? $d=$_POST['date'] : $d=$_SESSION['date'];
    isset($_POST['heure']) ? $h=$_POST['heure'] : $h=$_SESSION['heure'];
    $i=$_POST['i'];
    $c=new code();
    if($i==""){
        $s=new seance($d,$h);
        $res = $c->despo_ings($s);
        $res = $res->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['date']=$d;
        $_SESSION['heure']=$h;
        $_SESSION['despo'] = $res;
        header("location: ajouter.php");
    }
    else{
        $s=new seance($d,$h,$i);
        $res=$c->insert($s);
        if($res){
            unset($_SESSION['date']);
            unset($_SESSION['heure']);
            unset($_SESSION['despo']);
            header("Location: .");
        }    

    }
        
?>