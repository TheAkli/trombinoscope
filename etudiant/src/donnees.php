<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<title>Donnees</title>
</head>
<body>
	<header>
	<p>	Mes données personnelles </p> 
	</header>
	<form action="./deconnexion.php">
		<input type="submit" value="Déconnexion">
	</form>
	<div id="infosUser">
		<table>
			<tr>
				<td>
					<img src= <?php echo './files/' . $_SESSION['connected']. '.jpg'; ?> alt="" height="150" width="150">
				</td>
			</tr>
		</table>

		<?php

			$manip = fopen("./account.csv", "r");
			while ($lignes = fgets($manip)) {
				$lignes = explode(";", $lignes);
				if ($lignes[2] == $_SESSION['connected']) {
					$line = $lignes;
				}
			}

			echo "<div id='liste'><ul><li id='nomFam'>Nom : $line[0]</li>
			<li id='prenom'>Prénom : $line[1]</li><li id='mail'>Adresse mail : $line[2]</li>
			<li id='pwd'>Mot de passe : *****</li><li id='dateNais'>Date de naissance : $line[4]</li>
			<li id='class'>Classe : $line[5]</li><li id='grp'>Groupe : $line[6]</li>
			</ul></div>";
		?>

		<a href="modifications.php"> Changer les informations</a>
		
	</div>
	
</body>
</html>