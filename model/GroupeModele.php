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
}
