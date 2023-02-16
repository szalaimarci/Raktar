<?php
include_once('db_fuggvenyek.php');
include_once('menu.php');
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<meta http-equiv="content-type" content="text/html" charset=UTF8" >
	<link rel="stylesheet" type="text/css" href="projekt.css"/>
	<style>
   
    </style>
</HEAD>
<BODY>


<h1>Új áru felvétele</h1>

<form method="POST" action="keszletfelvitel.php" accept-charset="utf-8">
<label>Cikkszám : </label>
<select name="valasztottCikszam">
<?php 
	$cikkszamok = arulistatLeker();
	while( $egySor = mysqli_fetch_assoc($cikkszamok) ) {
		echo '<option value="'.$egySor["cikkszam"].'">'. 
		      $egySor["cikkszam"]. ' - '. 
		      $egySor["anev"]. ' - ' . 
			  $egySor["egysegar"]. 'Ft - ' .
		      $egySor["kkod"] .'</option>';
	}
	mysqli_free_result($cikkszamok);

?>
</select>
<br>
<label>Raktárkód: </label>
<select name="valasztottRaktar">
<?php 
	$raktarak = raktarlistatLeker();
	while( $egySor = mysqli_fetch_assoc($raktarak) ) {
		echo '<option value="'.$egySor["rkod"].'">'. 
		      $egySor["rkod"]. ' - '. 
		      $egySor["iranyitoszam"]. ' - ' .
			  $egySor["varos"]. ' - ' .
		      $egySor["utca"] .'</option>';
	}
	mysqli_free_result($raktarak);

?>
</select>
<br>
<label>Beszállító kód: </label>
<select name="valasztottBeszallito">
<?php 
	$beszallitok = beszallitolistatLeker();
	while( $egySor = mysqli_fetch_assoc($beszallitok) ) {
		echo '<option value="'.$egySor["bkod"].'">'. 
		      $egySor["bnev"]. '</option>';
	}
	mysqli_free_result($beszallitok);

?>
</select>
<br>
<label>Mennyiség: </label>
<input type="text" name="mennyiseg" />
<br>
<label>Sorszám: </label>
<input type="text" name="sorszam" />
<br>
<input type="submit" value="Elküld" />

</form>


<hr/>
<h1>Készleten lévő áruk listája</h1>

<table border="1">
<tr>
<th>Cikkszám</th>
<th>Árunév</th>
<th>Raktárkód</th>
<th>Mennyiség</th>
</tr>

<?php

	$aruk = keszleten_aruk_listaja(); // ez egy eredményhalmazt ad vissza
	
	// soronként dolgozzuk fel az eredményt
	// minden sort egy asszociatív tömbben kapunk meg
    while( $egySor = mysqli_fetch_assoc($aruk) ) { 
		echo '<tr>';
		echo '<td>'. $egySor["cikkszam"] .'</td>';
		echo '<td>'. $egySor["anev"] .'</td>';
		echo '<td>'. $egySor["rkod"] .'</td>';
		echo '<td>'. $egySor["mennyiseg"] .'</td>';
		echo '<td><form method="POST" action="keszlettorles.php">
				  <input type="hidden" name="toroltkeszlet" value="'.$egySor["cikkszam"].'" />
				  <input type="submit" value="Készletről törlés" />
		          </form></td>';
		echo '</tr>';
	} 
	mysqli_free_result($aruk); // töröljük a listát a memóriából

?>
</table>
</p>
<p>
<h1>Készleten lévő áruk összértéke</h1>

<table border="1">
<tr>
<th>Cikkszám</th>
<th>Árunév</th>
<th>Összérték</th>
</tr>

<?php

	$lista = aruk_osszerteke();
	
	foreach ( $lista as $sor) {
		echo '<tr>';
		echo '<td>'. $sor["cikkszam"] .'</td>';
		echo '<td>'. $sor["anev"] .'</td>';
		echo '<td>'. $sor["osszertek"] . 'Ft ' .'</td>';
		echo '</tr>';
	}	
?>
</table>
</p>

<p>
<h1>Legnagyobb összértékű készleten lévő áru</h1>

<table border="1">
<tr>
<th>Cikkszám</th>
<th>Árúnév</th>
<th>Összérték</th>
</tr>

<?php

	$lista = legnagyobb_osszertek();
	
	foreach ( $lista as $sor) {
		echo '<tr>';
		echo '<td>'. $sor["cikkszam"] .'</td>';
		echo '<td>'. $sor["anev"] .'</td>';
		echo '<td>'. $sor["osszertek"] . 'Ft ' .'</td>';
		echo '</tr>';
	}	
?>
</table>
</p>

</BODY>
</HTML>
