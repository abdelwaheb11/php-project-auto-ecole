<?php
    include_once("../../controleur/code.php");
    $id=$_GET['id'];
    $c=new code();
    $res = $c->delete($id);
    header("location: .");
?>