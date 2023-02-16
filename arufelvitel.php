<?php

include_once("db_fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_cikkszam = $_POST['cikkszam'];
$v_egysegar = $_POST['egysegar'];
$v_anev = $_POST['anev'];
$v_kkod = $_POST['kkod'];

if ( isset($v_cikkszam) && isset($v_egysegar) && 
     isset($v_anev) && isset($v_kkod) ) {

	// beszúrjuk az új rekordot az adatbázisba
	arut_beszur($v_cikkszam, $v_egysegar, $v_anev, $v_kkod);
	
	// visszatérünk az index.php-re
	header("Location: aru.php");

} else {
	error_log("Nincs beállítva valamely érték");
	
}




?>
