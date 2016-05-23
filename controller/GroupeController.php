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
    $rechercheVille=$this->groupe->searchVilleName(50)->fetchAll();
    $vue=new Vue("AfficherVille","Groupe");
    $vue->loadajax(['rechercheVille'=>$rechercheVille, 'resultat'=>$_GET['resultat']]);
  }

  public function loadInformationsGroupe($id_groupe)
  {
    $vue=new Vue("InformationsGroupe", "Groupe", ['stylesheet.css']);
    $leader=$this->groupe->isLeader($_SESSION['user']['id'],$id_groupe);
    $datagroupe=$this->groupe->getInfoGroup($id_groupe)->fetch();
    $ville=$this->groupe->getVille($datagroupe['id_ville'])->fetch();
    $sport=$this->groupe->getSport($datagroupe['id_sport'])->fetch();
    $vue->loadpage(['datagroupe'=>$datagroupe, 'ville'=>$ville, 'sport'=>$sport]);
  }

  public function loadEvenementsGroupe($id_groupe)
  {
    $vue=new Vue("EvenementsGroupe", "Groupe", ['stylesheet.css']);
    $datagroupe=$this->groupe->getInfoGroup($id_groupe)->fetch();
    $ville=$this->groupe->getVille($datagroupe['id_ville'])->fetch();
    $sport=$this->groupe->getSport($datagroupe['id_sport'])->fetch();
    $evenement=$this->groupe->getEvenements($id_groupe)->fetchAll();
    $vue->loadpage(['datagroupe'=>$datagroupe, 'ville'=>$ville, 'sport'=>$sport, 'evenement'=>$evenement]);
  }

  public function loadUnEvenementGroupe($id_groupe, $id_evenement)
  {
    $vue=new Vue("UnEvenementGroupe", "Groupe", ['stylesheet.css']);
    $datagroupe=$this->groupe->getInfoGroup($id_groupe)->fetch();
    $sport=$this->groupe->getSport($datagroupe['id_sport'])->fetch();
    $evenement=$this->groupe->getEvenement($id_evenement)->fetch();
    $ville=$this->groupe->getVille($evenement['id_ville'])->fetch();
    $vue->loadpage(['datagroupe'=>$datagroupe, 'ville'=>$ville, 'sport'=>$sport, 'evenement'=>$evenement]);
  }

  public function loadUnePublicationGroupe($id_groupe, $id_publication){
    $vue=new Vue("UnePublicationGroupe", "Groupe", ['stylesheet.css']);
    $datagroupe=$this->groupe->getInfoGroup($id_groupe)->fetch();
    $vue->loadpage(['datagroupe'=>$datagroupe]);
  }

  public function loadMembresGroupe($id_groupe)
  {
    $vue=new Vue("MembresGroupe", "Groupe", ['stylesheet.css']);
    $datagroupe=$this->groupe->getInfoGroup($id_groupe)->fetch();
    $membre=$this->groupe->getMembres($id_groupe)->fetchAll();
    $vue->loadpage(['datagroupe'=>$datagroupe, 'membre'=>$membre]);
  }

  public function loadPublicationsGroupe($id_groupe)
  {
    $vue=new Vue("PublicationsGroupe", "Groupe", ['stylesheet.css']);
    $datagroupe=$this->groupe->getInfoGroup($id_groupe)->fetch();
    $sport=$this->groupe->getSport($datagroupe['id_sport'])->fetch();
    $ville=$this->groupe->getVille($datagroupe['id_ville'])->fetch();
    $publication=$this->groupe->getPublications($id_groupe)->fetchAll();
    $vue->loadpage(['datagroupe'=>$datagroupe, 'sport'=>$sport, 'ville'=>$ville, 'publication'=>$publication]);
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

    if (isset($_POST['Envoyer'])){
      var_dump($_POST);
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
      echo $imagegroupe;
      //echo "'<img src = images/image_groupe/$imagegroupe>";
        }
     }else{
        $error=errorExceptInput(['imagegroupe']);
      }
    }
    $vue=new Vue("CreationGroupe", "Groupe", ['stylesheet.css']);
    $vue->loadpage(['error'=>$error, 'succes'=>$succes]);
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
}
