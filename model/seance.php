<?php

class seance {
private $date,$heure,$id,$ing,$vehicule,$candidat;

function __construct($date="",$h="",$i="",$v="",$c="") {
	
    $this->date=$date;
    $this->heure=$h;
    $this->ing=$i;
    $this->vehicule=$v;
    $this->candidat=$c;
}
public function getcandidat(){
	return $this->candidat;
}
public function setcandidat($i){
	$this->candidat=$i;
}
public function geting(){
	return $this->ing;
}
public function seting($i){
	$this->ing=$i;
}

public function getvehicule(){
	return $this->vehicule;
}
public function setvehicule($v){
	$this->vehicule=$v;
}


public function getid(){
	return $this->id;
}
public function setid($i){
	$this->id=$i;
}
public function getdate(){
	return $this->date;
}

public function getheure(){
	return $this->heure;
}

public function setdate($nom){
        $this->date = $date;
    }

public function setheure($heure){
        $this->heure = $heure;
    }
}?>