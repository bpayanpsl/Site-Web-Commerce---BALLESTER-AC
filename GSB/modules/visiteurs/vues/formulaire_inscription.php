<h2>Inscription au site</h2>
<?php
if (!empty($erreurs_inscription))
 {
	echo '<ul>'."\n";
	foreach($erreurs_inscription as $e) {
		echo '	<li>'.$e.'</li>'."\n";
	}
	echo '</ul>';
}



$form_inscription->fieldsets(array("Saisie de vos informations personnelles " => array('nom' ,'prenom','dateEmb','fonction', 'adresse', 'ville', 'codePostal', 'mdp','mdp_verif', 'email', 'avatar','hdn')));
echo $form_inscription;

echo "<li> * champs obligatoire</li>"; 