<?php
class Vue
{
  private $titre;
  private $nomcss;
  private $fichier;

  function __construct($page, $controller, $nomcss)
  {
    $this->titre=$page;
    $this->fichier="view/".$controller."/Vue".$page.".php";
    $this->nomcss=$nomcss;
  }

  function loadpage($parametres){
    $titre = $this->titre;
    require('asset/template/template.php');
  }

  function loadcss(){ //Sous forme de tableau!
    foreach ($this->nomcss as $nom) {
      echo '<link rel="stylesheet" href="asset/css/'.$nom.'">';
    }
  }
}
