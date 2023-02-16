<?php

include_once('db_fuggvenyek.php');

$toroltkeszlet = $_POST["toroltkeszlet"];

if ( isset($toroltkeszlet) ) {
	
	$sikeres = keszlet_torlese($toroltkeszlet);
	
	if ( $sikeres ) {
		header('Location: keszleten.php');
	} else {
		echo 'Hiba történt a kölcsönzés törlése során';
	}
	
} else {
	echo 'Hiba történt a kölcsönzés törlése során';
	
}

?>
