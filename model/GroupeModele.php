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
    $sql="SELECT * FROM groupe WHERE id=$id_groupe";
    $resultat=$this->requeteSQL($sql);
    return $resultat;
  }


    function creationGroupe($image){
      $sql="INSERT INTO groupe(nom, description, public, nbmax_sportifs, id_sport, id_ville, categorie, image_groupe) VALUES (?,?,?,?,?,?,?,?)";
      $resultat=$this->requeteSQL($sql,[$_POST['nom'], $_POST['description'], $_POST['public'], $_POST['nbmax_sportifs'], $_POST['id_sport'], $_POST['id_ville'], $_POST['categorie'], $image_groupe]);
      echo "reussi";
      return $resultat;
    }


  function getVille(){
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
}
