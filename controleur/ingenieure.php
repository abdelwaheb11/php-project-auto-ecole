<?php
include_once("model.php");
include_once("../../model/ingenieure.php");
class ingenieure_cont extends model{
 function __construct() 
   {
      parent::__construct();
   }

   function update(ingenieur $c){
      $query="update ingenieure set cin=?,nom=?,prenom=?,specialite=? where  id=?";
      $res=$this->pdo->prepare($query); 
      $res->execute(array($c->getcin(),$c->getnom(),$c->getprenom(),$c->getspe(),$c->getid()));
      return $res;
   }
 function insert(ingenieur $c){
    $query="insert into ingenieure(id,cin,nom,prenom,specialite)values (NULL,?, ?, ?,?)";
    $res=$this->pdo->prepare($query); 
    return $res->execute(array($c->getcin(),$c->getnom(),$c->getprenom(),$c->getspe())); 
 }
 function getingenieure($id){
   $query = "select * from ingenieure where id=?";
   $res=$this->pdo->prepare($query); 
   $res->execute(array($id));
   return $res->fetch(PDO::FETCH_ASSOC);
}
 function delete($id) {
    $query = "delete from ingenieure where id=?";
    $res=$this->pdo->prepare($query); 
    return $res->execute(array($id)); 
 }
 function liste(){
    $query = "select * from ingenieure";
    $res=$this->pdo->prepare($query); 
    $res->execute();
    return $res;
 }

 function reche_nom($n){
   $query="select * from ingenieure where nom like concat('%', ?, '%')";
   $res=$this->pdo->prepare($query); 
   $res->execute(array($n));
   return $res;
}

function count_specialite($s){
   $query="select id from ingenieure where specialite=?";
   $res=$this->pdo->prepare($query); 
   $res->execute(array($s));
   return $res;
}

function get_count_specialite() {
   $types = ['moto', 'voiture', 'camion']; 
   $res = [];

   foreach ($types as $type) {
       $res[$type] = $this->count_specialite($type)->rowCount();
   }
   
   return $res; 
}




}?>