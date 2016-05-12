<?php
require_once 'config/Vue.php';
require_once 'model/UserModele.php';

class UserController
{
  private $user;

  function __construct()
  {
    $this->user=new UserModele();
  }


  public function connexion()
  {
    $message='';
    if (!empty($_POST['pseudo']) && !empty($_POST['mot_de_passe']) ) //Oublie d'un champ
    {
      //On check le mot de passe
      $data=$this->user->CheckUser()->fetch();
      if ($data['mot_de_passe'] == sha1($_POST['mot_de_passe'])) // Acces OK !
      {
        $_SESSION['user']=$data;
        $message = '<p>Bienvenue '.$data['pseudo'].',
        vous êtes maintenant connecté!
        <p>Cliquez <a href="./">ici</a>
        pour revenir à la page d accueil. Vous pouvez aussi
        cliquer <a href="deconnexion">
         ici pour vous deconnecter</a>.</p>';
      }
      else // Acces pas OK !
      {
        $message = '<p>Une erreur s\'est produite
        pendant votre identification.<br /> Le mot de passe ou le pseudo
        entré n\'est pas correcte.
        <br />Cliquez <a href="./">ici</a>
        pour revenir à la page d accueil, ou modifiez les informations saisies.</p>';
      }
    }

    $vue=new Vue("Connexion","User",['stylesheet.css']);
    $vue->loadpage(['message'=>$message]);
  }


  public function inscription()
  {
    $message='';
    if(!empty($_POST)){
      if (isset($_POST['pseudo']) || isset($_POST['mot_de_passe'])){
        if($_POST['mot_de_passe']==$_POST['mot_de_passe_confirmation']){
          $data1=$this->user->FreePseudo($_POST['pseudo']); // si pseudo non déjà utilisé.
          if(!$data1){
            $data=$this->user->InscriptionUser(); //si il y a une réponse, true + tableau de la réponse, sinon, false.
            if($data){
              $message= 'Inscription réussie!';
            }
          }else{
            $message= "Pseudo déjà utilisé!";
          }
        }else{
          $message= 'Mots de passe non correspondants.';
        }
      }else{
        $message= 'Un des champs est vide.';
      }
    }
    $vue=new Vue("Inscription","User",['stylesheet.css'], ['Verification.js']); // dans le fichier view/User, chercher Vue"Inscription", et load la page css stylesheet.css .
    $vue->loadpage(['message'=>$message]);
  }

  public function loadProfil()
    {
    $vue=new Vue("Profil","User",['stylesheet.css'], ['profil.js', 'calendrier.js']); // dans le fichier view/User, chercher Vue"Inscription", et load la page css stylesheet.css .
    $vue->loadpage();
    }


    public function LoadAUser($pseudo_user){
      $dataUser=$this->user->getDataUser($pseudo_user)->fetch();
      $vue=new Vue("ProfilUnUtilisateur","User",['stylesheet.css']); // dans le fichier view/User, chercher Vue"Inscription", et load la page css stylesheet.css .
      $vue->loadpage(['dataUser'=>$dataUser]);
    }

  public function deconnexion(){
    session_unset($_SESSION['user']);
    header('Location: connexion');
  }

}
