<?php
include('connectBDD.php');
$password=sha1($_POST['mot_de_passe']);
$date_de_naissance=$_POST['annee']."-".$_POST['mois']."-".$_POST['jour'];
$query=$db->prepare("INSERT INTO utilisateurs (pseudo,mot_de_passe,sexe,email,naissance) VALUES (?,?,?,?,?)");
$query->execute(array($_POST['pseudo'],$password,$_POST['sexe'],$_POST['email'],$date_de_naissance));
header("Location: index.php");
?>
