<?php
require_once 'config/Vue.php';
require_once 'model/AccueilModele.php';

class AccueilController
{
  private $user;
  private $photo;

  function __construct()
  {
    $this->user=new UserModele();
    $this->photo=new AccueilModele();
  }

  public function loadVue()
  {
    $vue=new Vue("Accueil","Accueil",['stylesheet.css'], ['RechercheSport.js', 'Popup.js']);
    $vue->loadpage();
  }

  public function loadAide()
  {
    $vue=new Vue("Aide","Accueil",['stylesheet.css'],['aide.js']);
    $vue->loadpage();
  }

  public function loadphoto()
  {
    $photos=$this->photo->LoadSports($_GET['resultat'], 10)->fetchAll();
    $vue=new Vue("AfficherPhoto","Accueil");
    $vue->loadajax(['photo'=>$photos, 'resultat'=>$_GET['resultat']]);
  }
}
