<?php

include_once("db_fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_rkod = $_POST['rkod'];
$v_iranyitoszam = $_POST['iranyitoszam'];
$v_varos = $_POST['varos'];
$v_utca = $_POST['utca'];

if ( isset($v_rkod) && isset($v_iranyitoszam) && 
     isset($v_varos) && isset($v_utca) ) {

	// beszúrjuk az új rekordot az adatbázisba
	raktart_beszur($v_rkod, $v_iranyitoszam, $v_varos, $v_utca);
	
	// visszatérünk az index.php-re
	header("Location: raktar.php");

} else {
	error_log("Nincs beállítva valamely érték");
	
}




?>
