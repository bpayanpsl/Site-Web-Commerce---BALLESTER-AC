<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Description" content="Calculateur pour r&eacute;seau TCP/IPV4" />
<meta name="Keywords" content="IP address, subnet mask, subnet, subnet calculator, network mask, subnet mask calculator, ip calculator, tcp/ip, network" />
<style type="text/css">

input.in,select.in {  background-color:#DDFF33; }
input.out {  background-color:#A5A7E5; }
.Style1 {color: #C0C0C0}
table {
 border-width:1px; 
 border-style:solid; 
 border-color:black;
 }
td { 
 border-width:1px;
 border-style:solid;
  border-color:black; 
 }

</style>
<title>Calculateur pour réseau TCP/IPV4</title>
</head>
<body>
<div align="center">
<h1><b>Calculateur pour réseau TCP/IPV4</b></h1>
<br>
<hr/>
<br>
<?php
// Déclaration constante
define("MAXI", 7);
// Déclaration et initialisation des variables
$adrIpDecComplet = false;
$adrIpBinComplet = false;


if (! empty ($_POST["resetDecBin"])) {
 $adrIpDecComplet = false; 
} else {
  if ((isset ($_POST["ip_1"])) && (isset($_POST["ip_2"])) && (isset($_POST["ip_3"]))&& (isset($_POST["ip_4"]))) {
	$adrIpDecComplet = true; 
	 $ip_1= decbin ($_POST["ip_1"]);
	 $ip_2= decbin ($_POST["ip_2"]);
	 $ip_3= decbin ($_POST["ip_3"]);
	 $ip_4= decbin ($_POST["ip_4"]);
  }
} 

if (! empty ($_POST["resetBinDec"])) {
 $adrIpBinComplet = false; 
} else {
	if ((isset ($_POST["bits_1"])) && (isset($_POST["bits_2"])) && (isset($_POST["bits_3"]))&& (isset($_POST["bits_4"]))) {
		$adrIpBinComplet = true; 
		$bits_1 = bindec ($_POST["bits_1"]); 
		$bits_2 = bindec ($_POST["bits_2"]); 
		$bits_3 = bindec ($_POST["bits_3"]); 
		$bits_4 = bindec ($_POST["bits_4"]);
	}
}
?>
<h2>Convertir une adresse IP décimal pointé (ou un masque) en binaire </h2>
<form action="convertisseur.php" method="post" name="convDecBin" id="convDecBin">
  <table>
    <tr>
      <td width="100">En d&eacute;cimal </td>
      <td><input name="ip_1" size="3" class="in" type="text" />
        <input name="ip_2" size="3" class="in" type="text" />
        <input name="ip_3" size="3" class="in" type="text" />
        <input name="ip_4" size="3" class="in" type="text" /></td>
    </tr>
    <tr>
      <td>En binaire </td>
      <td><input name="resbits_1" size="8" value="<?php if($adrIpDecComplet){echo  $ip_1;} ?>" class="out" type="text" />
        <input name="resbits_2" size="8" value="<?php if($adrIpDecComplet){echo  $ip_2;} ?>" class="out" type="text" />
        <input name="resbits_3" size="8" value="<?php if($adrIpDecComplet){echo  $ip_3;} ?>" class="out" type="text" />
        <input name="resbits_4" size="8" value="<?php if($adrIpDecComplet){echo  $ip_4;} ?>" class="out" type="text" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="right">
          <input name="submit" type="submit" value="Calculer"/>
          <input name="resetDecBin" type="submit" value="R&eacute;initialiser"/>
        </div></td>
    </tr>
  </table>
</form>
<br />
<hr />
<h2>Convertir une adresse IP binaire (ou un masque) en décimal pointé</h2>
<form action="convertisseur.php" method="post" name="convBinDec" id="convBinDec">
  <table>
    <tr>
      <td width="100">En binaire</td>
      <td><input name="bits_1" size="8"  class="in"  type="text" />
        <input name="bits_2" size="8"  class="in"  type="text" />
        <input name="bits_3" size="8"   class="in"  type="text" />
        <input name="bits_4" size="8"   class="in"  type="text" />
      </td>
    </tr>
    <tr>
      <td> En décimal</td>
      <td><input name="resip_1" size="3" value="<?php if($adrIpBinComplet){echo $bits_1;}?>" class="out" type="text" />
        <input name="resip_2" size="3" value="<?php if($adrIpBinComplet){echo $bits_2;}?>" class="out" type="text" />
        <input name="resip_3" size="3" value="<?php if($adrIpBinComplet){echo $bits_3;}?>" class="out" type="text" />
        <input name="resip_4" size="3" value="<?php if($adrIpBinComplet){echo $bits_4;}?>" class="out" type="text" />
      </td>
    </tr>
    <tr>
      <td colspan="2"><div align="right">
          <input name="submit" type="submit" value="Calculer"/>
          <input name="resetBinDec" type="submit" value="R&eacute;initialiser"/>
        </div></td>
    </tr>
  </table>
</form>
<br />
<hr />
</body>
</html>
