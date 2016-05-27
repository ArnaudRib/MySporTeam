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
    $this->accueil=new AccueilModele();
  }

  public function loadVue()
  {
    $vue=new Vue("Accueil","Accueil",['stylesheet.css'], ['RechercheSport.js', 'PopUp.js', 'Notification.js']);
    $vue->loadpage();
  }

  public function loadphoto()
  {
    $photos=$this->accueil->LoadSports($_GET['resultat'], 10)->fetchAll();
    $vue=new Vue("AfficherPhoto","Accueil");
    $vue->loadajax(['photo'=>$photos, 'resultat'=>$_GET['resultat']]);
  }


  public function loadAide()
  {
    $aide=$this->accueil->getAide();
    $vue=new Vue("Aide","Accueil", ['stylesheet.css'], ['aide.js']);
    $vue->loadpage(['aide'=>$aide]);
  }
}
