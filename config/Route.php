<?php

/*Fonctions*/
require_once('config/generalFunctions.php');

/*Controllers*/
require_once('controller/AccueilController.php');
require_once('controller/UserController.php');
require_once('controller/GroupeController.php');
require_once('controller/ForumController.php');
require_once('controller/SportController.php');
require_once('controller/AdminController.php');

class Route
{
  private $ctr;
  private $page;
  private $params;

  function __construct()
  {
    session_start(); //permet de rester connecter partout ;)
    $this->ctr =[
      'Accueil' => new AccueilController,
      'User'=> new UserController,
      'Groupe'=> new GroupeController,
      'Forum'=> new ForumController,
      'Sport'=> new SportController,
      'Admin'=> new AdminController
    ];
  }

  function getPage(){
    $json = file_get_contents("config/Route.json", "r");
    $obj = json_decode($json, true);
    if(isset($_GET['p'])){
      foreach ($obj as $key => $value) {
        $value=preg_replace("/{[^}]*}/", "([a-zA-Z0-9]+)", $value);
        $value = "#^".$value."$#";
        if (preg_match($value, $_GET['p'], $this->params)){
          if (count($this->params)>1) {
            $this->params=array_slice($this->params,1);
          }
          $url = $key;
          $this->loadController($url);
        }
      }
    } else {
      $this->loadController('Accueil');
    }
  }

  function loadController($page){
    switch ($page) {
      // Accueil.
      case 'aide':
        $this->ctr['Accueil']->loadAide();
        break;
      case 'Accueil':
        $this->ctr['Accueil']->loadVue();
        break;

      case 'aide':
        $this->ctr['Accueil']->loadAide();
        break;

      case 'ajaxrecherchegenerale':
        $this->ctr['Accueil']->loadRechercheGenerale();
        break;

      case 'messageprive':
        $this->ctr['Accueil']->loadMessagePrive();
        break;

      case 'ajaxrechercheuser':
        $this->ctr['Accueil']->loadRechercheUser();
        break;

      //Sports
      case 'ajaxloadphoto':
        $this->ctr['Sport']->loadphoto();
        break;


      // Utilisateurs.
      case 'connexion':
        if(!isLogged())
          $this->ctr['User']->connexion();
        else // Si déjà connecté, redirige vers accueil.
          $this->ctr['Accueil']->loadVue();
        break;

      case 'deconnexion':
        $this->ctr['User']->deconnexion();
        break;

      case 'resetpw':
        $this->ctr['User']->resetPw();
        break;

      case 'forgottenpw':
        $this->ctr['User']->forgottenPw();
        break;


      case 'inscription':
        $this->ctr['User']->inscription();
        break;

      case 'profil':
        $this->ctr['User']->loadProfil();
        break;

      case 'profilUnUtilisateur':
        $pseudo_user=$this->params[0];
        $this->ctr['User']->LoadAUser($pseudo_user);
        break;

      case 'planningUtilisateur':
        $this->ctr['User']->LoadPlanningUser();
        break;

      case 'groupesUtilisateur':
        $this->ctr['User']->LoadGroupesUser();
        break;


      // Groupes
      case 'recherchegroupe':
        $this->ctr['Groupe']->loadRecherche();
        break;

      case 'ajaxrecherchegroupe':
        $this->ctr['Groupe']->loadAjaxRecherche();
        break;

      case 'informationsgroupe':
        $id_groupe=intval($this->params[0]);
        $this->ctr['Groupe']->loadInformationsGroupe($id_groupe);
        break;

      case 'evenementsgroupe':
        $id_groupe=intval($this->params[0]);
        $this->ctr['Groupe']->loadEvenementsGroupe($id_groupe);
        break;

      case 'unevenementgroupe':
        $id_groupe=intval($this->params[0]);
        $id_evenement=intval($this->params[1]);
        $this->ctr['Groupe']->loadUnEvenementGroupe($id_groupe, $id_evenement);
        break;

      case 'createevenement':
        $id_groupe=intval($this->params[0]);
        $this->ctr['Groupe']->loadCreateEvenement($id_groupe);
        break;

      case 'membresgroupe':
        $id_groupe=intval($this->params[0]);
        $this->ctr['Groupe']->loadMembresGroupe($id_groupe);
        break;

      case 'publicationsgroupe':
        $id_groupe=intval($this->params[0]);
        $this->ctr['Groupe']->loadPublicationsGroupe($id_groupe);
        break;

      case 'unepublicationgroupe':
        $id_groupe=intval($this->params[0]);
        $id_publication=intval($this->params[1]);
        $this->ctr['Groupe']->loadUnePublicationGroupe($id_groupe, $id_publication);
        break;

      case 'creationgroupe':
        $this->ctr['Groupe']->loadCreationGroupe();
        break;

      case 'clubinfo':
        $id_club=intval($this->params[0]);
        $this->ctr['Groupe']->loadClub($id_club);
        break;

      case 'sportgroupe':
        $id_sport=intval($this->params[0]);
        $this->ctr['Groupe']->loadGroupeSport($id_sport);
        break;

      case 'invitmembres':
        $id_groupe=intval($this->params[0]);
        $this->ctr['Groupe']->loadGroupeInvitation($id_groupe);
        break;

      // Forum
      case 'forum':
        $this->ctr['Forum']->loadForum();
        break;

      case 'topicforum':
        $id_topic=intval($this->params[0]);
        $this->ctr['Forum']->loadATopic($id_topic);
        break;

      case 'discussionforum':
        $id_topic=intval($this->params[0]);
        $id_discussion=intval($this->params[1]);
        $this->ctr['Forum']->loadADiscussion($id_topic, $id_discussion);
        break;

      //Backoffice
      case 'backoffice':
        $this->ctr['Admin']->loadBackOffice();
        break;

      case 'backofficegroupe':
        $this->ctr['Admin']->loadBackOfficeGroupe();
        break;

      case 'backofficereglage':
        $this->ctr['Admin']->loadBackOfficeReglage();
        break;

      case 'backofficeforum':
        $this->ctr['Admin']->loadBackOfficeForum();
        break;

      case 'backofficetype':
        $this->ctr['Admin']->loadBackOfficeType();
        break;

      case 'backofficesport':
        $this->ctr['Admin']->loadBackOfficeSport();
        break;

      case 'backofficeAsport':
        $id_sport=intval($this->params[0]);
        $this->ctr['Admin']->loadBackOfficeASport($id_sport);
        break;

      case 'backofficeuser':
        $this->ctr['Admin']->loadBackOfficeUser();
        break;

      case 'backofficeclub':
        $this->ctr['Admin']->loadBackOfficeClub();
        break;

      default:
        # code...
        break;
    }
  }
}

/* Fonctions Utiles dans toutes les pages. */
function goToPage($nom, $params=[]){
  $json = file_get_contents("config/Route.json", "r");
  $obj = json_decode($json, true);
  $url=$obj[$nom];
  if(!empty($params)){
    foreach ($params as $key => $value) {
      array_slice($params,1);
      $url=str_replace("{".$key."}", $value, $url);
    }
  }
  echo "/mysporteam/".$_GET['lang']."/".$url;
}

function loadlang(){
  $json = file_get_contents("asset/lang/".$_GET['lang'].".json", "r");
  $obj = json_decode($json, true);
  return $obj;
}

function lang($expression){
  $tablang=loadlang();
  return $tablang[$expression];
}
