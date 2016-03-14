<?php
require 'config/connectBDD.php';

class UserModele extends BaseDeDonnes
{
  function CheckUser(){
    $sql="SELECT * FROM utilisateurs WHERE pseudo=? and mot_de_passe=?";
    $resultat=$this->requeteSQL($sql,[$_POST['pseudo'], sha1($_POST['mot_de_passe'])]);
    return $resultat;
  }
}
