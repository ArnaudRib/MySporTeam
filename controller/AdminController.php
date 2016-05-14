<?php
require_once 'config/Vue.php';
require_once 'model/AccueilModele.php';
require_once 'model/AdminModele.php';
require_once 'model/UserModele.php';

class AdminController
{
  private $user;

  function __construct()
  {
    $this->user=new UserModele();
    $this->accueil=new AccueilModele();
    $this->groupe=new GroupeModele();
    $this->sport=new SportModele();
    $this->admin=new AdminModele();
  }

  public function loadBackOffice()
  {
    $vue=new Vue("BackOfficeAccueil","Admin",['font-awesome.css', 'admin.css']);
    $vue->loadbackoffice();
  }

  public function loadBackOfficeGroupe()
  {
    $vue=new Vue("BackOfficeGroupe","Admin",['font-awesome.css', 'admin.css']);
    $vue->loadbackoffice();
  }

  public function loadBackOfficeReglage()
  {
    $vue=new Vue("BackOfficeReglage","Admin",['font-awesome.css', 'admin.css']);
    $vue->loadbackoffice();
  }

  public function loadBackOfficeForum()
  {
    $vue=new Vue("BackOfficeForum","Admin",['font-awesome.css', 'admin.css']);
    $vue->loadbackoffice();
  }

  /*Sport*/
  public function loadBackOfficeSport()
  {
    $error="";
    if(!empty($_POST)){
      $verification = new Verification($_POST);
      $verificationPhoto = new Verification($_FILES);
      $verification->notEmpty('nom', "Veuillez indiquer un nom à votre sport.");
      $verification->notEmpty('description', "Veuillez remplir la description du groupe.");
      $verification->notEmpty('id_type', "N'oubliez pas de choisir un type.");
      $verificationPhoto->PhotoOk('photo', $_POST['nom'].'.jpg','Sports', "Veuillez selectionner une photo du sport.");
      $verificationPhoto->PhotoOk('icone', $_POST['nom'].'.svg','Sports', "Veuillez choisir une icone pour le sport.");
      $error=$verification->error;
      $error.=$verificationPhoto->error;

      if($verification->isValid() && $verificationPhoto->isValid()){
        /*upload images*/
        $error.=uploadPhoto(minNoSpace($_POST['nom']).'.jpg', 'Sports', 'photo');
        $error.=uploadPhoto(minNoSpace($_POST['nom']).'.svg', 'svg', 'icone');
        //Add BDD
        if(empty($error)){
          $fileURLphoto='Sports/'.minNoSpace($_POST["nom"]).'.jpg';
          $this->admin->addSport($fileURLphoto);
        }
      }
    }

    $sports=$this->sport->getSports()->fetchAll();
    $types=$this->sport->getTypes()->fetchAll();
    $nbgroupe=$this->groupe->getNbGroupeSports($sports);
    $vue=new Vue("BackOfficeSport","Admin",['font-awesome.css', 'admin.css'], ['Admin/admin.js']);
    $vue->loadbackoffice(['sports'=>$sports, 'nbgroupe'=>$nbgroupe, 'types'=>$types, 'error'=>$error]);
  }

  public function loadBackOfficeASport($id_sport)
  {
    $sport=$this->sport->getSport($id_sport)->fetch(); //type stocké dedans.
    $nbgroupe=$this->groupe->getNbGroupeEachSport($id_sport);
    $types=$this->sport->getTypes()->fetchAll();

    $error="";
    if(!empty($_POST)){
      $verification = new Verification($_POST);
      $verificationPhoto = new Verification($_FILES);
      $verification->notEmpty('description', "Veuillez remplir la description du groupe.");
      $verification->notEmpty('id_type', "N'oubliez pas de choisir un type.");
      $verificationPhoto->PhotoOk('photo', $_POST['nom'].'.jpg','Sports', "Veuillez selectionner une photo du sport");
      $verificationPhoto->PhotoOk('icone', $_POST['nom'].'.svg','Sports', "Veuillez choisir une icone pour le sport.");
      $error=$verification->error;
      $error.=$verificationPhoto->error;

      if($verification->isValid() && $verificationPhoto->isValid()){
        /*delete images*/
        deletePhoto(minNoSpace($_POST['nom']).'.jpg', 'Sports', 'photo');
        /*upload images*/
        $error.=uploadPhoto(minNoSpace($_POST['nom']).'.jpg', 'Sports', 'photo');
        $error.=uploadPhoto(minNoSpace($_POST['nom']).'.svg', 'svg', 'icone');
        //Add BDD
        if(empty($error)){
          $fileURLphoto='Sports/'.minNoSpace($_POST["nom"]).'.jpg';
          $this->admin->update($fileURLphoto);
        }
      }
    }
    /*
    $error="";
    if(exceptName(['Envoyer'])){
      if(!empty($_FILES['photo']['name']) && !empty($_FILES['icone']['name'])){
        //Upload Files
        deletePhoto(minNoSpace($_POST['nom']).'.jpg', 'Sports', 'photo');
        deletePhoto(minNoSpace($_POST['nom']).'.svg', 'svg', 'icone');
        $error=uploadPhoto(minNoSpace($_POST['nom']).'.jpg', 'Sports', 'photo');
        $error.=uploadPhoto(minNoSpace($_POST['nom']).'.svg', 'svg', 'icone');
        //Add BDD
        $fileURLphoto='Sports/'.minNoSpace($_POST["nom"]).'.jpg';
        $this->admin->updateSport($fileURLphoto);
      }else{
        $error.= 'Veuillez joindre les deux images.';
      }
    }else{
      $error.=errorExceptInput(['imagegroupe']);
    }
*/
    $vue=new Vue("BackOfficeASport","Admin",['font-awesome.css', 'admin.css'], ['Admin/admin.js']);
    $vue->loadbackoffice(['sport'=>$sport, 'nbgroupe'=>$nbgroupe, 'types'=>$types]);
  }
}
