<?php
	include 'haut.php';
	include 'menu.php';
	include 'functionJS.php';
if ($_SESSION['isConnected'] == 1)
{
	header('location: accueil.php');
}
else
{
	?>
	<div id = "corps">	
	<div id = "formInscription">
	<center>
	<form action = "verifInscription.php"  method = "POST" onsubmit="return verifForm(this)">
		<fieldset>
		<legend>Inscription</legend>
		<table>
			<tr>
				<td>Identifiant : </td>
				<td><input type = "text" name = "id" id = "id" onblur="verifPseudo(this)" required style = "font-family: 'Farsan', cursive; Font-Weight: Bold;"></td>
			</tr>
			<tr>
				<td>Mot de passe : </td>
				<td><input type = "password" name = "mdp" id = "mdp" onblur="verifMdp(this)" required style = "font-family: 'Farsan', cursive; Font-Weight: Bold;"></td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>Nom : </td>
				<td><input type = "text" name = "nom" id = "nom" onblur="verifPseudo(this)" required style = "font-family: 'Farsan', cursive; Font-Weight: Bold;"><td>
			</tr>
			<tr>
				<td>Prénom : </td>
				<td><input type = "text" name = "prenom" id = "prenom" onblur="verifPseudo(this)" required style = "font-family: 'Farsan', cursive; Font-Weight: Bold;"></td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>Adresse : </td>
				<td><input type = "text" name = "adresse" id = "adresse" onblur="verifPseudo(this)" required style = "font-family: 'Farsan', cursive; Font-Weight: Bold;"></td>
			</tr>
			<tr>
				<td>Code postal : </td>
				<td><input type = "text" name = "cp" id = "cp" onblur="verifCP(this)" required style = "font-family: 'Farsan', cursive; Font-Weight: Bold;"></td>
			</tr>
			<tr>
				<td>Ville : </td>
				<td><input type = "text" name = "ville" id = "ville" onblur="verifPseudo(this)" required style = "font-family: 'Farsan', cursive; Font-Weight: Bold;"></td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>Téléphone : </td>
				<td><input type = "text" name = "telephone" id = "telephone" onblur="verifTel(this)" required style = "font-family: 'Farsan', cursive; Font-Weight: Bold;"></td>
			</tr>
			<tr>
				<td>Adresse eMail : </td>
				<td><input type = "text" name = "mail" id = "mail" onblur="verifMail(this)" required style = "font-family: 'Farsan', cursive; Font-Weight: Bold;"></td>
			</tr>
		</table>
		<input type = "submit" value ="Inscription" style = "font-family: 'Acme', sans-serif">
		</fieldset>
	</form>
	</center>
	</div>
	</div>
	<?php
}
include 'bas.php';
?>