<?php
//Classe Note version 1

// On a besoin de la classe Note
include('Note.php');

class Carnet {
	private $nbNotes=0;
	private $nbLimite=5;	//par défaut, le carnet contient 5 notes
	private $note=array();
	public function __construct($n) {
		
		$this->nbLimite=$n;
	}
	
    // Ajout d'une note au carnet
	public function ajouteNote($note,$coef,$commentaire) {
		$n=$this->nbNotes;
		if ($n < $this->nbLimite && $note != '' && $coef != '') {
			$this->note[$n]= new Note($note,$coef,$commentaire);
			$this->nbNotes++;
		}
	}
	
	//Supprime une note du carnet
	public function supprimeNote($item) {
		
		if ($item>0 && $item<=$this->nbNotes) {
			for ($i=$item-1;$i<$this->nbNotes-1;$i++) {
				$this->note[$i]=$this->note[$i+1];
			}
			unset($this->note[$this->nbNotes-1]);
			$this->nbNotes--;
		}
	}

	// Renvoie la moyenne non coefficientée
	public function calculeMoyenneBrute() {
		$somme=0;
		// T.A.F.
		for ($i = 1 ;$i<$this->getNbNotes();$i++) {
			$somme=$this->lireNote($i) + $somme;

		}
        return $somme/$this->getNbNotes();
    }
	// Renvoie la moyenne coefficientée
	public function calculeMoyenneCoef() {
			$somme=0;
		// T.A.F.
		for ($i = 1 ;$i<$this->getNbNotes();$i++) {
			$somme=($this->lireNote($i)*$this->lireCoef($i)) + $somme;
		}
        return $somme/$this->getNbNotes();
    }	
	
	}
	
	// Modifie une note déjà existante
	public function modifieNote($n,$not,$coe,$com) {
		if ($n > 0 && $n <= $this->nbNotes) {
			$this->note[$n-1]->setNote($not);
			$this->note[$n-1]->setCoef($coe);
			$this->note[$n-1]->setComm($com);
		}
		
	}
	
	// Getters
	public function getNbNotes() {
		return($this->nbNotes);
	}
	
	public function getNbLimite() {
		return($this->nbLimite);
	}
	
	public function lireNote($n) {
		return($this->note[$n-1]->getNote());
	}
	
	public function lireCoef($n) {
		return($this->note[$n-1]->getCoef());
	}
	
	public function lireComm($n) {
		return($this->note[$n-1]->getComm());
	}
}
?>
