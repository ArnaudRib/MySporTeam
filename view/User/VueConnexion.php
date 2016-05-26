<?php /* if (!isset($_POST['pseudo'])): //On est dans la page de formulaire ?>
  <p>Vous êtes déjà connecté!</br> Pour vous déconnecter, cliquez <a href="deconnexion">ici<a/></p>
  <?php
  session_unset($_SESSION['pseudo']);
  header('Location: index.php'); //A changer :(..
endif; */?>

<div class="bodybackground">
  <div class="blockinscription">
    <div id="inscription">
      <form action="" method="post">

        <div class="haut_inscription">
          <h1>Connexion</h1>
        </div>

        <fieldset>
          <div>
            <label for="login"><img src="<?php echo image('Users/icone_utilisateur.png')?>" /></label>
            <input type="text" name="pseudo" placeholder="Email ou Pseudo" required>
          </div> <br />

          <div><label for="mdp"><img src="<?php echo image('Users/icone_lock.png')?>" /></label>
            <input id="mdp" type="password" name="mot_de_passe" placeholder="Mot de passe" oninput="Verification()" required></div> <br />
            <p><a href=""> Mot de passe oublié ? </a>|<a href="inscription"> Pas inscrit ?</a></p>

            <?php echo $message; ?>
          </br>
          <input id="submit" type="submit" name="Envoyer" value="Se connecter"> <br />

        </fieldset>
      </form>
    </div>
  </div>
</div>
