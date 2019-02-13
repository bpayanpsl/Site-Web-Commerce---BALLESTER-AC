<?php
	include 'haut.php';
	include 'menu.php';
	if ($_SESSION['isConnected'] == 1)
{
	header('location: accueil.php');
}
else
{
	?>
	<div id = "corps">	
	<div id = "formConnexion">
	<center>
	<form action="verifConnexion.php" method="post">
		<fieldset>
			<legend>Connexion</legend>
			<table>
				<tr>
					<td>Identifiant : </td>
					<td><input type = "text" name="id" required style = "font-family: 'Farsan', cursive; Font-Weight: Bold;"></td>
				</tr>
				<tr>
					<td>Mot de passe : </td>
					<td><input type = "password" name = "mdp" required style = "font-family: 'Farsan', cursive; Font-Weight: Bold;"></td>
				</tr>
			</table>
			<input type = "submit" value = "Connexion"><br>
			<a href = "formInscription.php">Vous n'êtes pas encore inscrit ?</a>
		</fieldset>
	</form>
	</center>
	</div>
	</div>
	<?php
}
include 'bas.php';
?>
				