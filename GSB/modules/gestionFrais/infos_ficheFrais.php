<!--
// Vérification des droits d'accès de la page
if (!utilisateur_est_connecte()) {
	include CHEMIN_VUE."erreur_non_connecte.php";
	exit(0);
}
	// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté   

// Ne pas oublier d'inclure la librairie Form
include CHEMIN_LIB.'form.php';
// include CHEMIN_MODELE.'visiteurs.php';
// "formulaire_connexion" est l'ID unique du formulaire
$form_infos_ficheFrais = new Form('formulaire_infos_ficheFrais');

$form_infos_ficheFrais->method('POST');

$form_infos_ficheFrais->add('Text', 'mois')
			   ->Required(true)
               ->label("Fiche de frais du ");

$form_infos_ficheFrais->add('Text', 'etat')
			   ->Required(true)
               ->label("Etat :");
			   
$form_infos_ficheFrais->add('Text', 'montantValide')
			   ->Required(true)
               ->label("Montant validé :");


 include CHEMIN_VUE.'formulaire_infos_ficheFrais.php';
-->
<?php

$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];

switch($action){
	case 'selectionnerMois':{
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $lesCles[0];
		include("vues/v_listeMois.php");
		break;
	}
	case 'voirEtatFrais':{
		$leMois = $_REQUEST['lstMois']; 
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		$moisASelectionner = $leMois;
		include("vues/v_listeMois.php");
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("vues/v_etatFrais.php");
	}
}

