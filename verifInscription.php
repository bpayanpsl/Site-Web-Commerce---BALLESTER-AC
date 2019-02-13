<?php
session_start();
	include 'connect.php';
	
	$id = $_POST['id'];
	$mdp = $_POST['mdp'];
	$nom = $_POST['nom'];
	$adresse = $_POST['adresse'];
	$cp = $_POST['cp'];
	$ville = $_POST['ville'];
	$prenom = $_POST['prenom'];
	$telephone = $_POST['telephone'];
	$mail = $_POST['mail'];
	
	if(isset($mail))
	{
		//login existant ?
		$reqLogin = 'SELECT * FROM user WHERE login = "'.$id.'";';
		$resultLogin = mysqli_query($conn,$reqLogin);
		if(mysqli_fetch_assoc($resultLogin))
		{
			echo "Login déjà pris.";
		}
		else
		{
			echo "Inscription réussie";
			$req = 'INSERT INTO User (nom, prenom, adresse, cp , ville, telephone, mail, login, mdp) VALUES ("'.$nom.'", "'.$prenom.'", "'.$adresse.'", "'.$cp.'", "'.$ville.'", "'.$telephone.'", "'.$mail.'", "'.$id.'", "'.$mdp.'");';
			$result = mysqli_query($conn,$req);
		}
		header("location: accueil.php");
	}
	else
	{
		header("location: accueil.php");
	}