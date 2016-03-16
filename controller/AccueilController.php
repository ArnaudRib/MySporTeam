<?php
require_once 'config/Vue.php';
/*require_once 'model/AccueilModele.php';*/

class AccueilController
{
  private $user;

  function __construct()
  {
    /*$this->user=new AccueilModele();*/
  }

  public function connexion()
  {
    $vue=new Vue("Accueil","Accueil",['stylesheet.css']);
    $vue->loadpage();
  }
}
