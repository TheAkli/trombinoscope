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
if (isset($_SESSION['connected'])) {
function GenereKeys($length=10){
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i=0; $i<$length; $i++){
        $string .= $chars[rand(0, strlen($chars)-1)];
    }
    return $string;
}

if (isset($_POST["formtype"])){
	$fichier = "./keys.csv";
	if (isset($_POST["email"]) and !empty($_POST["email"])){
		if ($_POST["formtype"] == "api") {

			$doesUserExist = FALSE;
			$lines = file($fichier);
			for($i=0;$i<sizeof($lines);$i++){	
				$line = $lines[$i];
				# remove new line character
				$line = str_replace("\n","",$line);
				$t = explode(",", $line);
				if ($t[0] == $_POST["email"]){
					$doesUserExist = TRUE;
					$ExistKeys = $t[1];
				}
			}
			if ($_POST["email"]==$_SESSION['connected']){
				if( $doesUserExist == TRUE ){
					$message = "Votre clé est : ".$ExistKeys;;

				}
				else{
					$keys = GenereKeys(10);
					$email = $_POST["email"];
					$fichier_end = fopen($fichier,"a");
					fwrite($fichier_end,$email.",".$keys."\n");
					fclose($fichier_end);
					$message= "Votre clé est : ".$keys;
				}
			}
			else {
				$message_erreur = "Entrez le mail correspondant a votre session";
			}
		}
	}
	else {
		$message_erreur = "Veuillez entrez votre e-mail";
	}
}
		
		
	

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    </meta>
	<title>Trombinoscope-API</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
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
		text-align: center;
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
				<h2 >Générer ou retrouver votre clé API </h2>


		<fieldset>
			<legend style="color: black;">vos données personelles :</legend>
	
 
	<ul class="listeForm" style="margin-left: 20%;">

<form action="./api.php" method="post" enctype="multipart/form-data" type="api" class="cle_api">
	<?php  
    if (isset($message)){
        echo '<div id="message">'.$message."</div>";
    }
    else{
        echo "<div id='message_erreur'>".$message_erreur."</div>";
    }
     ?>
     <div style="margin-top: 5%;">
		<label  for="email">Votre email :</label>
			<input type="e-mail" name="email" value="<?php 
	if (isset($_SESSION['connected'])){
		echo$_SESSION['connected'];}?>"/>
	</div>

	<input type="hidden" name="formtype" value="api" />
	<input type="submit" value="valider" class="button" />

</form>
</ul>

</fieldset>

	</section>


<footer>
	Mokrane Akli 
</footer>

</body>
</html>
<?php
}
else{
	header('Location: connexion.php');
}
?>
