<?php

// url du serveur
$servername = "localhost";
// Nom d'utilisateur Base de données
$username = "root";
// MDP utilisateur
$password = "";
// Nom de la base de donnée
$dbname = "MySporTeamBDD";

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
