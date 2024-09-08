<?php
include_once("model.php");
include_once("../../model/etude_code.php");
class etude_code extends model{

    function __construct() 
    {
        parent::__construct();
    }

 function insert(etude $s){
    $query="insert into etude_code(id,code,candidat)values (NULL,?, ?)";
    $res=$this->pdo->prepare($query); 
    return $res->execute(array($s->getcode(),$s->getcandidat())); 
 }
 function getcode($id){
   $query = "select * from etude_code where id=?";
   $res=$this->pdo->prepare($query); 
   $res->execute(array($id));
   return $res->fetch(PDO::FETCH_ASSOC);
}
function delete(etude $e){
   $query = "delete from etude_code where candidat=? and code=?";
   $res=$this->pdo->prepare($query); 
   $res->execute(array($e->getcandidat(),$e->getcode()));
   return $res;
}
 function liste(){
    $query = "select * from etude_code";
    $res=$this->pdo->prepare($query); 
    $res->execute();
    return $res;
 }
 function despo_candidat($id){
   $query = "select * from candidat where id not in(select candidat from etude_code where code=?)";
   $res=$this->pdo->prepare($query); 
   $res->execute(array($id)); 
   return $res;
 }
 function liste_candidat($id){
   $query = "select * from candidat where id in(select candidat from etude_code where code=?)";
   $res=$this->pdo->prepare($query); 
   $res->execute(array($id)); 
   return $res;
   
}
}?>