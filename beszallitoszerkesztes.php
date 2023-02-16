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
	

<h1>Beszállítók szerkesztése</h1>

<?php
	$v_bkod = $_POST["bkod"];
	$v_bkod = htmlspecialchars($v_bkod);
	$beszallitoadat = beszallitoadatot_leker( $v_bkod );
	
?>

<form method="POST" action="beszallitomodositas.php" accept-charset="utf-8">
<label class="formlabel">Beszállító kód:</label>
<?php 
echo '<input class="forminput" type="text" name="bkod" value="'.$v_bkod.'" />';
?>
<br>
<label class="formlabel">Beszállító név:</label>
<?php 
echo '<input class="forminput" type="text" name="bnev" value="'.$beszallitoadat["bnev"].'" />';
?>
<br>
<input class="forminput" type="submit" value="Módosít" />

</form>

<form action="beszallitotorles.php" method="POST">
<?php
echo '<input type="hidden" name="bkod" value="'.$v_bkod.'">';
?>
<input class="forminput" type="submit" value="Törlés">
</form>

</BODY>
</HTML>



	








