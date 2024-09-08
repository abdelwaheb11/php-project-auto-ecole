<?php
    include_once("../../controleur/conduit.php");
    $id=$_GET['id'];
    $c=new conduit();
    $res = $c->delete($id);
    header("location: .");
?>