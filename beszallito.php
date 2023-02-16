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



<h1>Beszállítók felvitele</h1>

<form method="POST" action="beszallitofelvitel.php" accept-charset="utf-8">
<label>Beszállító kód: </label>
<input type="text" name="bkod" />
<br>
<label>Beszállító név: </label>
<input type="text" name="bnev" />
<br>
<input type="submit" value="Elküld" />
</form>


<hr/>
<h1>Beszállítók listája</h1>

<table border="1">
<tr>
<th>Beszállító kód</th>
<th>Beszállító név</th>
</tr>

<?php

	$beszallito = beszallitolistatLeker(); // ez egy eredményhalmazt ad vissza
	
	// soronként dolgozzuk fel az eredményt
	// minden sort egy asszociatív tömbben kapunk meg
    while( $egySor = mysqli_fetch_assoc($beszallito) ) { 
		echo '<form action="beszallitoszerkesztes.php" method="POST">';
		echo '<tr>';
		echo '<td>'. $egySor["bkod"] .'</td>';
		echo '<td>'. $egySor["bnev"] .'</td>';
		echo '<td><input type="submit" value="Szerkeszt"></td>';
		echo '</tr>';
		echo '<input type="hidden" name="bkod" value="'.$egySor["bkod"].'">';
		echo'</form>';
	} 
	mysqli_free_result($beszallito); // töröljük a listát a memóriából

?>
</table>


</BODY>
</HTML>
