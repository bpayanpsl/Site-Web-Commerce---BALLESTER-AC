<?php
session_start();
	include 'connect.php';
	
	$oldpw = $_POST['oldpw'];
	$newpw = $_POST['newpw'];
	$newpw2 = $_POST['newpw2'];
		
	if(isset($oldpw))
	{
		$req1 = "SELECT mdp FROM User WHERE id = '".$_SESSION['numClient']."';";
		$req2 = "UPDATE User SET mdp = '".$newpw."' WHERE id = '".$_SESSION['numClient']."';";
		
		echo $req1;
		echo $req2;
		
		$result1 = mysqli_query($conn, $req1);
		$row = mysqli_fetch_assoc($result1);
		foreach ($row as $valeur) {
			$res1 = $valeur;}
			
		if(($res1 == $oldpw)&&($newpw == $newpw2))
		{
			$result2 = mysqli_query($conn, $req2);
		}
		header('location:compte.php');
	}
	else
	{
		header('location:accueil.php');
	}
?>