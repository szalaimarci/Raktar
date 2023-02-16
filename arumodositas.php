<?php

include_once("db_fuggvenyek.php");

$v_cikkszam = $_POST['cikkszam'];
$v_egysegar = $_POST['egysegar'];
$v_anev = $_POST['anev'];
$v_kkod = $_POST['kkod'];

if ( isset($v_cikkszam) && isset($v_egysegar) && isset($v_anev) && isset($v_kkod) ) {
	
	$v_tiszta_cikkszam = htmlspecialchars($v_cikkszam);
	$v_tiszta_egysegar = htmlspecialchars($v_egysegar);
	$v_tiszta_anev = htmlspecialchars($v_anev);
	$v_tiszta_kkod = htmlspecialchars($v_kkod);
	
	$success = arut_modosit($v_tiszta_cikkszam, $v_tiszta_egysegar, $v_tiszta_anev, $v_tiszta_kkod);
	
	if ( $success == false ) {
		die("Nem sikerült módosítani a rekordot.");
	} else {
		header("Location: aru.php");	
	}	
} else {
	error_log("Nincs beállítva valamely érték");
}	

?>