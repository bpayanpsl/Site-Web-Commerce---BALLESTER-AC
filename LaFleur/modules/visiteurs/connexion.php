<?php
// V�rification des droits d'acc�s de la page
if (utilisateur_est_connecte()) {
	// On affiche la page d'erreur comme quoi l'utilisateur est d�j� connect�   
	include CHEMIN_VUE.'erreur_deja_connecte.php';
	
} else {

// Ne pas oublier d'inclure la librairie Form
include CHEMIN_LIB.'form.php';
// include CHEMIN_MODELE.'visiteurs.php';
// "formulaire_connexion" est l'ID unique du formulaire
$form_connexion = new Form('formulaire_connexion');

$form_connexion->method('POST');

$form_connexion->add('Text', 'id')
			   ->Required(true)
               ->label("Nom d'utilisateur :");

$form_connexion->add('Password', 'mdp')
			   ->Required(true)
               ->label("Mot de passe :");
			   
// Case � cocher au formulaire de connexion
$form_connexion->add ('Checkbox', 'connexion_auto')
			->label("Se souvenir de moi");			   

$form_connexion->add('Submit', 'submit')
               ->value("Connexion");

// Pr�-remplissage avec les valeurs pr�c�demment entr�es (s'il y en a)
$form_connexion->bound($_POST);

// Cr�ation d'un tableau des erreurs
$erreurs_connexion = array();
$est_en_erreur = 0;
// Validation des champs suivant les r�gles
if (isset ($_POST['id']))
{ 
  $pseudonyme = $_POST['id'];
}
else
{
  $pseudonyme="";
}
if (isset ($_POST['mdp']))
{ 
  $mdp = $_POST['mdp'];
}
else
{
  $mdp="";
}

// ON VERIFIE LES DONNEES ENVOYEES
if (empty($pseudonyme) || empty($mdp)) //Oublie d'un champ
{
	$affichage = 'Un des champs (pseudonyme ou mot de passe) est vide.';
}
else
{
	// include_once('modules/visiteurs/connexion.php');
	include_once CHEMIN_CONTROLEUR.'connexion.php';
	$id_utilisateur = connexion($pseudonyme,$mdp );
	// Si les identifiants sont valides
	if (false !== $id_utilisateur) {
		    // On enregistre les informations dans la session
			$_SESSION['pseudonyme'] = $pseudonyme;
			$_SESSION['id'] = $id_utilisateur;
			$infos_utilisateur = lire_infos_utilisateur($id_utilisateur);
		    $_SESSION['pseudo'] = $pseudonyme;
		    $_SESSION['avatar'] = $infos_utilisateur['avatar'];
		    $_SESSION['email']  = $infos_utilisateur['email'];
		    $_SESSION['adresse'] = $infos_utilisateur['adresse'];
		    $_SESSION['cp']  = $infos_utilisateur['cp'];
			$_SESSION['ville']  = $infos_utilisateur['ville'];
			$_SESSION['login'] = $infos_utilisateur['login'];
			
			// Mise en place des cookies de connexion automatique
			if (false != $form_connexion->get_cleaned_data('connexion_auto'))
			{
				$navigateur = (!empty($_SERVER ['HTTP_USER_AGENT'])) ?
				$_SERVER ['HTTP_USER_AGENT'] : '';
				$hash_cookie = sha1('aaa'.$nom.'bbb'.$mdp.'ccc'.$navigateur.'ddd');
				setcookie( 'id', $_SESSION['id'], strtotime("+1 year"), '/');
				setcookie('connexion_auto', $hash_cookie, strtotime("+1 year"), '/');
			}
		// Affichage de la confirmation
            $est_en_erreur= 1;
			$affichage = 'Vous 	&ecirc;tes maintenant connect&eacute; &agrave; votre compte '.stripslashes(htmlspecialchars($pseudonyme)).'';
			// Affichage de la confirmation de la connexion
		    include CHEMIN_VUE.'connexion_ok.php';
		}
		else // Acc�s pas refus� !
		{
			$affichage = 'Acc&eacute;s refus&eacute; car le mot de passe est incorrect, ou le compte est invalid&eacute; (lisez vos courriers �lectroniques) !';
			// On r�affiche le formulaire de connexion
			$erreurs_connexion[] = "Nom d'utilisateur ou mot de passe inexistant.";
		}
}

// On affiche le formulaire de connexion si on n'est pas d�la connect� 
if ($est_en_erreur != 1)
{
 include CHEMIN_VUE.'formulaire_connexion.php';
}
}
