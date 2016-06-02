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
    $this->groupe=new GroupeModele();
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
        $verification->notEmpty('reponse', "Vous ne pouvez poster un message vide.");
        $error.=$verification->error;
        if($verification->isValid()){
          $this->forum->postMessage($id_topic, $id_discussion);
          $succes="Message posté!";
        }
      }
      if(isset($_POST['Modify'])){
        $modification=1;
        $id_modif=$_POST['id'];
        $titre_modif=$_POST['titre'];
        $reponse_modif=$_POST['reponse'];
      }

      if(isset($_POST['ModifyMessage'])){
        $verification = new Verification($_POST);
        $verification->notEmpty('titre', "Veuillez donner un titre à votre message.");
        $verification->notEmpty('reponse', "Vous ne pouvez poster un message vide.");
        $error.=$verification->error;
        $id_publication=$_POST['id_message'];
        if($verification->isValid()){
          $this->forum->UpdateMessage($id_topic, $id_discussion, $id_publication);
          $succes="Message modifié!";
        }
      }
      if(isset($_POST['Delete'])){
        $this->forum->deleteMessage($id_topic, $id_discussion);
        $succes="Message effacé avec succès!";
      }
    }
    $views=$this->forum->AddView($id_topic, $id_discussion);//compteur +1
    $topic=$this->forum->getTopic($id_topic)->fetch();
    $discussion=$this->forum->getDiscussion($id_topic, $id_discussion)->fetch();
    $messages=$this->forum->getMessages($id_topic, $id_discussion)->fetchAll();
    $nbTotalMessageUsers=$this->forum->countAllMessage();
    $pseudouser=$this->user->getPseudoAndId();
    $vue=new Vue("Discussion","Forum",['stylesheet.css']);
    $vue->loadpage(['discussion'=>$discussion, 'topic'=>$topic, 'modification'=>$modification, 'messages'=>$messages, 'nbTotalMessageUsers'=>$nbTotalMessageUsers, 'error'=>$error, 'succes'=>$succes, 'id_modif'=>$id_modif, 'titre_modif'=>$titre_modif, 'reponse_modif'=>$reponse_modif, 'pseudouser'=>$pseudouser]);
  }
}
