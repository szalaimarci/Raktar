<?php

include_once("db_fuggvenyek.php");

$v_cikkszam = $_POST['cikkszam'];

if ( isset($v_cikkszam) ) {
	
	$v_tiszta_cikkszam = htmlspecialchars($v_cikkszam);
	
	$sikeres = arut_torol($v_tiszta_cikkszam);
	
	if ( $sikeres == false ) {
		die("Nem sikerült törölni a rekordot.");
	} else {
		header("Location: aru.php");	
	}	
} else {
	error_log("Nincs beállítva valamely érték");
}	

?>