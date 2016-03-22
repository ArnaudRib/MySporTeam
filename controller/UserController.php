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
    if (empty($_POST['pseudo']) || empty($_POST['mot_de_passe']) ) //Oublie d'un champ
    {
      $message = '<p>une erreur s\'est produite pendant votre identification.
      Vous devez remplir tous les champs</p>
      <p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
    } else {//On check le mot de passe
      $data=$this->user->CheckUser()->fetch();
      if ($data['mot_de_passe'] == sha1($_POST['mot_de_passe'])) // Acces OK !
      {
        $_SESSION['pseudo'] = $data['pseudo'];
        $_SESSION['mot_de_passe'] = $data['mot_de_passe'];
        $message = '<p>Bienvenue '.$data['pseudo'].',
        vous êtes maintenant connecté!</p>
        <p>Cliquez <a href="./">ici</a>
        pour revenir à la page d accueil</p>';
      }
      else // Acces pas OK !
      {
        $message = '<p>Une erreur s\'est produite
        pendant votre identification.<br /> Le mot de passe ou le pseudo
        entré n\'est pas correcte.</p><p>Cliquez <a href="./Connexion">ici</a>
        pour revenir à la page précédente
        <br /><br />Cliquez <a href="./">ici</a>
        pour revenir à la page d accueil</p>';
      }
    }
    $vue=new Vue("Connexion","User",['stylesheet.css']);
    $vue->loadpage(['message'=>$message]);
  }

  public function inscription()
  {
    if (isset($_POST['pseudo']) || isset($_POST['mot_de_passe'])){
      $data->$this->user->InscriptionUser()->fetch();
      if($data){
        echo 'Inscription réussie!';
      }else{
        echo 'erreur';
      }
    } //Oublie d'un champ
    $vue=new Vue("Inscription","User",['stylesheet.css']);
    $vue->loadpage();
  }
}
