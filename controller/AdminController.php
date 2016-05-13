<?php
require_once 'config/Vue.php';
require_once 'model/AccueilModele.php';
require_once 'model/AdminModele.php';
require_once 'model/UserModele.php';

class AdminController
{
  private $user;

  function __construct()
  {
    $this->user=new UserModele();
    $this->accueil=new AccueilModele();
    $this->groupe=new GroupeModele();
    $this->sport=new SportModele();
    $this->admin=new AdminModele();
  }

  public function loadBackOffice()
  {
    $vue=new Vue("BackOfficeAccueil","Admin",['font-awesome.css', 'admin.css']);
    $vue->loadbackoffice();
  }

  public function loadBackOfficeGroupe()
  {
    $vue=new Vue("BackOfficeGroupe","Admin",['font-awesome.css', 'admin.css']);
    $vue->loadbackoffice();
  }

  public function loadBackOfficeReglage()
  {
    $vue=new Vue("BackOfficeReglage","Admin",['font-awesome.css', 'admin.css']);
    $vue->loadbackoffice();
  }

  public function loadBackOfficeForum()
  {
    $vue=new Vue("BackOfficeForum","Admin",['font-awesome.css', 'admin.css']);
    $vue->loadbackoffice();
  }

  /*Sport*/
  public function loadBackOfficeSport()
  {
    uploadPhoto($_POST['nom'].'.jpg', 'photo','Sports');
    uploadPhoto($_POST['nom'].'.svg', 'icone','Sports');
    if(exceptName(['Envoyer'])){
    }else{
      $error=errorExceptInput();
    }
    $sports=$this->sport->getSports()->fetchAll();
    $types=$this->sport->getTypes()->fetchAll();
    $nbgroupe=$this->groupe->getNbGroupeSport($sports);
    $vue=new Vue("BackOfficeSport","Admin",['font-awesome.css', 'admin.css'], ['Admin/admin.js']);
    $vue->loadbackoffice(['sports'=>$sports, 'nbgroupe'=>$nbgroupe, 'types'=>$types]);
  }

  public function loadBackOfficeASport($id_sport)
  {
    $sports=$this->sport->getSport()->fetch(); //type stocké dedans.
    $nbgroupe=$this->groupe->getNbGroupeSport($sports);
    $vue=new Vue("BackOfficeASport","Admin",['font-awesome.css', 'admin.css']);
    $vue->loadbackoffice(['sports'=>$sports, 'nbgroupe'=>$nbgroupe, 'types'=>$types]);
  }
}
