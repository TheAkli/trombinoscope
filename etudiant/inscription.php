<?php

	$informations = array();
	$lignes = '';
	$img_name = $_POST['email']. ".png";
	$img_type = $_FILES['imgPerso']['type'];
	$img_size = $_FILES['imgPerso']['size'];
	$img_tmp = $_FILES['imgPerso']['tmp_name'];
	move_uploaded_file($img_tmp, "./files/$img_name");
	$generHasard = uniqid();

	array_push($informations, $_POST['nom'],$_POST['prenom'],$_POST['email'],hash('sha256', $_POST['mdp'] . $generHasard),$_POST['naissance'],$_POST['classe'],$_POST['groupe'],$generHasard);
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