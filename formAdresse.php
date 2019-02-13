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
		//cp
		$req = "SELECT cp FROM User WHERE id = ".$_SESSION['numClient'].";";
		$result = mysqli_query($conn, $req);
		$row = mysqli_fetch_assoc($result);
		foreach ($row as $valeur) {
		$cp = $valeur;
				}
								
		//ville
		$req = "SELECT ville FROM User WHERE id = ".$_SESSION['numClient'].";";
		$result = mysqli_query($conn, $req);
		$row = mysqli_fetch_assoc($result);
		foreach ($row as $valeur) {
		$ville = $valeur;
				}
								
		//adresse
		$req = "SELECT adresse FROM User WHERE id = ".$_SESSION['numClient'].";";
		$result = mysqli_query($conn, $req);
		$row = mysqli_fetch_assoc($result);
		foreach ($row as $valeur) {
		$adresse = $valeur;
		}
				
				
		echo '
		<div id = "corps">
		<form action = "verifAdresse.php" method = "POST" onsubmit="return verifForm(this)">
		<fieldset>
		<legend>Modification adresse de livraison</legend>
		<table>
			<tr>
				<td>Code postal : </td>
				<td><input type = "text" name = "cp" id = "cp" value = "'.$cp.'"  onblur="verifCP(this)" required style = "font-family: Farsan, cursive; Font-Weight: Bold;"></td>
			</tr>
			<tr>
				<td>Ville : </td>
				<td><input type = "text" name = "ville" id = "ville" value = "'.$ville.'"  onblur="verifPseudo(this)" required style = "font-family: Farsan, cursive; Font-Weight: Bold;"></td>
			</tr>
			<tr>
				<td>Adresse : </td>
				<td><input type = "text" name = "adresse" id = "adresse" value = "'.$adresse.'"  onblur="verifPseudo(this)" required style = "font-family: Farsan, cursive; Font-Weight: Bold;"></td>
			</tr>
			</table>
		<input type = "submit" value ="Modifier" style = "font-family: Acme, sans-serif">
		</fieldset>
	</form>
	';}
