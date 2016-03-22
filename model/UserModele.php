<?php
require 'config/connectBDD.php';

class UserModele extends BaseDeDonnes
{
  function CheckUser(){
    $sql="SELECT * FROM utilisateurs WHERE pseudo=? and mot_de_passe=?";
    $resultat=$this->requeteSQL($sql,[$_POST['pseudo'], sha1($_POST['mot_de_passe'])]);
    return $resultat;
  }

  function InscriptionUser(){
    $sql="INSERT INTO utilisateurs(sexe, pseudo, email, mot_de_passe, naissance) VALUES (?,?,?,?)";
    $resultat=$this->requeteSQL($sql,[$_POST['sexe'] ,$_POST['pseudo'], $_POST['email'],sha1($_POST['mot_de_passe']), $_POST['naissance']]);
    return $resultat;
  }
}
