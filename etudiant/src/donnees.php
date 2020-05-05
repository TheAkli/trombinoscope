<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/style.css" />
	<title>Donnees</title>
<style>
		input[type="text"], input[type="password"]{
			border: none;
			border-bottom: 2px solid black;
			margin-top: 3%;
		}
		input[type="text"]:focus{
			border-bottom-color: dodgerblue;
		}
		input[type="password"]:focus{
			border-bottom-color: dodgerblue;
		}
		input[type="submit"]{
			border-radius: 40px 0px 40px 0px;
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
 			font-size: 25pt;
		}
		h3{
			color: #570342;
			margin-left: 50px;
		}
		ul{
			list-style-type: none;
		}

		.listButtons li {
			display: inline-block;
			width: 150px;
			color: #570342;
			font-weight: bold;
			font-size: 18pt;
		}
		.blockRight{
			float: right;
			width: 100%;
			height: 400px;
			overflow: auto;
			border: 2px solid #570342;
		}
		.blockLeft{
			float: left;
			width: 52%;
			height: 400px;
			overflow: auto;
			background-color: #E6E6E6;
		}
		footer{
			position: absolute;
			margin-top: 415px; 
			width: 99%;
		}
</style>


</head>



<body>
	<header>
	<nav>
		<ul>
			<li><a href="modifications.php"> Changer les informations</a> </li>
			<li><a href="api.php"> Ma clé API </a> </li>
		</ul>
	</nav>

	</header>

		<section class="blockLeft">

		<fieldset style="background-color: white; color: black;">
			<legend style="color: black;">vos données personelles :</legend>
	

		<table>
			<tr>
				<td>
				<center>
					<img src= <?php echo './files/' . $_SESSION['connected']. '.png'; ?> alt="" height="150" width="150">
				</center>	
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

	</fieldset>

	</section>



	</div>
	
</body>
</html>