<?php

	$informations = array();
	$lignes = '';
	
	$generHasard = uniqid();

	array_push($informations, $_POST['nom'],$_POST['prenom'],$_POST['email'],hash('sha256', $_POST['mdp'] . $generHasard));
	foreach ($informations as $value) {
		$lignes = $lignes . $value . ";";
	}
	$manip = fopen('./account.csv', 'r');
	$fich = '';
	while ($ligne = fgets($manip)) {
		$fich = $fich.$ligne;
	}
	fclose($manip);
	$manip = fopen('./account.csv', 'w');
	fwrite($manip, $fich."\n".$lignes);
	fclose($manip);
	header("Location: ./index.php");

?>