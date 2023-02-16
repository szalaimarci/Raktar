<?php

include_once("db_fuggvenyek.php");

$v_rkod = $_POST['rkod'];
$v_iranyitoszam = $_POST['iranyitoszam'];
$v_varos = $_POST['varos'];
$v_utca = $_POST['utca'];

if ( isset($v_rkod) && isset($v_iranyitoszam) && isset($v_varos) && isset($v_utca) ) {
	
	$v_tiszta_rkod = htmlspecialchars($v_rkod);
	$v_tiszta_iranyitoszam = htmlspecialchars($v_iranyitoszam);
	$v_tiszta_varos = htmlspecialchars($v_varos);
	$v_tiszta_utca = htmlspecialchars($v_utca);
	
	$success = raktart_modosit($v_tiszta_rkod, $v_tiszta_iranyitoszam, $v_tiszta_varos, $v_tiszta_utca);
	
	if ( $success == false ) {
		die("Nem sikerült módosítani a rekordot.");
	} else {
		header("Location: raktar.php");	
	}	
} else {
	error_log("Nincs beállítva valamely érték");
}	

?>