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

  function getIDevenement(){
    $sql="SELECT MAX(id) FROM groupe_publication";
    $resultat=$this->requeteSQL($sql);
    dump($resultat);
    //$resultat=$resultat+1;
    return $resultat;
    //echo $resultat;
  }

  function addEvenement($id_groupe){
  //  $sql="INSERT INTO groupe(nom, description, public, nbmax_sportifs, id_sport, id_ville, categorie, id_niveau) VALUES (?,?,?,?,?,?,?,?)";
  //  $resultat=$this->requeteSQL($sql,[$_POST['nom'], $_POST['description'], $_POST['public'], $_POST['nbmax_sportifs'], $_POST['id_sport'], $_POST['id_ville'], $_POST['categorie'], $_POST['id_niveau']]);
    $sql="INSERT INTO evenement(nom, description, nombre, id_groupe, id_ville, date_debut, date_fin) VALUES (?,?,?,?,?,?,?)";
    $resultat=$this->requeteSQL($sql,[$_POST['nom'], $_POST['description'], $_POST['nombre'], $id_groupe,4,$_POST['date_debut'],$_POST['date_fin']]);
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

  function getIdVille($ville){
    $sql="SELECT * FROM city WHERE name=?";
    $resultat=$this->requeteSQL($sql, [$ville]);
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
    $sql="SELECT * FROM groupe_publication WHERE id_groupe=? ORDER BY date DESC";
    $resultat=$this->requeteSQL($sql, [$id_groupe]);
    return $resultat;
  }

  function getMembres($id_groupe){
    $sql="SELECT * FROM utilisateur JOIN utilisateur_groupe ON utilisateur.id=utilisateur_groupe.id_utilisateur WHERE utilisateur_groupe.id_groupe=?";
    $resultat=$this->requeteSQL($sql, [$id_groupe]);
    return $resultat;
  }

  function getInfoLeader($id_groupe){
    $sql="SELECT * FROM utilisateur INNER JOIN utilisateur_groupe ON id=utilisateur_groupe.id_utilisateur WHERE utilisateur_groupe.id_groupe=? AND leader_groupe=1";
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

  function searchGroupeName($nbdisplay){
    $sql="SELECT nom FROM groupe WHERE nom LIKE ?  ORDER BY nom LIMIT ?";
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

  function getNbMembresGroupe($groupes){ // renvoie [idgroupe=>nbmembre]
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

  function addeventtouser($id_evenement,$id_user, $id_groupe){
  $sql="INSERT INTO planning(id_utilisateur, id_groupe, id_evenement) VALUES (?,?,?)";
    $resultat=$this->requeteSQL($sql, [$id_user, $id_groupe, $id_evenement])->fetch();
    return $resultat;
  }

  function deleteeventtouser($id_evenement,$id_user, $id_groupe){
    $sql="DELETE FROM planning WHERE id_groupe=? AND id_utilisateur=? AND id_evenement=?";
    $resultat=$this->requeteSQL($sql, [$id_groupe, $id_user, $id_evenement]);
  }

  function isParticipant($id_user, $id_evenement){
    $sql = "SELECT * FROM planning WHERE id_utilisateur=? AND id_evenement=?";
    $resultat=$this->requeteSQL($sql, [$id_user, $id_evenement])->fetch();
    if($resultat)
        return true;
    return false;
  }

  function joinGroupe($id_user, $id_groupe){
    $sql="INSERT INTO utilisateur_groupe(id_utilisateur, id_groupe) VALUES (?,?)";
    $resultat=$this->requeteSQL($sql, [$id_user, $id_groupe]);
    return $resultat;
  }

  function modifDataGroupe($id_groupe,$ville){
    $info=$_POST['informations'];
    //$ville=2;
    $mail=$_POST['mail'];
    $telephone=$_POST['telephone'];
    $sql="UPDATE groupe SET description=?, id_ville=?, telephone=?, mail=? WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$info, $ville, $telephone, $mail, $id_groupe]);
    return $resultat;
  }

  function modifDataEvent($id_evenement){
    $info=$_POST['informations'];
    $ville=2;
    $mail=$_POST['mail'];
    $telephone=$_POST['telephone'];
    $sql="UPDATE evenement SET description=?, id_ville=?, telephone=?, mail=?, date_debut=?, date_fin=? WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$info, $ville, $telephone, $mail, $_POST['date_debut'], $_POST['date_fin'], $id_evenement]);
    return $resultat;
  }

  function publication($titre, $publication, $id_groupe){
    $sql="INSERT INTO groupe_publication(titre, texte, date, id_groupe) VALUES (?,?,NOW(),?)";
    $resultat=$this->requeteSQL($sql, [$titre, $publication,$id_groupe]);
    return $resultat;
  }

  function deletePublication($id_groupe){
    $sql="DELETE FROM groupe_publication WHERE id_groupe=? AND id=?";
    $resultat=$this->requeteSQL($sql, [$id_groupe, $_POST['id_publication']]);
  }

  function deleteEvenement($id_groupe){
    $sql="DELETE FROM evenement WHERE id_groupe=? AND id=? ORDER BY date DESC";
    $resultat=$this->requeteSQL($sql, [$id_groupe, $_POST['id_evenement']]);
  }

  function deleteUser($id_groupe){
    $sql="DELETE FROM utilisateur_groupe WHERE id_groupe=? AND id_utilisateur=?";
    $resultat=$this->requeteSQL($sql, [$id_groupe, $_POST['id_utilisateur']]);
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
