<?php

include_once("db_fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_kkod = $_POST['kkod'];
$v_leiras = $_POST['leiras'];

if ( isset($v_kkod) && isset($v_leiras) ) {

	// beszúrjuk az új rekordot az adatbázisba
	arukategoriat_beszur($v_kkod, $v_leiras);
	
	// visszatérünk az index.php-re
	header("Location: arukategoria.php");

} else {
	error_log("Nincs beállítva valamely érték");
	
}




?>
