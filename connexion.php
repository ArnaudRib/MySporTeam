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

  <nav id="inscription">
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
      </nav>

      <!--Footer de la page-->
      <?php include("footer.php"); ?>
      <script src="Verification.js"></script>
    </body>

    </html>
