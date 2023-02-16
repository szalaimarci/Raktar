<?php

include_once("db_fuggvenyek.php"); // fel fugjuk használni ezeket a függvényeket

// lekérjük a POST-tal átlküldött paramétereket,
// ellenőrizzük azt is, hogy kaptak-e értéket

$v_bkod = $_POST['bkod'];
$v_bnev = $_POST['bnev'];

if ( isset($v_bkod) && isset($v_bnev) ) {

	// beszúrjuk az új rekordot az adatbázisba
	beszallitot_beszur($v_bkod, $v_bnev);
	
	// visszatérünk az index.php-re
	header("Location: beszallito.php");

} else {
	error_log("Nincs beállítva valamely érték");
	
}




?>
