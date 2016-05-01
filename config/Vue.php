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

  function loadcss(){ //Sous forme de tableau!
    foreach ($this->nomcss as $nom) { // ../../ entre temps! dans le cas où il y + que 1 parametre ds l'url
      echo '<link rel="stylesheet" href="/asset/css/'.$nom.'">';
    }
  }

  function loadjs(){ //Sous forme de tableau!
    foreach ($this->nomjs as $nom) {
      echo '<script src="/asset/js/'.$nom.'"></script>';
    }
  }

  function loadajax($parametres=[]){
    extract($parametres);
    require('/asset/template/templatevide.php');
  }
}

function dump($var){ //Sous forme de tableau!
  echo '<pre>';
  var_dump($var);
  echo '</pre>';
}
