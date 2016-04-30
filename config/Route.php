<?php

require_once('controller/AccueilController.php');
require_once('controller/UserController.php');
require_once('controller/GroupeController.php');
require_once('controller/ForumController.php');

class Route
{
  private $ctr;
  private $page;
  private $param;

  function __construct()
  {
    session_start(); //permet de rester connecter partout ;)
    $this->ctr =[
      'Accueil' => new AccueilController,
      'User'=> new UserController,
      'Groupe'=> new GroupeController,
      'Forum'=> new ForumController
    ];
  }

  function getPage(){
    $json = file_get_contents("config/Route.json", "r");
    $obj = json_decode($json, true);
    foreach ($obj as $key => $value){
      $value = "#^".$value."$#";
      if (preg_match($value, $_GET['p'], $this->params)){
        $this->loadController($key);
      }
    }
  }

  function loadController($page){
    switch ($page) {
      // Accueil.
      case 'Accueil':
        $this->ctr['Accueil']->loadVue();
        break;

      case 'ajaxloadphoto':
        $this->ctr['Accueil']->loadphoto();
        break;

      // Utilisateurs.
      case 'connexion':
        $this->ctr['User']->connexion();
        break;

      case 'deconnexion':
        $this->ctr['User']->deconnexion();
        break;

      case 'inscription':
        $this->ctr['User']->inscription();
        break;

      case 'profil':
        $this->ctr['User']->loadProfil();
        break;


      // Groupes
      case 'recherchegroupe':
        $this->ctr['Groupe']->loadRecherche();
        break;

        case 'pagegroupe':
          $this->ctr['Groupe']->loadPageGroupe();
          break;

        case 'creationgroupe':
          $this->ctr['Groupe']->loadCreationGroupe();
          break;


        // Forum
        case 'forum':
          $this->ctr['Forum']->loadForum();
          break;

      default:
        # code...
        break;
    }
  }
}
