<?php 
// ----------------------------------------------------------------
// Logiciel de gestion de notes - version avec utilisation d'objets
// Version 1
// ----------------------------------------------------------------


// On charge la classe Carnet
include('Carnet.php');

// Affichage du menu
function affiche_menu() {
	echo "<div id='menus'>";
		echo "1 > Saisie note<br>";
		echo "2 > Suppression note<br>";
		echo "3 > Affichage notes<br>";
		echo "4 > Calcul moyenne brute<br>" ;
		echo "5 > Calcul moyenne coef<br>" ;
		echo "6 > Quitter<br>";
		echo '<form action="index.php"  method="get">';
        echo 'Votre choix: ';
        echo '<input type="text" name="res" size="5" value="1" />';
        echo '<input type="submit" name="action" value="Valider" />';
        echo '</form>';
	echo " </div>";
}

// Saisie de note
function saisieNote($c) {
	echo "<br>Nouvelle note : <br>";
	echo '<form action="index.php"  method="get">';
	echo '<br>Note : <input type="text" name="not" size="5" value="" />';
	echo '<br>Coef note : <input type="text" name="coe" size="2" value="" />';
	echo '<br>Commentaire note : <input type="text" name="com" size="30" value="" />';
	echo '<br><input type="submit" name="action" value="Valider" />';
	echo '</form>';
}

// Affichage des notes
function affiche($c) {
	echo "<br>--------------------------------------------------------------<br>";
	for ($i=1;$i <= $c->getNbNotes();$i++) {
		echo 'Note'.$i.': '.$c->lireNote($i)."<br>";
		echo 'Coefficient: '.$c->lireCoef($i)."<br>";
		echo 'Commentaire: '.$c->lireComm($i)."<br>";
		echo "----------------<br>";
	}
	echo "<br>---------------------------------------------------------------<br>";
}

// Suppression de la note $item
function supprime($c) {
	echo "Numéro de la note à supprimer ?<br>";
	echo '<form action="index.php"  method="get">';
	echo 'Votre choix: ';
	echo '<input type="text" name="val" size="5" value=" " />';
	echo '<input type="submit" name="action" value="Supprimer" />';
	echo '</form>';
}

// Sortie du programme
function quitte() {
	echo '<a href="javascript: self.close()">Fin du programme</a>';
}

// ---------------------------------------------------------------------------------------------------------
// --- Début du Programme Principal ---
// On instancie un carnet 
if (!isset($_GET["res"]) && !isset($_GET["not"]) && !isset($_GET["val"])  )  { // la première fois
	// T.A.F. ici 
	$carnet = new Carnet(10);
	session_start();
	@session_register("carnet");
	$_SESSION["carnet"]=$carnet;
} else { // les autre fois
	session_start();
	$carnet = $_SESSION["carnet"];
}

// Affichage du menu 
affiche_menu();
if (isset($_GET["not"]))  {  // Ajout note
	$not = $_GET["not"];
	$coe = $_GET["coe"];
	$com = $_GET["com"];
	// SI  nb notes < 5 
	$n=$carnet->getNbNotes();   
	if ($n<5) {
		$carnet->ajouteNote($not,$coe,$com);
	} else {
		echo "Impossible d'ajouter une nouvelle note !<br>";
	}
}
if (isset($_GET["val"]))  { // Suppression note
	$val = $_GET["val"];
	$nbNotes = $carnet->getNbNotes();
	if ($val <= $nbNotes)  {
		$carnet->supprimeNote($val);
	} else {
		echo "Cette note n'existe pas !<br>";
	}	
}			
if (isset($_GET["res"])){  // Choix action à effectuer 
    $res= $_GET["res"];
	switch ($res) {
		case '1': 
		//	saisieNote(????);
		$carnet=saisieNote($carnet);
			break;
		case '2': 
		$carnet=supprime($carnet);
		//	supprimeNote(????);
			break;
		case '3': 
		affiche($carnet);
		//	afficheNOTE(????);
			break;
		case '4': 
			echo "<br>+++++++++++++++++++++++++++++++++++++<br>";
		// 	echo "Moyenne brute = ".$ooo???->mmm???()."<br>";
		echo "Moyenne brute =".$carnet->calculeMoyenneBrute($carnet)."<br>";
			echo "+++++++++++++++++++++++++++++++++++++<br>";
			break;
		case '5': 
			echo "<br>+++++++++++++++++++++++++++++++++++++<br>";
		// 	echo "Moyenne brute = ".$ooo???->mmm???()."<br>";
		echo "Moyenne coef =".$carnet->calculeMoyenneCoef($carnet)."<br>";
			echo "+++++++++++++++++++++++++++++++++++++<br>";
			break;
		case '6': 
			quitte();
			break;
		
		default: 
			echo "Choisir entre 1 et 5<br>";
			break;
	}
 }
