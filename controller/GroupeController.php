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
    $this->sport=new SportModele();
  }

  public function loadRecherche()
  {
    $niveau=$this->groupe->getNiveau()->fetchAll();
    $villes=$this->groupe->getVille()->fetchAll();
    $sports=$this->sport->getSports()->fetchAll();
    $vue=new Vue("RechercheGroupe", "Groupe", ['font-awesome.css', 'stylesheet.css'], ['RechercheGroupe.js']);
    $groupe=$this->groupe->getGroup()->fetchAll();
    $vue->loadpage(['groupe'=>$groupe, 'niveau'=>$niveau, 'villes'=>$villes, 'sports'=>$sports]);
}

  public function loadAjaxRecherche()
  {
    $rechercheVille=$this->groupe->searchVilleName(50)->fetchAll();
    $vue=new Vue("AfficherVille","Groupe");
    $vue->loadajax(['rechercheVille'=>$rechercheVille, 'resultat'=>$_GET['resultat']]);
  }

  public function loadInformationsGroupe($id_groupe)
  {
    $vue=new Vue("InformationsGroupe", "Groupe", ['stylesheet.css']);
    $datagroupe=$this->groupe->getInfoGroup($id_groupe)->fetch();
    $vue->loadpage(['datagroupe'=>$datagroupe]);
  }

  public function loadEvenementsGroupe($id_groupe)
  {
    $vue=new Vue("EvenementsGroupe", "Groupe", ['stylesheet.css']);
    $vue->loadpage();
  }

  public function loadUnEvenementGroupe($id_groupe, $id_evenement)
  {
    $vue=new Vue("UnEvenementGroupe", "Groupe", ['stylesheet.css']);
    $vue->loadpage();
  }

  public function loadUnePublicationGroupe($id_groupe, $id_publication){
    $vue=new Vue("UnePublicationGroupe", "Groupe", ['stylesheet.css']);
    $vue->loadpage();
  }

  public function loadMembresGroupe($id_groupe)
  {
    $vue=new Vue("MembresGroupe", "Groupe", ['stylesheet.css']);
    $vue->loadpage();
  }

  public function loadPublicationsGroupe($id_groupe)
  {
    $vue=new Vue("PublicationsGroupe", "Groupe", ['stylesheet.css']);
    $vue->loadpage();
  }

  public function loadUnePublicationsGroupe($id_groupe, $id_publication)
  {
    $vue=new Vue("UnePublicationGroupe", "Groupe", ['stylesheet.css']); // Créer VueUnePublicationGroupe dans view/groupe
    $vue->loadpage();
  }

  public function loadCreationGroupe()
  {
    $succes='';
    $error='';
    if (isset($_POST['Envoyer'])){
      if(exceptName(['imagegroupe'])){
        $succes="Profil complété avec succès!";
      }else{
        $error=errorExceptInput(['imagegroupe']);
      }
    }
    $vue=new Vue("CreationGroupe", "Groupe", ['stylesheet.css']);
    $vue->loadpage(['error'=>$error, 'succes'=>$succes]);
  }


  public function loadGroupeSport($id_sport){ //Load les groupes d'un sport. Permet aussi d'accéder à la recherche avancée.
    $photo=$this->sport->getPhotoSport($id_sport)->fetch();
    $sport=$this->sport->getSport($id_sport)->fetch();
    $vue=new Vue("GroupeSport", "Groupe", ['stylesheet.css']);
    $vue->loadpage(['sport'=>$sport, 'photo'=>$photo]);
  }
}
