<?php
require_once 'config/Vue.php';
require_once 'model/AccueilModele.php';

class AccueilController
{
  private $user;
  private $photo;

  function __construct()
  {
    $this->user=new UserModele();
    $this->groupe=new GroupeModele();
    $this->accueil=new AccueilModele();
  }

  public function loadVue()
  {
    if(!empty($_POST)){
      if(!empty($_POST['deletenotif'])){
        $this->accueil->deletenotifmessage();
      }
    }
    $notificationmessage=$this->accueil->getNotifMessage()->fetchAll();
    $notificationinvitation=$this->accueil->getNotifInvitation()->fetchAll();
    $vue=new Vue("Accueil","Accueil",['stylesheet.css', 'font-awesome.css'], ['RechercheSport.js', 'PopUp.js', 'Notification.js']);
    $vue->loadpage(['notificationmessage'=>$notificationmessage, 'notificationinvitation'=>$notificationinvitation]);
  }

  public function loadphoto()
  {
    $photos=$this->accueil->LoadSports($_GET['resultat'], 10)->fetchAll();
    $vue=new Vue("AfficherPhoto","Accueil");
    $vue->loadajax(['photo'=>$photos, 'resultat'=>$_GET['resultat']]);
  }


  public function loadAide()
  {
    $aide=$this->accueil->getAide();
    $vue=new Vue("Aide","Accueil", ['stylesheet.css'], ['aide.js']);
    $vue->loadpage(['aide'=>$aide]);
  }

  public function loadRechercheGenerale()
  {
    $rechercheVille=$this->groupe->searchVille(6)->fetchAll();
    $recherchegroupe=$this->groupe->searchGroupe(6)->fetchAll();
    $rechercheuser=$this->user->searchUser(6)->fetchAll();
    $vue=new Vue("RechercheGenerale","Accueil");
    $vue->loadajax(['rechercheVille'=>$rechercheVille, 'rechercheuser'=>$rechercheuser,'recherchegroupe'=>$recherchegroupe, 'resultat'=>$_GET['resultat']]);
  }

  public function loadRechercheUser()
  {
    $rechercheuser=$this->user->searchUser(6)->fetchAll();
    $vue=new Vue("RechercheUser","Accueil", ['']);
    $vue->loadajax(['rechercheuser'=>$rechercheuser, 'resultat'=>$_GET['resultat']]);
  }

  public function loadMessagePrive(){
    $error='';
    $succes='';
    if(!empty($_POST)){
      $verification = new Verification($_POST);
      $verification->notEmpty('destinataire', "Précisez pour qui ce message est destiné.");
      $verification->notEmpty('objet', "Veuillez compléter le champ objet.");
      $verification->notEmpty('message', "Précisez votre message.");
      $error=$verification->error;
      if($verification->isValid()){//} && $verificationPhoto->isValid()){
        $donneesuser=$this->user->getDataUser($_POST['destinataire'])->fetch();
        $_POST['destinataire']=$donneesuser['id'];
        $this->accueil->sendMessage();
        $succes='Message envoyé avec succès!';
      }
    }
    $vue=new Vue("MessagePrive","Accueil", ['stylesheet.css'], ['RechercheUser.js']);
    $vue->loadpage(['error'=>$error, 'succes'=>$succes]);
  }
}
