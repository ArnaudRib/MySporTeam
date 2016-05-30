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
      $sql="SELECT message.*, utilisateur.pseudo FROM message JOIN utilisateur ON utilisateur.id=message.id_utilisateur WHERE id_discussion=? AND id_topic=? ORDER BY message.date_creation";
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
}
