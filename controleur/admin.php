<?php
include_once("model.php");
class admin extends model{
 private $nom,$password,$role;
 function __construct($nom,$password) 
{
    parent::__construct();
    $this->nom=$nom;
    $this->password=$password;
}
 function insert(){
    $query="insert into admin(user_name,password)values (?, ?)";
    $res=$this->pdo->prepare($query); 
    return $res->execute(array($this->nom,$this->password)); 
 }
    function getadmin(){
        $query = "select * from admin where user_name=? and password=? ";
        $res=$this->pdo->prepare($query); 
        $res->execute(array($this->nom,$this->password));
        return $res->fetch(PDO::FETCH_ASSOC);
    }
    function verifid($id){
        $query = "select id from admin where id=? ";
        $res=$this->pdo->prepare($query); 
        $res->execute(array($id));
        return $res;
    }
}?>