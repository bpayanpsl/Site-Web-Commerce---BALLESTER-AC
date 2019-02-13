<?php
include 'connect.php';
include 'haut.php';
include 'menu.php';


	$reqContient = "select Commande.code, Produit.nom, Contient.quantite FROM Commande INNER JOIN Contient ON Commande.id = Contient.idCommande INNER JOIN Produit ON idProduit = Produit.id where Commande.idUser = 1;";
	$resultContient = mysqli_query($conn, $reqContient);
	$tabContient = array('code', 'nom', 'quantite');
	$rowCount = mysqli_num_rows($resultContient);
	if($rowCount >= 1)
	{
		echo "<fieldset><legend>Mes commandes</legend>";
		echo "<table>";
		echo "<tr><td>Code Commande</td><td>Produit</td><td>Quantité</td>";
		while($dat = mysqli_fetch_assoc($resultContient)){
		//$tab[0] = $dat['id'];
		//$tab[1] = $dat['reference'];
		$tab[1] = $dat['code'];
		$tab[2] = $dat['nom'];
		$tab[3] = $dat['quantite'];
		
		echo "<tr><td>".$tab[1]."</td>";
		//echo "<td>".$tab[1]."</td>";
		echo "<td>".$tab[2]."</td>";
		echo "<td>".$tab[3]."</td>";
		echo "</tr>";
		}
	}
	echo "</table>";
	echo "</fieldset>";
	echo "<a href = 'http://ballester-ac.pe.hu/compte.php'><- Retour</a>";

include 'bas.php';	
?>
