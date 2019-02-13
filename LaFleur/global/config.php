<?php
define('CHEMIN_VUE_GLOBALE', 'vues_globales/');
// Identifiants pour la base de données. Nécessaires a PDO2.
define('SQL_DSN','mysql:dbname=u815255986_gsb;host=mysql.hostinger.fr');

define('SQL_USERNAME', 'u815255986_gsb');
define('SQL_PASSWORD', 'Zmcub2');
// Chemins à utiliser pour accéder aux vues/modeles/librairies
$module = empty($module) ? !empty($_GET['module']) ? $_GET['module'] : 'index' : $module;
define('CHEMIN_VUE',    'modules/'.$module.'/vues/');
define('CHEMIN_MODELE', 'modeles/');
define('CHEMIN_LIB',    'libs/');
define('CHEMIN_CONTROLEUR', 'modules/'.$module.'/');
// Configurations relatives à l'avatar
define('AVATAR_LARGEUR_MAXI', 100);
define('AVATAR_HAUTEUR_MAXI', 100);
define('DOSSIER_AVATAR', 'images/avatar/');