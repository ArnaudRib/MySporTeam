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
        $sql="UPDATE utilisateur SET $key=? WHERE pseudo=?";
        $resultat=$this->requeteSQL($sql,[$value,$_SESSION['user']['pseudo']]);
      }
    }
  }

  function getGroupesSportsUtilisateur() {
    $sql="SELECT * FROM utilisateur_sport JOIN sports ON sports.id=utilisateur_sport.id_sport WHERE id_utilisateur=?";
    $resultat=$this->requeteSQL($sql,[$_SESSION['user']['id']])->fetchAll();
    $sports=array();
    foreach ($resultat as $key => $value) {
      $sports[$key]=$value['nom'];
    }
    return $sports;
  }

  function getEvent() {
    $sql="SELECT * FROM utilisateur_evenement JOIN evenement ON evenement.id=utilisateur_evenement.id_evenement WHERE utilisateur_evenement.id_utilisateur=?";
    $resultat = $this->requeteSQL($sql,[$_SESSION['user']['id']])->fetchAll();
    return $resultat;
  }

  function getDataGroupeUser() {
    $sql="SELECT * FROM utilisateur_groupe JOIN groupe ON groupe.id=utilisateur_groupe.id_groupe WHERE id_utilisateur=? ";
    $resultat=$this->requeteSQL($sql,[$_SESSION['user']['id']])->fetchAll();
    return $resultat;
  }

  function getDataGroupeAUser($pseudo) {
    $sql="SELECT *,sports.nom AS nom_sport,groupe.nom AS nom_groupe, utilisateur.nom AS nom_utilisateur 
    FROM utilisateur_groupe
    JOIN groupe ON groupe.id=utilisateur_groupe.id_groupe
    JOIN utilisateur ON utilisateur_groupe.id_utilisateur=utilisateur.id
    JOIN sports ON groupe.id_sport=sports.id
    WHERE utilisateur.pseudo=?";
    $resultat=$this->requeteSQL($sql,[$pseudo])->fetchAll();
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
