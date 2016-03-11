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
        if ($id!=0) erreur(ERR_IS_CO);
        ?>
        <?php
        if (!isset($_POST['pseudo'])){ //On est dans la page de formulaire ?>
          <form style="margin:10px;" action="verification.php" method="post">
            <fieldset>
              <label for="pseudo">Adresse Email :</label>
              <input type="text" name="pseudo" placeholder="Email" required> </br>

              <label for="motdepasse">Mot de passe :</label>
              <input type="password" name="mot_de_passe" placeholder="Mot de passe" required> </br>

              <a href="#tamere">Mot de passe oublié?</a></br>
              <input type="submit" name="Envoyer"> <br>
            </fieldset>
          </form>
        <?php
      }?>

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
