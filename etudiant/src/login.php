<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../images/authentification.png" type="images/png" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/identificationcss.css" />
	<title>Connexion</title>
</head>
<body>
	<header>
	<h1>Service connexion pour étudiants</h1>
	<h2>trombinoscopes</h2>
	<h2 style="padding-top: 2%;">Universit&eacute; de Cergy-Pontoise</h2>
	<a href="https://www.u-cergy.fr/fr/index.html"><img src="../images/logo.jpg" alt="Cergy université" height="100" width="140"></a>
	</header>


<div class="login">
	<h2 style='text-align: center; border-bottom: 2px solid #570342;'>Login</h2>
	<form action='./connexion.php' method='POST' id='connect'>
		<label for='email'>Votre Email :</label>
		<input type="email" name="email" placeholder="Adresse mail" required><br>
		<label for='mdp'>Mot de passe :</label>
		<input type="password" name="mdp" placeholder="Mot de passe" required>
		<input style='margin-left: 40%;' type="submit" value="Confirmer">

		<p 
		style='border-bottom: 2px solid #570342;'>Pas encore membres ? <a href='login.php'>s'inscrire</a>
		</p>
	</form>
</div>
</body>
</html>