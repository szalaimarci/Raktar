<?php
include_once('db_fuggvenyek.php');

$cikkszam = $_POST["valasztottCikszam"];
$rkod = $_POST["valasztottRaktar"];
$bkod = $_POST["valasztottBeszallito"];
$mennyiseg = $_POST["mennyiseg"];
$sorszam = $_POST["sorszam"];

if ( isset($cikkszam) && isset($rkod) && isset($bkod) && isset($mennyiseg) && isset($sorszam) ) {
	
	$sikeres = beszerzest_beszur($cikkszam, $rkod, $bkod, $mennyiseg, $sorszam); 
	$sikeres = keszletet_beszur($cikkszam, $rkod, $bkod, $mennyiseg);
	if ($sikeres) {
		header('Location: beszerzes.php');
	} else {
		echo 'Hiba történt a készletre felvitelnél';
	}
	
} else {
	
	echo 'Hiba történt a kölcsönzés felvitelnél';
}

?>
