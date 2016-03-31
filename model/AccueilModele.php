<?php
require_once('config/connectBDD.php');

class AccueilModele extends BaseDeDonnes
{
  function LoadSports($resultat='', $displayphoto=10)
  {
    $sql = "SELECT id, nom, photo FROM Sports WHERE nom LIKE '%?%' LIMIT 10";
    $resultats=$this->requeteSQL($sql, [$resultat]);
    return $resultats;
  }
}
