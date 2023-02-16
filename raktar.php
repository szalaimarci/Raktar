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
	



<h1>Raktárak felvitele</h1>

<form method="POST" action="raktarfelvitel.php" accept-charset="utf-8">
<label>Raktárkód: </label>
<input type="text" name="rkod" />
<br>
<label>Irányítószám: </label>
<input type="text" name="iranyitoszam" />
<br>
<label>Város: </label>
<input type="text" name="varos" />
<br>
<label>Utca-házszám: </label>
<input type="text" name="utca" />
<br>
<input type="submit" value="Elküld" />
</form>


<hr/>
<h1>Raktárak listája</h1>

<table border="1">
<tr>
<th>Raktárkód</th>
<th>Irányítószám</th>
<th>Város</th>
<th>Utca-házszám</th>
</tr>

<?php

	$raktarak = raktarlistatLeker(); // ez egy eredményhalmazt ad vissza
	
	// soronként dolgozzuk fel az eredményt
	// minden sort egy asszociatív tömbben kapunk meg
    while( $egySor = mysqli_fetch_assoc($raktarak) ) { 
		echo '<form action="raktarszerkesztes.php" method="POST">';
		echo '<tr>';
		echo '<td>'. $egySor["rkod"] .'</td>';
		echo '<td>'. $egySor["iranyitoszam"] .'</td>';
		echo '<td>'. $egySor["varos"] .'</td>';
		echo '<td>'. $egySor["utca"] .'</td>';
		echo '<td><input type="submit" value="Szerkeszt"></td>';
		echo '</tr>';
		echo '<input type="hidden" name="rkod" value="'.$egySor["rkod"].'">';
		echo'</form>';
		
		echo '</tr>';
	} 
	mysqli_free_result($raktarak); // töröljük a listát a memóriából

?>
</table>


</BODY>
</HTML>
