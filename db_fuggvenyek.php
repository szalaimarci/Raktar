<?php

function konyvtar_csatlakozas() {
	
	$conn = mysqli_connect("localhost", "root", "") or die("Csatlakozási hiba");
	if ( false == mysqli_select_db($conn, "raktarak" )  ) {
		
		return null;
	}
	
	// a karakterek helyes megjelenítése miatt be kell állítani a karakterkódolást!
	mysqli_query($conn, 'SET NAMES UTF-8');
	mysqli_query($conn, 'SET character_set_results=utf8');
	mysqli_set_charset($conn, 'utf8');
	
	return $conn;
	
}

function arut_beszur($cikkszam, $egysegar, $anev, $kkod) {
	
	
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO aru(cikkszam, egysegar, anev, kkod) VALUES (?, ?, ?, ?)");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ddsd", $cikkszam, $egysegar, $anev, $kkod );
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

function arulistatLeker() {
	
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$result = mysqli_query( $conn,"SELECT cikkszam, egysegar, anev, kkod FROM aru");
	
	mysqli_close($conn);
	return $result;
	
}

function raktarlistatLeker() {
	
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$result = mysqli_query( $conn,"SELECT rkod, iranyitoszam, varos, utca FROM raktar");
	
	mysqli_close($conn);
	return $result;
}

function raktart_beszur($rkod, $iranyitoszam, $varos, $utca) {
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO raktar(rkod, iranyitoszam, varos, utca) VALUES (?, ?, ?, ?)");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ddss", $rkod, $iranyitoszam, $varos, $utca);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

function beszallitot_beszur($bkod, $bnev) {
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO beszallito(bkod, bnev) VALUES (?, ?)");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ds", $bkod, $bnev);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

function beszallitolistatLeker() {
	
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$result = mysqli_query( $conn,"SELECT bkod, bnev FROM beszallito");
	
	mysqli_close($conn);
	return $result;
}

function arukategoriat_beszur($kkod, $leiras) {
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"INSERT INTO arukategoria(kkod, leiras) VALUES (?, ?)");
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "ds", $kkod, $leiras);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
	
}

function arukategorialistatLeker() {
	
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$result = mysqli_query( $conn,"SELECT kkod, leiras FROM arukategoria");
	
	mysqli_close($conn);
	return $result;
}


function cikkszamotLeker() {
	
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$result = mysqli_query( $conn,"SELECT cikkszam, CONCAT(cikkszam, ' - ', egysegar, ' - ', anev, ' - ', kkod) AS aruk FROM aru") or die(mysql_error());
	
	
	mysqli_close($conn);
	return $result;
}

function keszleten_aruk_listaja() {
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$result = mysqli_query( $conn,"SELECT aru.cikkszam AS cikkszam, anev, CONCAT(raktar.rkod, ' - ', raktar.varos) AS rkod, mennyiseg FROM aru, raktar, keszleten WHERE keszleten.cikkszam = aru.cikkszam AND keszleten.rkod = raktar.rkod") or die(mysql_error());
	
	
	mysqli_close($conn);
	return $result;
}


function keszlet_torlese($cikkszam) {
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"UPDATE keszleten SET cikkszam = NULL WHERE cikkszam = ?");
	
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "d", $cikkszam);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
}

function keszletet_beszur($cikkszam, $rkod, $mennyiseg) {
    if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }
       
    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"INSERT INTO keszleten(rkod, cikkszam, mennyiseg) VALUES (?, ?, ?) ");
    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "ddd", $rkod, $cikkszam, $mennyiseg);
    
    // lefuttatjuk az SQL utasitast
    $sikeres = mysqli_stmt_execute($stmt);
        // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
        // vegrehajtani az utasitast
        
    mysqli_close($conn);
    return $sikeres;
}

function aruadatot_leker( $cikkszam ) {
	if ( !($conn = konyvtar_csatlakozas()) ) {
			return false;
	}

	$stmt = mysqli_prepare( $conn, "SELECT cikkszam, egysegar, anev, kkod FROM aru WHERE cikkszam = ?");
	
	mysqli_stmt_bind_param($stmt, "d", $cikkszam);
	
	$result = mysqli_stmt_execute($stmt);
	
	if ( $result == false ) {
		die(mysqli_error($conn));
	}	

	mysqli_stmt_bind_result($stmt, $cikkszam, $egysegar, $anev, $kkod);
	
	$merch = array();
	
	mysqli_stmt_fetch($stmt);
	$merch["cikkszam"] = $cikkszam;
	$merch["egysegar"] = $egysegar;
	$merch["anev"] = $anev;
	$merch["kkod"] = $kkod;
	
	mysqli_close($conn);
	return $merch;
}	

function arut_modosit( $cikkszam, $egysegar, $anev, $kkod ) {
	if ( !($conn = konyvtar_csatlakozas()) ) {
		return false;
	}	
	
	$stmt = mysqli_prepare( $conn, "UPDATE aru SET egysegar = ?, anev = ?, kkod = ? WHERE cikkszam = ?");
	
	mysqli_stmt_bind_param($stmt, "dsdd", $egysegar, $anev, $kkod, $cikkszam);
	
	$success = mysqli_stmt_execute($stmt);
	
	if ( $success == false ) {
		die(mysqli_error($conn));
	}	
	mysqli_close($conn);
	return $success;
}	

function arut_torol( $cikkszam ) {
	if ( !($conn = konyvtar_csatlakozas()) ) {
		return false;
	}	
	
	$stmt = mysqli_prepare( $conn, "DELETE FROM aru WHERE cikkszam = ?");
	
	mysqli_stmt_bind_param($stmt, "d", $cikkszam);
	
	$success = mysqli_stmt_execute($stmt);
	
	if ( $success == false ) {
		die(mysqli_error($conn));
	}	
	mysqli_close($conn);
	return $success;
}	


function raktaradatot_leker( $rkod ) {
	if ( !($conn = konyvtar_csatlakozas()) ) {
			return false;
	}

	$stmt = mysqli_prepare( $conn, "SELECT rkod, iranyitoszam, varos, utca FROM raktar WHERE rkod = ?");
	
	mysqli_stmt_bind_param($stmt, "d", $rkod);
	
	$result = mysqli_stmt_execute($stmt);
	
	if ( $result == false ) {
		die(mysqli_error($conn));
	}	

	mysqli_stmt_bind_result($stmt, $rkod, $iranyitoszam, $varos, $utca);
	
	$storage = array();
	
	mysqli_stmt_fetch($stmt);
	$storage["rkod"] = $rkod;
	$storage["iranyitoszam"] = $iranyitoszam;
	$storage["varos"] = $varos;
	$storage["utca"] = $utca;
	
	mysqli_close($conn);
	return $storage;
}	


function raktart_modosit( $rkod, $iranyitoszam, $varos, $utca ) {
	if ( !($conn = konyvtar_csatlakozas()) ) {
		return false;
	}	
	
	$stmt = mysqli_prepare( $conn, "UPDATE raktar SET iranyitoszam = ?, varos = ?, utca = ? WHERE rkod = ?");
	
	mysqli_stmt_bind_param($stmt, "dssd", $iranyitoszam, $varos, $utca, $rkod);
	
	$success = mysqli_stmt_execute($stmt);
	
	if ( $success == false ) {
		die(mysqli_error($conn));
	}	
	mysqli_close($conn);
	return $success;
}	

function raktart_torol( $rkod ) {
	if ( !($conn = konyvtar_csatlakozas()) ) {
		return false;
	}	
	
	$stmt = mysqli_prepare( $conn, "DELETE FROM raktar WHERE rkod = ?");
	
	mysqli_stmt_bind_param($stmt, "d", $rkod);
	
	$success = mysqli_stmt_execute($stmt);
	
	if ( $success == false ) {
		die(mysqli_error($conn));
	}	
	mysqli_close($conn);
	return $success;
}	

function beszallitoadatot_leker( $bkod ) {
	if ( !($conn = konyvtar_csatlakozas()) ) {
			return false;
	}

	$stmt = mysqli_prepare( $conn, "SELECT bkod, bnev FROM beszallito WHERE bkod = ?");
	
	mysqli_stmt_bind_param($stmt, "d", $bkod);
	
	$result = mysqli_stmt_execute($stmt);
	
	if ( $result == false ) {
		die(mysqli_error($conn));
	}	

	mysqli_stmt_bind_result($stmt, $bkod, $bnev);
	
	$supplier = array();
	
	mysqli_stmt_fetch($stmt);
	$supplier["bkod"] = $bkod;
	$supplier["bnev"] = $bnev;
	
	mysqli_close($conn);
	return $supplier;
}	


function beszallitot_modosit( $bkod, $bnev ) {
	if ( !($conn = konyvtar_csatlakozas()) ) {
		return false;
	}	
	
	$stmt = mysqli_prepare( $conn, "UPDATE beszallito SET bnev = ? WHERE bkod = ?");
	
	mysqli_stmt_bind_param($stmt, "sd", $bnev, $bkod);
	
	$success = mysqli_stmt_execute($stmt);
	
	if ( $success == false ) {
		die(mysqli_error($conn));
	}	
	mysqli_close($conn);
	return $success;
}	

function beszallitot_torol( $bkod ) {
	if ( !($conn = konyvtar_csatlakozas()) ) {
		return false;
	}	
	
	$stmt = mysqli_prepare( $conn, "DELETE FROM beszallito WHERE bkod = ?");
	
	mysqli_stmt_bind_param($stmt, "d", $bkod);
	
	$success = mysqli_stmt_execute($stmt);
	
	if ( $success == false ) {
		die(mysqli_error($conn));
	}	
	mysqli_close($conn);
	return $success;
}	


function arukategoriaadatot_leker( $kkod ) {
	if ( !($conn = konyvtar_csatlakozas()) ) {
			return false;
	}

	$stmt = mysqli_prepare( $conn, "SELECT kkod, leiras FROM arukategoria WHERE kkod = ?");
	
	mysqli_stmt_bind_param($stmt, "d", $kkod);
	
	$result = mysqli_stmt_execute($stmt);
	
	if ( $result == false ) {
		die(mysqli_error($conn));
	}	

	mysqli_stmt_bind_result($stmt, $kkod, $leiras);
	
	$category = array();
	
	mysqli_stmt_fetch($stmt);
	$category["kkod"] = $kkod;
	$category["leiras"] = $leiras;
	
	mysqli_close($conn);
	return $category;
}	


function arukategoriat_modosit( $kkod, $leiras ) {
	if ( !($conn = konyvtar_csatlakozas()) ) {
		return false;
	}	
	
	$stmt = mysqli_prepare( $conn, "UPDATE arukategoria SET leiras = ? WHERE kkod = ?");
	
	mysqli_stmt_bind_param($stmt, "sd", $leiras, $kkod);
	
	$success = mysqli_stmt_execute($stmt);
	
	if ( $success == false ) {
		die(mysqli_error($conn));
	}	
	mysqli_close($conn);
	return $success;
}	

function arukategoriat_torol( $kkod ) {
	if ( !($conn = konyvtar_csatlakozas()) ) {
		return false;
	}	
	
	$stmt = mysqli_prepare( $conn, "DELETE FROM arukategoria WHERE kkod = ?");
	
	mysqli_stmt_bind_param($stmt, "d", $kkod);
	
	$success = mysqli_stmt_execute($stmt);
	
	if ( $success == false ) {
		die(mysqli_error($conn));
	}	
	mysqli_close($conn);
	return $success;
}	


function aruk_osszerteke() {
	if ( !($conn = konyvtar_csatlakozas()) ) {
		return false;
	}		
	
	$result = mysqli_query( $conn,"SELECT aru.cikkszam, anev, (SUM(mennyiseg) * aru.egysegar) AS osszertek FROM aru LEFT JOIN keszleten ON aru.cikkszam = keszleten.cikkszam GROUP BY aru.cikkszam" );
	
	if ( $result == false ) {
		die(mysqli_error($conn));
	}	

	$list = array();
	while ( $row = mysqli_fetch_assoc($result) ) {
		array_push( $list, $row );	
	}	
	mysqli_free_result($result);
	mysqli_close($conn);
	return $list;
}

function nagyker_aruk() {
	if ( !($conn = konyvtar_csatlakozas()) ) {
		return false;
	}		
	
	$result = mysqli_query( $conn,"SELECT aru.cikkszam AS cikkszam, anev, CONCAT(raktar.rkod, ' - ', raktar.varos) AS rkod, beszallito.bkod, mennyiseg, sorszam FROM aru, raktar, beszallito, beszerzes WHERE beszerzes.cikkszam = aru.cikkszam AND beszerzes.rkod = raktar.rkod AND beszerzes.bkod = beszallito.bkod AND mennyiseg > 100" );
	
	if ( $result == false ) {
		die(mysqli_error($conn));
	}	

	$list = array();
	while ( $row = mysqli_fetch_assoc($result) ) {
		array_push( $list, $row );	
	}	
	mysqli_free_result($result);
	mysqli_close($conn);
	return $list;
}


function legnagyobb_osszertek() {
	if ( !($conn = konyvtar_csatlakozas()) ) {
		return false;
	}		
	
	$result = mysqli_query( $conn,"SELECT aru.cikkszam, anev, (SUM(mennyiseg) * aru.egysegar) AS osszertek FROM aru LEFT JOIN keszleten ON aru.cikkszam = keszleten.cikkszam GROUP BY aru.cikkszam ORDER BY osszertek DESC LIMIT 1" );
	
	
	if ( $result == false ) {
		die(mysqli_error($conn));
	}	

	$list = array();
	while ( $row = mysqli_fetch_assoc($result) ) {
		array_push( $list, $row );	
	}	
	mysqli_free_result($result);
	mysqli_close($conn);
	return $list;
}


function eladott_aruk_listaja() {
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$result = mysqli_query( $conn,"SELECT aru.cikkszam AS cikkszam, anev, CONCAT(raktar.rkod, ' - ', raktar.varos) AS rkod, mennyiseg, sorszam FROM aru, raktar, eladas WHERE eladas.cikkszam = aru.cikkszam AND eladas.rkod = raktar.rkod") or die(mysql_error());
	
	
	mysqli_close($conn);
	return $result;
}


function eladas_torlese($cikkszam, $sorszam) {
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"UPDATE eladas SET cikkszam = NULL WHERE cikkszam = ? AND sorszam = ?");
	
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "dd", $cikkszam, $sorszam);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
}

function eladast_beszur($cikkszam, $rkod, $mennyiseg, $sorszam) {
    if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }
       
    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"INSERT INTO eladas(rkod, cikkszam, mennyiseg, sorszam) VALUES (?, ?, ?, ?) ");
    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "dddd", $rkod, $cikkszam, $mennyiseg, $sorszam);
    
    // lefuttatjuk az SQL utasitast
    $sikeres = mysqli_stmt_execute($stmt);
        // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
        // vegrehajtani az utasitast
        
    mysqli_close($conn);
    return $sikeres;
}

function beszerzest_beszur($cikkszam, $rkod, $bkod, $mennyiseg, $sorszam) {
    if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
        return false;
    }
       
    // elokeszitjuk az utasitast
    $stmt = mysqli_prepare( $conn,"INSERT INTO beszerzes(rkod, cikkszam, bkod, mennyiseg, sorszam) VALUES (?, ?, ?, ?, ?) ");
    // bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
    mysqli_stmt_bind_param($stmt, "ddddd", $rkod, $cikkszam, $bkod, $mennyiseg, $sorszam);
    
    // lefuttatjuk az SQL utasitast
    $sikeres = mysqli_stmt_execute($stmt);
        // ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e
        // vegrehajtani az utasitast
        
    mysqli_close($conn);
    return $sikeres;
}

function beszerzes_torlese($cikkszam, $sorszam) {
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	
	// elokeszitjuk az utasitast
	$stmt = mysqli_prepare( $conn,"UPDATE beszerzes SET cikkszam = NULL WHERE cikkszam = ? AND sorszam = ?");
	
	
	// bekotjuk a parametereket (igy biztonsagosabb az adatkezeles)
	mysqli_stmt_bind_param($stmt, "dd", $cikkszam, $sorszam);
	
	// lefuttatjuk az SQL utasitast
	$sikeres = mysqli_stmt_execute($stmt); 
		// ez logikai erteket ad vissza, ami megmondja, hogy sikerult-e 
		// vegrehajtani az utasitast 
		
	mysqli_close($conn);
	return $sikeres;
}

function beszerzett_aruk_listaja() {
	if ( !($conn = konyvtar_csatlakozas()) ) { // ha nem sikerult csatlakozni, akkor kilepunk
		return false;
	}
	
	// elokeszitjuk az utasitast
	$result = mysqli_query( $conn,"SELECT aru.cikkszam AS cikkszam, anev, CONCAT(raktar.rkod, ' - ', raktar.varos) AS rkod, beszallito.bkod, mennyiseg, sorszam FROM aru, raktar, beszallito, beszerzes WHERE beszerzes.cikkszam = aru.cikkszam AND beszerzes.rkod = raktar.rkod AND beszerzes.bkod = beszallito.bkod") or die(mysql_error());
	
	
	mysqli_close($conn);
	return $result;
}








