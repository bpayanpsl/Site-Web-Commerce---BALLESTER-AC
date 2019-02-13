<?php
include 'function_panier.php';
//lire le formulaire provenant du système PayPal et ajouter 'cmd'
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
}
// renvoyer au système PayPal pour validation
    $header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
    $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
    $fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);
	
	$item_name = $_POST['item_name'];
    $item_number = $_POST['item_number'];
    $payment_status = $_POST['payment_status'];
    $payment_amount = $_POST['mc_gross'];
    $payment_currency = $_POST['mc_currency'];
    $txn_id = $_POST['txn_id'];
    $receiver_email = $_POST['receiver_email'];
    $payer_email = $_POST['payer_email'];
    $id_user = $_POST['custom'];
	
	if (!$fp) {
    // ERREUR HTTP
    } else {
        fputs ($fp, $header . $req);
        while (!feof($fp)) {
            $res = fgets ($fp, 1024);
            if (strcmp ($res, "VERIFIED") == 0) {
                // transaction valide
				supprimePanier();
				// vérifier que payment_status a la valeur Completed
                if ( $payment_status == "Completed") {
                    // vérifier que txn_id n'a pas été précédemment traité: Créez une fonction qui va interroger votre base de données
                    if (VerifIXNID($txn_id) == 0) {
                        // vérifier que receiver_email est votre adresse email PayPal principale
                        if ( "votreEmailSeller" == $receiver_email) {
                            // vérifier que payment_amount et payment_currency sont corrects
                            // traiter le paiement
							header('location:paiementValide.php');
                         }
			  else {
				// Mauvaise adresse email paypal
				echo "Mauvaise adresse email paypal";
			  }
			}
			else {
				// ID de transaction déjà utilisé
				echo "ID de transaction déjà utilisé";
					}
			}
		  else {
		        	// Statut de paiement: Echec
					echo "Statut de paiement: Echec";
		  }
            }
            else if (strcmp ($res, "INVALID") == 0) {
                // Transaction invalide                
            }
        }
        fclose ($fp);
    }
?>