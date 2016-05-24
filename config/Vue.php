<?php
class Vue
{
  private $titre;
  private $nomcss;
  private $fichier;

  function __construct($page, $controller, $nomcss=[], $nomjs=[])
  {
    $this->titre=$page;
    $this->fichier="view/".$controller."/Vue".$page.".php";
    $this->nomcss=$nomcss;
    $this->nomjs=$nomjs;
  }

  function loadpage($parametres=[]){
    extract($parametres);
    $titre = $this->titre;
    require('asset/template/template.php');
  }

  function loadbackoffice($parametres=[]){
    extract($parametres);
    $titre = $this->titre;
    require('asset/template/templatebackoffice.php');
  }

  function loadajax($parametres=[]){
    extract($parametres);
    require('asset/template/templatevide.php'); //ne pas mettre de / ;_;
  }

  function loadcss(){ //Sous forme de tableau!
    foreach ($this->nomcss as $nom) {
      echo '<link rel="stylesheet" href="/mysporteam/asset/css/'.$nom.'">';
    }
    }


  function loadjs(){ //Sous forme de tableau!
    foreach ($this->nomjs as $nom) {
      echo '<script src="/mysporteam/asset/js/'.$nom.'"></script>';

    }

  }
  }
