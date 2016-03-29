<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="stylesheet.css">
  <title>MySporTeam</title>
</head>
<body>
  <?php include("header.php"); ?>
  <h1 class="">Connexion</h1>

  <section class="bloc1">
    <div class="encadrement" style="padding:3%;">
      <h2>Déjà inscrit?</h2>
      <?php
      if (!isset($_POST['pseudo'])){ //On est dans la page de formulaire ?>
        <form style="margin:10px;" action="connexion.php" method="post">
          <fieldset>
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" placeholder="Pseudo" required> </br>

            <label for="motdepasse">Mot de passe :</label>
            <input type="password" name="mot_de_passe" placeholder="Mot de passe" required> </br>

            <a href="#tamere">Mot de passe oublié?</a></br>
            <input type="submit" name="Envoyer"> <br>
          </fieldset>
        </form>
        <?php
      }else{
        $message='';
        if (empty($_POST['pseudo']) || empty($_POST['mot_de_passe']) ) //Oublie d'un champ
        {
          $message = '<p>une erreur s\'est produite pendant votre identification.
          Vous devez remplir tous les champs</p>
          <p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
        } else {//On check le mot de passe
          include('connectBDD.php');
          $sql="SELECT * FROM utilisateurs WHERE pseudo=? AND mot_de_passe=?";
          $query=$db->prepare($sql); //a mettre dans model
          $query->execute([$_POST['pseudo'], sha1($_POST['mot_de_passe'])]);
          $data=$query->fetch();

          if ($data['mot_de_passe'] == sha1($_POST['mot_de_passe'])) // Acces OK !
          {
            $_SESSION['pseudo'] = $data['pseudo'];
            $_SESSION['mot_de_passe'] = $data['mot_de_passe'];
            $message = '<p>Bienvenue '.$data['pseudo'].',
            vous êtes maintenant connecté!</p>
            <p>Cliquez <a href="./index.php">ici</a>
            pour revenir à la page d accueil</p>';
          }
          else // Acces pas OK !
          {
            $message = '<p>Une erreur s\'est produite
            pendant votre identification.<br /> Le mot de passe ou le pseudo
            entré n\'est pas correcte.</p><p>Cliquez <a href="./connexion.php">ici</a>
            pour revenir à la page précédente
            <br /><br />Cliquez <a href="./index.php">ici</a>
            pour revenir à la page d accueil</p>';
          }
          $query->CloseCursor();
        }
        echo $message.'</div></body></html>';
      }
      ?>
    </div>
  </section>

  <aside class="bloc2">
    <div class="encadrement" style="padding:3%;">
      <h2>Pas encore inscrit?</h2>
      <a href="inscription.php">ICI<a>
      </div>
    </aside>
    <?php include("footer.php"); ?>
  </body>
  </html>
