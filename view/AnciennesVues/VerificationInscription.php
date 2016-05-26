<?php
$mot_de_passe=$_POST["mot_de_passe"];
$mot_de_passe_confirmation=$_POST["mot_de_passe_confirmation"];
/*echo $mot_de_passe."</br>";
echo $mot_de_passe_confirmation;*/
if ($mot_de_passe==$mot_de_passe_confirmation){ // + SI UTILISATEUR EST FREE. ENVOYER LE TOUT DANS LA BASE DE DONNEES SI VRAI + LE CONNECTE SI BON
  $pseudo=$_POST["pseudo"];
  $sexe=$_POST["sexe"];
  $email=$_POST["email"];
  $mot_de_passe=$_POST["mot_de_passe"];
  header("Location: formulaire.php?pseudo={$_POST['pseudo']}&sexe={$_POST['sexe']}&email={$_POST['email']}&mot_de_passe={$_POST['mot_de_passe']}");
  }else{
  header('Location: Inscription.php?mdp_verification=false');
}?>
