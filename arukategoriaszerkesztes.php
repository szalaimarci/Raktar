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
	

<h1>Árukategoria szerkesztése</h1>

<?php
	$v_kkod = $_POST["kkod"];
	$v_kkod = htmlspecialchars($v_kkod);
	$arukategoriaadat = arukategoriaadatot_leker( $v_kkod );
	
?>

<form method="POST" action="arukategoriamodositas.php" accept-charset="utf-8">
<label class="formlabel">Kategóriakód:</label>
<?php 
echo '<input class="forminput" type="text" name="kkod" value="'.$v_kkod.'" />';
?>
<br>
<label class="formlabel">Leírás:</label>
<?php 
echo '<input class="forminput" type="text" name="leiras" value="'.$arukategoriaadat["leiras"].'" />';
?>
<br>
<input class="forminput" type="submit" value="Módosít" />

</form>

<form action="arukategoriatorles.php" method="POST">
<?php
echo '<input type="hidden" name="kkod" value="'.$v_kkod.'">';
?>
<input class="forminput" type="submit" value="Törlés">
</form>

</BODY>
</HTML>



	








