<?php
$_SESSION['montantTotal']=0;
include_once("function-panier.php");
include 'haut.php';
include 'menu.php';
$erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On verifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut etre un entier simple ou un tableau d'entier
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}
echo '<?xml version="1.0" encoding="utf-8"?>';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Votre panier</title>
</head>
<body>
<?php
if ($_SESSION['isConnected'] == 0)
	{
		header('location: formConnexion.php');
	}
	else
	{?>
<div id = "corps">
<div id = "panier">
<form method="post" action="panier.php">
<center>
<fieldset>
<legend>Votre panier</legend>
<table style="width: 400px">
	<tr>
		<td>Libellé</td>
		<td>Quantité</td>
		<td>Prix Unitaire</td>
		<td>Action</td>
	</tr>

	<?php
	$total = 0;
	$ok = 0;
	if (creationPanier())
	{
		$nbArticles=count($_SESSION['panier']['libelleProduit']);
		if ($nbArticles <= 0)
		{
		echo "<tr><td>Votre panier est vide </td></tr>";
		$ok = 0;
		}
		else
		{
			$ok = 1;
			for ($i=0 ;$i < $nbArticles ; $i++)
			{
				echo "<tr>";
				echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
				echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/><input type=\"submit\" value=\"\"/></td>";
				echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."€</td>";
				echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\"><img src = 'suppr-panier.jpg'></a></td>";
				echo "</tr>";
			}

			echo "<tr><td colspan=\"2\"> </td>";
			echo "<td colspan=\"2\">";
			echo "Total : ".MontantGlobal()."€";
			echo "</td></tr>";

			echo "<tr><td colspan=\"4\">";
			//echo "<input type=\"submit\" value=\"Rafraichir\"/>";
			echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

			echo "</td></tr>";
			$total = MontantGlobal();
			$_SESSION['montantTotal']= MontantGlobal();
			
		}
	}?>
</table>
</form>
<?php
if($ok == 1)
{?>
	<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
	<input type='hidden' value=<?php echo $total ?> name="amount" />
	<input name="currency_code" type="hidden" value="EUR" />
	<input name="shipping" type="hidden" value="10.00" />
	<input name="tax" type="hidden" value="20.00" />
	<input name="return" type="hidden" value="http://ballester-ac.pe.hu/paiementValide.php" />
	<input name="cancel_return" type="hidden" value="http://ballester-ac.pe.hu/paiementAnnule.php" />
	<input name="notify_url" type="hidden" value="http://ballester-ac.pe.hu/validationPaiement.php" />
	<input name="cmd" type="hidden" value="_xclick" />
	<input name="business" type="hidden" value="shinou_13230@hotmail.fr" />
	<input name="item_name" type="hidden" value="Commande BAC" />
	<input name="no_note" type="hidden" value="1" />
	<input name="lc" type="hidden" value="FR" />
	<input name="bn" type="hidden" value="PP-BuyNowBF" />
	<input name="custom" type="hidden" value="ID_ACHETEUR" />
	<input alt="Effectuez vos paiements via PayPal : une solution rapide, gratuite et sécurisée" name="submit" src="https://www.paypal.com/fr_FR/FR/i/btn/btn_buynow_LG.gif" type="image" /><img src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" border="0" alt="" width="1" height="1" />
	</form>
<?php
}
?>
</center>
</fieldset>
</div>
</div>
	<?php include 'bas.php';
	}?>
</body>

</html>

