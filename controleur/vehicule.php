<?php
include_once("model.php");
include_once("../../model/vehicule.php");
class vehicule_cont extends model{
 function __construct() 
   {
      parent::__construct();
   }

   function update(vehicule $v){
      $query="update vehicules set num=?,type=? where  id=?";
      $res=$this->pdo->prepare($query); 
      $res->execute(array($v->getnum(),$v->gettype(),$v->getid()));
      return $res;
   }
 function insert(vehicule $v){
    $query="insert into vehicules(id,num,type)values (NULL,?, ?)";
    $res=$this->pdo->prepare($query); 
    return $res->execute(array($v->getnum(),$v->gettype())); 
 }
 function getvehicule($id){
   $query = "select * from vehicules where id=?";
   $res=$this->pdo->prepare($query); 
   $res->execute(array($id));
   return $res->fetch(PDO::FETCH_ASSOC);
}
 function delete($id) {
    $query = "delete from vehicules where id=?";
    $res=$this->pdo->prepare($query); 
    return $res->execute(array($id)); 
 }
 function liste(){
    $query = "select * from vehicules";
    $res=$this->pdo->prepare($query); 
    $res->execute();
    return $res;
 }

 function gets_type($t){
   $query = "select * from vehicules where type=?";
   $res=$this->pdo->prepare($query); 
   $res->execute(array($t));
   return $res;
 }

 function get_count_type() {
   $types = ['moto', 'voiture', 'camian']; 
   $res = [];

   foreach ($types as $type) {
       $res[$type] = $this->gets_type($type)->rowCount();
   }

   return $res; 
}
}?>