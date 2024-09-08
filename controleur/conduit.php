<?php
include_once("model.php");
include_once("../../model/seance.php");
class conduit extends model{

    function __construct() 
    {
        parent::__construct();
    }

 function insert(seance $s){
    $query="insert into seance_conduit(id,date,heure,ingenieure,vehicule,candidat)values (NULL,?, ?, ?,?,?)";
    $res=$this->pdo->prepare($query); 
    return $res->execute(array($s->getdate(),$s->getheure(),$s->geting(),$s->getvehicule(),$s->getcandidat())); 
 }
 function getconduit($id){
   $query = "select * from seance_conduit where id=?";
   $res=$this->pdo->prepare($query); 
   $res->execute(array($id));
   return $res->fetch(PDO::FETCH_ASSOC);
}
 function delete($id) {
    $query = "delete from seance_conduit where id=?";
    $res=$this->pdo->prepare($query); 
    return $res->execute(array($id)); 
 }
 function liste(){
    $query = "select * from seance_conduit";
    $res=$this->pdo->prepare($query); 
    $res->execute();
    return $res;
 }
 function despo_ings(seance $s,$t){
   $query = "select * from ingenieure where specialite=? and id not in(select ingenieure from seance_conduit where date=? and heure=? )";
   $res=$this->pdo->prepare($query); 
   $res->execute(array($t,$s->getdate(),$s->getheure())); 
   return $res;
 }

 function despo_vehicule(seance $s,$t){
    $query = "select * from vehicules where type=? and id not in(select vehicule from seance_conduit where date=? and heure=? )";
    $res=$this->pdo->prepare($query); 
    $res->execute(array($t,$s->getdate(),$s->getheure())); 
    return $res;
  }

  function despo_candidat(seance $s){
    $query = "select * from candidat where id not in(select candidat from seance_conduit where date=? and heure=? )";
    $res=$this->pdo->prepare($query); 
    $res->execute(array($s->getdate(),$s->getheure())); 
    return $res;
  }
  function reche_date($date){
   $query = "select * from seance_conduit where date=?";
    $res=$this->pdo->prepare($query); 
    $res->execute(array($date));
    return $res;
 }

  function getcandidats($id){
     $query="select * from seance_conduit where candidat=? ";
     $res=$this->pdo->prepare($query); 
     $res->execute(array($id));
     return $res;
  }
}?>