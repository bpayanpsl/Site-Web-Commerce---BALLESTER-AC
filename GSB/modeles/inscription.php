<?php
function ajouter_membre_dans_bdd($nom, $prenom,$dateEmb ,$login, $mdp, $adresse, $codePostal, $ville, $email, $hashvalidation) {

$date = date("j-m-Y");

	$pdo = PDO2::getInstance();
	$id = strtolower(substr($prenom, 0, 1) . $nom);  // Initiale du prénom concaténé par le nom 
		//modification du 28/02/2012 par greg 
	$requete = $pdo->prepare("INSERT INTO visiteurs(id,nom,prenom,dateEmbauche,login,adresse,cp,ville,mdp,email,hashvalidation,dateinscription) VALUES (:id,:nom,:prenom,:dateEmb,:login,:adresse,:codePostal,:ville,:mdp,:email,:hashvalidation,:dateInscri)");
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

