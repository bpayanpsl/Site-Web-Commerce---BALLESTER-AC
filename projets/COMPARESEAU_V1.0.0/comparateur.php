<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Description" content="Calculateur pour r&eacute;seau TCP/IPV4" />
<meta name="Keywords" content="IP address, subnet mask, subnet, subnet comparator, network mask, ip calculator, tcp/ip, network" />
<style type="text/css">
<!--
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

-->
</style>
<title>Comparateur réseau IP v4</title>
</head>
<body>
<?php
/**
 * Nom programme		: comparateur.php
 *
 * Version			    : 1.0
 * Description		    : convertion d'un décimal en binaire
 * Date de création		: 11/01/2016
 * Date de modification : 11/01/2016
 * Auteur			    : Moi
 * Commentaire		    : 
*/

// Déclaration constante
define("MAXI", 7);

// Initialisation des variables ici ...
$adrDecComplet = false;

include 'fonction.php';


// -----------------------------------------------------------------------
if (! empty ($_POST["reset"])) {
 $adrDecComplet = false; 
} else {
  if (! empty ($_POST)) {
    if (isset ($_POST))  {
    $adrDecComplet = true;
      $adrIp1A = $_POST["adrIp1A"];
      $adrIp2A = $_POST["adrIp2A"];
      $adrIp3A = $_POST["adrIp3A"]; 
      $adrIp4A = $_POST["adrIp4A"]; 
	  $adrIp1B = $_POST["adrIp1B"];
	  $adrIp2B = $_POST["adrIp2B"];
      $adrIp3B = $_POST["adrIp3B"]; 
      $adrIp4B = $_POST["adrIp4B"]; 
      $maskip1 = $_POST["maskip1"]; 
      $maskip2 = $_POST["maskip2"];
      $maskip3 = $_POST["maskip3"]; 
      $maskip4 = $_POST["maskip4"];
	  
	  // >>>>>>>>>>>>
  // Appel de la fonction decimalBinaire  
  $nbrBinaire1A = decimalBinaire($_POST["adrIp1A"]);
  $nbrBinaire2A = decimalBinaire($_POST["adrIp2A"]);
  $nbrBinaire3A = decimalBinaire($_POST["adrIp3A"]);
  $nbrBinaire4A = decimalBinaire($_POST["adrIp4A"]);
  $nbrBinaire1B = decimalBinaire($_POST["adrIp1B"]);
  $nbrBinaire2B = decimalBinaire($_POST["adrIp2B"]);
  $nbrBinaire3B = decimalBinaire($_POST["adrIp3B"]);
  $nbrBinaire4B = decimalBinaire($_POST["adrIp4B"]);
  $maskBinaire1    = decimalBinaire($_POST["maskip1"]); 
  $maskBinaire2    = decimalBinaire($_POST["maskip2"]); 
  $maskBinaire3    = decimalBinaire($_POST["maskip3"]); 
  $maskBinaire4    = decimalBinaire($_POST["maskip4"]); 
  // Appel de la fonction etLogique 
  $resBinaire1A = etLogique($nbrBinaire1A, $maskBinaire1);
  $resBinaire2A = etLogique($nbrBinaire2A, $maskBinaire2);
  $resBinaire3A = etLogique($nbrBinaire3A, $maskBinaire3);
  $resBinaire4A = etLogique($nbrBinaire4A, $maskBinaire4);
  $resBinaire1B = etLogique($nbrBinaire1B, $maskBinaire1);
  $resBinaire2B = etLogique($nbrBinaire2B, $maskBinaire2);
  $resBinaire3B = etLogique($nbrBinaire3B, $maskBinaire3);
  $resBinaire4B = etLogique($nbrBinaire4B, $maskBinaire4);
  // Appel de la fonction binaireDecimal  
  $nbrDecimal1A = binaireDecimal($resBinaire1A);
  $nbrDecimal2A = binaireDecimal($resBinaire2A);
  $nbrDecimal3A = binaireDecimal($resBinaire3A);
  $nbrDecimal4A = binaireDecimal($resBinaire4A);
  $nbrDecimal1B = binaireDecimal($resBinaire1B);
  $nbrDecimal2B = binaireDecimal($resBinaire2B);
  $nbrDecimal3B = binaireDecimal($resBinaire3B);
  $nbrDecimal4B = binaireDecimal($resBinaire4B);  
  // Transtypage array - string
  $adrIpImplode1A = implode($nbrBinaire1A);	
  $adrIpImplode2A = implode($nbrBinaire2A);	
  $adrIpImplode3A = implode($nbrBinaire3A);	
  $adrIpImplode4A = implode($nbrBinaire4A);	
  $adrIpImplode1B = implode($nbrBinaire1B);	
  $adrIpImplode2B = implode($nbrBinaire2B);	
  $adrIpImplode3B = implode($nbrBinaire3B);	
  $adrIpImplode4B = implode($nbrBinaire4B);	
  $maskImplode1   = implode($maskBinaire1);
  $maskImplode2   = implode($maskBinaire2); 
  $maskImplode3   = implode($maskBinaire3); 
  $maskImplode4   = implode($maskBinaire4); 
  $resBinaireImplode1A   = implode($resBinaire1A);    
  $resBinaireImplode2A   = implode($resBinaire2A);    
  $resBinaireImplode3A   = implode($resBinaire3A);    
  $resBinaireImplode4A   = implode($resBinaire4A);    
  $resBinaireImplode1B   = implode($resBinaire1B);    
  $resBinaireImplode2B   = implode($resBinaire2B);    
  $resBinaireImplode3B   = implode($resBinaire3B);    
  $resBinaireImplode4B   = implode($resBinaire4B);    

  // Transtypage array - string
  // $nbrBinaireImplode = implode($nbrBinaire);	  
	  // >>>>>>>>>>
    }  
  }
}
?>
<h1>Comparateur  réseau IP v4</h1>
<form action="comparateur.php" method="post" name="convDecBin1" id="convDecBin1">
  <table border="0.1px">
    <colgroup>
    <col span="1" style="background-color:#FFFFFF" />
    <col span="1" style="background-color:#CCCCCC" />
    <col span="1" style="background-color:#EAE8E8" />
    </colgroup>
    <tr>
      <td width="158"></td>
      <td width="380" ><div align="center"><b>Poste A</b></div></td>
      <td width="377" ><div align="center"><b>Poste B</b></div></td>
    </tr>
    <tr>
      <td>Adresse IP</td>
      <td><div align="center">
          <input name="adrIp1A" size="3" <?php if($adrDecComplet){echo "value='$adrIp1A'" ; } else {echo "value='192'";} ?> class="in" type="text" />
          <input name="adrIp2A" size="3" <?php if($adrDecComplet){echo "value='$adrIp2A'" ; } else {echo "value='168'";} ?>  class="in" type="text" />
          <input name="adrIp3A" size="3" <?php if($adrDecComplet){echo "value='$adrIp3A'" ; } else {echo "value='21'";} ?> class="in" type="text" />
          <input name="adrIp4A" size="3" <?php if($adrDecComplet){echo "value='$adrIp4A'" ; } else {echo "value='9'";} ?>  class="in" type="text" />
        </div></td>
      <td><div align="center">
          <input name="adrIp1B" size="3" <?php if($adrDecComplet){echo "value='$adrIp1B'" ; } else {echo "value='192'";} ?> class="in" type="text" />
          <input name="adrIp2B" size="3" <?php if($adrDecComplet){echo "value='$adrIp2B'" ; } else {echo "value='168'";} ?> class="in" type="text" />
          <input name="adrIp3B" size="3" <?php if($adrDecComplet){echo "value='$adrIp3B'" ; } else {echo "value='21'";} ?> class="in" type="text" />
          <input name="adrIp4B" size="3" <?php if($adrDecComplet){echo "value='$adrIp4B'" ; } else {echo "value='254'";} ?> class="in" type="text" />
        </div></td>
    </tr>
    <tr>
      <td><span class="Style1">Adresse IP en binaire</span></td>
      <td><div align="center">
          <input name="adrbits1" size="8" value="<?php if($adrDecComplet){echo $adrIpImplode1A;} ?>" type="text" />
          <input name="adrbits2" size="8" value="<?php if($adrDecComplet){echo $adrIpImplode2A;} ?>" type="text" />
          <input name="adrbits3" size="8" value="<?php if($adrDecComplet){echo $adrIpImplode3A;} ?>" type="text" />
          <input name="adrbits4" size="8" value="<?php if($adrDecComplet){echo $adrIpImplode4A;} ?>" type="text" />
        </div></td>
      <td><div align="center">
          <input name="adrbits12" size="8" value="<?php if($adrDecComplet){echo $adrIpImplode1B;} ?>" type="text" />
          <input name="adrbits22" size="8" value="<?php if($adrDecComplet){echo $adrIpImplode2B;} ?>" type="text" />
          <input name="adrbits32" size="8" value="<?php if($adrDecComplet){echo $adrIpImplode3B;} ?>" type="text" />
          <input name="adrbits42" size="8" value="<?php if($adrDecComplet){echo $adrIpImplode4B;} ?>" type="text" />
        </div></td>
    </tr>

    <tr>
      <td>Masque</td>
      <td colspan="3"><div align="center">
          <select name="maskip1" class="in">
  		    <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 255) {echo "selected";} } ?> value="255">255</option>	
		    <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 254) {echo "selected";} } ?> value="254">254</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 252) {echo "selected";} } ?> value="252">252</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 248) {echo "selected";} } ?> value="248">248</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 240) {echo "selected";} } ?> value="240">240</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 224) {echo "selected";} } ?> value="224">224</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 192) {echo "selected";} } ?> value="192">192</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 128) {echo "selected";} } ?> value="128">128</option>
			<option <?php if($adrDecComplet) {if ( $_POST['maskip1'] == 0) {echo "selected";} } ?> value="0">0</option>
          </select>
          <select name="maskip2" class="in">
  		    <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 255) {echo "selected";} } ?> value="255">255</option>	
		    <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 254) {echo "selected";} } ?> value="254">254</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 252) {echo "selected";} } ?> value="252">252</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 248) {echo "selected";} } ?> value="248">248</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 240) {echo "selected";} } ?> value="240">240</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 224) {echo "selected";} } ?> value="224">224</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 192) {echo "selected";} } ?> value="192">192</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 128) {echo "selected";} } ?> value="128">128</option>
			<option <?php if($adrDecComplet) {if ( $_POST['maskip2'] == 0)   {echo "selected";} } ?> value="0">0</option>
          </select>
          <select name="maskip3" class="in">
  		    <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 255) {echo "selected";} } ?> value="255">255</option>	
		    <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 254) {echo "selected";} } ?> value="254">254</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 252) {echo "selected";} } ?> value="252">252</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 248) {echo "selected";} } ?> value="248">248</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 240) {echo "selected";} } ?> value="240">240</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 224) {echo "selected";} } ?> value="224">224</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 192) {echo "selected";} } ?> value="192">192</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 128) {echo "selected";} } ?> value="128">128</option>
			<option <?php if($adrDecComplet) {if ( $_POST['maskip3'] == 0)   {echo "selected";} } ?> value="0">0</option>
          </select>
          <select name="maskip4" class="in">
  		    <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 255) {echo "selected";} } ?> value="255">255</option>	
		    <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 254) {echo "selected";} } ?> value="254">254</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 252) {echo "selected";} } ?> value="252">252</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 248) {echo "selected";} } ?> value="248">248</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 240) {echo "selected";} } ?> value="240">240</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 224) {echo "selected";} } ?> value="224">224</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 192) {echo "selected";} } ?> value="192">192</option>
            <option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 128) {echo "selected";} } ?> value="128">128</option>
			<option <?php if($adrDecComplet) {if ( $_POST['maskip4'] == 0)   {echo "selected";} } ?> selected value="0">0</option>
          </select>
        </div>
        </div></td>
    </tr>

    <tr>
      <td><span class="Style1">Masque en binaire</span></td>
      <td colspan="3"><div align="center">
          <input name="maskbits1" size="8" value="<?php if($adrDecComplet){echo $maskImplode1;} ?>" type="text" />
          <input name="maskbits2" size="8" value="<?php if($adrDecComplet){echo $maskImplode2;} ?>" type="text" />
          <input name="maskbits3" size="8" value="<?php if($adrDecComplet){echo $maskImplode3;} ?>" type="text" />
          <input name="maskbits4" size="8" value="<?php if($adrDecComplet){echo $maskImplode4;} ?>" type="text" />
        </div></td>
    </tr>
    <tr>
      <td>Résultat</td>
      <td><div align="center">
          <input name="resip1" size="3" value="<?php if($adrDecComplet){echo $nbrDecimal1A;} ?>" class="out" type="text" />
          <input name="resip2" size="3" value="<?php if($adrDecComplet){echo $nbrDecimal2A;} ?>" class="out" type="text" />
          <input name="resip3" size="3" value="<?php if($adrDecComplet){echo $nbrDecimal3A;} ?>" class="out" type="text" />
          <input name="resip4" size="3" value="<?php if($adrDecComplet){echo $nbrDecimal4A;} ?>" class="out" type="text" />
        </div></td>
      <td><div align="center">
          <input name="resip12" size="3" value="<?php if($adrDecComplet){echo $nbrDecimal1B;} ?>" class="out" type="text" />
          <input name="resip22" size="3" value="<?php if($adrDecComplet){echo $nbrDecimal2B;} ?>" class="out" type="text" />
          <input name="resip32" size="3" value="<?php if($adrDecComplet){echo $nbrDecimal3B;} ?>" class="out" type="text" />
          <input name="resip42" size="3" value="<?php if($adrDecComplet){echo $nbrDecimal4B;} ?>" class="out" type="text" />
        </div></td>
    </tr>
    <tr>
      <td><span class="Style1">R&eacute;sultat en binaire </span></td>
      <td><div align="center">
          <input name="resbits1A" size="8" value="<?php if($adrDecComplet){echo $resBinaireImplode1A;} ?>" type="text" />
          <input name="resbits2A" size="8" value="<?php if($adrDecComplet){echo $resBinaireImplode2A;} ?>" type="text" />
          <input name="resbits3A" size="8" value="<?php if($adrDecComplet){echo $resBinaireImplode3A;} ?>" type="text" />
          <input name="resbits4A" size="8" value="<?php if($adrDecComplet){echo $resBinaireImplode4A;} ?>" type="text" />
        </div></td>
      <td><div align="center">
          <input name="resbits1B" size="8" value="<?php if($adrDecComplet){echo $resBinaireImplode1B;} ?>" type="text" />
          <input name="resbits2B" size="8" value="<?php if($adrDecComplet){echo $resBinaireImplode2B;} ?>" type="text" />
          <input name="resbits3B" size="8" value="<?php if($adrDecComplet){echo $resBinaireImplode3B;} ?>" type="text" />
          <input name="resbits4B" size="8" value="<?php if($adrDecComplet){echo $resBinaireImplode4B;} ?>" type="text" />
        </div></td>
    </tr>
	
    <tr>
      <td colspan="3"><div align="right">
          <input name="submit" type="submit" value="Calculer"/>
          <input name="reset" type="submit" value="Réinitialiser"/>
        </div></td>
    </tr>
  </table>
</form>
<?php
if ($adrDecComplet) {
  if ( ($nbrDecimal1A == $nbrDecimal1B) && ($nbrDecimal2A == $nbrDecimal2B) && ($nbrDecimal3A == $nbrDecimal3B) && ($nbrDecimal4A == $nbrDecimal4B) ) {
     echo "<h4>Le Poste A et le Poste B appartiennent au même réseau,<br/>ils peuvent donc communiquer sans passer par la passerelle.</h4>"; 
   } else { 
     echo "<h4>Le Poste A et le Poste B n'appartiennent au même réseau,<br/>ils ne peuvent donc communiquer sans passer par la passerelle.</h4>";
   }
}
 
?>
</body>
</html>
