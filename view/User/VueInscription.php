
<div class="bodybackground">
  <div class="blockinscription">
    <nav id="inscription">
      <form action="" method="post">
        <div class="haut_inscription">
          <h1>Inscription</h1>
        </div>

        <fieldset>

          <br />
          <div><label for="pseudo"><img src="<?php echo image('Users/icone_utilisateur.png')?>" /></label>
          <input type="text" name="pseudo" placeholder="Identifiant" required></div> <br />

          <div><label for="email" class="email"><img src="<?php echo image('Users/icone_email.png')?>" /></label>
          <input type="text" name="email" placeholder="Email" required></div> <br />

          <div><label for="password"><img src="<?php echo image('Users/icone_lock.png')?>" /></label>
          <input id="mdp" type="password" name="mot_de_passe" placeholder="Mot de passe" oninput="Verification()" required></div> <br />

          <div><label for="check_psswd"><img src="<?php echo image('Users/icone_lock.png')?>" /></label>
          <input id="mdp_verification" type="password" name="mot_de_passe_confirmation" placeholder="Confirmation du mdp" oninput="Verification()" required></div> <br />

          <input id="submit" type="submit" name="Envoyer" value="S'inscrire"> <br />
          <?php echo $message; ?>
        </fieldset>
      </form>
    </nav>
  </div>
</div>

<!--
ANCIEN CONTENU .. A NE PAS EFFACER, SERA UTILE POUR COMPLETER MON PROFIL PROBABLEMENT.
Contenu de la page-
<nav>
  <form style="margin:10px;" method="post">
    <fieldset class="encadrement">
      <legend style="margin-left:7%;"> Inscription </legend>

      Sexe :
      <input type="radio" name="sexe" value="H" checked> M.
      <input type="radio" name="sexe" value="F"> Mme.</span>
    </br>

    <!--PARTIE DATE DE NAISSANCE
    Date de naissance :

    <!--Demande le jour
    <select style="border:1px solid black; padding-right:5px;" name="jour">
      <?php
      for ($i=1; $i<=31; $i++){
        $jour=$i;
        ?>
        <option value="<?php echo $jour?>"><?php echo $jour;?></option>
        <?php //permet de fermer la boucle
      }
      ?>
    </select>

    <!-- Demande le mois-
    <select style="border:1px solid black; padding-right:5px;" name="mois">
      <?php
      $months_list = array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
      for ($i=0;$i<12;$i++){
        ?>
        <option value="<?php echo $i?>"><?php echo $months_list[$i];?></option>
        <?php
      }
      ?>
    </select>

    <!--Demande l'année-
    <select style="border:1px solid black; padding-right:5px;" name="annee">
      <?php
      for ($i=0; $i<100; $i++){
        $annee=intval(date('Y'))-$i; //Donne à la variable date le int transformé en string - la valeur de i.
        ?>
        <option value="<?php echo $annee?>"><?php echo $annee;?></option>
        <?php //permet de fermer la boucle
      }
      ?>
    </select>

    <!--FIN PARTIE DATE DE NAISSANCE-
  </br>
  Pseudonyme :
  <input type="text" name="pseudo" placeholder="Identifiant" required> </br>

  Adresse email :
  <input type="text" name="email" placeholder="Email" required> </br>

  Mot de passe :
  <input id="mdp" type="password" name="mot_de_passe" placeholder="Mot de passe" oninput="Verification()" required> </br>

  Confirmation mot de passe :
  <input id="mdp_verification" type="password" name="mot_de_passe_confirmation" placeholder="•••••••" oninput="Verification()" required> </br></br>

  <input id="submit" type="submit" name="Envoyer"> <br>

  <?php echo $message; ?>
</fieldset>
</form>
</nav> -->
