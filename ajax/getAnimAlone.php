<?php
	include "../util/fonctions.php";
	
	$idField = $_REQUEST['idAnim'];
	$table = "anime";
	$idTable = "id_anime";

	$tab = getAllAbout($table, $idTable, $idField);

	
	echo json_encode($tab);
?>