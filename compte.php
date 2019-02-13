<?php
	include 'connect.php';
	include 'haut.php';
	include 'menu.php';
	if ($_SESSION['isConnected'] == 0)
	{
		header('location: formConnexion.php');
	}
	else
	{
				//nom
				$req = "SELECT nom FROM User WHERE id = ".$_SESSION['numClient'].";";
				$result = mysqli_query($conn, $req);		
				$row = mysqli_fetch_assoc($result);
				foreach ($row as $valeur) {
				$nom = $valeur;
				}
							
				//prenom
				$req = "SELECT prenom FROM User WHERE id = ".$_SESSION['numClient'].";";
				$result = mysqli_query($conn, $req);
				$row = mysqli_fetch_assoc($result);
				foreach ($row as $valeur) {
				$prenom = $valeur;
				}
				
				//adresse
				$req = "SELECT adresse FROM User WHERE id = ".$_SESSION['numClient'].";";
				$result = mysqli_query($conn, $req);
				$row = mysqli_fetch_assoc($result);
				foreach ($row as $valeur) {
				$adresse = $valeur;
				}
							
				//cp
				$req = "SELECT cp FROM User WHERE id = ".$_SESSION['numClient'].";";
				$result = mysqli_query($conn, $req);
				$row = mysqli_fetch_assoc($result);
				foreach ($row as $valeur) {
				$cp = $valeur;
				}
								
				//ville
				$req = "SELECT ville FROM User WHERE id = ".$_SESSION['numClient'].";";
				$result = mysqli_query($conn, $req);
				$row = mysqli_fetch_assoc($result);
				foreach ($row as $valeur) {
				$ville = $valeur;
				}
								
				//telephone
				$req = "SELECT telephone FROM User WHERE id = ".$_SESSION['numClient'].";";
				$result = mysqli_query($conn, $req);
				$row = mysqli_fetch_assoc($result);
				foreach ($row as $valeur) {
				$telephone = $valeur;
				}
							
				//mail
				$req = "SELECT mail FROM User WHERE id = ".$_SESSION['numClient'].";";
				$result = mysqli_query($conn, $req);
				$row = mysqli_fetch_assoc($result);
				foreach ($row as $valeur) {
				$mail = $valeur;
				}
								
				//login
				$req = "SELECT login FROM User WHERE id = ".$_SESSION['numClient'].";";
				$result = mysqli_query($conn, $req);
				$row = mysqli_fetch_assoc($result);
				foreach ($row as $valeur) {
				$login = $valeur;
				}
								
				//mdp
				$req = "SELECT mdp FROM User WHERE id = ".$_SESSION['numClient'].";";
				$result = mysqli_query($conn, $req);
				$row = mysqli_fetch_assoc($result);
				foreach ($row as $valeur) {
				$mdp = $valeur;
				}
							
				echo '<div id = "corps">
				<fieldset>
				<legend>Information du compte</legend>
				<form action = "location.php" method = "POST">
				<b>Pseudo :</b> '.$login.'<br>
				<b>Mot de passe</b> : *****<br>';
				?><input type="button" name="lien1" value="Modifier" onclick="self.location.href='formMdp.php'" onclick style ="font-family: 'Acme', sans-serif"><?php
				
				echo '</form></fieldset>
				<fieldset>
				<legend>Informations personnelles</legend>
				<form action = "location.php" method = "POST">
				<b>Nom :</b> '.$nom.'<br>
				<b>Prenom :</b> '.$prenom.'<br>
				<b>Téléphone :</b> '.$telephone.'<br>
				<b>Adresse eMail :</b> '.$mail.'<br>';
				?><input type="button" name="lien1" value="Modifier" onclick="self.location.href='formModif.php'" onclick style ="font-family: 'Acme', sans-serif">
				<?php echo '</form></fieldset>';
				
				echo '<fieldset>
				<legend>Adresse de livraison</legend>
				<form action = "location.php" method = "POST">
				<b>Adresse :</b> '.$adresse.'<br>
				<b>Code postal :</b> '.$cp.'<br>
				<b>Ville :</b> '.$ville.'<br>';
				?><input type="button" name="lien1" value="Modifier" onclick="self.location.href='formAdresse.php'" onclick style ="font-family: 'Acme', sans-serif">
				<?php echo '</form></fieldset>';
				
				echo '<fieldset>
				<legend>Mes commandes</legend>';
				$reqCommande = mysqli_query($conn,"SELECT * FROM Commande WHERE idUser = '".$_SESSION['numClient']."';");
				$tabCommande = array('id','userId','code','prix','etat');
				$rowCount = mysqli_num_rows($reqCommande);
				
				if($rowCount >= 1)
				{
					echo "<form action = 'verifCommande.php' method = 'POST'>"; 
 					echo "<table>";
					echo "<tr><td>Code</td><td>Prix total</td><td>Etat</td>";
					while($dat = mysqli_fetch_assoc($reqCommande)){
						//$tab[0] = $dat['id'];
						//$tab[1] = $dat['reference'];
						$tab[1] = $dat['idUser'];
						$tab[2] = $dat['code'];
						$tab[3] = $dat['prix'];
						$tab[4] = $dat['etat'];
						echo "<tr><td>".$tab[2]."</td>";
						//echo "<td>".$tab[1]."</td>";
						echo "<td>".$tab[3]."</td>";
						echo "<td>".$tab[4]."</td>";
						if($tab[4] == "ATT")
						{
							echo "<td><a href = 'annulerCommande.php?choice_1=".$tab[2]."'>Annuler commande</a></td>";
						}
						echo "</tr>";
					}
					echo "</table>";
					echo "<input type = 'submit' value = 'Consulter'>";
					echo "</form>";
				}
				else
				{
					echo "Aucune commande trouvée.";
				}
				echo'</fieldset>';?>	
				</div>
				<?php
				include 'bas.php';
				
				
	}
