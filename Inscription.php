<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
        <title>MySporTeam</title>
        <meta charset="utf-8" />
    </head>


    <body>
      <!--Menu en haut de la page-->
      <?php include("header.php"); ?>

      <!--Contenu de la page-->
      <nav>
        <form action="formulaire.php" method="post">
          <fieldset>
            <legend> Inscription </legend>
            Pseudonyme :
            <input type="text" name="pseudo" placeholder="Identifiant" required> </br>

            Adresse email :
            <input type="text" name="email" placeholder="Email" required> </br>

            Confirmation adresse email :
            <input type="text" name="email_confirmation" placeholder="-----" required> </br>

            Mot de passe :
            <input type="password" name="mot_de_passe" placeholder="Mot de passe" required> </br>

            Confirmation mot de passe :
            <input type="password" name="mot_de_passe_confirmation" placeholder="•••••••" required> </br></br>

            <input type="submit" name="Envoyer"> <br>
          </fieldset>
        </form>
      </nav>

      <!--Footer de la page-->
      <?php include("footer.php"); ?>

  </body>

</html>
