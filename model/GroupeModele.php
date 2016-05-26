<?php
require_once 'config/connectBDD.php';

class GroupeModele extends BaseDeDonnes
{
  function getGroup(){
    $sql="SELECT * FROM groupe";
    $resultat=$this->requeteSQL($sql);
    return $resultat;
  }

  function getInfoGroup($id_groupe){
    $sql="SELECT * FROM groupe WHERE id=?";
    $resultat=$this->requeteSQL($sql,[$id_groupe]);
    return $resultat;
  }


  function getInfoGroupSport($id_sport){
    $sql="SELECT * FROM groupe WHERE id_sport=?";
    $resultat=$this->requeteSQL($sql,[$id_sport]);
    return $resultat;
  }

  function getVille($id_ville){
    $sql="SELECT * FROM city WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$id_ville]);
    return $resultat;
  }

  function getSport($id_sport){
    $sql="SELECT * FROM sports WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$id_sport]);
    return $resultat;
  }

  function getEvenements($id_groupe){
    $sql="SELECT * FROM evenement WHERE id_groupe=?";
    $resultat=$this->requeteSQL($sql, [$id_groupe]);
    return $resultat;
  }

  function getEvenement($id_evenement){
    $sql="SELECT * FROM evenement WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$id_evenement]);
    return $resultat;
  }

  function getPublications($id_groupe){
    $sql="SELECT * FROM groupe_publication WHERE id_groupe=?";
    $resultat=$this->requeteSQL($sql, [$id_groupe]);
    return $resultat;
  }

  function getMembres($id_groupe){
    $sql="SELECT * FROM utilisateur JOIN utilisateur_groupe ON utilisateur.id=utilisateur_groupe.id_utilisateur WHERE utilisateur_groupe.id_groupe=?";
    $resultat=$this->requeteSQL($sql, [$id_groupe]);
    return $resultat;
  }

  function getVilles(){
    $sql="SELECT city.name as ville, departement.name as departement
          FROM city
          JOIN departement
          ON city.departement_code=departement.departement_code
          ORDER BY city.name ASC";
    $resultat=$this->requeteSQL($sql);
    return $resultat;
  }

  function getNiveau(){
    $sql="SELECT * FROM niveau";
    $resultat=$this->requeteSQL($sql);
    return $resultat;
  }

  function getCategory(){
    $sql="SELECT * FROM categorie";
    $resultat=$this->requeteSQL($sql);
    return $resultat;
  }

  function getClub($id_club){
    $sql="SELECT * FROM club WHERE id=?";
    $resultat=$this->requeteSQL($sql,[$id_club]);
    return $resultat;
  }

  function searchVilleName($nbdisplay){
    $sql="SELECT name FROM city WHERE name LIKE ?  ORDER BY name LIMIT ?";
    $resultats=$this->connectBDD()->prepare($sql);
    $text="%" . $_GET['resultat'] . "%";
    $resultats->bindParam(1, $text, PDO::PARAM_STR);
    $resultats->bindParam(2, $nbdisplay, PDO::PARAM_INT);
    $resultats->execute();
    return $resultats;
  }

  /* Fonctions count.*/
  function getNbGroupeSports($sports){ // renvoie [idsport=>nbgroupe]
    foreach ($sports as $key => $value) {
      $sql = "SELECT COUNT(*) as nbGroupe FROM groupe WHERE id_sport=?";
      $resultat=$this->requeteSQL($sql, [$value['id']])->fetchAll();
      $allresults[$value['id']]=$resultat[0]['nbGroupe'];
    }
    return $allresults;
  }

  function getNbGroupeEachSport($id_sport){ // renvoie [idsport=>nbgroupe]
    $sql = "SELECT COUNT(*) as nbGroupe FROM groupe WHERE id_sport=?";
    $resultat=$this->requeteSQL($sql, [$id_sport])->fetch();
    return $resultat;
  }

  function getNbMembresGroupe($groupes){ // renvoie [idsport=>nbgroupe]
    foreach ($groupes as $key => $value) {
      $sql = "SELECT COUNT(*) as nbMembres FROM utilisateur_groupe WHERE id_groupe=?";
      $resultat=$this->requeteSQL($sql, [$value['id']])->fetchAll();
      $allresults[$value['id']]=$resultat[0]['nbMembres'];
    }
    return $allresults;
  }

  function isLeader($id_user, $id_groupe){
    $sql = "SELECT leader_groupe FROM utilisateur_groupe WHERE id_utilisateur=? AND id_groupe=?";
    $resultat=$this->requeteSQL($sql, [$id_user, $id_groupe])->fetch();
    if(!empty($resultat))
      if($resultat['leader_groupe']==1)
        return true;
    return false;
  }

  function isMembre($id_user, $id_groupe){
    $sql = "SELECT * FROM utilisateur_groupe WHERE id_utilisateur=? AND id_groupe=?";
    $resultat=$this->requeteSQL($sql, [$id_user, $id_groupe])->fetch();
    if($resultat)
        return true;
    return false;
  }

  function joinGroupe($id_user, $id_groupe){
    $sql="INSERT INTO utilisateur_groupe(id_utilisateur, id_groupe) VALUES (?,?)";
    $resultat=$this->requeteSQL($sql, [$id_user, $id_groupe]);
    return $resultat;
  }

  function quitGroupe($id_user, $id_groupe){
    $sql="DELETE FROM utilisateur_groupe WHERE id_utilisateur=? AND id_groupe=?";
    $resultat=$this->requeteSQL($sql, [$id_user, $id_groupe]);
  }

  function addGroupe(){
  //  $sql="INSERT INTO groupe(nom, description, public, nbmax_sportifs, id_sport, id_ville, categorie, id_niveau) VALUES (?,?,?,?,?,?,?,?)";
  //  $resultat=$this->requeteSQL($sql,[$_POST['nom'], $_POST['description'], $_POST['public'], $_POST['nbmax_sportifs'], $_POST['id_sport'], $_POST['id_ville'], $_POST['categorie'], $_POST['id_niveau']]);

    $sql="INSERT INTO groupe(nom, description) VALUES (?,?)";
    $resultat=$this->requeteSQL($sql,[$_POST['nom'], $_POST['description']]);
  }
}
