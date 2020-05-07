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
			<li><a href="deconnexion.php"> Se déconnecter </a> </li>
			  <li>  <a href="index.php">Acceuil</a>  </li>

			
		</ul>
	</nav>

	</header>

		<section >

		<fieldset >
			<legend style="color: black;">trombinoscope :</legend>
	

		<p>Vous etes connecté en tant que <?php echo  $_SESSION['connected']; ?> </p>

			</div>

    <li><a href="#">L1-MIPI</a></li>
      <ul>
      <li><a href="donnees.php?classe=L1-MIPI&groupe=G1">MIPI-Groupe1</a></li>
      <li><a href="donnees.php?classe=L1-MIPI&groupe=G2">MIPI-Groupe2</a></li>
    
      </ul>
    <li><a href="#">L2-MI</a></li>
      <ul>
		<li><a href="donnees.php?classe=L2-MI&groupe=G1">L2-MI-Groupe1</a></li>
		<li><a href="donnees.php?classe=L2-MI&groupe=G2">L2-MI-Groupe2</a></li>
      </ul>
	  
    <li><a href="#">LPI-RS</a></li>
      <ul>
      <li><a href="donnees.php?classe=LP-RS&groupe=G1">LPI-RS-Groupe1</a></li>
      <li><a href="donnees.php?classe=LP-RS&groupe=G2">LPI-RS-Groupe2</a></li>
      </ul>
    <li><a href="#">LPI-RIWS</a></li>
      <ul>
      <a href="donnees.php?classe=LPI-RIWS&groupe=G1">LPI-RIWS-Groupe1</a></li>
      <a href="donnees.php?classe=LPI-RIWS&groupe=G2">LPI-RS-Groupe2</a></li>
  </ul>
     
      
<div class="main">
  <h1>Trombinoscope</h1>
  <div id='imprime'>
  <h2>Etudiants de <?php echo $_GET['classe']." en ". $_GET['groupe'] ?></h2>
  <?php
  if(isset($_GET['classe'])and isset($_GET['groupe'])){
    $recup_data = file_get_contents('http://etu-cergy.alwaysdata.net/src/createApi.php?classe='.$_GET['classe'].'&groupe='.$_GET['groupe']);
    $data = json_decode($recup_data,true);
    //var_dump($data);
    $number = count($data["etudiant"]);
    for ($i=0; $i <$number ; $i++) {
        echo "<div class='card'>";
          echo "<img src=".$data["etudiant"][$i]['imgPerso'].">";
          echo "<div class='container'>";
            echo "<p> ".$data["etudiant"][$i]['nom']."  ".$data["etudiant"][$i]['prenom']."</p>";
          echo"</div>";
        echo "</div>";  
    }
    
  }
?>
</div>



	</fieldset>

	</section>



	
</body>
</html>