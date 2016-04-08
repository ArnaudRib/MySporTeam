<?php
require_once('config/connectBDD.php');

class AccueilModele extends BaseDeDonnes
{
  function LoadSports($resultat='', $displayphoto=10)
  {
    $sql = "SELECT photo.id as id, sports.nom as nom, chemin FROM photo JOIN sports ON photo.id_sports=sports.id WHERE sports.nom LIKE ? LIMIT ? ";
    $resultats=$this->connectBDD()->prepare($sql);
    $text="%" . $resultat . "%";
    $resultats->bindParam(1, $text, PDO::PARAM_STR);
    $resultats->bindParam(2, $displayphoto, PDO::PARAM_INT);
    $resultats->execute();
    return $resultats;
  }
}
