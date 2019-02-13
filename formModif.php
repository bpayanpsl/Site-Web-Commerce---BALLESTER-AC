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
		//nom
		$req = "SELECT nom FROM User WHERE id = ".$_SESSION['numClient'].";";
		$result = mysqli_query($conn, $req);
		$row = mysqli_fetch_assoc($result);
		foreach ($row as $valeur) {
		$nom = $valeur;
		}
							
		//prenom
		$req = "SELECT prenom FROM User WHERE id = ".$_SESSION['numClient'].";";
		$result = mysqli_query($conn, $req);
		$row = mysqli_fetch_assoc($result);
		foreach ($row as $valeur) {
		$prenom = $valeur;
		}
		
		//telephone
		$req = "SELECT telephone FROM User WHERE id = ".$_SESSION['numClient'].";";
		$result = mysqli_query($conn, $req);
		$row = mysqli_fetch_assoc($result);
		foreach ($row as $valeur) {
		$telephone = $valeur;
		}
							
		//mail
		$req = "SELECT mail FROM User WHERE id = ".$_SESSION['numClient'].";";
		$result = mysqli_query($conn, $req);
		$row = mysqli_fetch_assoc($result);
		foreach ($row as $valeur) {
		$mail = $valeur;
				}

		echo '
		<div id = "corps">
		<form action = "verifModif.php" method = "POST" onsubmit="return verifForm(this)">
		<fieldset>
			<legend>Modification des informations personnelles</legend>
			<table>				
			<tr>
				<td>Nom : </td>
				<td><input type = "text" name = "nom" id = "nom" value = "'.$nom.'"  onblur="verifPseudo(this)" required style = "font-family: Farsan, cursive; Font-Weight: Bold;"><td>
			</tr>
			<tr>
				<td>Prénom : </td>
				<td><input type = "text" name = "prenom" id = "prenom" value = "'.$prenom.'"  onblur="verifPseudo(this)" required style = "font-family: Farsan, cursive; Font-Weight: Bold;"></td>
			</tr>
			<tr>
				<td>Téléphone : </td>
				<td><input type = "text" name = "telephone" id = "telephone" value = "'.$telephone.'"  onblur="verifTel(this)" required style = "font-family: Farsan, cursive; Font-Weight: Bold;"></td>
			</tr>
			<tr>
				<td>Adresse eMail : </td>
				<td><input type = "text" name = "mail" id = "mail" value = "'.$mail.'"  onblur="verifMail(this)" required style = "font-family: Farsan, cursive; Font-Weight: Bold;"></td>
			</tr>
		</table>
		<input type = "submit" value ="Modifier" style = "font-family: Acme, sans-serif">
		</fieldset>
	</form>
	';}
