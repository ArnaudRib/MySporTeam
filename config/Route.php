<?php

require('controller/AccueilController.php');
require('controller/UserController.php');

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
      var_dump($_GET['p']);
      var_dump($value);

      if (preg_match($value, $_GET['p'], $this->params)){
        loadController($key);
      }
      else{
        echo "désolé ca marche pas :c";
      }
    }
  }

  function loadController($page){
    switch ($page) {
      case 'Accueil':
        $this->ctr['Accueil'];
        break;

      case 'Connexion':
        $this->ctr['User'];
        break;

      default:
        # code...
        break;
    }
  }
}
