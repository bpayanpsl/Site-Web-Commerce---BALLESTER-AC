<?php
session_start();
	include 'connect.php';
	
	$adresse = $_POST['adresse'];
	$cp = $_POST['cp'];
	$ville = $_POST['ville'];
	
	$req = "UPDATE User SET adresse = '".$adresse."', cp = '".$cp."', ville = '".$ville."' WHERE id = '".$_SESSION['numClient']."';"; 
	
	if(isset($cp))
	{ 
		$result = mysqli_query($conn, $req);
		header("location: compte.php");
	}
	else
	{
		header("location: accueil.php");
	}