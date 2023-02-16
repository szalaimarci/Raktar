<?php

include_once("db_fuggvenyek.php");

$v_bkod = $_POST['bkod'];
$v_bnev = $_POST['bnev'];

if ( isset($v_bkod) && isset($v_bnev) ) {
	
	$v_tiszta_bkod = htmlspecialchars($v_bkod);
	$v_tiszta_bnev = htmlspecialchars($v_bnev);
	
	$success = beszallitot_modosit($v_tiszta_bkod, $v_tiszta_bnev);
	
	if ( $success == false ) {
		die("Nem sikerült módosítani a rekordot.");
	} else {
		header("Location: beszallito.php");	
	}	
} else {
	error_log("Nincs beállítva valamely érték");
}	

?>