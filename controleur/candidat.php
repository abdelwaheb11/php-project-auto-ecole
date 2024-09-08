<?php
include_once("model.php");
include_once("../../model/candidat.php");
class candidat_cont extends model{
 function __construct() 
   {
      parent::__construct();
   }

   function update(candidat $c){
      $query="update candidat set cin=?,nom=?,prenom=? where  id=?";
      $res=$this->pdo->prepare($query); 
      $res->execute(array($c->getcin(),$c->getnom(),$c->getprenom(),$c->getid()));
      return $res;
   }
   function reche_nom($n){
      $query="select * from candidat where nom like concat('%', ?, '%')";
      $res=$this->pdo->prepare($query); 
      $res->execute(array($n));
      return $res;
   }
   function setprix($id,$prix){
      $query="update candidat set prix_payee=prix_payee+? where id=?";
      $res=$this->pdo->prepare($query); 
      $res->execute(array($prix,$id));
      return $res;
   }

 function insert(candidat $c){
   $query="insert into candidat(id,cin,nom,prenom) values (NULL,?, ?, ?)";
   $stmt=$this->pdo->prepare($query); 
   return $stmt->execute(array($c->getcin(),$c->getnom(),$c->getprenom()));
 }
 function getcandidat($id){
   $query = "select * from candidat where id=?";
   $res=$this->pdo->prepare($query); 
   $res->execute(array($id));
   return $res->fetch(PDO::FETCH_ASSOC);
}
 function delete($id) {
    $query = "delete from candidat where id=?";
    $res=$this->pdo->prepare($query); 
    return $res->execute(array($id)); 
 }
 function liste(){
    $query = "select * from candidat";
    $res=$this->pdo->prepare($query); 
    $res->execute();
    return $res;
 }

 function getprixtotal($id){
   $query="select count(candidat) from seance_conduit where candidat=?";
   $res1=$this->pdo->prepare($query); 
   $res1->execute(array($id));
   $count1=$res1->fetchColumn();
   $query="select count(candidat) from etude_code where candidat=?";
   $res2=$this->pdo->prepare($query); 
   $res2->execute(array($id));
   $count2=$res2->fetchColumn();
   return ((int)$count1 * 30) + ((int)$count2 * 15);
 }
}?>