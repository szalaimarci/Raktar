<?php

include_once('db_fuggvenyek.php');

$torolteladas = $_POST["torolteladas"];
$torolteladas2 = $_POST["torolteladas2"];

if ( isset($torolteladas) && isset($torolteladas2) ) {
	
	$sikeres = eladas_torlese($torolteladas, $torolteladas2);
	
	if ( $sikeres ) {
		header('Location: eladas.php');
	} else {
		echo 'Hiba történt a kölcsönzés törlése során';
	}
	
} else {
	echo 'Hiba történt a kölcsönzés törlése során';
	
}

?>
