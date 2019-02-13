<?php
/** 
 * fonction binaireDecimal
 * @param string $bin
 * @return int $decimal;
*/	
function binaireDecimal($bin)  {
  $indice = 0;
  $decimal = 0;
  for($t=MAXI; $t >= 0; $t--)  { 
    if ($bin[$t] == 1) {
       $decimal = $decimal + pow(2, $indice);   
    }
    $indice++;
  } 
  return $decimal;
}

/** 
 * Fonction etLogique
 * @param string $adrIp
 * @param string $masque
 * @return string $resultat
*/
  function etLogique($adrIp, $masque)  {
    $resultat="";
    for ($k= 0; $k < 8  ; $k++)  {
     (string) $resultat[$k] =(int) ((int)$adrIp[$k] && (int)$masque[$k]);
	}
    return $resultat;
  }
  
  /**
 * Fonction decimalBinaire
 * Conversion d'un nombre décimal en binaire
 * @param int $decimal
 * @return string $nombreBinaire
*/
function decimalBinaire($decimal)  {
  $nombreBinaire="";
  $binaire="";
  while ($decimal > 0 ) {  
    // binaire <-- STR(decimal MOD 2) + binaire
    $binaire = (string)($decimal % 2) . $binaire ;  
    // decimal <-- decimal DIV 2
    $decimal = (int)($decimal / 2);  
  } 
  // Ajout des zéros à gauche
  $long1 = strlen($binaire);
  for ($i= 0; $i <= MAXI - $long1 ; $i++)  { // Pour optimisation
    $nombreBinaire[$i] = '0';
  } 
  $k = 0;
  for ($j= MAXI - $long1 + 1 ; $j <= MAXI ; $j++)  {
    $nombreBinaire[$j] = $binaire[$k];
    $k++;
  }
  return $nombreBinaire;
}
?>

