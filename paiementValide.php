<?php
	include 'connect.php';
	include 'haut.php';
	include 'menu.php';
	include_once("function-panier.php");
	
	$char = 'abcdefghijklmnopqrstuvwxyz0123456789';
	$code = str_shuffle($char);
	$req = "INSERT INTO Commande (idUser, code, prix, etat) VALUES ('".$_SESSION['numClient']."', '".$code."', '".$_SESSION['montantTotal']."', 'ATT');";
	
	$result = mysqli_query($conn, $req);
	echo "<div id ='corps'>";
	if(!$result)
	{
		echo "Echec lors de l'enregistrement de la commande</br>";
		?><a href = "http://ballester-ac.pe.hu/accueil.php">Retour à l'accueil</a><?php
	}
	else
	{
		//Recupération de l'id de la commande
		$reqCommande = "SELECT id FROM Commande WHERE code = '".$code."'";
		$resultCommande = mysqli_query($conn, $reqCommande);
		while($rowCommande = mysqli_fetch_assoc($resultCommande))
		{
			$idCommande = $rowCommande['id'];
		}
		
		//Récuparation des id de produit de la commande
		$nbArticles=count($_SESSION['panier']['libelleProduit']);
		for ($i=0 ;$i < $nbArticles ; $i++)
		{
			$quantite = $_SESSION['panier']['qteProduit'][$i];
			$valeur = $_SESSION['panier']['libelleProduit'][$i];	
			$reqId = "SELECT id FROM Produit WHERE nom = '".$valeur."'";	
			$resultId = mysqli_query($conn, $reqId);
			while($row = mysqli_fetch_assoc($resultId))
			{
				$id = $row['id'];
			}
			$req2 = "INSERT INTO Contient (idCommande, idProduit, quantite) VALUES ('".$idCommande."','".$id."',".$quantite.")";
			$result2 = mysqli_query($conn, $req2);
		}
		echo "Paiement reussi. Merci de votre confiance.</br>";
		echo "Votre commande a bien ete enregistree</br>";
		?><a href = "http://ballester-ac.pe.hu/accueil.php">Retour à l'accueil</a><?php
	}
	echo "</div>";
	supprimePanier();
	include 'bas.php';
	?>
	