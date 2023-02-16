<?php
include_once('db_fuggvenyek.php');
include_once('menu.php');
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<meta http-equiv="content-type" content="text/html charset=UTF8" >
	<link rel="stylesheet" type="text/css" href="projekt.css"/>
	<style>
    </style>
</HEAD>
<BODY>


<h1>Árúk felvitele</h1>

<form method="POST" action="arufelvitel.php" accept-charset="utf-8">

   <label>Cikkszám: </label>
   <input type="text" name="cikkszam" />
   <br>
   <label>Egységár: </label>
   <input type="text" name="egysegar" />
   <br>
   <label>Árúnév: </label>
   <input type="text" name="anev" />
   <br>
   <label>Kategóriakód: </label>
   <input type="text" name="kkod" />
   <br>
   <input type="submit" value="Elküld" />
</form>


<hr/>
<h1>Árúk listája</h1>

<table border="1">
<tr>
<th>cikkszam</th>
<th>Egységár</th>
<th>Árúnév</th>
<th>Kategóriakód</th>
</tr>

<?php

	$aruk = arulistatLeker();
	
    while( $egySor = mysqli_fetch_assoc($aruk) ) { 
		echo '<form action="aruszerkesztes.php" method="POST">';
		echo '<tr>';
		echo '<td>'. $egySor["cikkszam"] .'</td>';
		echo '<td>'. $egySor["egysegar"] .'</td>';
		echo '<td>'. $egySor["anev"] .'</td>';
		echo '<td>'. $egySor["kkod"] .'</td>';
		echo '<td><input type="submit" value="Szerkeszt"></td>';
		echo '</tr>';
		echo '<input type="hidden" name="cikkszam" value="'.$egySor["cikkszam"].'">';
		echo'</form>';
	} 
	mysqli_free_result($aruk); // töröljük a listát a memóriából

?>
</table>


</BODY>
</HTML>
