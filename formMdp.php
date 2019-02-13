<?php
	include 'connect.php';
	include 'haut.php';
	include 'menu.php';
	include 'functionJS.php';
	if ($_SESSION['isConnected'] == 0)
	{
		header('location: formConnexion.php');
	}
	else
	{
		?>
		<div id = "corps">
		<form action = "verifMdp.php" method = "POST" onsubmit="return verifForm(this)">
		<fieldset>
			<legend>Changer de mot de passe</legend>
			<table>
				<tr>
					<td>Ancien mot de passe :</td>
					<td><input type = "password" name = "oldpw" onblur="verifPseudo(this)" required style = "font-family: 'Farsan', cursive; Font-Weight: Bold;"></td>
				</tr>
				<tr>
					<td>Nouveau mot de passe : </td>
					<td><input type = "password" name = "newpw" onblur="verifPseudo(this)" required style = "font-family: 'Farsan', cursive; Font-Weight: Bold;"></td>
				</tr>
				<tr>
					<td>Saisir à nouveau le mot de passe : </td>
					<td><input type = "password" name = "newpw2" onblur="verifPseudo(this)" required style = "font-family: 'Farsan', cursive; Font-Weight: Bold;"></td>
				</tr>
			</table>
			<input type ="submit" value = "Changer">
		</fieldset>
		</form>
		</div>
		<?php
}?>