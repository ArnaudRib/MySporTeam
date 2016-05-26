<?php
require_once 'config/connectBDD.php';

class SportModele extends BaseDeDonnes
{
  function LoadSports($resultat='', $displayphoto=10)
  {
    $sql = "SELECT sports.id as id, sports.nom as nom, chemin FROM photo JOIN sports ON photo.id_sport=sports.id WHERE sports.nom LIKE ? LIMIT ? ";
    $resultats=$this->connectBDD()->prepare($sql);
    $text="%" . $resultat . "%";
    $resultats->bindParam(1, $text, PDO::PARAM_STR);
    $resultats->bindParam(2, $displayphoto, PDO::PARAM_INT);
    $resultats->execute();
    return $resultats;
  }

  function getSports($nbsport=1000){
    $nbsport+=1;
    $sql="SELECT * FROM sports LIMIT ?";
    $resultat=$this->requeteSQL($sql, [$nbsport]);
    $resultat=$this->connectBDD()->prepare($sql);
    $resultat->bindParam(1, $nbsport, PDO::PARAM_INT);
    $resultat->execute();
    return $resultat;
  }

  function getSport($id_sport){ //Récupère toutes les données importantes relatives à 1 sport.
    $sql="SELECT *, sports.id as id, types_sports.id as id_type, types_sports.titre FROM sports JOIN types_sports ON sports.id_type=types_sports.id WHERE sports.id=?";
    $resultat=$this->requeteSQL($sql, [$id_sport]);
    return $resultat;
  }

  function getTypes(){ //pour utiliser $stockage[$id_type-1]['titre']
    $sql="SELECT * FROM types_sports";
    $resultat=$this->requeteSQL($sql);
    return $resultat;
  }

  function getPhotoSport($id_sport){
    $sql = "SELECT photo.chemin as photo FROM photo JOIN sports ON photo.id_sport=sports.id WHERE sports.id=?";
    $resultat=$this->requeteSQL($sql, [$id_sport]);
    return $resultat;
  }

}
