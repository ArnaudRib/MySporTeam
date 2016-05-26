<?php setlocale(LC_ALL, "fr_FR") ?>
<?php require "Calendar1.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">

    <title>test</title>
  </head>
  <body>
    <?php
    $events = [
      "CALENDRIER 1" => ["2016-01-01" => ["titre1", "descrition1"]],
      "CALENDRIER 2" => ["2016-02-01" => ["titre2", "descrition2"]],
      "CALENDRIER 3" => ["2016-03-04" => ["titre2", "descrition2"]],
      "CALENDRIER 4" => ["2016-01-01" => ["titre2", "descrition2"]],
      "CALENDRIER 5" => ["2016-01-01" => ["titre2", "descrition2"]],
      "CALENDRIER 6" => ["2016-03-20" => ["titre2", "descrition2"]],
      "CALENDRIER 7" => ["2016-01-01" => ["titre2", "descrition2"]],
      "CALENDRIER 8" => ["2016-01-01" => ["titre2", "descrition2"]],
      "CALENDRIER 9" => ["2016-02-23" => ["titre2", "descrition2"]],
      "CALENDRIER 10" => ["2016-01-01" => ["titre2", "descrition2"]],
      "CALENDRIER 11" => ["2016-05-01" => ["titre2", "descrition2"]],
      "CALENDRIER 12" => ["2016-01-01" => ["titre2", "descrition2"]],
      "CALENDRIER 13" => ["2016-01-01" => ["titre2", "descrition2"]],
      "CALENDRIER 14" => ["2016-01-01" => ["titre2", "descrition2"]],
    ];
    // url du serveur
    $servername = "localhost";
    // Nom d'utilisateur Base de données
    $username = "root";
    // MDP utilisateur
    $password = "";
    // Nom de la base de donnée
    $dbname = "APP-test";

    $co = mysqli_connect($servername, $username, $password, $dbname) or die("pas de base de donnée :(");

    $sql = "SELECT groupe.titre, planning.date, planning.activité, planning.description AS description, dstart, dend FROM planning JOIN groupe ON groupe.id = planning.id_groupe";
    $result = mysqli_query($co, $sql);
    $events = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $events[$row['titre']][] = [$row['date'], $row['activité'], $row['description'], $row['dstart'], $row['dend']];
    }
    ?>

    <?php Calendar(12, $events); ?>
    <script src="cal.js" charset="utf-8"></script>
  </body>
</html>
