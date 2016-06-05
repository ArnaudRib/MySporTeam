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

  function getDataUserById($id_utilisateur){
    $sql="SELECT * FROM utilisateur WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$id_utilisateur]);
    return $resultat;
  }

  function getPseudoAndId(){
    $sql="SELECT id, pseudo FROM utilisateur";
    $resultat=$this->requeteSQL($sql)->fetchAll();
    foreach ($resultat as $key => $value) {
      $resultatfinal[$value['id']]=$value['pseudo'];
    }
    return $resultatfinal;
  }

  function getDataUserDiscussion($discussions){
    foreach ($discussions as $key => $value) {
      $sql="SELECT pseudo FROM utilisateur WHERE id=?";
      $resultat=$this->requeteSQL($sql, [$value['id_user']])->fetchAll();
      $allresults[$value['id']]=$resultat[0]['pseudo'];
    }
    return $allresults;
  }

  function getUserNamePub($publication){
    foreach ($publication as $key => $value) {
      $sql="SELECT pseudo FROM utilisateur WHERE id=?";
      $resultat=$this->requeteSQL($sql, [$value['id_user']])->fetchAll();
      $allresults[$value['id']]=$resultat[0]['pseudo'];
    }
    return $allresults;
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
    $sql="INSERT INTO utilisateur(email, mot_de_passe, pseudo) VALUES (?,?,?)";
    $resultat=$this->requeteSQL($sql,[$_POST['email'],sha1($_POST['mot_de_passe']),$_POST['pseudo']]);
    return $resultat;
  }

  function modifierProfil($pseudo, $id_ville) {
    foreach ($_POST as $key => $value) {
      if($key != "modifyProfil" && $key!='ville') {
        $sql="UPDATE utilisateur SET $key=? WHERE pseudo=?";
        $resultat=$this->requeteSQL($sql,[$value, $pseudo]);
      }
      if($key=='ville'){
        $sql="UPDATE utilisateur SET id_ville=? WHERE pseudo=?";
        $resultat=$this->requeteSQL($sql,[intval($id_ville),$pseudo]);
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

  function searchUser($nbdisplay){
    $sql="SELECT * FROM utilisateur WHERE pseudo LIKE ?  ORDER BY pseudo LIMIT ?";
    $resultats=$this->connectBDD()->prepare($sql);
    $text="%" . $_GET['resultat'] . "%";
    $resultats->bindParam(1, $text, PDO::PARAM_STR);
    $resultats->bindParam(2, $nbdisplay, PDO::PARAM_INT);
    $resultats->execute();
    return $resultats;
  }

  function checkEmailPseudo(){
    $sql="SELECT * FROM utilisateur WHERE pseudo=? AND email=?";
    $resultat=$this->requeteSQL($sql, [$_POST['pseudo'], $_POST['email']]);
    return $resultat;
  }

  function AddToken($token){
    $sql="UPDATE utilisateur SET token=? WHERE pseudo=?";
    $resultat=$this->requeteSQL($sql, [$token, $_POST['pseudo']]);
  }

  function resetPw($token){
    $sql="UPDATE utilisateur SET mot_de_passe=? WHERE token=?";
    $resultat=$this->requeteSQL($sql, [sha1($_POST['mot_de_passe']), $token]);

    $sql="UPDATE utilisateur SET token=NULL WHERE token=?";
    $resultat=$this->requeteSQL($sql, [$token]);
  }
}
