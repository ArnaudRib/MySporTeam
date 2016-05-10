<?php

// url du serveur
$servername = "localhost";
// Nom d'utilisateur Base de données
$username = "root";
// MDP utilisateur
$password = "";
// Nom de la base de donnée
$dbname = "Dynamo";

$co = mysqli_connect($servername, $username, $password, $dbname);

$text = $_GET['l'];

$sql = "SELECT ville_nom_reel as ville, ville_departement as dep FROM villes WHERE ville_nom_reel LIKE '%$text%' LIMIT 10";
$result = mysqli_query($co, $sql);
if (mysqli_num_rows($result) == 0) {
  echo "pas de résultats";
}
 ?>
<ul>
<?php
while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <li onclick="get(this.innerHTML)"><?php echo $row['ville'] ?></li>
  <?php
}
?>
</ul>
