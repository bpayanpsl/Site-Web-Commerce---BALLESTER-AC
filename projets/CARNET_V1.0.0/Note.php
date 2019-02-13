<?php
// Classe Note 

class Note {
	
	private $note;
	private $coef;
	private $comm;
	
	//constructeur
	public function __construct($not,$coe,$com) {
		$this->note = $not;
		$this->coef = $coe;
		$this->comm = $com;
	}
	
	// Getters
	public function getNote() {
		return($this->note);
	}
	
	public function getCoef() {
		return($this->coef);
	}
	
	public function getComm() {
		return($this->comm);
	}
	
	// Setters
	public function setNote($not) {
		$this->note=$not;
	}
	
	public function setCoef($coe) {
		$this->coef=$coe;
	}
	
	public function setComm($com) {
		$this->comm=$com;
	}
}
?>
