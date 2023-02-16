<?php

include_once("db_fuggvenyek.php");

$v_kkod = $_POST['kkod'];
$v_leiras = $_POST['leiras'];

if ( isset($v_kkod) && isset($v_leiras) ) {
	
	$v_tiszta_kkod = htmlspecialchars($v_kkod);
	$v_tiszta_leiras = htmlspecialchars($v_leiras);
	
	$success = arukategoriat_modosit($v_tiszta_kkod, $v_tiszta_leiras);
	
	if ( $success == false ) {
		die("Nem sikerült módosítani a rekordot.");
	} else {
		header("Location: arukategoria.php");	
	}	
} else {
	error_log("Nincs beállítva valamely érték");
}	

?>