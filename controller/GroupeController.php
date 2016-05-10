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
  }

  public function loadRecherche()
  {
    $vue=new Vue("RechercheGroupe", "Groupe", ['stylesheet.css']);
    $groupe=$this->groupe->getGroup()->fetchAll();
    $vue->loadpage(['groupe'=>$groupe]);
  }

  public function loadInformationsGroupe($id_groupe)
  {
    $vue=new Vue("InformationsGroupe", "Groupe", ['stylesheet.css']);
    $datagroupe=$this->groupe->getInfoGroup($id_groupe)->fetch();
    $vue->loadpage(['datagroupe'=>$datagroupe]);
  }

  public function loadEvenementsGroupe($id_groupe)
  {
    $vue=new Vue("EvenementsGroupe", "Groupe", ['stylesheet.css']);
    $vue->loadpage();
  }

  public function loadUnEvenementGroupe($id_groupe, $id_evenement)
  {
    $vue=new Vue("UnEvenementGroupe", "Groupe", ['stylesheet.css']);
    $vue->loadpage();
  }

  public function loadMembresGroupe($id_groupe)
  {
    $vue=new Vue("MembresGroupe", "Groupe", ['stylesheet.css']);
    $vue->loadpage();
  }

  public function loadPublicationsGroupe($id_groupe)
  {
    $vue=new Vue("PublicationsGroupe", "Groupe", ['stylesheet.css']);
    $vue->loadpage();
  }

  public function loadUnePublicationsGroupe($id_groupe, $id_publication)
  {
    $vue=new Vue("UnePublicationGroupe", "Groupe", ['stylesheet.css']); // Créer VueUnePublicationGroupe dans view/groupe
    $vue->loadpage();
  }

  public function loadCreationGroupe()
  {

    if (isset($_POST['Envoyer'])){

      if(exceptName(['imagegroupe'])){
        $succes="Profil complété avec succès!";

        if(isset($_FILES['imagegroupe'])&&!empty($_FILES['imagegroupe']['name'])){
			$extensions_ok = array('png', 'jpg', 'jpeg', 'JPG','bmp');
			$extension = pathinfo($_FILES['imagegroupe']['name'], PATHINFO_EXTENSION);
			if(in_array($extension, $extensions_ok)){
				if(move_uploaded_file($_FILES['imagegroupe']['tmp_name'] , 'images/image_groupe/'.$_SESSION['user']['id'].'.png')) {

				}

			}

		}
		if(is_file('images/image_groupe/'.$_SESSION['user']['id'].'.png')){
      $imagegroupe = $_SESSION['user']['id'].'.png';
      $groupe=$this->groupe->creationGroupe($imagegroupe);
      
      //echo "'<img src = images/image_groupe/$imagegroupe>";
        }
     }else{
        $error=errorExceptInput(['imagegroupe']);
      }
    }

    $vue=new Vue("CreationGroupe", "Groupe", ['stylesheet.css']); // CSS a unifier dans le meme fichier
    $vue->loadpage(['error'=>$error, 'succes'=>$succes]);
  }


  }
