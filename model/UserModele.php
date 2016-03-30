<?php
require 'config/connectBDD.php';

class UserModele extends BaseDeDonnes
{
  function CheckUser(){
    $sql="SELECT * FROM utilisateur WHERE pseudo=? and mot_de_passe=?";
    $resultat=$this->requeteSQL($sql,[$_POST['pseudo'], sha1($_POST['mot_de_passe'])]);
    return $resultat;
  }

  function FreePseudo($PSEUDO){
    $sql="SELECT pseudo FROM utilisateur WHERE pseudo=?";
    $resultat=$this->requeteSQL($sql,[$PSEUDO]);
    $resultats=$resultat->fetch();
    return $resultats;
  }

  function InscriptionUser(){
    $naissance=$_POST['annee']."-".$_POST['mois']."-".$_POST['jour'];
    $sql="INSERT INTO utilisateur(sexe, pseudo, email, mot_de_passe, naissance) VALUES (?,?,?,?,?)";
    $resultat=$this->requeteSQL($sql,[$_POST['sexe'] ,$_POST['pseudo'], $_POST['email'],sha1($_POST['mot_de_passe']), $naissance]);
    return $resultat;
  }
}
