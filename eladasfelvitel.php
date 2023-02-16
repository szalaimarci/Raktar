<?php
include_once('db_fuggvenyek.php');

$cikkszam = $_POST["valasztottCikszam"];
$rkod = $_POST["valasztottRaktar"];
$mennyiseg = $_POST["mennyiseg"];
$sorszam = $_POST["sorszam"];

if ( isset($cikkszam) && isset($rkod) && isset($mennyiseg) && isset($sorszam) ) {
	
	$sikeres = eladast_beszur($cikkszam, $rkod, $mennyiseg, $sorszam); 
	$sikeres = keszlet_torlese($cikkszam);
	if ($sikeres) {
		header('Location: eladas.php');
	} else {
		echo 'Hiba történt a készletre felvitelnél';
	}
	
} else {
	
	echo 'Hiba történt a kölcsönzés felvitelnél';
}

?>
