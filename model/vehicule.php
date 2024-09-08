<?php

class vehicule {
private $num,$type,$id;
function __construct($num="",$type="") {
	
    $this->num=$num;
    $this->type=$type;
}
public function getid(){
	return $this->id;
}
public function setid($i){
	$this->id=$i;
}
public function getnum(){
	return $this->num;
}

public function gettype(){
	return $this->type;
}


public function settype($type){
        $this->type = $type;
    }

public function setnum($num){
        $this->num = $num;
    }
}?>