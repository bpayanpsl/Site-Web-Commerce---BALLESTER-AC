<?php

function combinaison_connexion_valide($id, $mdp) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT id FROM visiteurs
		WHERE
		id = :id AND 
		mdp = :mdp AND
		hashvalidation = :hach ");

	$requete->bindValue(':id', $id);
	$requete->bindValue(':mdp', $mdp);
	$requete->bindValue(':hach', "OK");
	$requete->execute();
	
	if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
	
		$requete->closeCursor();
		return $result['id'];
	}
	return false;
}

function lire_infos_utilisateur($id_utilisateur) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("SELECT nom, prenom, login,dateEmbauche, mdp, adresse, cp, ville ,email, avatar, dateinscription, hashvalidation
		FROM visiteurs
		WHERE
		id = :id_utilisateur");
    	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->execute();
	
	if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
	    //    echo "=> $result[nom] <br />";
		$requete->closeCursor();
		return $result;
	}
	return false;
}
function maj_email_membre($id_utilisateur, $email)
{
     $pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE visiteurs SET
		email = :email
		WHERE
		id = :id_utilisateur");

	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->bindValue(':email',$email);

	return $requete->execute();
}
function maj_mdp_membre($id_utilisateur,$mdp)
{
     $pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE visiteurs SET
		mdp = :mdp
		WHERE
		id = :id_utilisateur");

	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->bindValue(':mdp',$mdp);

	return $requete->execute();
}

function maj_infos_membre($id_utilisateur,$adresse,$codePostal,$ville)
{
   
   $pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE visiteurs SET
		adresse = :adresse,
		cp = :codePostal,
		ville = :ville
		WHERE
		id = :id_utilisateur");

	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->bindValue(':adresse',$adresse);
	$requete->bindValue(':codePostal',$codePostal);
	$requete->bindValue(':ville',$ville);

	return $requete->execute();
}

function verif_ancien_mdp($id_utilisateur)
{
		$pdo = PDO2::getInstance();
	
	$requete = $pdo->prepare("SELECT mdp
		FROM visiteurs
		WHERE
		id = :id_utilisateur");
		$requete->bindValue(':id_utilisateur', $id_utilisateur);
		$requete->execute();
		
		if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
	    //   echo "=> $result[mdp] <br />";
		$requete->closeCursor();
	}
	return $result;
		
	
}

function ajoutFicheForfait()
{
	$pdo = PDO2::getInstance();
	$requete1="INSERT INTO lignefraisforfait (idVisiteur, mois, idFraisForfait, quantite) VALUES (";
	$requete1.= "'$idCommande', '$moment' , '$nomPrenomClient' , '$adresseRueClient' , '$cpClient' , '$villeClient' , '$mailClient' , '$bonCdeClient' ) ;";
}

function connexion($id, $mdp) 
{
    $mdp = sha1($mdp);
	$pdo = PDO2::getInstance();
    $requete = $pdo->prepare("SELECT id FROM visiteurs
		WHERE id = :id 
                AND  mdp = :mdp 
				AND hashvalidation = :hach ;");
	$requete->bindValue(':id', $id);
	$requete->bindValue(':mdp', $mdp);
	$requete->bindValue(':hach', "OK");
	$requete->execute();
	
	if ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
		$requete->closeCursor();
		return $result['id'];
	}
	return false;
}

function valider_compte_avec_hash($hashvalidation) {
	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE visiteurs SET
		hashvalidation = :hach
		WHERE
		hashvalidation = :hashvalidation");

	$requete->bindValue(':hashvalidation', $hashvalidation);
	$requete->bindValue(':hach', "OK");
	
	$requete->execute();

	return ($requete->rowCount() == 1);
}

/*
// Mis dans avatar.php 
function maj_avatar_membre($id_utilisateur , $avatar) {

	$pdo = PDO2::getInstance();

	$requete = $pdo->prepare("UPDATE visiteurs SET
		avatar = :avatar
		WHERE
		id = :id_utilisateur");

	$requete->bindValue(':id_utilisateur', $id_utilisateur);
	$requete->bindValue(':avatar',         $avatar);

	return $requete->execute();
}	 
*/

?>
