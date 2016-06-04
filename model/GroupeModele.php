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

  function getIdMaxEvenement(){
    $sql="SELECT MAX(id) FROM evenement";
    $resultat=$this->requeteSQL($sql)->fetch();
    $resultat=intval($resultat['MAX(id)'])+1;
    return $resultat;
  }


  function addEvenement($id_groupe, $id_ville){
    $sql="INSERT INTO evenement(nom, description, places, id_groupe, id_ville, date_debut, date_fin) VALUES (?,?,?,?,?,?,?)";
    $resultat=$this->requeteSQL($sql,[$_POST['nom'], $_POST['description'], $_POST['nombre'], $id_groupe, $id_ville, $_POST['date_debut_finale'],$_POST['date_fin_finale']]);
  }


  function getInfoGroupSport($id_sport){
    $sql="SELECT * FROM groupe WHERE id_sport=?";
    $resultat=$this->requeteSQL($sql,[$id_sport]);
    return $resultat;
  }

  function getVilleById($id_ville){
    $sql="SELECT * FROM city WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$id_ville]);
    return $resultat;
  }

  function getClub($id_club){
    $sql="SELECT * FROM club WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$id_club]);
    return $resultat;
  }

  function getClubs(){
    $sql="SELECT * FROM club";
    $resultat=$this->requeteSQL($sql);
    return $resultat;
  }

  function getVilleByName($ville){
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

  function countparticipants($id_evenement){
    $sql="SELECT COUNT(id) FROM utilisateur_evenement WHERE id_evenement=?";
    $resultat=$this->requeteSQL($sql, [$id_evenement]);
    return $resultat;
  }



    function countmembres($id_groupe){
    $sql="SELECT COUNT(id) FROM utilisateur_groupe WHERE id_groupe=?";
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

   function getNonMembres($id_groupe){
    $sql="SELECT *, utilisateur.id as useful_id FROM utilisateur JOIN utilisateur_groupe ON utilisateur.id=utilisateur_groupe.id_utilisateur WHERE utilisateur_groupe.id_groupe!=? GROUP BY utilisateur.id ORDER BY pseudo;";
    $resultat=$this->requeteSQL($sql, [$id_groupe]);
    return $resultat;
  }

  function getMembresInvit($id_groupe){
    $sql="SELECT * FROM utilisateur JOIN utilisateur_invitation ON utilisateur.id=utilisateur_invitation.id_utilisateur WHERE utilisateur_invitation.id_groupe=?";
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

  function getDepartements(){
    $sql="SELECT * FROM departement";
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


  function searchVille($nbdisplay){
    $sql="SELECT * FROM city WHERE name LIKE ?  ORDER BY name LIMIT ?";
    $resultats=$this->connectBDD()->prepare($sql);
    $text="%" . $_GET['resultat'] . "%";
    $resultats->bindParam(1, $text, PDO::PARAM_STR);
    $resultats->bindParam(2, $nbdisplay, PDO::PARAM_INT);
    $resultats->execute();
    return $resultats;
  }

  function searchGroupe($nbdisplay){
    $sql="SELECT * FROM groupe WHERE nom LIKE ?  ORDER BY nom LIMIT ?";
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

  function addEventToUser($id_evenement,$id_user){
    $sql="INSERT INTO utilisateur_evenement(id_utilisateur, id_evenement) VALUES (?,?)";
    $resultat=$this->requeteSQL($sql, [$id_user, $id_evenement])->fetch();
    return $resultat;
  }

  function deleteEventToUser($id_evenement,$id_user){
    $sql="DELETE FROM utilisateur_evenement WHERE id_utilisateur=? AND id_evenement=?";
    $resultat=$this->requeteSQL($sql, [$id_user, $id_evenement]);
  }

  function isParticipant($id_user, $id_evenement){
    $sql = "SELECT * FROM utilisateur_evenement WHERE id_utilisateur=? AND id_evenement=?";
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


  function modifDataGroupe($id_groupe, $id_ville){
    $info=$_POST['informations'];
    $mail=$_POST['mail'];
    $telephone=$_POST['telephone'];
    $sql="UPDATE groupe SET description=?, id_ville=?, telephone=?, mail=?, nbmax_sportifs=? WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$info, $id_ville, $telephone, $mail, $_POST['NBmembres'], $id_groupe]);
    return $resultat;
  }

  function modifDataEvent($id_evenement, $id_ville){
    $info=$_POST['informations'];
    $ville=2;
    $mail=$_POST['mail'];
    $telephone=$_POST['telephone'];
    $sql="UPDATE evenement SET description=?, id_ville=?, telephone=?, mail=?, date_debut=?, date_fin=? WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$info, $id_ville, $telephone, $mail, $_POST['date_debut'], $_POST['date_fin'], $id_evenement]);
    return $resultat;
  }

  function publication($titre, $publication, $id_groupe){
    $sql="INSERT INTO groupe_publication(titre, texte, date, id_groupe, id_user) VALUES (?,?,NOW(),?,?)";
    $resultat=$this->requeteSQL($sql, [$titre, $publication,$id_groupe, $_SESSION['user']['id']]);
    return $resultat;
  }

  function deletePublication($id_groupe){
    $sql="DELETE FROM groupe_publication WHERE id_groupe=? AND id=?";
    $resultat=$this->requeteSQL($sql, [$id_groupe, $_POST['id_publication']]);
  }

  function deleteEvenement($id_groupe){
    $sql="DELETE FROM evenement WHERE id_groupe=? AND id=?";
    $resultat=$this->requeteSQL($sql, [$id_groupe, $_POST['id_evenement']]);
  }

  function deleteUser($id_groupe){
    $sql="DELETE FROM utilisateur_groupe WHERE id_groupe=? AND id_utilisateur=?";
    $resultat=$this->requeteSQL($sql, [$id_groupe, $_POST['id_utilisateur']]);
  }

   function invitUser($id_groupe){
    $sql="INSERT INTO utilisateur_invitation(id_utilisateur, id_groupe, date, message) VALUES (?,?,NOW(),?)";
    $resultat=$this->requeteSQL($sql, [$_POST['id_utilisateur'], $id_groupe, $_POST['message']]);
    return $resultat;
  }

  function quitGroupe($id_user, $id_groupe){
    $sql="DELETE FROM utilisateur_groupe WHERE id_utilisateur=? AND id_groupe=?";
    $resultat=$this->requeteSQL($sql, [$id_user, $id_groupe]);
  }


  function addGroupe(){
    $sql="INSERT INTO groupe(nom, description) VALUES (?,?)";
    $resultat=$this->requeteSQL($sql,[$_POST['nom'], $_POST['description']]);
  }

  function getGroupeNiveau($groupes){
    foreach ($groupes as $key => $value) {
      $sql = "SELECT niveau.nom as niveau FROM niveau WHERE id=?";
      $resultat=$this->requeteSQL($sql, [$value['id_niveau']])->fetchAll();
      $allresults[$value['id']]=$resultat[0]['niveau'];
    }
    return $allresults;
  }

  function getGroupeSport($groupes){
    foreach ($groupes as $key => $value) {
      $sql = "SELECT nom as sport FROM sports WHERE id=?";
      $resultat=$this->requeteSQL($sql, [$value['id_sport']])->fetchAll();
      $allresults[$value['id']]=$resultat[0]['sport'];
    }
    return $allresults;
  }

  function getGroupeDepartement($groupes){
    foreach ($groupes as $key => $value) {
      $sql = "SELECT departement.departement_code as code,departement.name as nom FROM departement JOIN city ON city.departement_code=departement.departement_code WHERE city.id=?";
      $resultat=$this->requeteSQL($sql, [$value['id_ville']])->fetchAll();
      $allresults[$value['id']]=[ $resultat[0]['code'], $resultat[0]['nom']];
    }
    return $allresults;
  }


  function getVilleGroupe($groupes){
    foreach ($groupes as $key => $value) {
      $sql = "SELECT name as ville FROM city WHERE id=?";
      $resultat=$this->requeteSQL($sql, [$value['id_ville']])->fetchAll();
      $allresults[$value['id']]=$resultat[0]['ville'];
    }
    return $allresults;
  }

  function RechercheGroupes(){
    $sql.='SELECT * FROM groupe
    JOIN city ON city.id=groupe.id_ville
    JOIN departement ON departement.departement_code=city.departement_code
    WHERE ';
    $sql.=!empty($_POST['departement']) ? "departement.departement_code=?" : '';
    $sql.=!empty($_POST['departement']) && (!empty($_POST['ville']) || (!empty($_POST['niveau']) || !empty($_POST['sport']))) ? ' AND ' : '';

    $sql.=!empty($_POST['ville']) ? "groupe.id_ville=?" : '';
    $sql.=!empty($_POST['ville']) && (!empty($_POST['niveau']) || !empty($_POST['sport'])) ? ' AND ' : '';
    $sql.=!empty($_POST['niveau']) ? "groupe.id_niveau=?" : '';
    $sql.=!empty($_POST['sport']) && !empty($_POST['niveau'])? ' AND ' : '';
    $sql.=!empty($_POST['sport']) ? "groupe.id_sport=?" : '' ;

    $str.= $_POST['departement'];
    $str.= !empty($_POST['departement']) && (!empty($_POST['ville']) || (!empty($_POST['sport']) || !empty($_POST['niveau']))) ? ', ' : '';
    $str.= $_POST['ville'];
    $str.= !empty($_POST['ville']) && (!empty($_POST['sport']) || !empty($_POST['niveau'])) ? ', ' : '';
    $str.= $_POST['niveau'];
    $str.= !empty($_POST['sport']) && (!empty($_POST['ville']) || !empty($_POST['niveau'])) ? ', ' : '';
    $str.= $_POST['sport'];

    $array=explode(',', $str);

    $resultat=$this->requeteSQL($sql,$array)->fetchAll();
    return $resultat;

  }
}

//ENTRE TEMPS
// $sql.='SELECT * FROM groupe
//
// WHERE ';
// $sql.=!empty($_POST['departement']) ? "id_ville=?" : '';
// $sql.=!empty($_POST['ville']) && (!empty($_POST['niveau']) || !empty($_POST['sport'])) ? ' AND ' : '';
//
// $sql.=!empty($_POST['ville']) ? "id_ville=?" : '';
// $sql.=!empty($_POST['ville']) && (!empty($_POST['niveau']) || !empty($_POST['sport'])) ? ' AND ' : '';
// $sql.=!empty($_POST['niveau']) ? "id_niveau=?" : '';
// $sql.=!empty($_POST['sport']) && !empty($_POST['niveau'])? ' AND ' : '';
// $sql.=!empty($_POST['sport']) ? "id_sport=?" : '' ;
//
// $str.= $_POST['ville'];
// $str.= !empty($_POST['ville']) && (!empty($_POST['sport']) || !empty($_POST['niveau'])) ? ', ' : '';
// $str.= $_POST['niveau'];
// $str.= !empty($_POST['sport']) && (!empty($_POST['ville']) || !empty($_POST['niveau'])) ? ', ' : '';
// $str.= $_POST['sport'];
// $array=explode(',', $str);
//
// $resultat=$this->requeteSQL($sql,$array)->fetchAll();
// return $resultat;
