<?php

include_once('db_fuggvenyek.php');

$toroltbeszerzes = $_POST["toroltbeszerzes"];
$toroltbeszerzes2 = $_POST["toroltbeszerzes2"];


if ( isset($toroltbeszerzes) && isset($toroltbeszerzes) ) {
	
	$sikeres = beszerzes_torlese($toroltbeszerzes, $toroltbeszerzes2);
	$sikeres = keszlet_torlese($toroltbeszerzes);
	
	if ( $sikeres ) {
		header('Location: beszerzes.php');
	} else {
		echo 'Hiba történt a kölcsönzés törlése során';
	}
	
} else {
	echo 'Hiba történt a kölcsönzés törlése során';
	
}

?>
