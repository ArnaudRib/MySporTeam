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
    $this->admin=new AdminModele();
  }

  public function loadBackOffice()
  {
    $vue=new Vue("BackOfficeAccueil","Admin",['admin.css']);
    $vue->loadbackoffice();
  }
}
