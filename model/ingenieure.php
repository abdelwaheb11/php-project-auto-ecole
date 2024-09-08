<?php

class ingenieur {
private $cin,$nom,$prenom,$spe,$id;
function __construct($cin="",$nom="",$prenom="",$spe="") {
	
    $this->cin=$cin;
    $this->nom=$nom;
    $this->prenom=$prenom;
    $this->spe=$spe;
}
public function getid(){
	return $this->id;
}
public function setid($i){
	$this->id=$i;
}
public function getcin(){
	return $this->cin;
}

public function getnom(){
	return $this->nom;
}

public function getprenom(){
	return $this->prenom;
}

public function getspe(){
	return $this->spe;
}


public function setnom($nom){
        $this->nom = $nom;
    }

public function setCin($cin){
        $this->cin = $cin;
    }

public function setprenom($prenom){
        $this->prenom = $prenom;
    }

 public function setspe($spe){
        $this->spe = $spe	;
    }
	
}?>