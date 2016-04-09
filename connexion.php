<<<<<<< HEAD
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="stylesheet.css">
  <title>MySporTeam</title>
</head>
<body>
  <?php include("header.php");?>
  <h1 class="">Connexion</h1>

  <?php if(!isset($_SESSION['pseudo'])): ?>
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
          $sql="SELECT * FROM utilisateurs WHERE pseudo=? and mot_de_passe=?";
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
      }
      ?>
    </div>
  </section>
<?php else:?>
  <p>Vous êtes déjà connecté!</br> Pour vous déconnecter, cliquez <a href="connexion.php?deconnexion=true">ici<a/></p>
  <?php
  if (isset($_GET['deconnexion'])){
    session_unset($_SESSION['pseudo']);
    header('Location: connexion.php');
  } ?>
<?php endif; ?>

  <aside class="bloc2">
    <div class="encadrement" style="padding:3%;">
      <h2>Pas encore inscrit?</h2>
      <a href="inscription.php">ICI</a>
    </div>
  </aside>

  <?php include("footer.php"); ?>


  </body>

  </html>
=======
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="stylesheet.css"/>
  <link rel="stylesheet" href="inscription.css"/>
  <title>MySporTeam</title>
  <meta charset="utf-8" />
</head>


<body>
  <!--Menu en haut de la page-->
  <?php include("header.php"); ?>

  <!--Contenu de la page-->

  <div id="inscription">
    <form action="connexion.php" method="post">

      <div class="haut_inscription">
        <h1>Connexion</h1>
      </div>


      <fieldset>
        <?php
        if(isset($_POST['pseudo'])) {
          $message='';

          if (empty($_POST['pseudo']) || empty($_POST['mot_de_passe'])) { //Oublie d'un champ
            echo '<p class="error_connexion">Vous devez remplir tous les champs.</p>'; ?>
            <br />
            <div>
              <label for="login"><img src="images/icone_utilisateur.png" /></label>
              <input type="text" name="pseudo" placeholder="Email ou Pseudo" required>
            </div> <br />

              <div><label for="mdp"><img src="images/icone_lock.png" /></label>
                <input id="mdp" type="password" name="mot_de_passe" placeholder="Mot de passe" oninput="Verification()" required></div> <br />

                <p><a href=""> Mot de passe oublié ? </a>|<a href="inscription.php"> Pas inscrit ?</a></p>

                <br />
                <input id="submit" type="submit" name="Envoyer" value="Se connecter"> <br />

              </fieldset>
          <?php
        }else {//On check le mot de passe

            include('connectBDD.php');

            $sql="SELECT * FROM utilisateurs WHERE pseudo=? AND mot_de_passe=?";
            $query=$db->prepare($sql); //a mettre dans model
            $query->execute(array($_POST['pseudo'], sha1($_POST['mot_de_passe'])));
            $data=$query->fetch();

            if ($data['mot_de_passe'] != sha1($_POST['mot_de_passe'])) {// Acces OK !
              echo '<p class="error_connexion">Une erreur s\'est produite
              pendant votre identification.<br /> Le mot de passe ou l\'identifiant
              entré n\'est pas correcte.</p>';
              ?>

              <br />
              <div>
                <label for="login"><img src="images/icone_utilisateur.png" /></label>
                <input type="text" name="pseudo" placeholder="Email ou Pseudo" required>
              </div> <br />

                <div><label for="mdp"><img src="images/icone_lock.png" /></label>
                  <input id="mdp" type="password" name="mot_de_passe" placeholder="Mot de passe" oninput="Verification()" required></div> <br />

                  <p><a href=""> Mot de passe oublié ? </a>|<a href="inscription.php"> Pas inscrit ?</a></p>

                  <br />
                  <input id="submit" type="submit" name="Envoyer" value="Se connecter"> <br />

                </fieldset>

                <?php
              }else {// Acces pas OK !
                $_SESSION['pseudo'] = $data['pseudo'];
                $_SESSION['mot_de_passe'] = $data['mot_de_passe'];
                echo '<p class="msg_connexion">Bonjour '.$data['pseudo'].',
                vous êtes maintenant connecté!</p>
                <p>Cliquez <a href="./index.php">ici</a>
                pour revenir à la page d accueil</p>';
              }
              $query->CloseCursor();
            }
          } else {
          ?>
          <br />
          <div>
            <label for="login"><img src="images/icone_utilisateur.png" /></label>
            <input type="text" name="pseudo" placeholder="Email ou Pseudo" required>
          </div> <br />

            <div><label for="mdp"><img src="images/icone_lock.png" /></label>
              <input id="mdp" type="password" name="mot_de_passe" placeholder="Mot de passe" oninput="Verification()" required></div> <br />

              <p><a href=""> Mot de passe oublié ? </a>|<a href="inscription.php"> Pas inscrit ?</a></p>

              <br />
              <input id="submit" type="submit" name="Envoyer" value="Se connecter"> <br />

            </fieldset>
            <?php } ?>
        </form>
      </div>

      <!--Footer de la page-->
      <?php include("footer.php"); ?>
      <script src="Verification.js"></script>
    </body>

    </html>
>>>>>>> Alexis
