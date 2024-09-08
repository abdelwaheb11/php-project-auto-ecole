<?php
    include_once("../../controleur/conduit.php");
    include_once("../../model/seance.php");
    session_start();
    
    isset($_POST['date']) ? $d=$_POST['date'] : $d=$_SESSION['date'];
    isset($_POST['heure']) ? $h=$_POST['heure'] : $h=$_SESSION['heure'];
    isset($_POST['type']) ? $t=$_POST['type'] : $t=$_SESSION['type'];

    $i=$_POST['i'];
    $v=$_POST['v'];
    $c=$_POST['c'];
    $co=new conduit();
    if($i=="" && $v=="" && $c==""){
        $s=new seance();
        $s->setdate($d);
        $s->setheure($h);
        $res_i = $co->despo_ings($s,$t)->fetchAll(PDO::FETCH_ASSOC);
        $res_v = $co->despo_vehicule($s,$t)->fetchAll(PDO::FETCH_ASSOC);
        $res_c = $co->despo_candidat($s)->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['date']=$d;
        $_SESSION['heure']=$h;
        $_SESSION['type']=$t;
        $_SESSION['despo_i'] = $res_i;
        $_SESSION['despo_c'] = $res_c;
        $_SESSION['despo_v'] = $res_v;
        header("location: ajouter.php");
    }
    else{
        $s=new seance($d,$h,$i,$v,$c);
        $res=$co->insert($s);
        unset($_SESSION['date']);
        unset($_SESSION['heure']);
        unset($_SESSION['type']);
        if($res){
            header("Location: .");
        }
        else{
            header("location: ajouter.php"); 
        }
            

    }
        
?>