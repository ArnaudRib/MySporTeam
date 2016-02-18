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
