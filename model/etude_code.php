<?php

class etude{
private $id,$code,$candidat;
function __construct($code="",$candidat="") {
	
    $this->code=$code;
    $this->candidat=$candidat;
}

public function getcode(){
	return $this->code;
}
public function setcode($c){
	$this->code=$c;
}

public function getcandidat(){
	return $this->candidat;
}
public function setcandidat($c){
	$this->candidat=$c;
}


public function getid(){
	return $this->id;
}
public function setid($i){
	$this->id=$i;
}
}
?>