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
    $this->forum=new ForumModele();
  }

  public function loadBackOffice()
  {
    $nbgroupe=$this->admin->countGroup();
    $nbuser=$this->admin->countUser();
    $nbvues=$this->admin->countVue();
    $nbmsg=$this->admin->countMessage();

    $vue=new Vue("BackOfficeAccueil","Admin",['font-awesome.css', 'admin.css'], ['Admin/admin.js']);
    $vue->loadbackoffice(['nbgroupe'=>$nbgroupe, 'nbvues'=>$nbvues, 'nbuser'=>$nbuser, 'nbmsg'=>$nbmsg]);
  }

  public function loadBackOfficeUser()
  {
    $error='';
    $succes='';
    if(!empty($_POST)){
      if(isset($_POST['modifieruser'])){
        $verificationPhoto = new Verification($_FILES);
        if(!empty($_FILES['photo']['name']))
          $verificationPhoto->PhotoOk('photo', $_POST['pseudouser'].'.jpg', 'Users/Profil', false);
        if(!empty($_FILES['couverture']['name']))
          $verificationPhoto->PhotoOk('couverture', $_POST['pseudouser'].'.jpg', 'Users/Bannière', false);

        $error.=$verificationPhoto->error;

        if(!empty($_FILES['photo']['name']))
           $error.=deletePhoto($_POST['pseudouser'].'.jpg', 'Users/Profil', 'Erreur de suppression du champ photo.');

       if(!empty($_FILES['couverture']['name']))
          $error.=deletePhoto($_POST['pseudouser'].'.jpg', 'Users/Bannière', 'Erreur de suppression du champ photo.');

        $error.=uploadPhoto($_POST['pseudouser'].'.jpg', 'Users/Profil', 'photo');
        $error.=uploadPhoto($_POST['pseudouser'].'.jpg', 'Users/Bannière', 'couverture');

        if(empty($error)){
          $this->admin->updateUser($_POST['id_user']);
          $succes="Modification effectuée!";
        }
      }
      if(isset($_POST['SupprUser'])){
        $this->admin->deleteUser($_POST['id_user']);
        $succes="Utilisateur supprimé avec succès!";
      }

      if(isset($_POST['Ban'])){
        $this->admin->BanUser($_POST['id_user']);
        $succes="Utilisateur banni avec succès!";
        $user=$this->user->getDataUserById($_POST['id_user'])->fetchAll();
        sendmail($user[0], 'Bannissement du compte.', 'banned.php');
      }

      if(isset($_POST['unBan'])){
        $this->admin->UnBanUser($_POST['id_user']);
        $succes="Utilisateur unban avec succès!";
        $user=$this->user->getDataUserById($_POST['id_user'])->fetchAll();
        sendmail($user[0], 'Unban du compte.', 'unbanned.php');
      }
    }

    $users=$this->user->getDataUsers()->fetchAll();
    $nbGroupeUsers=$this->user->getNbGroupeUsers($users);
    $nbPostUsers=$this->user->getNbPostUsers($users);

    $vue=new Vue("BackOfficeUtilisateur","Admin",['font-awesome.css', 'admin.css'], ['Admin/admin.js']);
    $vue->loadbackoffice(['users'=>$users, 'nbGroupeUsers'=>$nbGroupeUsers, 'nbPostUsers'=>$nbPostUsers, 'error'=>$error, 'succes'=>$succes]);
  }

  public function loadBackOfficeGroupe()
  {
    if(!empty($_POST)){
      if(isset($_POST['modifiergroupe'])){
        if(!empty($_FILES['photo']['name']))
          $error.="Veuillez selectionner une photo pour le sport.";
        $verification = new Verification($_POST);
        $verificationPhoto = new Verification($_FILES);
        if(!empty($_FILES['photo']['name']))
          $verificationPhoto->PhotoOk('photo', $_POST['nomgroupe'].'.jpg', 'Groupes/Profil', false);
        if(!empty($_FILES['couverture']['name']))
          $verificationPhoto->PhotoOk('couverture', $_POST['nomgroupe'].'.jpg', 'Groupes/Bannière', false);

        $verification->notEmpty('nom', "Veuillez spécifier le nom du groupe.");
        $verification->notEmpty('description', "Veuillez remplir la description du groupe.");
        $verification->notEmpty('telephone', "Quel est votre numéro de téléphone?");
        $verification->notEmpty('email', "Veuillez donner votre email.");
        $verification->notEmpty('nbmax_sportifs', "Veuillez préciser le nombre maximum de membres.");

        /*Rajouter les autres vérifications ici*/
        $error=$verification->error;
        $error.=$verificationPhoto->error;
        if($verification->isValid()){//} && $verificationPhoto->isValid()){
          if(!empty($_FILES['photo']['name']))
             $error.=deletePhoto($_POST['nomgroupe'].'.jpg', 'Groupes/Profil', 'Erreur de suppression du champ photo.');
         if(!empty($_FILES['couverture']['name']))
            $error.=deletePhoto($_POST['nomgroupe'].'.jpg', 'Groupes/Bannière', 'Erreur de suppression du champ bannière.');

          $error.=uploadPhoto($_POST['nomgroupe'].'.jpg', 'Groupes/Profil', 'photo');
          $error.=uploadPhoto($_POST['nomgroupe'].'.jpg', 'Groupes/Bannière', 'couverture');

          if(empty($error)){
            $this->admin->updateGroupe($_POST['id_groupe']);
            $succes="Modification effectuée!";
          }
        }
      }
      if(isset($_POST['Suppr'])){
        //supprimer groupe ici.
        $this->admin->deleteGroupe();
        $succes="Suppression réussie!";
      }
    }
    $groupes=$this->groupe->getGroup()->fetchAll();
    $nbmembres=$this->user->getNbMembreGroupe($groupes);
    $vue=new Vue("BackOfficeGroupe","Admin",['font-awesome.css', 'admin.css'], ['Admin/admin.js']);
    $vue->loadbackoffice(['groupes'=>$groupes, 'nbmembres'=>$nbmembres, 'error'=>$error, 'succes'=>$succes]);
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

  public function loadBackOfficeForum()
  {
    if(!empty($_POST)){
      if(isset($_POST['modifiertopic'])){
        $verification = new Verification($_POST);
        $verification->notEmpty('description', "Veuillez remplir la description du topic.");
        $verification->notEmpty('titre', "Veuillez remplir le nom du topic.");
        $error=$verification->error;
        if($verification->isValid()){
          if(empty($error)){
            $this->admin->updateTopic($_POST['id_topic']);
            $succes="Topic modifié avec succès!";
          }
        }
      }
      if(isset($_POST['addtopic'])){
        if(empty($error)){
            $this->admin->addTopic();
          }else{
            $error.="Ce topic existe déjà.";
          }
      }
      if(isset($_POST['Suppr'])){
        //supprimer club ici.
        $this->admin->deleteTopic();
        $succes="Suppression réussie!";
      }
    }

    if(!empty($_POST)){
      if(isset($_POST['modifierdiscussion'])){
        $verification = new Verification($_POST);
        $verification->notEmpty('titre', "Veuillez remplir le titre de la discussion.");
        $verification->notEmpty('id_topic', "Veuillez remplir l'id Topic de la discussion.");

        $error=$verification->error;
        if($verification->isValid()){
          if(empty($error)){
            $this->admin->updateDiscussion();
          }
        }
      }
      if(isset($_POST['adddiscussion'])){
        if(empty($error)){
            $this->admin->addDiscussion();
        }
      }
      if(isset($_POST['Supprdiscussion'])){
        //supprimer club ici.
        $this->admin->deleteDiscussion();
        $succes="Suppression réussie!";
      }
    }

    $messages=$this->admin->getDataMessage()->fetchAll();
    $topics=$this->forum->getDataTopic()->fetchAll();
    $discussions=$this->admin->getDataDiscussion()->fetchAll();

    $vue=new Vue("BackOfficeForum","Admin",['font-awesome.css', 'admin.css'], ['Admin/admin.js']);
    $vue->loadbackoffice(['topics'=>$topics, 'messages'=>$messages, 'discussions'=>$discussions, 'error'=>$error, 'succes'=>$succes]);
  }

  public function loadBackOfficeClub()
  {
    if(!empty($_POST)){
      if(isset($_POST['modifierclub'])){
        $verification = new Verification($_POST);
        $verificationPhoto = new Verification($_FILES);
        if(!empty($_FILES['photo']['name']))
          $verificationPhoto->PhotoOk('photo', $_POST['nomclub'].'.jpg','Clubs/Bannière/', false);

        $verification->notEmpty('informations', "Veuillez remplir la description du club.");
        $verification->notEmpty('telephone', "Veuillez remplir le numéro de téléphone du club.");
        $verification->notEmpty('email', "Veuillez remplir l'adresse email du club.");
        $verification->notEmpty('lien', "Veuillez ajouter le lien du site du club.");
        $verification->notEmpty('adresse', "Veuillez remplir l'adresse du club.");
        $error=$verification->error;

        if($verification->isValid() && $verificationPhoto->isValid()){
          if(!empty($_FILES['photo']['name']))
            deletePhoto($_POST['nomclub'].'.jpg', 'Clubs/Bannière', 'photo');
          /*upload images*/
          $error.=uploadPhoto($_POST['nomclub'].'.jpg', 'Clubs/Bannière', 'photo');
          if(empty($error)){
            $this->admin->updateClub($_POST['id_club']);
            $succes="Club modifié avec succès!";
          }
        }
      }

      if(isset($_POST['addclub'])){
        if(!empty($_FILES['photo']['name']))
          $error.="Veuillez selectionner une icone pour le club.";

        $verification = new Verification($_POST);
        $verificationPhoto = new Verification($_FILES);

        $verification->notEmpty('informations', "Veuillez remplir la description du club.");
        $verification->notEmpty('telephone', "Veuillez remplir le numéro de téléphone du club.");
        $verification->notEmpty('email', "Veuillez remplir l'adresse email du club.");
        $verification->notEmpty('lien', "Veuillez ajouter le lien du site du club.");
        $verification->notEmpty('nom', "Veuillez remplir le nom du club.");
        $verification->notEmpty('adresse', "Veuillez remplir l'adresse du club.");
        $nomclub=str_replace(' ', '-', $_POST['nom']);

        $verificationPhoto->PhotoOk('photo', $nomclub.'.jpg','Clubs/Bannière');

        $error=$verification->error;
        if($verification->isValid() && $verificationPhoto->isValid()){
          $error.=uploadPhoto($nomclub.'.jpg', 'Clubs/Bannière/', 'photo');

          if(empty($error)){
            $this->admin->addClub();
            $succes="Club ajouté avec succès!";
          }
        }
      }

      if(isset($_POST['Suppr'])){
        //supprimer club ici.
        $this->admin->deleteClub();
        $succes="Suppression réussie!";
      }
    }
    $clubs=$this->groupe->getClubs()->fetchAll();
    $vue=new Vue("BackOfficeClub","Admin",['font-awesome.css', 'admin.css'], ['Admin/admin.js']);
    $vue->loadbackoffice(['clubs'=>$clubs, 'error'=>$error, 'succes'=>$succes]);
  }


  public function loadBackOfficeAide()
  {
    $succes="";
    $error="";
    if(!empty($_POST)){
      if(isset($_POST['addQuest'])){
        $verification = new Verification($_POST);
        $verification->notEmpty('section', "Veuillez compléter le champ section.");
        $verification->notEmpty('question', "Veuillez informer une question.");
        $verification->notEmpty('reponse', "Ne voulez vous pas répondre à la question?");
        $error=$verification->error;
        if($verification->isValid()){
          if(empty($error)){
            $this->admin->addQuest();
          }
        }
      }
      if(isset($_POST['delete'])){
        $this->admin->deleteQuest();
      }
    }

    $aide=$this->accueil->getAide();
    $vue=new Vue("BackOfficeAide","Admin",['font-awesome.css', 'admin.css']);
    $vue->loadbackoffice(['aide'=>$aide,'error'=>$error]);
  }
}
