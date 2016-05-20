<?php
require_once 'config/connectBDD.php';

class UserModele extends BaseDeDonnes
{
  function getDataUsers(){
    $sql="SELECT * FROM utilisateur";
    $resultat=$this->requeteSQL($sql);
    return $resultat;
  }

  function getDataUser($pseudo){
    $sql="SELECT * FROM utilisateur WHERE pseudo=?";
    $resultat=$this->requeteSQL($sql, [$pseudo]);
    return $resultat;
  }

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
    $sql="INSERT INTO utilisateur(pseudo, email, mot_de_passe) VALUES (?,?,?)";
    $resultat=$this->requeteSQL($sql,[$_POST['pseudo'], $_POST['email'],sha1($_POST['mot_de_passe'])]);
    return $resultat;
  }


  function getNbMembreGroupe($groupes){ // renvoie [idsport=>nbgroupe]
    foreach ($groupes as $key => $value) {
      $sql = "SELECT COUNT(*) as nbMembres FROM utilisateur_groupe WHERE id_groupe=?";
      $resultat=$this->requeteSQL($sql, [$value['id']])->fetchAll();
      $allresults[$value['id']]=$resultat[0]['nbMembres'];
    }
    return $allresults;
  }

  function getNbGroupeUsers($users){
    foreach ($users as $key => $value) {
      $sql = "SELECT COUNT(*) as nbGroupesUser FROM utilisateur_groupe WHERE id_utilisateur=?";
      $resultat=$this->requeteSQL($sql, [$value['id']])->fetchAll();
      $allresults[$value['id']]=$resultat[0]['nbGroupesUser'];
    }
    return $allresults;
  }

  function getNbPostUsers($users){
    foreach ($users as $key => $value) {
      $sql = "SELECT COUNT(*) as nbPostsUser FROM message WHERE id_utilisateur=?";
      $resultat=$this->requeteSQL($sql, [$value['id']])->fetchAll();
      $allresults[$value['id']]=$resultat[0]['nbPostsUser'];
    }
    return $allresults;
  }

}
