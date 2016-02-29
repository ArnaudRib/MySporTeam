<!--MODEL-->
<?php

// url du serveur
$servername = "localhost";
// Nom d'utilisateur Base de données
$username = "root";
// MDP utilisateur
$password = "";
// Nom de la base de donnée
$dbname = "MySporTeamBDD";

$co = mysqli_connect($servername, $username, $password, $dbname); // se connecter à la bdd

$text = $_GET['resultat'];

$sql = "SELECT id, nom, photo FROM Sports WHERE nom LIKE '%$text%' LIMIT 10";
$result = mysqli_query($co, $sql);

if (mysqli_num_rows($result) == 0) { //Si la recherche ne donne rien?>
  <p style="color:red;"> <?php echo "Désolé :( </br> YA PAS DE SPORT QUI S'APPELLE $text !!!";?> </p>
<?php
}

while ($row = mysqli_fetch_assoc($result)) { //row choisit une seule ligne.
  ?>
    <div title="<?php echo $row['nom']?>" class="boxes" style="background-image: url('<?php echo $row['photo']?>')";></div>
  <?php
}
?>
