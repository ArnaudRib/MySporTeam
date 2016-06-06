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

  function addClub(){
    $sql="INSERT INTO club (nom, adresse, email, telephone, lien, informations) VALUES (?,?,?,?,?,?)";
    $resultat=$this->requeteSQL($sql, [$_POST['nom'], $_POST['adresse'],$_POST['email'],$_POST['telephone'],$_POST['lien'],$_POST['informations']]);
  }

  function addQuest(){
    $sql="INSERT INTO aide (type, question, reponse) VALUES (?,?,?)";
    $resultat=$this->requeteSQL($sql, [$_POST['section'], $_POST['question'],$_POST['reponse']]);
  }

  function addTopic(){
    $sql="INSERT INTO topic (titre, description) VALUES (?,?)";
    $resultat=$this->requeteSQL($sql, [$_POST['titre'], $_POST['description']]);
  }


  function addDiscussion(){
    $sql="INSERT INTO message (titre, texte, id_topic) VALUES (?,?,?)";
    $resultat=$this->requeteSQL($sql, [$_POST['titre'], $_POST['texte'], $_POST['id_topic']]);
  }

  function getDataDiscussion(){
    $sql="SELECT * FROM message";
    $resultat=$this->requeteSQL($sql);
    return $resultat;
  }

  function updateTopic($id_topic){
    $titre=$_POST['titre']; $description=$_POST['description']; $id_topic=$_POST['id_topic'];
    $sql="UPDATE topic SET titre=?, description=?  WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$titre, $description, $id_topic]);
  }

  function updateDiscussion($id_message){
    $titre=$_POST['titre']; $texte=$_POST['texte']; $id_topic=$_POST['id_topic']; $id_message=$_POST['id_message'];
    $sql="UPDATE message SET titre=?, description=?, id_topic=?  WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$titre, $texte, $id_topic, $id_message]);
  }

  function updateSport($id_sport){
    $description=$_POST['description']; $id_type=$_POST['id_type'];
    $sql="UPDATE sports SET description=?, id_type=? WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$description, $id_type, $id_sport]);
  }

  function updateGroupe($id_groupe){
    $sql="UPDATE groupe SET nom=?, description=?, telephone=?, mail=?, public=?, nbmax_sportifs=? WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$_POST['nom'], $_POST['description'], $_POST['telephone'], $_POST['email'], intval($_POST['public']), $_POST['nbmax_sportifs'], $id_groupe]);
  }

  function updateClub($id_club){
    $informations=$_POST['informations']; $téléphone=$_POST['telephone']; $email=$_POST['email']; $lien=$_POST['lien']; $nom=$_POST['nom']; $adresse=$_POST['adresse']; $id_club=$_POST['id_club'];
    $sql="UPDATE club SET informations=?, téléphone=?, email=?, lien=?, nom=?, adresse=? WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$informations, $téléphone, $email, $lien, $nom, $adresse,$id_club]);
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

  function deleteGroupe(){
    $sql="DELETE FROM groupe WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$_POST['id_groupe']]);
  }

  function deleteClub(){
    $sql="DELETE FROM club WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$_POST['id_club']]);
  }

  function deleteQuest(){
    $sql="DELETE FROM aide WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$_POST['id_aide']]);
  }

  function deleteTopic(){
    $sql="DELETE FROM topic WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$_POST['id_topic']]);
  }


  function deleteDiscussion(){
    $sql="DELETE FROM message WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$_POST['id_message']]);
  }


}
