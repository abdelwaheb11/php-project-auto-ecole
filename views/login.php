<?php
    $n=$_POST['n'];
    $p=$_POST['p'];
    include_once("../controleur/admin.php");
    $a=new admin($n,$p);
    $res=$a->getadmin();
    if($res){
        session_start();
        $_SESSION['username']=$res['user_name'];
        $_SESSION['password']=$res['password'];
        $_SESSION['role']=$res['role'];
        
        header("location: ./dashboard");
    }
    else{
        header("Location: ../?e=eror");
    }

?>