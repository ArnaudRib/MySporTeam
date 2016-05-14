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
}
