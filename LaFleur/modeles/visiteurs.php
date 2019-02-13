<?php 

function afficher_categories() 
{
	$tableau=array();
	$pdo = PDO2::getInstance();
    $requete = $pdo->prepare("select * from categorie;");
	$requete->execute();
	$i=0;
	while ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
		$tableau[$i]=$result;
		$i++;
	}
	$requete->closeCursor();
	return $tableau;
}

function afficher_categorie($cat) 
{
	$tableau=array();
	$pdo = PDO2::getInstance();
	$requete = $pdo->prepare("SELECT * FROM produit
		WHERE idcategorie = :idcategorie;");
	$requete->bindValue(':idcategorie', $cat);
	$requete->execute();
	$i=0;
	while ($result = $requete->fetch(PDO::FETCH_ASSOC)) {
		$tableau[$i]=$result;
		$i++;
    }
	$requete->closeCursor();
	return $tableau;
}
function creaCommande($idCommande,$moment,$nomPrenomClient,$adresseRueClient,$cpClient,$villeClient,$mailClient,$bonCdeClient)
{
	$pdo = PDO2::getInstance();
	//$requete = $pdo->()"INSERT INTO commande(id, dateCommande, nomPrenomClient, adresseRueClient,cpClient,villeClient,mailClient,bonCdeClient) VALUES (:id, :dateCommande, :nomPrenomClient, :adresseRueClient,:cpClient,:villeClient,:mailClient,:bonCdeClient)");
	$requete->bindValue(':id',$idCommande);
	$requete->bindValue(':dateCommande',$moment);
	$requete->bindValue(':nomPrenomClient',$nomPrenomClient);
	$requete->bindValue(':adresseRueClient',$adresseRueClient);
	$requete->bindValue(':cpClient',$cpClient);
	$requete->bindValue(':villeClient',$mailClient);
	$requete->bindValue(':mailClient',$mailClient);
	$requete->bindValue(':bonCdeClient',$bonCdeClient);
	if($requete->execute()){
		$requete->closeCursor();
		return true;
	}else{
		$requete->closeCursor();
		return false;
	}
}

function creaContenir($idCommande, $ref,$qte,$prix)
{
	$pdo = PDO2::getInstance();
	$requete2 = $pdo->prepare("INSERT INTO contenir (idCommande, idProduit, quantite, prix) VALUES (:idCommande, :ref,:qte,:prix)");
	$requete2->bindValue(':idCommande',$idCommande);
	$requete2->bindValue(':ref',$ref);
	$requete2->bindValue(':qte',$qte);
	$requete2->bindValue(':prix',$prix);
	
	if ($requete2->execute()){
		return true;
	}else {
		return false;
	}
}

function getIdCommande()
{
	$pdo = PDO2::getInstance();
	$requete = $pdo->prepare("SELECT max(id) AS'id' FROM commande;");
	$requete->execute();
	$resultat = $requete->fetch(PDO::FETCH_ASSOC);
	$resultat++;
	return $resultat;
	
}

function existe_session()
{
  $estVide=false;
  if(!isset($_SESSION['reference'][0])) {
    $estVide=true;
  }
  
  return $estVide;
}
?>