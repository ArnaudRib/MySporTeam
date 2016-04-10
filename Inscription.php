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
    <form action="formulaire.php" method="post">
      <div class="haut_inscription">
        <h1>Inscription</h1>
      </div>
      <fieldset>

        <br />
        <div><label for="pseudo"><img src="images/icone_utilisateur.png" /></label>
        <input type="text" name="pseudo" placeholder="Identifiant" required></div> <br />

        <div><label for="email" class="email"><img src="images/icone_email.png" /></label>
        <input type="text" name="email" placeholder="Email" required></div> <br />

        <div><label for="password"><img src="images/icone_lock.png" /></label>
        <input id="mdp" type="password" name="mot_de_passe" placeholder="Mot de passe" oninput="Verification()" required></div> <br />

        <div><label for="check_psswd"><img src="images/icone_lock.png" /></label>
        <input id="mdp_verification" type="password" name="mot_de_passe_confirmation" placeholder="Confirmation du mdp" oninput="Verification()" required></div> <br />

        <input id="submit" type="submit" name="Envoyer" value="S'inscrire"> <br />
      </fieldset>
    </form>
  </nav>

  <!--Footer de la page-->
  <?php include("footer.php"); ?>
  <script src="Verification.js"></script>
</body>

</html>
