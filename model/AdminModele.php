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
    $sql="INSERT INTO discussion (titre, id_topic, creation_date, id_user) VALUES (?,?, NOW(), ?)";
    $resultat=$this->requeteSQL($sql, [$_POST['titre'], $_POST['id_topic'], $_SESSION['user']['id']]);
  }

  function addMessage(){
    $sql="INSERT INTO message (titre, texte, id_topic) VALUES (?,?,?)";
    $resultat=$this->requeteSQL($sql, [$_POST['titre'], $_POST['texte'], $_POST['id_topic']]);
  }


  function getDataMessage(){
    $sql="SELECT * FROM message";
    $resultat=$this->requeteSQL($sql);
    return $resultat;
  }

  function getDataDiscussion(){
    $sql="SELECT * FROM discussion";
    $resultat=$this->requeteSQL($sql);
    return $resultat;
  }

  function updateTopic($id_topic){
    $titre=$_POST['titre']; $description=$_POST['description']; $id_topic=$_POST['id_topic'];
    $sql="UPDATE topic SET titre=?, description=?  WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$titre, $description, $id_topic]);
  }

  function updateDiscussion(){
    $titre=$_POST['titre']; $texte=$_POST['texte']; $id_topic=$_POST['id_topic']; $id_discussion=$_POST['id_discussion'];
    $sql="UPDATE discussion SET titre=?, id_topic=?  WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$titre, $id_topic, $id_discussion]);
  }

  function updateMessage($id_message){
    $titre=$_POST['titre']; $texte=$_POST['texte']; $id_discussion=$_POST['id_discussion'];$id_topic=$_POST['id_topic']; $id_message=$_POST['id_message'];
    $sql="UPDATE message SET titre=?, description=?, id_topic=?, id_discussion=?  WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$titre, $texte, $id_topic, $id_discussion]);
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
    $informations=$_POST['informations']; $téléphone=$_POST['telephone']; $email=$_POST['email']; $lien=$_POST['lien']; $adresse=$_POST['adresse']; $id_club=$_POST['id_club'];
    $sql="UPDATE club SET informations=?, telephone=?, email=?, lien=?, adresse=? WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$informations, $téléphone, $email, $lien, $adresse,$id_club]);
  }

  function updateUser($id_user){
    $sql="UPDATE utilisateur SET admin_util=? WHERE id=?";
    $resultat=$this->requeteSQL($sql, [intval($_POST['admin']), $id_user]);
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

  function BanUser($id_user){
    $sql="UPDATE utilisateur SET banned=1 WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$id_user]);
  }

  function UnBanUser($id_user){
    $sql="UPDATE utilisateur SET banned=0 WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$id_user]);
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
    $sql="DELETE FROM discussion WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$_POST['id_discussion']]);
  }

  function deleteUser($id_user){
    $sql="DELETE FROM utilisateur WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$id_user]);
  }

  function countGroup(){
    $sql="SELECT COUNT(*) as nbgroup FROM groupe";
    $resultat=$this->requeteSQL($sql)->fetch();
    return $resultat;
  }

  function countUser(){
    $sql="SELECT COUNT(*) as nbuser FROM utilisateur";
    $resultat=$this->requeteSQL($sql)->fetch();
    return $resultat;
  }

  function countVue(){
    $sql="SELECT SUM(vues) as nbvues FROM discussion";
    $resultat=$this->requeteSQL($sql)->fetch();
    return $resultat;
  }

  function countMessage(){
    $sql="SELECT COUNT(*) as nbmsg FROM message";
    $resultat=$this->requeteSQL($sql)->fetch();
    return $resultat;
  }
}
