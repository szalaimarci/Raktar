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

<h1>Áru beszerzése:</h1>

<form method="POST" action="beszerzesfelvitel.php" accept-charset="utf-8">
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

<input type="submit" value="Elküld" />

</form>


<hr/>
<h1>Beszerzett árúk listája</h1>

<table border="1">
<tr>
<th>Cikkszám</th>
<th>Árúnév</th>
<th>Raktárkód</th>
<th>Beszállító kód</th>
<th>Mennyiség</th>
<th>Sorszám</th>
</tr>

<?php

	$aruk = beszerzett_aruk_listaja(); // ez egy eredményhalmazt ad vissza
	
	// soronként dolgozzuk fel az eredményt
	// minden sort egy asszociatív tömbben kapunk meg
    while( $egySor = mysqli_fetch_assoc($aruk) ) { 
		echo '<tr>';
		echo '<td>'. $egySor["cikkszam"] .'</td>';
		echo '<td>'. $egySor["anev"] .'</td>';
		echo '<td>'. $egySor["rkod"] .'</td>';
		echo '<td>'. $egySor["bkod"] .'</td>';
		echo '<td>'. $egySor["mennyiseg"] .'</td>';
		echo '<td>'. $egySor["sorszam"] .'</td>';
		echo '<td><form method="POST" action="beszerzestorles.php">
				  <input type="hidden" name="toroltbeszerzes" value="'.$egySor["cikkszam"].'" />
				  <input type="hidden" name="toroltbeszerzes2" value="'.$egySor["sorszam"].'" />
				  <input type="submit" value="Beszerzés visszavonása" />
		          </form></td>';
		echo '</tr>';
	} 
	mysqli_free_result($aruk); // töröljük a listát a memóriából

?>
</table>
</p>

<h1>Nagyker mennyiségben beszerzett áruk</h1>

<table border="1">
<tr>
<th>Cikkszám</th>
<th>Árúnév</th>
<th>Raktárkód</th>
<th>Beszállító kód</th>
<th>Mennyiség</th>
<th>Sorszám</th>
</tr>

<?php

	$lista = nagyker_aruk();
	
	foreach ( $lista as $sor) {
		echo '<tr>';
		echo '<td>'. $sor["cikkszam"] .'</td>';
		echo '<td>'. $sor["anev"] .'</td>';
		echo '<td>'. $sor["rkod"] .'</td>';
		echo '<td>'. $sor["bkod"] .'</td>';
		echo '<td>'. $sor["mennyiseg"] .'</td>';
		echo '<td>'. $sor["sorszam"] .'</td>';
		echo '</tr>';
	}	
?>
</table>
</p>

</BODY>
</HTML>
