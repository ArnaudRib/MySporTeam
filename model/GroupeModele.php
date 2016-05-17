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
    $sql="SELECT * FROM utilisateur INNER JOIN utilisateur_groupe ON id=utilisateur_groupe.id_utilisateur WHERE utilisateur_groupe.id_groupe=?";
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

  function searchVilleName($nbdisplay){
    $sql="SELECT name FROM city WHERE name LIKE ?  ORDER BY name LIMIT ?";
    $resultats=$this->connectBDD()->prepare($sql);
    $text="%" . $_GET['resultat'] . "%";
    $resultats->bindParam(1, $text, PDO::PARAM_STR);
    $resultats->bindParam(2, $nbdisplay, PDO::PARAM_INT);
    $resultats->execute();
    return $resultats;
  }

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
}
