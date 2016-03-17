<?php

require_once('controller/AccueilController.php');
require_once('controller/UserController.php');

class Route
{
  private $ctr;
  private $page;
  private $param;

  function __construct()
  {
    $this->ctr =[
      'Accueil' => new AccueilController,
      'User'=> new UserController
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
      else{
        //rien besoin de mettre xD
      }
    }
  }

  function loadController($page){
    switch ($page) {
      case 'Accueil':
        $this->ctr['Accueil']->loadVue();
        break;

      case 'Connexion':
        $this->ctr['User']->connexion();
        break;

      default:
        # code...
        break;
    }
  }
}
