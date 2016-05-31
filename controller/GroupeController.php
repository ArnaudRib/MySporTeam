<?php
require_once 'config/Vue.php';
require_once 'model/GroupeModele.php';

class GroupeController
{
  private $user;
  private $groupe;

  function __construct()
  {
    $this->user=new UserModele();
    $this->groupe=new GroupeModele();
    $this->sport=new SportModele();
  }

  public function loadRecherche()
  {
    $niveau=$this->groupe->getNiveau()->fetchAll();
    $villes=$this->groupe->getVilles()->fetchAll();
    $sports=$this->sport->getSports()->fetchAll();
    $vue=new Vue("RechercheGroupe", "Groupe", ['font-awesome.css', 'stylesheet.css'], ['RechercheGroupe.js']);
    $groupe=$this->groupe->getGroup()->fetchAll();
    $vue->loadpage(['groupe'=>$groupe, 'niveau'=>$niveau, 'villes'=>$villes, 'sports'=>$sports]);
  }

  public function loadAjaxRecherche()
  {
    $rechercheVille=$this->groupe->searchVilleName(10)->fetchAll();
    $vue=new Vue("AfficherVille","Groupe");
    $vue->loadajax(['rechercheVille'=>$rechercheVille, 'resultat'=>$_GET['resultat']]);
  }

  public function loadAjaxCreateEvent()
  {
    $rechercheVille=$this->groupe->searchVilleName(10)->fetchAll();
    $vue=new Vue("AfficherVille","Groupe");
    $vue->loadajax(['rechercheVille'=>$rechercheVille, 'resultat'=>$_GET['resultat']]);
  }

  public function loadInformationsGroupe($id_groupe)
  {
    $vue=new Vue("InformationsGroupe", "Groupe", ['stylesheet.css'], ['RechercheGroupe.js']);
    if(!empty($_POST)){
      if(!empty($_POST['abonnement'])){
        if(($_POST['abonnement']=="Rejoindre")){
          $this->groupe->joinGroupe($_SESSION['user']['id'], $id_groupe);
        }if($_POST['abonnement']=="Désinscrire"){
          $this->groupe->quitGroupe($_SESSION['user']['id'], $id_groupe);
        }
      }
      if(!empty($_POST['enregistrement'])){
        $info_ville=$this->groupe->getVilleById($_POST['ville'])->fetch();
        $id_ville=$info_ville['id'];
        $this->groupe->modifDataGroupe($id_groupe, $id_ville);
      }
    }
    $isMembre=$this->groupe->isMembre($_SESSION['user']['id'], $id_groupe);
    $isLeader=$this->groupe->isleader($_SESSION['user']['id'], $id_groupe);
    $datagroupe=$this->groupe->getInfoGroup($id_groupe)->fetch();
    $infoleader=$this->groupe->getInfoLeader($id_groupe)->fetch();
    $ville=$this->groupe->getVille($datagroupe['id_ville'])->fetch();
    $sport=$this->groupe->getSport($datagroupe['id_sport'])->fetch();
    $vue->loadpage(['datagroupe'=>$datagroupe, 'ville'=>$ville, 'infoleader'=>$infoleader,'isLeader'=>$isLeader, 'sport'=>$sport, 'isMembre'=>$isMembre]);
  }

  public function loadEvenementsGroupe($id_groupe)
  {
    $vue=new Vue("EvenementsGroupe", "Groupe", ['stylesheet.css']);
    if(!empty($_POST)){
      if(!empty($_POST['abonnement'])){
        if(($_POST['abonnement']=="Rejoindre")){
          $this->groupe->joinGroupe($_SESSION['user']['id'], $id_groupe);
        }
        if($_POST['abonnement']=="Désinscrire"){
          $this->groupe->quitGroupe($_SESSION['user']['id'], $id_groupe);
        }
      }
      if(!empty($_POST['deleteEve'])){
        $this->groupe->deleteEvenement($id_groupe);
        $succes="Publication effacée avec succès!";
        }
      if(!empty($_POST['ajout'])){
        if($_POST['ajout']=="Ajouter au planning"){
          $this->groupe->addeventtouser($id_evenement,$_SESSION['user']['id'], $id_groupe);
        }
        if($_POST['ajout']=="Supprimer du planning"){
          $this->groupe->deleteeventtouser($id_evenement,$_SESSION['user']['id'], $id_groupe);
        }
      }
    }
    $isMembre=$this->groupe->isMembre($_SESSION['user']['id'], $id_groupe);
    $isLeader=$this->groupe->isleader($_SESSION['user']['id'], $id_groupe);
    $datagroupe=$this->groupe->getInfoGroup($id_groupe)->fetch();
    $ville=$this->groupe->getVille($datagroupe['id_ville'])->fetch();
    $sport=$this->groupe->getSport($datagroupe['id_sport'])->fetch();
    $evenement=$this->groupe->getEvenements($id_groupe)->fetchAll();
    $vue->loadpage(['datagroupe'=>$datagroupe, 'ville'=>$ville, 'sport'=>$sport, 'isLeader'=>$isLeader, 'evenement'=>$evenement, 'isMembre'=>$isMembre]);
  }

  public function loadUnEvenementGroupe($id_groupe, $id_evenement)
  {
    $vue=new Vue("UnEvenementGroupe", "Groupe", ['stylesheet.css']);
    if(!empty($_POST)){
        if(!empty($_POST['abonnement'])){
      if(($_POST['abonnement']=="Rejoindre")){
        $this->groupe->joinGroupe($_SESSION['user']['id'], $id_groupe);
      }if($_POST['abonnement']=="Désinscrire"){
        $this->groupe->quitGroupe($_SESSION['user']['id'], $id_groupe);
      }
      }
      if(!empty($_POST['enregistrement'])){
        $this->groupe->modifDataEvent($id_evenement);
      }
      if(!empty($_POST['ajout'])){
        if($_POST['ajout']=="Ajouter au planning"){
        $this->groupe->addeventtouser($id_evenement,$_SESSION['user']['id'], $id_groupe);
        }
        if($_POST['ajout']=="Supprimer du planning"){
        $this->groupe->deleteeventtouser($id_evenement,$_SESSION['user']['id'], $id_groupe);
        }
      }
    }
    $isMembre=$this->groupe->isMembre($_SESSION['user']['id'], $id_groupe);
    $isParticipant=$this->groupe->isParticipant($_SESSION['user']['id'], $id_evenement);
    $isLeader=$this->groupe->isleader($_SESSION['user']['id'], $id_groupe);
    $datagroupe=$this->groupe->getInfoGroup($id_groupe)->fetch();
    $sport=$this->groupe->getSport($datagroupe['id_sport'])->fetch();
    $evenement=$this->groupe->getEvenement($id_evenement)->fetch();
    $ville=$this->groupe->getVille($evenement['id_ville'])->fetch();
    $vue->loadpage(['datagroupe'=>$datagroupe, 'ville'=>$ville, 'isParticipant'=>$isParticipant, 'sport'=>$sport, 'isLeader'=>$isLeader, 'evenement'=>$evenement, 'isMembre'=>$isMembre]);
  }

  public function loadCreateEvenement($id_groupe){
    $isLeader=$this->groupe->isleader($_SESSION['user']['id'], $id_groupe);
      $succes='';
      $error='';
      $villes=$this->groupe->getVilles()->fetchAll();
      if(!empty($_POST)){
        if(!empty($_FILES['baniere']['name']))
          $error.="Veuillez selectionner une banière pour le groupe!";
        $verification = new Verification($_POST);
        $verificationPhoto = new Verification($_FILES);
        $verification->notEmpty('nom', "Veuillez spécifier un nom à votre groupe.");
        $verification->notEmpty('nombre', "Indiquez le nombre maximal de membres.");
        $verification->notEmpty('ville', "Choississez une ville.");
        $verification->notEmpty('description', "Décrivez votre groupe.");

        $error=$verification->error;
        $error.=$verificationPhoto->error;
        if(!$verificationPhoto->isValid())
          $error.="Ce groupe existe déjà! Veuillez choisir un autre nom.";
        if($verification->isValid() && $verificationPhoto->isValid()){// && $verificationPhoto->isValid()){
          /*upload images*/
          //$nomphoto=$this->groupe->getIDevenement();
          //dump($nomphoto);
          $error.=uploadPhoto("10".'.jpg', 'Groupes/Evenements', 'evenements');

          //Add BDD
          if(empty($error)){
            $nomphoto=str_replace(' ', '-', $_POST['nom']);
            //$id_ville=$this->groupe->getVilleById($_POST['ville']);
            //dump($id_ville);
            $this->groupe->addEvenement($id_groupe);
          }
          }
          }

          $categorie=$this->groupe->getCategory()->fetchAll();
          $sports=$this->sport->getSports()->fetchAll();
          $vue=new Vue("CreationEvenement", "Groupe", ['font-awesome.css', 'stylesheet.css'], ['showphoto.js','RechercheGroupe.js']); // CSS a unifier dans le meme fichier
          $vue->loadpage(['sports'=>$sports, 'categorie'=>$categorie, 'villes'=>$villes, 'isLeader'=>$isLeader,'error'=>$error, 'succes'=>$succes]);
  }

  public function loadUnePublicationGroupe($id_groupe, $id_publication){
    $vue=new Vue("UnePublicationGroupe", "Groupe", ['stylesheet.css']);
    $datagroupe=$this->groupe->getInfoGroup($id_groupe)->fetch();
    $vue->loadpage(['datagroupe'=>$datagroupe]);
  }

  public function loadMembresGroupe($id_groupe)
  {
    $vue=new Vue("MembresGroupe", "Groupe", ['stylesheet.css']);
    if(!empty($_POST)){
      if(!empty($_POST['abonnement'])){
      if(($_POST['abonnement']=="Rejoindre")){
        $this->groupe->joinGroupe($_SESSION['user']['id'], $id_groupe);
      }if($_POST['abonnement']=="Désinscrire"){
        $this->groupe->quitGroupe($_SESSION['user']['id'], $id_groupe);
      }
      }
      if(!empty($_POST['deleteUser'])){
        $this->groupe->deleteUser($id_groupe);
        $succes="";
        }
    }
    $isMembre=$this->groupe->isMembre($_SESSION['user']['id'], $id_groupe);
    $isLeader=$this->groupe->isleader($_SESSION['user']['id'], $id_groupe);
    $datagroupe=$this->groupe->getInfoGroup($id_groupe)->fetch();
    $membre=$this->groupe->getMembres($id_groupe)->fetchAll();
    $vue->loadpage(['datagroupe'=>$datagroupe, 'membre'=>$membre, 'isMembre'=>$isMembre, 'isLeader'=>$isLeader]);
  }

  public function loadPublicationsGroupe($id_groupe)
  {
    $error='';
    $succes='';
    $vue=new Vue("PublicationsGroupe", "Groupe", ['stylesheet.css']);
    if(!empty($_POST)){
      if(!empty($_POST['abonnement'])){
        if(($_POST['abonnement']=="Rejoindre")){
          $this->groupe->joinGroupe($_SESSION['user']['id'], $id_groupe);
        }if($_POST['abonnement']=="Désinscrire"){
          $this->groupe->quitGroupe($_SESSION['user']['id'], $id_groupe);
        }
      }
      if(!empty($_POST['Poster'])){
        $verification = new Verification($_POST);
        $verification->notEmpty('titre', "Veuillez spécifier un titre à votre publication.");
        $verification->notEmpty('publication', "Complétez le champ publication.");
        $error=$verification->error;
        if($verification->isValid()){
          $this->groupe->publication($_POST['titre'], $_POST['publication'], $id_groupe);
          $succes="Publication ajoutée!";
        }
      }

      if(!empty($_POST['deletePub'])){
        $this->groupe->deletePublication($id_groupe);
        $succes="Publication effacée avec succès!";
      }
    }
    $isMembre=$this->groupe->isMembre($_SESSION['user']['id'], $id_groupe);
    $isLeader=$this->groupe->isleader($_SESSION['user']['id'], $id_groupe);
    $datagroupe=$this->groupe->getInfoGroup($id_groupe)->fetch();
    $sport=$this->groupe->getSport($datagroupe['id_sport'])->fetch();
    $ville=$this->groupe->getVille($datagroupe['id_ville'])->fetch();
    $publication=$this->groupe->getPublications($id_groupe)->fetchAll();
    $user=$this->user->getUserNamePub($publication); // compliqué :D .. permet d'associer à chaque publication l'id du user qui l'a postée :o..
    $evenement=$this->groupe->getEvenements($id_groupe)->fetchAll();
    $vue->loadpage(['datagroupe'=>$datagroupe, 'sport'=>$sport, 'isMembre'=>$isMembre, 'isLeader'=>$isLeader, 'ville'=>$ville, 'publication'=>$publication,  'evenement'=>$evenement, 'error'=>$error, 'succes'=>$succes, 'user'=>$user]);
  }

  public function loadUnePublicationsGroupe($id_groupe, $id_publication)
  {
    $vue=new Vue("UnePublicationGroupe", "Groupe", ['stylesheet.css']); // Créer VueUnePublicationGroupe dans view/groupe
    $vue->loadpage();
  }

  public function loadCreationGroupe()
  {
    $succes='';
    $error='';
    if(!empty($_POST)){
      $nomphoto=str_replace(' ', '-', $_POST['nom']);
      if(!empty($_FILES['photogroupe']['name']))
        $error.="Veuillez selectionner une photo de groupe!";
      if(!empty($_FILES['baniere']['name']))
        $error.="Veuillez selectionner une banière pour le groupe!";
      $verification = new Verification($_POST);
      $verificationPhoto = new Verification($_FILES);
      $verification->notEmpty('nom', "Veuillez spécifier un nom à votre groupe.");
      $verificationPhoto->PhotoOk('photogroupe', $nomphoto.'.jpg','Groupes/Profil');
      $verificationPhoto->PhotoOk('baniere', $nomphoto.'.jpg','Groupes/Banière');
      $verification->notEmpty('categorie', "Veuillez séléctionner une catégorie.");
      $verification->notEmpty('nombre', "Indiquez le nombre maximal de membres.");
      $verification->notEmpty('sport', "Choississez un sport.");
      $verification->notEmpty('ville', "Choississez une ville.");
      $verification->notEmpty('description', "Décrivez votre groupe.");

      $error=$verification->error;
      $error.=$verificationPhoto->error;
      if(!$verificationPhoto->isValid())
        $error.="Ce groupe existe déjà! Veuillez choisir un autre nom.";
      if($verification->isValid() && $verificationPhoto->isValid()){// && $verificationPhoto->isValid()){
        /*upload images*/
        $error.=uploadPhoto($nomphoto.'.jpg', 'Groupes/Profil', 'photogroupe');
        $error.=uploadPhoto($nomphoto.'.jpg', 'Groupes/Banière', 'baniere');

        //Add BDD
        if(empty($error)){
          $this->groupe->addGroupe();
        }
      }
    }

    $categorie=$this->groupe->getCategory()->fetchAll();
    $sports=$this->sport->getSports()->fetchAll();
    $vue=new Vue("CreationGroupe", "Groupe", ['font-awesome.css', 'stylesheet.css'], ['showphoto.js']); // CSS a unifier dans le meme fichier
    $vue->loadpage(['sports'=>$sports, 'categorie'=>$categorie, 'error'=>$error, 'succes'=>$succes]);
  }


  public function loadGroupeSport($id_sport){ //Load les groupes d'un sport. Permet aussi d'accéder à la recherche avancée.
    $photo=$this->sport->getPhotoSport($id_sport)->fetch();
    $sport=$this->sport->getSport($id_sport)->fetch();
    $sports=$this->sport->getSports(4)->fetchAll();
    $Allsports=$this->sport->getSports()->fetchAll();
    $groupes=$this->groupe->getInfoGroupSport($id_sport)->fetchAll();
    $nbmembre=$this->groupe->getNbMembresGroupe($groupes);
    $vue=new Vue("GroupeSport", "Groupe", ['stylesheet.css'], ['GroupeSport.js']);
    $vue->loadpage(['sport'=>$sport, 'sports'=>$sports, 'photo'=>$photo, 'Allsports'=>$Allsports, 'groupes'=>$groupes, 'nbmembre'=>$nbmembre]);
  }

  public function loadClub($id_club)
  {
    $dataclub=$this->groupe->getClub($id_club)->fetch();
    // $email=$this->groupe->getEmailClub($dataclub['email'])->fetch();
    // $tel=$this->groupe->getTelClub($dataclub['telephone'])->fetch();
    // $adresse=$this->groupe->getAdresse($dataclub['adresse'])->fetch();
    // $ville=$this->groupe->getVille($dataclub['id_ville'])->fetch();
    $vue=new Vue("Club", "Groupe", ['stylesheet.css']);
    $vue->loadpage(['dataclub'=>$dataclub]);
  }
}
