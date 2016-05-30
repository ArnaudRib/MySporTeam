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
    $creator=$this->user->getDataUserDiscussion($discussions);
    $nbreponses=$this->forum->countReponse($id_topic, $discussions);
    $nbvues=$this->forum->countVues($id_topic, $discussions);
    $lastMessage=$this->forum->getLastMessageInfo($id_topic, $discussions);
    $vue=new Vue("Topic","Forum",['stylesheet.css']);
    $vue->loadpage(['discussions'=>$discussions, 'topic'=>$topic, 'creator'=>$creator, 'nbreponses'=>$nbreponses, 'nbvues'=>$nbvues, 'lastMessage'=>$lastMessage]);
  }

  public function loadADiscussion($id_topic, $id_discussion)
  {
    $views=$this->forum->AddView($id_topic, $id_discussion);//compteur +1
    $topic=$this->forum->getTopic($id_topic)->fetch();
    $discussion=$this->forum->getDiscussion($id_topic, $id_discussion)->fetch();
    $messages=$this->forum->getMessages($id_topic, $id_discussion)->fetchAll();
    $nbTotalMessageUsers=$this->forum->countAllMessage();
    $vue=new Vue("Discussion","Forum",['stylesheet.css']);
    $vue->loadpage(['discussion'=>$discussion, 'topic'=>$topic, 'messages'=>$messages, 'nbTotalMessageUsers'=>$nbTotalMessageUsers]);
  }
}
