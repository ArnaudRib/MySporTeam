<?php
require_once('config/connectBDD.php');

class ForumModele extends BaseDeDonnes
{
  function getDataTopic(){
    $sql="SELECT * FROM topic";
    $resultat=$this->requeteSQL($sql);
    return $resultat;
  }

  function getTopic($id_topic){
    $sql="SELECT * FROM topic WHERE id=?";
    $resultat=$this->requeteSQL($sql, [$id_topic]);
    return $resultat;
  }

  function getDiscussions($id_topic){
    $sql="SELECT * FROM discussion WHERE id_topic=?";
    $resultat=$this->requeteSQL($sql, [$id_topic]);
    return $resultat;
  }

  function getMessages($id_topic, $id_discussion){
    $sql="SELECT message.*, utilisateur.pseudo as creator FROM message JOIN utilisateur ON utilisateur.id=message.id_utilisateur WHERE id_topic=? AND id_discussion=? ORDER BY date_creation";
    $resultat=$this->requeteSQL($sql, [$id_topic, $id_discussion]);
    return $resultat;
  }

  function countReponse($id_topic, $discussions){
    foreach ($discussions as $key => $value) {
      $sql="SELECT COUNT(*) as NbAnswer FROM message WHERE id_discussion=? AND id_topic=?";
      $resultat=$this->requeteSQL($sql, [$value['id'], $id_topic])->fetchAll();
      $allresults[$value['id']]=$resultat[0]['NbAnswer'];
    }
    return $allresults;
  }

  function countVues($id_topic, $discussions){
    foreach ($discussions as $key => $value) {
      $sql="SELECT vues as nbVues FROM discussion WHERE id=? AND id_topic=?";
      $resultat=$this->requeteSQL($sql, [$value['id'], $id_topic])->fetchAll();
      $allresults[$value['id']]=$resultat[0]['nbVues'];
    }
    return $allresults;
  }

  function getLastMessageInfo($id_topic, $discussions){
    foreach ($discussions as $key => $value) {
      $sql="SELECT message.*, utilisateur.pseudo
            FROM message
            JOIN utilisateur ON utilisateur.id=message.id_utilisateur
            WHERE id_discussion=? AND id_topic=?
            ORDER BY message.date_creation";
      $resultat=$this->requeteSQL($sql, [$value['id'], $id_topic])->fetchAll();
      $allresults[$value['id']]=$resultat;
    }
    foreach ($allresults as $key => $value) {
      $lastMessage[$key]=end($value);
    }
    return $lastMessage;
  }

  function AddView($id_topic, $id_discussion){
    $sql="UPDATE discussion SET vues = vues + 1 WHERE id=? AND id_topic = ?";
    $resultat=$this->requeteSQL($sql, [$id_discussion, $id_topic]);
  }

  function getDiscussion($id_topic, $id_discussion){
    $sql="SELECT discussion.*, utilisateur.pseudo as creator
          FROM discussion
          JOIN utilisateur ON utilisateur.id=discussion.id_user
          WHERE discussion.id_topic=? AND discussion.id=?";
    $resultat=$this->requeteSQL($sql, [$id_topic, $id_discussion]);
    return $resultat;
  }

  function countAllMessage(){
    $sql="SELECT id_utilisateur, COUNT(*) as NbPost FROM message GROUP BY id_utilisateur";
    $resultat=$this->requeteSQL($sql)->fetchAll();
    foreach ($resultat as $key => $value) {
      $resultatfinal[$value['id_utilisateur']]=$value['NbPost'];
    }
    return $resultatfinal;
  }

  function postMessage($id_topic, $id_discussion){
    $sql="INSERT INTO message(titre, texte, date_creation, id_discussion, id_utilisateur, id_topic) VALUES (?,?,NOW(),?,?,?)";
    $resultat=$this->requeteSQL($sql, [$_POST['titre'], $_POST['reponse'], $id_discussion, $_SESSION['user']['id'], $id_topic]);
  }

  function deleteMessage($id_topic, $id_discussion, $id_message){ //overkill de précision
    $sql="DELETE FROM message WHERE id_discussion=? AND id_topic=? AND id=?";
    $resultat=$this->requeteSQL($sql, [$id_discussion, $id_topic, $_POST['id']]);
  }

  function addDiscussion($id_topic){
    $sql="INSERT INTO discussion (titre, id_topic, creation_date, id_user) VALUES (?,?, NOW(), ?)";
    $resultat=$this->requeteSQL($sql, [$_POST['titre'], $id_topic, $_SESSION['user']['id']]);
  }

  function UpdateMessage($id_topic, $id_discussion, $id_publication){
    $sql="UPDATE message SET titre=?, texte=?, date_modification=NOW(), id_user_modification=? WHERE id=? AND id_topic=? AND id_discussion=?";
    $resultat=$this->requeteSQL($sql, [$_POST['titre'], $_POST['reponse'], $_SESSION['user']['id'], $id_publication, $id_topic, $id_discussion]);
  }
}
