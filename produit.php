<?php
	include 'connect.php';
	include 'haut.php';
	include 'menu.php';

$ligne = 0;	
$req = "SELECT * FROM produit";
$result = mysqli_query($conn, $req);
?>
<div id = "corps">
<div id = "menuProd">
	<table>
		<tr>
			<td><a href = "plancher.php"><img src = "plancher-electrique.jpg"></a></td>
			<td><a href = "radiateur.php"><img src = "radiateur-inertie.jpg"></a></td>
			<td><a href = "pompe.php"><img src = "pompe-aireau.jpg"></a></td>
			<td><a href = "climatisation.php"><img src = "climatisation-mono.jpg"></a></td>
		</tr>
		<tr>
			<td><a href = "plancher.php">Planchers chauffants</a></td>
			<td><a href = "radiateur.php">Radiateurs</a></td>
			<td><a href = "pompe.php">Pompes à chaleur</a></td>
			<td><a href = "climatisation.php">Climatisations</a></td>
		</tr>
	</table>
</div>
</div>

<?php include 'bas.php';?>