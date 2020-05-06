<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>

	<title>Modifier vos données</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../images/prof.png" type="images/png" />
	<link rel="stylesheet" href="../css/style.css" />




	<style>
	.photosTable{
		background-color: white;
		border: 2px solid #570342;
		font-weight: bold;
		font-style: italic;
		color: #570342;
		font-size: 15pt;
		text-align: center;
		width: 30%;
		margin: auto;
	}
	section{
		background-color: #E6E6E6;
		width:90%;
		margin:auto;
		box-shadow: 3px 3px 3px #000;
	}
	input[type="search"]{
		width: 300px;
		height: 30px;
		font-size: 18px;
		line-height: 30px;
		padding: 8px 12px;
		border: 2px solid #ccc;
		border-radius: 8px;
	}
	input[type="search"]:focus{
		border-bottom-color: dodgerblue;
	}
	input[type="submit"]{
		height: 30px;
		line-height: 30px;
		border-radius: 8px;
		border-color: black;
		font-weight: bold;
	}
	input:required{
		background: url(../images/asterisk.png) right center no-repeat transparent;
	}
	input:focus:valid{
		border-bottom-color: green;
		background: url(../images/valid.png) right center no-repeat transparent;
	}
	input:focus:invalid{
		border-bottom-color: red;
		background: url(../images/invalid.png) right center no-repeat transparent;
	}
	legend{
		background-color: #A5A5A5; 
		border: 1px solid black;
		font-weight: bold;
	}
	label{
		padding: 3px;
		color: white;
		border-radius: 600px 100px 100px 300px;
		border-color: white;
		background-color: #570342;
	}
	h2{
 		color: #570342;
 		text-align: center;
 		font-size: 26pt;
 		padding:1%;

	}
	h3{
		color: #570342;
		margin-left: 50px;
	}
	.listeForm li {
		display: inline-block;
		list-style-type: none;
		width: 30%;
	}
</style>
</head>
<body>

<header>
	<nav>

		<ul>

	    <li>  <a href="deconnexion.php">Déconnexion</a> </li>
     	<li>  <a href="api.php">Cle API</a></li>
    	<li><a href="donnees.php">Profil</a> </li> 
    	<li>  <a href="http://etu-cergy.alwaysdata.net/">acceuil</a></li>

		</ul>
		
	</nav>
     
</header>

	<section>
		<h2> Modifier vos informations </h2>
		
 			<fieldset>
	<p>Vous etes connecté en tant que : <?php echo  $_SESSION['connected']; ?></p>

	<ul class="listeForm" style="margin-left: 20%;">

	<form action='./modif.php' method='POST' id='modif' enctype='multipart/form-data'>

			<div style="margin-top: 5%;">
			<label  for="nom">Nom :</label>
			<input type="text" name="nom" placeholder="Nom" required />
			</div>

			<div style="margin-top: 5%;">
			<label  for="prenom">Prénom :</label>

			<input type="text" name="prenom" placeholder="Prénom" required>

			</div>		

			<div style="margin-top: 5%;">
			<label  for="email">Email :</label>

			<input type="email" name="email" placeholder="Adresse mail" value="<?php 
	if (isset($_SESSION['connected'])){
		echo$_SESSION['connected'];}?>" required>

			</div>

			<div style="margin-top: 5%;">
			<label  for="mdp">Mot de passe :</label>
				<input type="password" name="mdp" placeholder="Mot de passe" required>
			</div>

			<div style="margin-top: 5%;">
			<label  for="naissance">Date de naissance :</label>

				<input type="date" name="naissance" value="1999-01-01" required><br>

			</div>

			<div style="margin-top: 5%;">
			<label  for="classe">Filiere :</label>
				<select name='classe' required><?php $handle = fopen('./classe_groupe.csv', 'r');while ($lignes = fgets($handle)) {$lignes = explode(';', $lignes);echo '<option value='.$lignes[0].'>'.$lignes[0].'</option>';}fclose($handle);?>
				
				</select>
			</div>

			<div style="margin-top: 5%;">
			<label  for="groupe">Groupe :</label>
				<select name='groupe'required><option value='G1'>Groupe 1</option><option value='G2'>Groupe 2</option>
			</select>
			</div>

			<div style="margin-top: 5%;">
			<label  for="imageEtu">Importer une autre image :</label>
				<input type='file' name='imageEtu' id='imageEtu' accept='image/png, image/jpeg, image/jpg'>
			</div>
		<input type='submit' value='Confirmer'>
	</form>
	</ul>
		

				</fieldset>

	</section>


</body>
</html>