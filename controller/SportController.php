<?php
require_once 'config/Vue.php';
require_once 'model/SportModele.php';

class SportController
{
  private $photo;
  private $sport;

  function __construct()
  {
    $this->photo=new SportModele();
    $this->sport=new SportModele();
  }

  public function loadphoto()
  {
    $photos=$this->photo->LoadSports($_GET['resultat'], 10)->fetchAll();
    $vue=new Vue("AfficherPhoto","Accueil");
    $vue->loadajax(['photo'=>$photos, 'resultat'=>$_GET['resultat']]);
  }

}
