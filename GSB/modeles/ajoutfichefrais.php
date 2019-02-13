<?php
function ajout_fichefrais($nuitRepas, $kilo, $nuits, $repas, $mois) {

$date = date("j-m-Y");
	$id_Visiteur++;
	$sous_chaine = array();//creation d'une variable qui contindrat les donnée a tester 
		 $sous_chaine[1]=substr($form_ajoutForfait->get_bounded_data('nuitRepas')) ;
		 $sous_chaine[2]=substr($form_ajoutForfait->get_bounded_data('kilo')) ;
		 $sous_chaine[3]=substr($form_ajoutForfait->get_bounded_data('nuits') ;
		 $sous_chaine[4]=substr($form_ajoutForfait->get_bounded_data('repas')) ;
		 
	$pdo = PDO2::getInstance();
	
	$requete = $pdo->prepare("INSERT INTO lignefraisforfait(idVisiteur, mois, idFraisForfait, quantite) VALUES ($id_Visiteur, $mois,");
    	//fin des modification du 28/02/2012 par greg
	$requete->bindValue(':id', $id);  
	$requete->bindValue(':nom', $nom);
	$requete->bindValue(':prenom', $prenom);
	//modification du 28/02/2012 par greg 
	$requete->bindValue(':dateEmb',$dateEmb);
	//fin des modification du 28/02/2012 par greg
	$requete->bindValue(':login', $login);
	$requete->bindValue(':mdp',    $mdp);
	$requete->bindValue(':adresse', $adresse);
	$requete->bindValue(':codePostal', $codePostal);
	$requete->bindValue(':ville', $ville);
	$requete->bindValue(':email',   $email);
	$requete->bindValue(':hashvalidation', $hashvalidation);
		//modification du 28/02/2012 par greg 
	$requete->bindValue(':dateInscri', $date );
		//fin des modification du 28/02/2012 par greg
	
	if ($requete->execute()) {
		return $id;
		}
	return $requete->errorInfo();
}