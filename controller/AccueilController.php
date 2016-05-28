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
    $this->groupe=new GroupeModele();
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

  public function loadRechercheGenerale()
  {
    $rechercheVille=$this->groupe->searchVilleName(6)->fetchAll();
    $recherchegroupe=$this->groupe->searchGroupeName(6)->fetchAll();
    $rechercheuser=$this->user->searchUserName(6)->fetchAll();
    $vue=new Vue("RechercheGenerale","Accueil");
    $vue->loadajax(['rechercheVille'=>$rechercheVille, 'rechercheuser'=>$rechercheuser,'recherchegroupe'=>$recherchegroupe, 'resultat'=>$_GET['resultat']]);
  }
}
