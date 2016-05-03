<?php
require_once 'config/Vue.php';
require_once 'model/ForumModele.php';

class ForumController
{
  private $user;
  private $forum;

  function __construct()
  {
    $this->user=new UserModele();
    $this->forum=new ForumModele();
  }

  public function loadForum()
  {
    $vue=new Vue("Forum","Forum",['stylesheet.css', 'font-awesome.min.css']);
    $vue->loadpage();
  }

}
