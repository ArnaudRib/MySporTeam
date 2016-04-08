<?php /* if (!isset($_POST['pseudo'])): //On est dans la page de formulaire ?>
  <p>Vous êtes déjà connecté!</br> Pour vous déconnecter, cliquez <a href="deconnexion">ici<a/></p>
<?php
    session_unset($_SESSION['pseudo']);
    header('Location: index.php'); //A changer :(..
endif; */?>

<h1 class="">connexion</h1>

<div class="block1">
  <div class="encadrement" style="padding:3%;">
  <h2>Déjà inscrit?</h2>
    <form style="margin:10px;" method="post">
      <fieldset>
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" placeholder="Pseudo" required> </br>

        <label for="motdepasse">Mot de passe :</label>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required> </br>

        <a href="#tamere">Mot de passe oublié?</a></br>
        <input type="submit" name="Envoyer"> <br>
      </fieldset>
    </form>
    <?php echo $message; ?>
  </div>
</div>
<div class="block2">
  <div class="encadrement" style="padding:3%;">
    <h2>Pas encore inscrit?</h2>
    <a href="inscription">ICI<a>
  </div>
</div>
