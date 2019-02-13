<?php
session_start();
	include 'connect.php';
	
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$telephone = $_POST['telephone'];
	$mail = $_POST['mail'];
	
	$req = "UPDATE User SET nom = '".$nom."', prenom = '".$prenom."', telephone = '".$telephone."', mail = '".$mail."' WHERE id = '".$_SESSION['numClient']."';"; 
	
	if(isset($mail))
	{ 
		$result = mysqli_query($conn, $req);
		header("location: compte.php");
	}
	else
	{
		header("location: accueil.php");
	}
		