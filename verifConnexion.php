<?php
session_start();
	include 'connect.php';
	
	$id = $_POST['id'];
	$mdp = $_POST['mdp'];
	$num = 0;
	if(isset($id))
	{
		$req = 'SELECT id FROM User WHERE login = "'.$id.'" AND mdp = "'.$mdp.'";';
		echo $req;
		$result = mysqli_query($conn, $req);
		$row = mysqli_fetch_assoc($result);
		if(isset($row))
		{
			foreach ($row as $valeur) {
			$num = $valeur;}
			$_SESSION['isConnected'] = 1;
			$_SESSION['identifiant'] = $id;
			$_SESSION['numClient'] = $num;
			echo $_SESSION['numClient'];
		}
		header("location: accueil.php");
	}
	else
	{
		header("location: formConnexion.php");
	}