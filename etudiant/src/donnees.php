<?php

function logs(){
  $date = "[".date('d')."/".date('m')."/".date('y')."] ";
  $hour = "[".date('H').":".date('i').":".date('s')."] ";
  $ip = $_SERVER['REMOTE_ADDR'];
  $url = $_SERVER['PHP_SELF'];
  $answer = $date.$hour.$ip." connecte to ".$url."\n";

  $files = fopen('./data/logs/logs.txt', 'a+');
  fputs($files,$answer);
  fclose($files);
}
logs();

?>

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

		<section >

		<fieldset >
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