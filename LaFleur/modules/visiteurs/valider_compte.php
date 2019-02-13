<?php
// On v�rifie qu'un hash est pr�sent
 if (!empty($_GET['hash'])) {
	// On veut utiliser le mod�le des visiteurs (~/modeles/visiteurs.php)

	// valider_compte_avec_hash() est d�finit dans ~/modeles/visiteurs.php
	// include CHEMIN_MODELE.'visiteurs.php';
	
	if (valider_compte_avec_hash($_GET['hash'])) {
		// Affichage de la confirmation de validation du compte
		include CHEMIN_VUE.'compte_valide.php';
	
	} else {
		// Affichage de l'erreur de validation du compte
		include CHEMIN_VUE.'erreur_activation_compte.php';
	}

} else {

	// Affichage de l'erreur de validation du compte
	include CHEMIN_VUE.'erreur_activation_compte.php';
}
?>
