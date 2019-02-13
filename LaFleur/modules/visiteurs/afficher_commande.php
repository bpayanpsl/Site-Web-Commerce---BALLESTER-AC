<?php
// Pas de vérification des droits d'accès nécessaires : tout le monde peut voir une commande :)

// Si le paramètre id est manquant ou invalide
// var_dump($_POST);
// var_dump($_GET);
if (! isset($_SESSION["reference"])){
   echo "<h1>Acc&egrave;s interdit</h1>";
   exit(0);
} 
if(! isset($_POST["nomPrenomClie"]))  {  //  La première fois
include_once CHEMIN_LIB.'form.php';
$form_commander= new Form('form_commander');

$form_commander->method('POST');

$form_commander->add('Text', 'nomPrenomClie')
			  ->Required(true)
              ->label("Nom et prenom");

$form_commander->add('Text', 'adresseRueClie')
			  ->Required(true)
              ->label("Adresse personnelle");
			   
$form_commander->add ('Text', 'cpClie')
			  ->Required(true)
			  ->label("Code postal");			   

$form_commander->add ('Text', 'villeClie')
			  ->Required(true)
			  ->label("Ville");	

$form_commander->add ('email', 'mailClie')
			  ->Required(true)
			  ->label("Mail");	

$form_commander->add ('Text', 'bonCdeClie')
			  ->Required(true)
			  ->label("Numero de votre bon de commande");	
			  
$form_commander->add('Submit', 'submit')
              ->value("Envoyer");
			  
include 'modules/visiteurs/vues/formulaires_infos_commande.php';	


}else {
	// La deuxième fois
	$nomPrenomClient = $_POST["nomPrenomClie"];
	$adresseRueClient = $_POST["adresseRueClie"];
	$cpClient = $_POST["cpClie"];
	$villeClient = $_POST["villeClie"];
	$mailClient = $_POST["mailClie"];
	$bonCdeClient = $_POST["bonCdeClie"];
	$idmax =0;
	$nbLignes=count($_SESSION["reference"]);
	if ($nbLignes>0) {
		$moment=date("Y-m-d");
		$idConnexion=mysql_connect("localhost","clapprand","LaBrOuE05");
		if ($idConnexion) {
			mysql_select_db("lafleurmvc",$idConnexion);
			$requete0="select max(id) from commande;"; 
			$resultat=mysql_query($requete0); 
			$idmax=mysql_result($resultat,0,"max(id)"); 
			$idCommande = $idmax + 1; 
			$requete1="INSERT INTO commande (id, dateCommande, nomPrenomClient, adresseRueClient, cpClient, villeClient, mailClient, bonCdeClient) VALUES (";
			$requete1.= "'$idCommande', '$moment' , '$nomPrenomClient' , '$adresseRueClient' , '$cpClient' , '$villeClient' , '$mailClient' , '$bonCdeClient' ) ;";
			$ok=mysql_query($requete1,$idConnexion);
			echo "--->$ok<br/>";
			if('ok') {
				for ($i=0;$i<$nbLignes;$i++)  {
					$ref=$_SESSION["reference"][$i];
					$qte=$_SESSION["quantite"][$i];
					$requete2="select prix from produit where id='".$ref."';";
					$produit=mysql_query($requete2,$idConnexion);
					$ligne=mysql_fetch_assoc($produit);
					$prix=$ligne["prix"];
					// nécessaire pour la première version
					$requete3="select * from contenir where idCommande = '$idCommande'  and idProduit='$ref';";
					$jeuResultat=mysql_query($requete3,$idConnexion);
					$ligneCde=mysql_fetch_assoc($jeuResultat);
					if ($ligneCde) {
						$qte=$qte+$ligneCde["quantite"];
						$requete4="update contenir set quantite=".$qte."  where idCommande = '$idCommande'  and idProduit='$ref';";
						mysql_query($requete4,$idConnexion);
					} else {

					$requete5="insert into contenir (idCommande, idProduit, quantite, prix) values (";
					$requete5.="'$idCommande' , '$ref' , '$qte' , '$prix');";
					mysql_query($requete5,$idConnexion);
				 }
				}
				// On vide alors le panier.
				$_SESSION["reference"]=array();
				$_SESSION["quantite"]=array();
				echo "Votre commande a bien &eacute;t&eacute; enregistr&eacute;e sous la r&eacute;f&eacute;rence $idCommande le $moment";
			} else	{
				echo "Commande non enregistr&eacute;e, authentification refus&eacute;e<br>
				";
			}
		} else  {
			echo "Commande non enregistr&eacute;e, probleme d'acces au serveur<br>
			";
		}
        mysql_close($idConnexion);
	}
} ?>
