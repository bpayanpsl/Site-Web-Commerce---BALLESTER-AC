<?php
	$_SESSION['code'] = $_GET['choice_1'];
	$code = $_SESSION['code'];
	
	include 'connect.php';
	include 'haut.php';
	include 'menu.php';
	
	$reqId = "SELECT id FROM Commande WHERE code = '".$code."'";
	$resultId = mysqli_query($conn, $reqId);
	$row = mysqli_fetch_assoc($resultId);
	foreach ($row as $valeur) {
	$id = $valeur;
	}
	$reqCommande = "UPDATE Commande SET Etat = 'ANN' WHERE id = '".$id."'";

	$resultCommande = mysqli_query($conn, $reqCommande);
	
	echo "Commande annulée avec succés.<br>";
	echo "<a href = 'compte.php'><- Retour</a>";  
	
	include 'bas.php';