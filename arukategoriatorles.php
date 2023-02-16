<?php

include_once("db_fuggvenyek.php");

$v_kkod = $_POST['kkod'];

if ( isset($v_kkod) ) {
	
	$v_tiszta_kkod = htmlspecialchars($v_kkod);
	
	$sikeres = arukategoriat_torol($v_tiszta_kkod);
	
	if ( $sikeres == false ) {
		die("Nem sikerült törölni a rekordot.");
	} else {
		header("Location: arukategoria.php");	
	}	
} else {
	error_log("Nincs beállítva valamely érték");
}	

?>