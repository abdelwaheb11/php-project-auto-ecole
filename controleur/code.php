<?php
include_once("model.php");
include_once("../../model/seance.php");
class code extends model{

    function __construct() 
    {
        parent::__construct();
    }

   function update(seance $s){
      $query="update seance_code set date=?,heur=?,ingenieure=? where  id=?";
      $res=$this->pdo->prepare($query); 
      $res->execute(array($s->getdate(),$s->getheure(),$s->geting(),$s->getid()));
      return $res;
   }
 function insert(seance $s){
    $query="insert into seance_code(id,date,heure,ingenieure)values (NULL,?, ?, ?)";
    $res=$this->pdo->prepare($query); 
    return $res->execute(array($s->getdate(),$s->getheure(),$s->geting())); 
 }
 function getcode($id){
   $query = "select * from seance_code where id=?";
   $res=$this->pdo->prepare($query); 
   $res->execute(array($id));
   return $res->fetch(PDO::FETCH_ASSOC);
}
 function delete($id) {
    $query = "delete from seance_code where id=?";
    $res=$this->pdo->prepare($query); 
    return $res->execute(array($id)); 
 }
 function liste(){
    $query = "select * from seance_code";
    $res=$this->pdo->prepare($query); 
    $res->execute();
    return $res;
 }

 function reche_date($date){
   $query = "select * from seance_code where date=?";
    $res=$this->pdo->prepare($query); 
    $res->execute(array($date));
    return $res;
 }
 function despo_ings(seance $s){
   $query = "select * from ingenieure where id not in(select ingenieure from seance_code where date=? and heure=? )";
   $res=$this->pdo->prepare($query); 
   $res->execute(array($s->getdate(),$s->getheure())); 
   return $res;
 }

 function getcodecandidat($id){
    $query="select s.* from seance_code s,etude_code e where s.id=e.code and e.candidat=?";
    $res=$this->pdo->prepare($query); 
    $res->execute(array($id));
    return $res;
 }
}?>