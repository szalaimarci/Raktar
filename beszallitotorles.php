<?php

include_once("db_fuggvenyek.php");

$v_bkod = $_POST['bkod'];

if ( isset($v_bkod) ) {
	
	$v_tiszta_bkod = htmlspecialchars($v_bkod);
	
	$sikeres = beszallitot_torol($v_tiszta_bkod);
	
	if ( $sikeres == false ) {
		die("Nem sikerült törölni a rekordot.");
	} else {
		header("Location: beszallito.php");	
	}	
} else {
	error_log("Nincs beállítva valamely érték");
}	

?>