
<h1 class="">Connexion</h1>

<?php if(!isset($_SESSION['pseudo'])): ?>
  <section class="bloc1">
    <div class="encadrement" style="padding:3%;">
      <h2>Déjà inscrit?</h2>
      <?php
      if (!isset($_POST['pseudo'])){ //On est dans la page de formulaire ?>
        <form style="margin:10px;" action="index.php" method="post">
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
        echo $parametres['message'].'</div></body></html>';
      }
      ?>
    </div>
  </section>
<?php else:?>
  <p>Vous êtes déjà connecté! pd</br> Pour vous déconnecter, cliquez <a href="index.php?deconnexion=true">ici<a/></p>
    <?php if (isset($_GET['deconnexion'])){
      session_unset($_SESSION['pseudo']);
      header('Location: index.php'); //A changer :(..
    } ?>
  <?php endif; ?>

  <aside class="bloc2">
    <div class="encadrement" style="padding:3%;">
      <h2>Pas encore inscrit?</h2>
      <a href="inscription.php">ICI<a>
      </div>
    </aside>
