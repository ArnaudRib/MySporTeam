<?php


class Route
{
  private $ctr;
  private $page;
  private $param;

  function __construct()
  {
    $this->ctr =[
      'Accueil' = new AccueilController,
      'User'= new UserController
    ]
  }

  

  function getPage(){

  }


}
