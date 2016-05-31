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
    if(!empty($_POST)){
      if(isset($_POST['PostMessage'])){
        $verification = new Verification($_POST);
        $verification->notEmpty('titre', "Veuillez donner un titre à votre message.");
        dump($_POST);
        $verification->notEmpty('reponse', "Vous ne pouvez poster un message vide.");
        $error.=$verification->error;
        if($verification->isValid()){
          $this->forum->postMessage($id_topic, $id_discussion);
          $succes="Message posté!";
        }
      }
    }
    $views=$this->forum->AddView($id_topic, $id_discussion);//compteur +1
    $topic=$this->forum->getTopic($id_topic)->fetch();
    $discussion=$this->forum->getDiscussion($id_topic, $id_discussion)->fetch();
    $messages=$this->forum->getMessages($id_topic, $id_discussion)->fetchAll();
    $nbTotalMessageUsers=$this->forum->countAllMessage();
    $vue=new Vue("Discussion","Forum",['stylesheet.css']);
    $vue->loadpage(['discussion'=>$discussion, 'topic'=>$topic, 'messages'=>$messages, 'nbTotalMessageUsers'=>$nbTotalMessageUsers, 'error'=>$error, 'succes'=>$succes]);
  }
}
