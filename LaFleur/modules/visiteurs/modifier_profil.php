<?php
// V�rification des droits d'acc�s de la page
if (!utilisateur_est_connecte()) {
	// On affiche la page d'erreur : l'utilisateur doit �tre connect� pour acc�der � la page
	include CHEMIN_VUE.'erreur_non_connecte.php';
} else {
	// Ne pas oublier d'inclure la librairie Form
	include CHEMIN_LIB.'form.php';
    # "form_modif_infos" est l'ID unique du formulaire
	$form_modif_infos_localisation = new Form("form_modif_infos_localisation");
	
	$form_modif_infos_localisation->method('POST');
	
	$form_modif_infos_localisation->add('Text', 'adresse')
                         ->label("Votre adresse")
                         ->Required(true)
                         ->value($_SESSION['adresse']);
	
	$form_modif_infos_localisation->add('Text', 'codePostal')
                         ->label("Votre code postal")
                         ->Required(true)
                         ->value($_SESSION['cp']);
	
	$form_modif_infos_localisation->add('Text', 'ville')
                         ->label("Votre ville")
                         ->Required(true)
                         ->value($_SESSION['ville']);


	$form_modif_infos_localisation->add('Submit', 'submit')
                         ->value("Modifier");

	// "form_modif_infos" est l'ID unique du formulaire
	$form_modif_infos = new Form("form_modif_infos");
	
	$form_modif_infos->method('POST');
	
	$form_modif_infos->add('Email', 'email')
                         ->label("Votre adresse email")
                         ->Required(false)
                         ->value($_SESSION['email']);
	
	$form_modif_infos->add('Checkbox', 'suppr_avatar')
                         ->label("Je veux supprimer mon avatar")
                         ->Required(false);
	
	$form_modif_infos->add('File', 'avatar')
                         ->filter_extensions('jpg', 'png', 'gif')
                         ->max_size(8192) // 8 Kb
                         ->label("Votre avatar (facultatif)")
                         ->Required(false);

	$form_modif_infos->add('Submit', 'submit')
                         ->value("Modifier");					 

	// "form_modif_mdp" est l'ID unique du formulaire
	$form_modif_mdp = new Form("form_modif_mdp");
	
	$form_modif_mdp->method('POST');
	
	$form_modif_mdp->add('Password', 'mdp_ancien')
                       ->label("Votre ancien mot de passe");
	
	$form_modif_mdp->add('Password', 'mdp')
                       ->label("Votre nouveau mot de passe");
	
	$form_modif_mdp->add('Password', 'mdp_verif')
                       ->label("Votre nouveau mot de passe (v&eacute;rification)");
	
	$form_modif_mdp->add('Submit', 'submit')
					->value("Modifier mon mot de passe !");
	
	// Cr�ation des tableaux des erreurs (un par formulaire)
	$erreurs_form_modif_infos_localisation = array();
	$erreurs_form_modif_infos = array();
	$erreurs_form_modif_mdp   = array();
	
	// Et d'un tableau des messages de confirmation
	$msg_confirm = array();
	
	// Validation des champs suivant les r�gles en utilisant les donn�es du tableau $_POST
	$form_modif_infos_localisation->is_valid($_POST);
	  if ($form_modif_infos_localisation->is_valid($_POST)) { 
		list($adresse, $codePostal, $ville) = $form_modif_infos_localisation->get_cleaned_data('adresse', 'codePostal', 'ville');
		// Si l'un des champs est vide 
		if ((     empty($adresse ) )||(empty($codePostal)) ||(empty($ville))    ) {
		   $erreurs_form_modif_infos_localisation[] = "Il faut remplir tour les champs SVP.";
		}
		else{
		
			$testCP = strlen($codePostal ) ;;
			if ( $testCP != 5 ) 
			{
				$erreurs_form_modif_infos_localisation[] = "Code postal invalide. (il doit faire comporter 5 chiffres)";
			}
			
			if ( intval($codePostal) == FALSE )
			{
				$erreurs_form_modif_infos_localisation[] = "Code postal invalide.";
			}
            
			if (empty($erreurs_form_modif_infos_localisation) ) { 	// cas OK  
			
				if(maj_infos_membre($_SESSION['id'],$adresse, $codePostal, $ville))
				{
					$_SESSION['adresse']=$adresse;
					$_SESSION['cp']=$codePostal;
					$_SESSION['ville']=$ville;
					$msg_confirm[] = "Votre adresse, votre code postal et votre ville ont &eacute;t&eacute; mises a jour.";
				}
				else {
				$erreurs_form_modif_infos_localisation[] = "contacter l'administrateur code erreur : AS005";
				}
			}
			
		}   
	}
	
	// Validation des champs suivant les r�gles en utilisant les donn�es du tableau $_POST
	$form_modif_infos->is_valid($_POST);
	if ($form_modif_infos->is_valid($_POST)) 
	{
		list($email, $suppr_avatar, $avatar) = $form_modif_infos->get_cleaned_data('email', 'suppr_avatar', 'avatar');
		// Si l'utilisateur veut modifier son adresse e-mail
		if (!empty($email)) {
			$test = maj_email_membre($_SESSION['id'], $email);
			if (true === $test) {
				// �� a march�  !
				$_SESSION['email']=$email;
				$msg_confirm[] = "Adresse e-mail mise a jour avec succ&eacute;s !";
				
	
			// Gestion des doublons
			} else {
				// Changement de nom de variable (plus lisible)
				$erreur =& $test;
				// On v�rifie que l'erreur concerne bien un doublon
				if (23000 == $erreur[0]) { // Le code d'erreur 23000 signifie "doublon" dans le standard ANSI SQL
	
					preg_match("`Duplicate entry '(.+)' for key \d+`is", $erreur[2], $valeur_probleme);
					$valeur_probleme = $valeur_probleme[1];
	
					if ($email == $valeur_probleme) {
	
						$erreurs_form_modif_infos[] = "Cette adresse e-mail est deja utilis&eacute;e.";
	
					} else {
	
						$erreurs_form_modif_infos[] = "Erreur ajout SQL : doublon non identifi&eacute; pr&eacute;sent dans la base de donn&eacute;es.";
					}
	
				} else {
	
					$erreurs_form_modif_infos[] = sprintf("Erreur ajout SQL : cas non trait&eacute; (SQLSTATE = %d).", $erreur[0]);
				}
	
			}
		}
		// Si l'utilisateur veut supprimer son avatar...
		if (!empty($suppr_avatar)) {
	        include CHEMIN_MODELE.'avatar.php';
			maj_avatar_membre($_SESSION['id'], '');
			$_SESSION['avatar'] = '';
	
			$msg_confirm[] = "Avatar supprim&eacute; avec succ&eacute;s !";
	
		// ... ou le modifier !
		} else if (!empty($avatar)) {
			$id_utilisateur =  $_SESSION['id'];
			// On souhaite utiliser la librairie Image
			include CHEMIN_LIB.'image.php';
            // maj_avatar_membre() est d�finit dans ~/modeles/avatar.php
			include CHEMIN_MODELE.'avatar.php'; 
			// Redimensionnement et sauvegarde de l'avatar
			$avatar = new Image($avatar);
			$avatar->resize_to(AVATAR_LARGEUR_MAXI, AVATAR_HAUTEUR_MAXI);
			$avatar_filename = DOSSIER_AVATAR.$id_utilisateur .'.'.strtolower(pathinfo($avatar->get_filename(), PATHINFO_EXTENSION));
		    $avatar->save_as($avatar_filename);
            // On veut utiliser le mod�le des visiteurs (~/modeles/visiteurs.php)
			// include CHEMIN_MODELE.'visiteurs.php';
			maj_avatar_membre($_SESSION['id'] , $avatar_filename);
			$_SESSION['avatar'] = $avatar_filename;
			$msg_confirm[] = "Avatar modifie avec succes !";
			
		}
	} else if ($form_modif_mdp->is_valid($_POST)) {
		// On v�rifie si les 2 mots de passe correspondent
		list($mdpNouveau,$mdp_verif,$mdp_ancien)= $form_modif_mdp->get_cleaned_data('mdp','mdp_verif','mdp_ancien');
		
		$vrif_mdp = verif_ancien_mdp($_SESSION['id']);
		$mdp_ancien_cript = sha1($mdp_ancien);
		$mdp_util_old =$vrif_mdp['mdp'];
		
		
		if ($mdpNouveau != $mdp_verif) {
				$erreurs_form_modif_mdp[] = "Les deux mots de passes entr&eacute;s sont diff&eacute;rents.";
		
		}
		else if ($mdp_util_old != $mdp_ancien_cript){
			
			$erreurs_form_modif_mdp[] = " l'ancien mots de passe entrer n'est pas correcte.";
		} else{
		// On veut utiliser le mod�le de l'inscription (~/modeles/visiteurs.php)
		//include CHEMIN_MODELE.'visiteurs.php';
		
			// C'est bon, on peut modifier la valeur dans la BDD
				maj_mdp_membre($_SESSION['id'], sha1($mdpNouveau));
				$msg_confirm[] = "Votre mot de passe a &eacute;t&eacute; modifi&eacute; avec succ&eacute;s.";
		}
	}
}

// Affichage des formulaires de modification du profil
include CHEMIN_VUE.'formulaires_modifier_profil.php';