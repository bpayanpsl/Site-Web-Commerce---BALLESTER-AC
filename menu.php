<div id = "connectBar">
	<?php
	if (!isset($_SESSION['isConnected']))
	{
		$_SESSION['isConnected'] = 0;
	}
	if ($_SESSION['isConnected'] == 0)
	{
		echo '<a href = "formConnexion.php">Connexion</a>  |  <a href = "formInscription.php">Inscription</a>';
	 }
	else
	{
		echo "Bonjour ".$_SESSION['identifiant']." | ";
		echo '<a href = "deconnexion.php">Déconnexion</a>';
    } ?>
</div>
<div id = "menu">
	<table>
		<tr>
			<td>
				<a href = "accueil.php">Accueil</a>
			</td>
			<td>
				<a href = "produit.php">Produits</a>
			</td>
			<td>
				<a href = "contact.php">Contact</a>
			</td>
			<td>
				<a href = "compte.php">Compte</a>
			</td>
			<td>
				<a href = "panier.php">Panier</a>
			</td>
		</tr>
	</table>
</div>