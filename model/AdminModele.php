<?php
require_once('config/connectBDD.php');

class AdminModele extends BaseDeDonnes
{
  function addSport($fileURLphoto){
    $nom=minNoSpace($_POST['nom']); $description=$_POST['description']; $id_type=$_POST['id_type'];
    $sql="INSERT INTO sports (nom, description, id_type) VALUES (?,?,?)";
    $resultat=$this->requeteSQL($sql, [$nom, $description, $id_type]);

    $id_sport=$this->connectBDD()->lastInsertId(); //fonction intégrée de PDO.
    $nom.='_photo';
    $sql="INSERT INTO photo (nom, chemin, id_sport) VALUES (?,?,?)";
    $resultat=$this->requeteSQL($sql, [$nom, $fileURLphoto, $id_sport]);
  }

  function updateSport($id_sport){
    $description=$_POST['description']; $id_type=$_POST['id_type'];
    $sql="UPDATE sports SET description=?, id_type=? WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$description, $id_type, $id_sport]);
  }

  function updateGroupe($id_groupe){
    $description=$_POST['description'];
    $sql="UPDATE groupe SET description=? WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$description, $id_groupe]);
  }

  function UsedType($type){
    $sql="SELECT titre FROM types_sports WHERE titre=?";
    $resultat=$this->requeteSQL($sql,[$type]);
    $resultats=$resultat->fetch();
    return $resultats;
  }

  function addType(){
    $sql="INSERT INTO types_sports(titre) VALUES (?)";
    $resultat=$this->requeteSQL($sql, [$_POST['type']]);
  }

  function ModifyType(){
    $sql="UPDATE types_sports SET titre=? WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$_POST['type'], $_POST['id_type']]);
  }

  function DeleteType(){
    $sql="DELETE FROM types_sports WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$_POST['id_type']]);
  }

}
