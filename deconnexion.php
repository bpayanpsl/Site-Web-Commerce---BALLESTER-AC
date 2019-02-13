<?php
session_start();
include_once('function-panier.php');
supprimePanier();
$_SESSION['isConnected'] = 0;
header('location: accueil.php');
?>