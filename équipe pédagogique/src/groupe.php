<?php
session_start();
if (isset($_SESSION['login'])){


?>
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <title>Trombinoscope</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <nav>
    <ul>
    <a href="acceuil.php">Acceuil</a>  
    <li><a href="#">L1-MIPI</a></li>
      <ul>
      <li><a href="groupe.php?classe=L1-MIPI&groupe=G1">MIPI-Groupe1</a></li>
      <li><a href="groupe.php?classe=L1-MIPI&groupe=G2">MIPI-Groupe2</a></li>
    
      </ul>
    <li><a href="#">L2-MI</a></li>
      <ul>
		<li><a href="groupe.php?classe=L2-MI&groupe=G1">L2-MI-Groupe2</a></li>
		<li><a href="groupe.php?classe=L2-MI&groupe=G2">L2-MI-Groupe2</a></li>
      </ul>
	  
    <li><a href="filiere.php?filiere=LPI-RIWS&key=pHQxXMN1nO">LPI-RIWS</a></li>
      <ul>
      <li><a href="groupe.php?filiere=LPI-RIWS&groupe=L1&key=pHQxXMN1nO">LPI-RIWS-L1</a></li>
      <li><a href="groupe.php?filiere=LPI-RIWS&groupe=L2&key=pHQxXMN1nO">LPI-RIWS-L2</a></li>
      <li><a href="groupe.php?filiere=LPI-RIWS&groupe=L3&key=pHQxXMN1nO">LPI-RIWS-L3</a></li>
      </ul>
    <li><a href="filiere.php?filiere=LPI-RS&key=pHQxXMN1nO">LPI-RS</a></li>
      <ul>
      <a href="groupe.php?filiere=LPI-RS&groupe=L1&key=pHQxXMN1nO">LPI-RS-L1</a></li>
      <a href="groupe.php?filiere=LPI-RS&groupe=L2&key=pHQxXMN1nO">LPI-RS-L2</a></li>
      <a href="groupe.php?filiere=LPI-RS&groupe=L3&key=pHQxXMN1nO">LPI-RS-L3</a></li>
      </ul>
        <a href="deconnexion.php">Déconnexion</a>
        <p>© Wasef Alexandra</p>
      </ul> 
    </nav>
<div class="main">
  <h1>Trombinoscope</h1>
  <div id='imprime'>
  <h2>Eleves de <?php echo $_GET['classe']." en ". $_GET['groupe'] ?></h2>
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
            echo "<p> ".$data["etudiant"][$i]['email']."</p>";
          echo"</div>";
        echo "</div>";  
    }
    
  }


?>
</div>



</div>
</body>
</html>
<?php
}
else{
  header('Location:index.php');
}
?>