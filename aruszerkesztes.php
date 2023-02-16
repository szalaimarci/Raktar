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


<h1>Árúk szerkesztése</h1>

<?php
	$v_cikkszam = $_POST["cikkszam"];
	$v_cikkszam = htmlspecialchars($v_cikkszam);
	$aruadat = aruadatot_leker( $v_cikkszam );
	
?>

<form method="POST" action="arumodositas.php" accept-charset="utf-8">
<label class="formlabel">Cikkszám:</label>
<?php 
echo '<input class="forminput" type="text" name="cikkszam" value="'.$v_cikkszam.'" />';
?>
<br>
<label class="formlabel">Egységár:</label>
<?php 
echo '<input class="forminput" type="text" name="egysegar" value="'.$aruadat["egysegar"].'" />';
?>
<br>
<label class="formlabel">Arunév:</label>
<?php 
echo '<input class="forminput" type="text" name="anev" value="'.$aruadat["anev"].'" />';
?>
<br>
<label class="formlabel">Kategóriakód:</label>
<?php 
echo '<input class="forminput" type="text" name="kkod" value="'.$aruadat["kkod"].'" />';
?>
<br>
<input class="forminput" type="submit" value="Módosít" />

</form>

<form action="arutorles.php" method="POST">
<?php
echo '<input type="hidden" name="cikkszam" value="'.$v_cikkszam.'">';
?>
<input class="forminput" type="submit" value="Törlés">
</form>

</BODY>
</HTML>



	








