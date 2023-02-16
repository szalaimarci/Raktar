<?php

include_once("db_fuggvenyek.php");

$v_rkod = $_POST['rkod'];

if ( isset($v_rkod) ) {
	
	$v_tiszta_rkod = htmlspecialchars($v_rkod);
	
	$sikeres = raktart_torol($v_tiszta_rkod);
	
	if ( $sikeres == false ) {
		die("Nem sikerült törölni a rekordot.");
	} else {
		header("Location: raktar.php");	
	}	
} else {
	error_log("Nincs beállítva valamely érték");
}	

?>