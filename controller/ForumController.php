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
    $topic=$this->forum->getDataTopic()->fetchAll();
    $vue=new Vue("Forum","Forum",['stylesheet.css', 'font-awesome.min.css']);
    $vue->loadpage(['topic'=>$topic]);
  }

  public function loadATopic($id_topic)
  {
    $topic=$this->forum->getTopic($id_topic)->fetch();
    $discussions=$this->forum->getDiscussions($id_topic)->fetchAll();
    $vue=new Vue("Topic","Forum",['stylesheet.css', 'font-awesome.min.css']);
    $vue->loadpage(['discussions'=>$discussions, 'topic'=>$topic]);
  }

  public function loadADiscussion($id_topic, $id_discussion)
  {
    $vue=new Vue("Discussion","Forum",['stylesheet.css', 'font-awesome.min.css']);
    $vue->loadpage();
  }
}
