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
        <form style="margin:10px;" action="verification.php" method="post">
          <fieldset>
            Adresse Email :
            <input type="text" name="email" placeholder="Email" required> </br>

            Mot de passe :
            <input type="password" name="mot_de_passe" placeholder="Mot de passe" required> </br>

            <a href="#tamere">Mot de passe oublié?</a></br>
            <input type="submit" name="Envoyer"> <br>

          </fieldset>


        </form>

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
<?php else:?>
  <p>Vous êtes déjà connecté!</br> Pour vous déconnecter, cliquez <a href="connexion.php?deconnexion=true">ici<a/></p>
      <?php if (isset($_GET['deconnexion'])){
        session_unset($_SESSION['pseudo']);
        header('Location: connexion.php');
      } ?>
<?php endif; ?>

    <aside class="bloc2">
      <div class="encadrement" style="padding:3%;">
        <h2>Pas encore inscrit?</h2>
        <a href="inscription.php">ICI<a>
      </div>
    </aside>
    <?php include("footer.php"); ?>
  </body>
</html>
