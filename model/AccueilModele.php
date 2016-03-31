<?php
require_once('config/connectBDD.php');

class AccueilModele extends BaseDeDonnes
{
  function LoadSports($resultat='', $displayphoto=10)
  {
    $sql = "SELECT id, nom, photo FROM Sports WHERE nom LIKE ? LIMIT ?";
    $resultats=$this->connectBDD()->prepare($sql);
    $text="%" . $resultat . "%";
    $resultats->bindParam(1, $text, PDO::PARAM_STR);
    $resultats->bindParam(2, $displayphoto, PDO::PARAM_INT);
    $resultats->execute();
    return $resultats;
  }
}
