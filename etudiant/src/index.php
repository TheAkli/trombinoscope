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
	<link rel="shortcut icon" href="../images/authentification.png" type="images/png" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/identificationcss.css" />
	<title>Inscription</title>
</head>
<body>
	
		<header>
	<h1>Service Inscription pour étudiants</h1>
	<h2>trombinoscopes</h2>
	<h2 style="padding-top: 2%;">Universit&eacute; de Cergy-Pontoise</h2>
	<a href="https://www.u-cergy.fr/fr/index.html"><img src="../images/logo.jpg" alt="Cergy université" height="100" width="140"></a>
		</header>
	

	<div class="login">
		<h2 style='text-align: center; border-bottom: 2px solid #570342;'>Inscriptions</h2>
		<form action="./inscription.php" method="POST" id="inscription"><br>

			<label for='nom'>Nom :</label>
			<input type="text" name="nom" placeholder="Nom" required><br>

			<label for='prenom'>Prénom :</label>
			<input type="text" name="prenom" placeholder="Prénom" required><br>
			<label for='email'>Votre Email :</label>
			<input type="email" name="email" placeholder="Adresse mail" required><br>
			<label for='naissance'>Votre date de naissance :</label>
			<input type="date" name="naissance" value="1999-01-01" required><br>
			<label for='formation'>Votre formation :</label>
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
			<label for='group'>Votre Groupe :</label>
			<select name="groupe" required>
				<option value="G1">Groupe 1</option>
				<option value="G2">Groupe 2</option>
			</select><br>
			<label for='imgPerso'>Importer l'image:</label>
			<input type="file" name="imgPerso" accept="image/png, image/jpeg, image/jpg" required> <br>
			<label for='mdp'>Mot de passe :</label>
			<input type="password" name="mdp" placeholder="Mot de passe" required>
			<input style='margin-left: 40%;' type="submit" value="Confirmer">

			<p style='border-bottom: 2px solid #570342; border-top: 2px solid #570342;'>Je suis enseignant.Rendez vous ici <a href='../index.html'> trombinoscope </a>('J'ai perdu mon mot de passe. Comment faire?')</p>
			<p 
			style='border-bottom: 2px solid #570342;'>Je suis <a href='mailto:aklimokrane048@gmail.com'>administratif / enseignant(e)</a>
			</p>

			
		</form>
	</div>
	
	
	
	
</body>
</html>