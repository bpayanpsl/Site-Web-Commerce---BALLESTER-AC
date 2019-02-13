<?php
if (utilisateur_est_connecte()) {
	?>
	<h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['pseudonyme']); ?>.</h1>
	<br> <!-- 22/01/2016-->
	<div align="center" style= "font: 14pt/24pt serif">
	<img class="gsb" src="./images/naturaln.jpg" width="800px"> <br>
	<b>Galaxy Swiss Bourdin</b> est un laboratoire pharmaceutique, qui vous propose désormais, un <u>nouveau</u> site web. 
	<br>Il vous permettra de connaitre l'histoire du laboratoire et d'autres choses. 
	<br>A vous de naviguer sur notre tout nouveau site! 
	<br>
	<br>
	</div>
<?php
} else {

?>
 <!-- 22/01/2016-->
				<div align="center" style= "font: 14pt/24pt serif">
						<h4><b>Bienvenue</b></h4> sur notre page d'accueil ! 
						<br><img class="gsb" src="./images/naturaln.jpg" width="800px"> <br>
						<br><b>Galaxy Swiss Bourdin</b>  est un laboratoire pharmaceutique, qui vous propose désormais, un <u>nouveau</u> site web. 
						<br>Il vous permettra de connaitre l'histoire du laboratoire et d'autres choses. 
						<br>A vous de naviguer sur notre tout nouveau site! 
						<br><br>	
				</div>
<?php 
}
?>
