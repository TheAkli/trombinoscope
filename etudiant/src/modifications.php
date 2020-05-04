<!DOCTYPE html>
<html>
<head>
	<title>Modifier vos données</title>
	<meta charset="utf-8">
</head>
<body>
	<form action='./modif.php' method='POST' id='modif' enctype='multipart/form-data'>
			<input type="text" name="nom" placeholder="Nom" required value="<?php 
	if (isset($_SESSION['connected'])){
		echo$_POST['nom'];}?>"/>><br>
			<input type="text" name="prenom" placeholder="Prénom" required><br>
			<input type="email" name="email" placeholder="Adresse mail" required><br>
			<input type="password" name="mdp" placeholder="Mot de passe" required>
			<input type="date" name="naissance" value="1999-01-01" required><br>
			<select name='classe' required><?php $handle = fopen('./classe_groupe.csv', 'r');while ($lignes = fgets($handle)) {$lignes = explode(';', $lignes);echo '<option value='.$lignes[0].'>'.$lignes[0].'</option>';}fclose($handle);?>
			
		</select>
		<select name='groupe'required><option value='G1'>Groupe 1</option><option value='G2'>Groupe 2</option>
		</select>
		<input type='file' name='imageEtu' id='imageEtu' accept='image/png, image/jpeg, image/jpg'><input type='submit' value='Confirmer'></form>

</body>
</html>