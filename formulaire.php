<?php
include('connectBDD.php');

$password=sha1($_POST['mot_de_passe']);
$query=$db->prepare("INSERT INTO utilisateurs (pseudo,mot_de_passe,email) VALUES (?,?,?)");
$query->execute(array($_POST['pseudo'],$password,$_POST['email']));
header("Location: index.php");
?>
