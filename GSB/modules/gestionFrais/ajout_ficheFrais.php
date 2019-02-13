<?php
// error_reporting(0);  // Suppression warning
// Vérification des droits d'accès de la page
if (!utilisateur_est_connecte()) {
	include CHEMIN_VUE."erreur_non_connecte.php";
	exit(0);
}
	// Ne pas oublier d'inclure la librarie Form
	include CHEMIN_LIB.'form.php';
	
	// "formulaire_inscription" est l'ID unique du formulaire
	$form_ajoutHorsForfait = new Form('form_ajoutHorsForfait');

	$form_ajoutHorsForfait->method('POST');

	$form_ajoutHorsForfait->add('Text','date')
	                ->Required(true)
	                ->label("Date (jj/mm/aaaa) :");
					 
	$form_ajoutHorsForfait->add('Text','libelle')
	                ->Required(true)
	                ->label("Libelle :");
					
	$form_ajoutHorsForfait->add('Text','montant')
	                ->Required(true)
	                ->label("Montant : ");						
									

	$form_ajoutHorsForfait->add('Submit', 'submit')
	                ->value("Valider");
	
		

	// "formulaire_inscription" est l'ID unique du formulaire
	$form_ajoutForfait = new Form('form_ajoutForfait');

	$form_ajoutForfait->method('POST');
	
	$form_ajoutForfait->add('Text','mois')
	                ->Required(true)
	                ->label("Mois : ");
	$form_ajoutForfait->add('Text','nuitRepas')
	                ->Required(true)
	                ->label("Forfait étape ");
					 
	$form_ajoutForfait->add('Text','kilo')
	                ->Required(true)
	                ->label("Frais kilométrique");
					
	$form_ajoutForfait->add('Text','nuits')
	                ->Required(true)
	                ->label("Nuitée hôtel ");						
									
	$form_ajoutForfait->add('Text','repas')
	                ->Required(true)
	                ->label("Repas restaurant ");

	$form_ajoutForfait->add('Submit', 'submit')
	                ->value("Valider les modifications");
	/*
	
	*/	
	
	
	
	
	  // Affichage du formulaire inscription
	  include CHEMIN_VUE.'formulaire_ajout_ficheFrais.php';
	  
	  
	  // Tentative d'ajout du membre dans la base de données
		
		$nuitRepas = $form_ajoutForfait->get_bounded_data('nuitRepas');
		$kilo = $form_ajoutForfait->get_bounded_data('kilo');
		$nuits =$form_ajoutForfait->get_bounded_data('nuits');
		$repas = $form_ajoutForfait->get_bounded_data('repas');
		$mois = $form_ajoutForfait->get_bounded_data('mois');
		
		$date = $form_ajoutHorsForfait->get_bounded_data('date');
		$libelle = $form_ajoutHorsForfait->get_bounded_data('libelle');
		$montant = $form_ajoutHorsForfait->get_bounded_data('montant');
		
		
		$ajout_fichefrais = ajout_fichefrais($nuitRepas, $kilo, $nuits, $repas, $mois);

		?>
     
