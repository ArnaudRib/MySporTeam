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
          <h1><?php echo lang('Connexion') ?></h1>
        </div>
        <?php if($error!=''):?>
              <div class="errorbox blackborder radius" style="font-size:15px; margin: 20px auto; ">
                <?php echo $error;?>
              </div>
            <?php endif; ?>
            <?php if($succes!=''): ?>
              <div class="successbox blackborder radius" style='margin:20px auto;padding:20px;'>
                <?php echo $succes;?>
              </div>
            <?php endif; ?>
        <fieldset>
          <div>
            <label for="login"><img src="<?php echo image('Users/icone_utilisateur.png')?>" /></label>
            <input type="text" name="pseudo" placeholder="Email ou Pseudo" required>
          </div> <br />

          <div><label for="mdp"><img src="<?php echo image('Users/icone_lock.png')?>" /></label>
            <input id="mdp" type="password" name="mot_de_passe" placeholder="Mot de passe" oninput="Verification()" required></div> <br />
            <div style="margin-top:-15px;">
              <a style="text-decoration:none !important;" href="<?php echo goToPage('forgottenpw')?>"> <p class="textunderconnexion"><?php echo lang('Mot de passe oublié ?') ?></p> </a>
              |
              <a style="text-decoration:none !important;" href="inscription"> <p class="textunderconnexion"><?php echo lang('Pas inscrit ?') ?></p></a>
            </div>
            <?php echo $message; ?>
          </br>
          <input id="submit" type="submit" name="Envoyer" value="Se connecter"> <br />

        </fieldset>
      </form>
    </div>
  </div>
</div>
