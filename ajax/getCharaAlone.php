<?php
	include "../util/fonctions.php";

	$idField = $_REQUEST['idChara'];
	$table = "characters";
	$idTable = "id_characters";

	$tab = getAllAbout($table, $idTable, $idField);

	
	echo json_encode($tab);
?>