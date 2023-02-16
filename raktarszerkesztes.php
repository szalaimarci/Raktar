<?php
require_once('db_fuggvenyek.php');
include_once('menu.php');
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<meta http-equiv="content-type" content="text/html" charset="UTF8" >
	<link rel="stylesheet" type="text/css" href="projekt.css"/>
	<style>
    
    </style>
</HEAD>
<BODY>
	

<h1>Raktárak szerkesztése</h1>

<?php
	$v_rkod = $_POST["rkod"];
	$v_rkod = htmlspecialchars($v_rkod);
	$raktaradat = raktaradatot_leker( $v_rkod );
	
?>

<form method="POST" action="raktarmodositas.php" accept-charset="utf-8">
<label class="formlabel">Raktárkód:</label>
<?php 
echo '<input class="forminput" type="text" name="rkod" value="'.$v_rkod.'" />';
?>
<br>
<label class="formlabel">Irányítószám:</label>
<?php 
echo '<input class="forminput" type="text" name="iranyitoszam" value="'.$raktaradat["iranyitoszam"].'" />';
?>
<br>
<label class="formlabel">Város:</label>
<?php 
echo '<input class="forminput" type="text" name="varos" value="'.$raktaradat["varos"].'" />';
?>
<br>
<label class="formlabel">Utca-házszám:</label>
<?php 
echo '<input class="forminput" type="text" name="utca" value="'.$raktaradat["utca"].'" />';
?>
<br>
<input class="forminput" type="submit" value="Módosít" />

</form>

<form action="raktartorles.php" method="POST">
<?php
echo '<input type="hidden" name="rkod" value="'.$v_rkod.'">';
?>
<input class="forminput" type="submit" value="Törlés">
</form>

</BODY>
</HTML>



	








