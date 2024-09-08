<?php

class candidat {
private $cin,$nom,$prenom,$id;
function __construct($cin="",$nom="",$prenom="") {
	
    $this->cin=$cin;
    $this->nom=$nom;
    $this->prenom=$prenom;
}

public function getcin(){
	return $this->cin;
}
public function getid(){
	return $this->id;
}
public function setid($i){
	$this->id=$i;
}
public function getnom(){
	return $this->nom;
}

public function getprenom(){
	return $this->prenom;
}

public function setnom($nom){
        $this->nom = $nom;
    }

public function setcin($cin){
        $this->cin = $cin;
    }

public function setprenom($prenom){
        $this->prenom = $prenom;
    }
}?>