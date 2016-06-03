<div class="bodybackground">
  <div class="blockinscription">
    <nav id="inscription">
      <form action="" method="post">
        <div class="haut_inscription">
          <h1>Inscription</h1>
        </div>

        <fieldset>
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
          <br />
          <div><label for="pseudo"><img src="<?php echo image('Users/icone_utilisateur.png')?>" /></label>
          <input type="text" name="pseudo" placeholder="Identifiant" required></div> <br />

          <div><label for="email" class="email"><img src="<?php echo image('Users/icone_email.png')?>" /></label>
          <input type="text" name="email" placeholder="Email" required></div> <br />

          <div><label for="password"><img src="<?php echo image('Users/icone_lock.png')?>" /></label>
          <input id="mdp" type="password" name="mot_de_passe" placeholder="Mot de passe" oninput="Verification(), showmessage(this)"></div> <br />

          <div><label for="check_psswd"><img src="<?php echo image('Users/icone_lock.png')?>" /></label>
          <input id="mdp_verification" type="password" name="mot_de_passe_confirmation" placeholder="Confirmation du mdp" oninput="Verification()" required></div> <br />

          <div id="messageMDP" class=""></div>

          <input id="submit" type="submit" name="Envoyer" value="S'inscrire"> <br />
        </fieldset>
      </form>
    </nav>
  </div>
</div>
