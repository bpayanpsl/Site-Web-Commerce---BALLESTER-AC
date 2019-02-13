<h2>Connexion au site</h2>
<?php
if (!empty($erreurs_connexion)) {
  echo "<div class='row'>
        <div class='large-12 columns'>";
	foreach($erreurs_connexion as $e) {
			echo 	'<div class="row">
					<div class="large-12 columns">
						<li>'.$e.'</li>
					</div></div>'."\n";
	}
	echo '</ul>';
	echo "</div> </div>";
}
?>

<?php
echo $form_connexion;