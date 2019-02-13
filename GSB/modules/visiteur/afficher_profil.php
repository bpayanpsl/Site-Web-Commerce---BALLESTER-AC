<?php
// Pas de vérification de droits d'accès nécessaire : tout le monde peut voir un profil utilisateur :)
if (!utilisateur_est_connecte()) {
	include CHEMIN_VUE."erreur_non_connecte.php";
	exit(0);
}
// Si le paramètre id est manquant ou invalide
if (empty($_GET['id']) ) {

    	include CHEMIN_VUE.'erreur_parametre_profil.php';

} else {

	// On veut utiliser le modèle des visiteurs (~/modeles/visiteurs.php)
	// include CHEMIN_MODELE.'visiteurs.php';
	// lire_infos_utilisateur() est défini dans ~/modeles/visiteurs.php
	// list($nom, $prenom, $mdp, $adresse, $cp, $ville ,$email, $avatar, $dateinscription, $hashvalidation) =$infos_utilisateur;
	// $form_inscription->get_cleaned_data('nom', 'prenom', 'mdp', 'adresse', 'codePostal', 'ville', 'email', 'avatar');
	// Problème list()   - remplacé par ci-dessous
	
	
	// lire_infos_utilisateur() est défini dans ~/modeles/visiteurs.php
	$infos_utilisateur = lire_infos_utilisateur($_GET['id']);
	
	if ($infos_utilisateur['login'] == 'v'){
	$fonction = "Visiteur Medicale";}
	else if ($infos_utilisateur['login'] == 'c'){
	$fonction ="Comptable";}
	else if ($infos_utilisateur['login'] == 'a'){
	$fonction = "Administrateur";}
	else{
	$fonction ="Ereure";}
	
	$id = $_GET['id'];
	$nom = $infos_utilisateur['nom'];
	$prenom = $infos_utilisateur['prenom'];
	$adresse = $infos_utilisateur['adresse'];
	$codePostal = $infos_utilisateur['cp'];
	$ville = $infos_utilisateur['ville'];
	$email = $infos_utilisateur['email'];
	$avatar = $infos_utilisateur['avatar'];
    $dateinscription = $infos_utilisateur['dateinscription'];
	$avatar = $infos_utilisateur['avatar'];

	// Si le profil existe et que le compte est validé
	 //if (false !== $infos_utilisateur && $infos_utilisateur['hashvalidation'] == 'OK' && $infos_utilisateur['hashvalidation'] == null) {
	$verif = $infos_utilisateur['hashvalidation'] == 'OK';
	if ($verif == true && $infos_utilisateur != false ){
		include CHEMIN_VUE.'profil_infos_utilisateur.php';

	}
    else {

		include CHEMIN_VUE.'erreur_profil_inexistant.php';
	}
}
