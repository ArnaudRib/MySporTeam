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
    //$naissance=$_POST['annee']."-".$_POST['mois']."-".$_POST['jour'];
    $sql="INSERT INTO utilisateur(nom, prénom, email, sexe, mot_de_passe, adresse, numero_telephone, naissance, pseudo, admin_util, id_photo, id_ville) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    $resultat=$this->requeteSQL($sql,["-", "-",$_POST['email'],'-',sha1($_POST['mot_de_passe']),"-",0,"0000-00-00", $_POST['pseudo'],3,3,3]);

    return $resultat;
  }

  function modifier_profil() {
    foreach ($_POST as $key => $value) {
      if($value != " " and $key != "Envoyer") {
        var_dump($value);
        $sql="UPDATE utilisateur SET $key=? WHERE pseudo=?";
        $resultat=$this->requeteSQL($sql,[$value,$_SESSION['user']['pseudo']]);
      }
    }
    return $resultat;
  }
}
