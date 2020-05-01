<?php
	$img_name = $_POST['email']. ".png";
	$img_type = $_FILES['imgPerso']['type'];
	$img_size = $_FILES['imgPerso']['size'];
	$img_tmp = $_FILES['imgPerso']['tmp_name'];
	move_uploaded_file($img_tmp, "./files/$	");
	$generHasard = uniqid();
	$_POST['mdp'] = hash('sha256', $_POST['mdp'] . $generHasard);
	$ligne = implode(';', $_POST) . ";$generHasard";
	$fich = file('./account.csv');
	for ($i=0; $i < sizeof($fich); $i++) { 
		$infos = explode(';', $fich[$i]);
		if ($infos[2] == $_POST['email']) {
			$fich[$i] = $ligne;
		}
		else{
			$fich[$i] = implode(';', $infos);
		}
	}
	$fichier = implode("\n", $fich);
	$manip = fopen('./account.csv', 'w');
	ftruncate($manip, 0);
	fwrite($manip, $fichier);
	fclose($manip);


	header("Location: ./donnees.php");
	
?>