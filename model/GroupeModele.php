<?php
require_once 'config/connectBDD.php';

class GroupeModele extends BaseDeDonnes
{

  function getGroup(){
    $sql="SELECT * FROM groupe";
    $resultat=$this->requeteSQL($sql);
    return $resultat;
  }

  function getInfoGroup(){
    $sql="SELECT * FROM groupe WHERE id=1";
    $resultat=$this->requeteSQL($sql); //,[$_GET['id_group']]
    return $resultat;
  }
}
