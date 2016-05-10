<?php
require_once('config/connectBDD.php');

class ForumModele extends BaseDeDonnes
{
  function getDataTopic(){
    $sql="SELECT * FROM topic";
    $resultat=$this->requeteSQL($sql);
    return $resultat;
  }
}
