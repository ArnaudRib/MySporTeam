<?php
require_once 'config/Vue.php';
require_once 'model/GroupeModele.php';

class GroupeController
{
  private $user;
  private $groupe;

  function __construct()
  {
    $this->user=new UserModele();
    $this->groupe=new GroupeModele();
  }

  public function loadRecherche()
  {
    $vue=new Vue("RechercheGroupe", "Groupe", ['stylesheet.css']);
    $groupe=$this->groupe->getGroup()->fetchAll();
    $vue->loadpage(['groupe'=>$groupe]);
  }

  public function loadPageGroupe()
  {
    $vue=new Vue("PageGroupe", "Groupe", ['stylesheet.css']);
    $datagroupe=$this->groupe->getInfoGroup()->fetch();
    $vue->loadpage(['datagroupe'=>$datagroupe]);
  }

  public function loadCreationGroupe()
  {
    $vue=new Vue("CreationGroupe", "Groupe", ['stylesheet.css', 'creationgroupe.css']); // CSS a unifier dans le meme fichier
    $vue->loadpage();
  }

}
