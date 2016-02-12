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
        <form action="formulaire.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend> Inscription </legend>
            Pseudonyme :
            <input type="text" name="pseudo" placeholder="Identifiant" /> <br />

            Adresse email :
            <input type="text" name="email" placeholder="Email" /> <br />

            Confirmation adresse email :
            <input type="text" name="pseudo" placeholder="-----" /> <br />

            Mot de passe :
            <input type="text" name="pseudo" placeholder="Mot de passe" /> <br />

            Confirmation mot de passe :
            <input type="text" name="pseudo" placeholder="-----" /> <br /><br />


            <input type="submit" name="Envoyer" /> <br />
          </fieldset>
        </form>
      </nav>

      <!--Footer de la page-->
      <?php include("footer.php"); ?>

  </body>

</html>
