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
}
