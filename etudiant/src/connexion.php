<?php
	
	session_start();
	if (!isset($_SESSION['connected'])) {
		$informations = array();
		$manip = fopen('./account.csv', 'r');
		array_push($informations, $_POST['email']);		
		while ($ligne = fgets($manip)) {
			$ligne = explode(";", $ligne);
			if ($ligne[2] == $informations[0]) {
				array_push($informations, hash('sha256', $_POST['mdp'] . $ligne[7]));
				if ($ligne[3] == $informations[1]) {
					$_SESSION['connected'] = $_POST['email'];
					header("Location: ./donnees.php");
				}
				else{
					header("Location: ./index.php");
				}
			}
		}
		fclose($manip);
		header("Location: ./index.php");
		echo 'utilisateur existe pas';
	}
	else{
		header("Location: ./donnees.php");
	}
?>