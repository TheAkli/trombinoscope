<?php
	session_start();
	if (isset($_SESSION['connected'])) {
		header("Location: ./donnees.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/identificationcss.css">
	<link rel="stylesheet" type="text/css" href="./style.css">
	<title>Inscription</title>
</head>
<body>
	<header>
		<h1> Bienvenue cher(e) étudiant(e)<h1>
	</header>

	<div id="form">
		<form action="./inscription.php" method="POST" id="inscription"><br>
			<input type="text" name="nom" placeholder="Nom" required><br>
			<input type="text" name="prenom" placeholder="Prénom" required><br>
			<input type="email" name="email" placeholder="Adresse mail" required><br>
			<input type="date" name="naissance" value="1999-01-01" required><br>
			<select name="classe" required>
				<?php 

				$manip = fopen('./classe_groupe.csv', 'r');
				while ($ligne = fgets($manip)) {
					$ligne = explode(';', $ligne);
					echo "<option value=".$ligne[0].">".$ligne[0]."</option>";
				}
				fclose($manip);

				?>
			</select><br>
			<select name="groupe" required>
				<option value="G1">Groupe 1</option>
				<option value="G2">Groupe 2</option>
			</select><br>
			<input type="file" name="imgPerso" accept="image/png, image/jpeg, image/jpg" required>
			<input type="password" name="mdp" placeholder="Mot de passe" required>
			<input type="submit" value="Confirmer">
			
		</form>
	</div>
	<div id="#">
		<a href="login.php" > Vous etes déja inscrit </a>
	</div>
	
	
	
</body>
</html>