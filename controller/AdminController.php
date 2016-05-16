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

  public function loadBackOfficeType()
  {
    $types=$this->sport->getTypes()->fetchAll();
    $error="";
    $verification = new Verification($_POST);
    $verification->notEmpty('type', "Veuillez indiquer le nom du nouveau type.");
    if(!empty($_POST)){
      if($verification->isValid()){
        if(isset($_POST['Add'])){
          if(!$this->admin->UsedType($_POST['type'])){
              $this->admin->addType();
          }else{
            $error.="Ce type existe déjà.";
          }
        }
        if(isset($_POST['Modify'])){
          if(!$this->admin->UsedType($_POST['type'])){
            $this->admin->ModifyType();
          }else{
            $error.="Ce type existe déjà.";
          }
        }
        if(isset($_POST['Delete']))
          $this->admin->DeleteType();
        $succes="";
        $succes='Modifications effectuées avec succès!';
      }else{
        $error.=$verification->error;
      }
    }
    $types=$this->sport->getTypes()->fetchAll();
    $vue=new Vue("BackOfficeType", "Admin", ['font-awesome.css', 'admin.css'], ['Admin/admin.js']);
    $vue->loadbackoffice(['types'=>$types, 'error'=>$error, 'succes'=>$succes]);
  }

  /*Sport*/
  public function loadBackOfficeSport()
  {
    $error="";
    if(!empty($_POST)){
      if(!empty($_FILES['icone']['name']))
        $error.="Veuillez selectionner une icone pour le sport.";
      if(!empty($_FILES['photo']['name']))
        $error.="Veuillez selectionner une photo pour le sport.";

      $verification = new Verification($_POST);
      $verificationPhoto = new Verification($_FILES);
      $verification->notEmpty('nom', "Veuillez indiquer un nom à votre sport.");
      $verification->notEmpty('description', "Veuillez remplir la description du groupe.");
      $verification->notEmpty('id_type', "N'oubliez pas de choisir un type.");
      $verificationPhoto->PhotoOk('photo', $_POST['nom'].'.jpg','Sports');
      $verificationPhoto->PhotoOk('icone', $_POST['nom'].'.svg','Sports');
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
      if(!empty($_FILES['photo']['name']))
        $verificationPhoto->PhotoOk('photo', $sport['nom'].'.jpg','Sports', false);
      if(!empty($_FILES['icone']['name']))
        $verificationPhoto->PhotoOk('icone', $sport['nom'].'.svg','Sports', false);
      $error=$verification->error;
      $error.=$verificationPhoto->error;

      if($verification->isValid() && $verificationPhoto->isValid()){
         /*delete images*/
        if(!empty($_FILES['photo']['name']))
           deletePhoto($sport['nom'].'.jpg', 'Sports', 'photo');
        if(!empty($_FILES['icone']['name']))
           deletePhoto($sport['nom'].'.svg', 'svg', 'icone');

        /*upload images*/
        $error.=uploadPhoto($sport['nom'].'.jpg', 'Sports', 'photo');
        $error.=uploadPhoto($sport['nom'].'.svg', 'svg', 'icone');
        //Add BDD
        if(empty($error)){
          $this->admin->updateSport($sport['id']);
        }
      }
    }

    $sport=$this->sport->getSport($id_sport)->fetch(); //type stocké dedans.
    $vue=new Vue("BackOfficeASport","Admin",['font-awesome.css', 'admin.css'], ['Admin/admin.js']);
    $vue->loadbackoffice(['sport'=>$sport, 'nbgroupe'=>$nbgroupe, 'types'=>$types, 'error'=>$error]);
  }
}
