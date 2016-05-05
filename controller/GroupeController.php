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

    $message='';

      if (isset($_POST['nom']) AND isset($_POST['categorie']) AND isset($_POST['nombre'])
       AND isset($_POST['sport']) AND isset($_POST['departement']) AND isset($_POST['ville'])
       AND isset($_POST['visibilite']) AND isset($_POST['description'])){
            if(!empty($_POST['nom'])){

           $groupe=$this->groupe->creationGroupe(); //si il y a une réponse, true + tableau de la réponse, sinon, false.

           echo "reussis";

          }else{
            $message= "Tout les champs n'ont pas été remplis";
            echo $message;
          }
        }
    $vue=new Vue("creationgroupe", "Groupe", ['stylesheet.css', 'creationgroupe.css']); // CSS a unifier dans le meme fichier
    $vue->loadpage(['message'=>$message]);
      }

  }
