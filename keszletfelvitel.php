<?php
include_once('db_fuggvenyek.php');

$cikkszam = $_POST["valasztottCikszam"];
$rkod = $_POST["valasztottRaktar"];
$mennyiseg = $_POST["mennyiseg"];
$bkod = $_POST["valasztottBeszallito"];
$sorszam = $_POST["sorszam"];

if ( isset($cikkszam) && isset($rkod) && isset($mennyiseg) && isset($bkod) && isset($sorszam) ) {
	
	$sikeres = keszletet_beszur($cikkszam, $rkod, $mennyiseg); 
	$sikeres = beszerzest_beszur($cikkszam, $rkod, $bkod, $mennyiseg, $sorszam); 
	if ($sikeres) {
		header('Location: keszleten.php');
	} else {
		echo 'Hiba történt a készletre felvitelnél';
	}
	
} else {
	
	echo 'Hiba történt a kölcsönzés felvitelnél';
}

?>
