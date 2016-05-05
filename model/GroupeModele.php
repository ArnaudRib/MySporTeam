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

    function creationGroupe(){
      $sql="INSERT INTO creergroupe(nom, categorie, nombre, sport, departement, ville, visibilite, description) VALUES (?,?,?,?,?,?,?,?)";
      $resultat=$this->requeteSQL($sql,[$_POST['nom'], $_POST['categorie'], $_POST['nombre'],$_POST['sport'],$_POST['departement'], $_POST['ville'], $_POST['visibilite'],$_POST['description']]);
      return $resultat;
    }


}
