<?php
	$_SESSION['prod'] = $_GET['choice_1'];
	$prod = $_SESSION['prod'];
	include 'connect.php';
	include 'haut.php';
	include 'menu.php';
	$req = mysqli_query($conn,"SELECT * FROM Produit WHERE idCategorie = ".$prod."");
	$tab = array('id','reference','image','nom','prix');
	$rowCount = mysqli_num_rows($req);
?>
<div id = "corps">
<div id = "tabProd">
<?php 
	if($rowCount >= 1)
	{
		echo "<table>";
		echo "<tr><td>ID</td><td>Image</td><td>Nom</td><td>Prix</td><td>Ajout panier</td>";
		while($dat = mysqli_fetch_assoc($req)){
			$tab[0] = $dat['id'];
			//$tab[1] = $dat['reference'];
			$tab[1] = $dat['image'];
			$tab[2] = $dat['nom'];
			$tab[3] = $dat['prix'];
			echo "<tr><td>".$tab[0]."</td>";
			//echo "<td>".$tab[1]."</td>";
			echo "<td><img src='".$tab[1]."'></td>";
			echo "<td>".$tab[2]."</td>";
			echo "<td>".$tab[3]."€</td>";
			echo "<td><a href='panier.php?action=ajout&amp;l=".$tab[2]."&amp;q=1&amp;p=".$tab[3]."'><img src = 'ajout-panier.jpg'></a></td></tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "Aucun produit ne correspond à la recherche.";
	}
?>
</div>
</div>
<?php
	include 'bas.php';
?>