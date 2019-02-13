<?php
// error_reporting(0);  // Suppression warning
// Vérification des droits d'accès de la page
if (utilisateur_est_connecte()) {
	// On affiche la page d'erreur comme quoi l'utilisateur est déjà connecté   
	include CHEMIN_VUE.'erreur_deja_connecte.php';
	
} 
else 
{
	$inscription_effectuee = false;
	// Ne pas oublier d'inclure la librarie Form
	include CHEMIN_LIB.'form.php';
	
	// "formulaire_inscription" est l'ID unique du formulaire
	$form_inscription = new Form('formulaire_inscription');

	$form_inscription->method('POST');

	$form_inscription->add('Text','nom')
	                ->Required(true)
	                ->label("Votre nom d'utilisateur*");
					 
	$form_inscription->add('Text','prenom')
	                ->Required(true)
	                ->label("Votre prénom d'utilisateur*");
			
	$form_inscription->add('Text','dateEmb')
	                ->Required(true)
	                ->label("Votre date d'embauche <br />(au format AAAA-MM-JJ)*");						
									
	$form_inscription->add('Text','adresse')
	                ->Required(true)
	                ->label("Votre adresse*");
		
	$form_inscription->add('Text','ville')
	                ->Required(true)
	                ->label("Votre ville*");				 
						 
	$form_inscription->add('Text','codePostal')
	                ->Required(true)
	                ->label("Votre code postal*");


	$form_inscription->add('Password','mdp')
	                ->Required(true)
	                ->label("Votre mot de passe*");

	$form_inscription->add('Password','mdp_verif')
	                ->Required(true)
	                ->label("Votre mot de passe* (vérification)");

	$form_inscription->add('Email','email')
	                ->Required(true)
	                ->label("Votre adresse email*"); 
	
	$form_inscription->add('File', 'avatar')
					->filter_extensions('jpg', 'png', 'gif')
	                ->max_size(8192) // 8 Kb
	                ->label("Votre avatar (facultatif)")
	                ->Required(false);
	
	$form_inscription->add('Radio', 'fonction')
					->choices(array('v' => 'Visiteur', 'c' => 'Comptable','a' => 'Administrateur'))
					->Required(true)
					->label("Votre fonction* :"); 

	$form_inscription->add('Submit', 'submit')
	                ->value("Je veux m'inscrire !");
									
	// Pré-remplissage avec les valeurs précédemment entrées (s'il y en a)
	$form_inscription->bound($_POST);

	// Création d'un tableau des erreurs
	$erreurs_inscription = array();
	// Validation des champs suivant les règles en utilisant les données du tableau $_POST
	$form_inscription->is_valid($_POST);
	if ($form_inscription->is_valid($_POST)) { 
		// On vérifie si les 2 mots de passe correspondent
		$mdp1 =  $form_inscription->get_bounded_data('mdp'); 
		$mdp2 = $form_inscription->get_bounded_data('mdp_verif');
		if ( $mdp1 != $mdp2 ) {
			//$erreurs_inscription[] = "Les deux mots de passes entr&eacute;s sont diff&eacute;rents !";
		}
    
	
	$sous_chaine = array();//creation d'une variable qui contindrat les donnée a tester 
		 $sous_chaine[1]=substr($form_inscription->get_bounded_data('dateEmb'),0,4) ;
		 $sous_chaine[2]=substr($form_inscription->get_bounded_data('dateEmb'),5,2) ;
		 $sous_chaine[3]=substr($form_inscription->get_bounded_data('dateEmb'),8,2) ;
		 
		 $resultSsAr=array();//tableau de teste de donner 
		 $resultSsAr[1] =intval($sous_chaine[1]);
		 $resultSsAr[2] =intval($sous_chaine[2]);
		 $resultSsAr[3] =intval($sous_chaine[3]);
		 $resultSsAr[4] =strlen($form_inscription->get_bounded_data('dateEmb')) ;
		 
		 $int_cp = array();//tableau de teste de donner 
		 $int_cp[1] = intval($form_inscription->get_bounded_data('codePost'));
		 $int_cp[2] =  strlen($form_inscription->get_bounded_data('codePost'));
		 
		 //exploitation des resultat des donner 
	if ($resultSsAr[4] > 10){// Verification de la vailiditer du date d'emboche modification du 06/02/2012
	
		$erreurs_inscription[] = "Le format de la date d'emboche et incorecte elle doit etre du type yyyy-mm-jj ! ";
	
	}
	if( $resultSsAr[1]== false|| $resultSsAr[2]== false|| $resultSsAr[3] == false){// Verification de la vailiditer du code postale modification du 03/02/2012
		
		
		$erreurs_inscription[] = "La date d'emboche et incorecte la date ne doit pas contenire des lettre ! et elle doit etre du type AAAA-MM-JJ ";
		
	}
	
	if ($resultSsAr[1] <1977 ){
		$erreurs_inscription[] = "la date d''emboche ne peut pas etre inferieur a 1977 merci !";
	}
	if ( $int_cp == false){
	
		$erreurs_inscription[] = "Code Postale invalide  elle ne doit pas contenire des lettre ! ";
		
	}
	if($int_cp[2] > 5){
	
		$erreurs_inscription[] = "Code Postale invalide ! ";
		
	}
	}
	
	// fin des modification du 28/02/2012 par gerg 
	
	
	// Si d'autres erreurs ne sont pas survenues
	if ((empty($erreurs_inscription) &&  (! empty( $mdp1)))) {
	
	//list($nom, $prenom,$dateEmb,$adresse,$codePostal,$ville, $mdp, $email, $avatar,$login) =
		//	  $form_inscription->get_cleaned_data('nom', 'prenom','dateEmb','adresse','codePost','ville', 'mdp', 'email', 'avatar','fonction');

	
		// Tentative d'ajout du membre dans la base de données
		
		$nom = $form_inscription->get_bounded_data('nom');
		$prenom = $form_inscription->get_bounded_data('prenom');
		$dateEmb =$form_inscription->get_bounded_data('dateEmb');
		
		$email = $form_inscription->get_bounded_data('email');
		$adresse = $form_inscription->get_bounded_data('adresse');
		$codePostal = $form_inscription->get_bounded_data('codePostal');
		$ville = $form_inscription->get_bounded_data('ville');
		$avatar = $form_inscription->get_bounded_data('avatar');
		$mdp = $form_inscription->get_bounded_data('mdp');
		$login = $form_inscription->get_bounded_data('fonction'); 
		
		// Tiré de la documentation PHP sur <http://fr.php.net/uniqid>
		$hashvalidation = md5(uniqid(rand(), true));

		include CHEMIN_MODELE.'inscription.php';

		// ajouter_membre_dans_bdd() est défini dans ~/modeles/inscription.php
		// Redimensionnement et sauvegarde de l'avatar (eventuel) dans le bon dossier
		
		$id_utilisateur = ajouter_membre_dans_bdd($nom, $prenom,$dateEmb, $login, sha1($mdp), $adresse, $codePostal, $ville,  $email, $hashvalidation);
		
		if (!empty($avatar)) {
			// On souhaite utiliser la librairie Image
			include CHEMIN_LIB.'image.php';
			// Redimensionnement et sauvegarde de l'avatar
			 $avatar = new Image($avatar);
			 $avatar->resize_to(AVATAR_LARGEUR_MAXI, AVATAR_HAUTEUR_MAXI); 
			 $avatar_filename = DOSSIER_AVATAR.$id_utilisateur .'.'.strtolower(pathinfo($avatar->get_filename(), PATHINFO_EXTENSION));
			 $avatar->save_as($avatar_filename);

			// Mise à jour de l'avatar dans la table
			// maj_avatar_membre() est défini dans ~/modeles/avatar.php
			include CHEMIN_MODELE.'avatar.php';
			maj_avatar_membre($id_utilisateur , $avatar_filename);
		}
		// Si la base de données a bien voulu ajouter l'utilisateur (pas de doublons)
		$isarray = gettype($id_utilisateur);
		if ($isarray == 'string'){
		// Preparation du mail
		$message_mail = '<html><head></head><body>
		<p>Merci de vous etre inscrit sur le site du Laboratoire Galaxy-Swiss Bourdin</p>
		<p>Veuillez cliquer sur <a href="'.$_SERVER['PHP_SELF'].'?module=visiteurs&amp;action=valider_compte&amp;hash='.$hashvalidation.'">ce lien</a> pour activer votre compte !</p>
		</body></html>';
		
		$headers_mail  = 'MIME-Version: 1.0'                           ."\r\n";
		$headers_mail .= 'Content-type: text/html; charset=utf-8'      ."\r\n";
		$headers_mail .= 'From: "Mon site" <contact@monsite.com>'      ."\r\n";
		
		// Envoi du mail (mis en commentaire pour les tests en local)
		// mail($form_inscription->get_cleaned_data('email'), 'Inscription sur <monsite.com>', $message_mail, $headers_mail);
		echo "<p>$id_utilisateur , bienvenue sur le site du Laboratoire Galaxy-Swiss Bourdin</p><br/>";
		echo "Entete message:  $headers_mail<br />";
		echo "Contenu message: $message_mail<br />";
		
		// Affichage de la confirmation de l'inscription
		include CHEMIN_VUE.'inscription_effectuee.php';
		$inscription_effectuee = true;
	} else { 
		if ($form_inscription->is_valid($_POST)) { 
			// Gestion des doublons
			$erreur =& $id_utilisateur; // Changement de nom de variable (plus lisible)
			// On vérifie que l'erreur concerne bien un doublon
			if (23000 == $erreur[0]) {  
			    // Le code d'erreur 23000 siginife "doublon" dans le standard ANSI SQL
				preg_match("`Duplicate entry '(.+)' for key \d+`is", $erreur[2], $valeur_probleme);
				$erreurs_inscription[] = "Cette adresse e-mail ou ce même nom et prénom sont d&eacute;ja utilis&eacute;s.";
				//	include CHEMIN_VUE.'inscription_non_effectuee.php';
				if (isset ($valeur_probleme[1]))
				{ 
					$erreurs_inscription[] = $valeur_probleme[1];
				}
				
			} else {

				$erreurs_inscription[] = "Erreur ajout SQL : cas non trait&eacute; (SQLSTATE = %d) $erreur[0]";
	  		}
                }
	   }

	}
	if (! $inscription_effectuee) {
	  // Affichage du formulaire inscription
	  include CHEMIN_VUE.'formulaire_inscription.php';
	}
}