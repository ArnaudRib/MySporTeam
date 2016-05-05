<?php
require_once('config/connectBDD.php');

class AccueilModele extends BaseDeDonnes
{
 function getAide(){
   $sql="SELECT * FROM aide ORDER BY type";
   $resultats=$this->requeteSQL($sql);
   foreach ($resultats as $value) {
     $resultat[$value['type']][]=[$value['question'], $value['reponse']]; //remise en forme
    }
   return $resultat;
 }
}
