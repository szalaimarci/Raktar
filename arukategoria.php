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
	


<h1>Árukategóriák felvitele</h1>

<form method="POST" action="arukategoriafelvitel.php" accept-charset="utf-8">
<label>Kategória kód: </label>
<input type="text" name="kkod" />
<br>
<label>Leírás: </label>
<input type="text" name="leiras" />
<br>
<input type="submit" value="Elküld" />
</form>


<hr/>
<h1>Kategóriák listája</h1>

<table border="1">
<tr>
<th>Kategóriakód</th>
<th>Leírás</th>
</tr>

<?php

	$arukategoria = arukategorialistatLeker(); // ez egy eredményhalmazt ad vissza
	
	// soronként dolgozzuk fel az eredményt
	// minden sort egy asszociatív tömbben kapunk meg
    while( $egySor = mysqli_fetch_assoc($arukategoria) ) { 
		echo '<form action="arukategoriaszerkesztes.php" method="POST">';
		echo '<tr>';
		echo '<td>'. $egySor["kkod"] .'</td>';
		echo '<td>'. $egySor["leiras"] .'</td>';
		echo '<td><input type="submit" value="Szerkeszt"></td>';
		echo '</tr>';
		echo '<input type="hidden" name="kkod" value="'.$egySor["kkod"].'">';
		echo'</form>';
		
		echo '</tr>';
	} 
	mysqli_free_result($arukategoria); // töröljük a listát a memóriából

?>
</table>


</BODY>
</HTML>
