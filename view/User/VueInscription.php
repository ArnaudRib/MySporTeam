<div id="modalinfo<?php echo $value['id']?>" class="modalinfo">
  <div id="insideModalInfo<?php echo $value['id']?>" class="insideModalInfo" style="font-family:Arial; padding:20px; text-align:center;">
    <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalInfo(this)">&#10006;</p>
    <h1>Conditions Générales d'Utilisation</h1>
    <hr style="width:90%; border:1px black solid; margin:10px auto;">

    <h2 style="margin-left:35px;">1. Champ d’application</h2>
    <h3>Utilisateurs concernés</h3>
    <p>Sauf mention contraire, la présente charte s'applique à l'ensemble des utilisateurs du système d'information et de communication de mySporTeam. </p>

    <p>Les utilisateurs veillent à faire accepter valablement les règles posées dans la présente charte à toute personne à laquelle ils permettraient d'accéder au système d'information et de communication.</p>

    <hr style="width:60%; border:1px black solid; margin:10px auto;">

    <h2>2. Confidentialité des paramètres d'accès</h2>
    <p>L'accès à certains éléments du système d'information (comme la messagerie électronique ou téléphonique, les sessions sur les postes de travail, le réseau, certaines applications ou services interactifs) est protégé par des paramètres de connexion (identifiants, mots de passe).</p>

    <p>Ces paramètres sont personnels à l'utilisateur et doivent être gardés confidentiels. Ils permettent en particulier de contrôler l'activité des utilisateurs.</p>

    <p>Dans la mesure du possible, ces paramètres doivent être mémorisés par l'utilisateur et ne pas être conservés, sous quelque forme que ce soit. En tout état de cause, ils ne doivent pas être transmis à des tiers ou aisément accessibles. Ils doivent être saisis par l'utilisateur à chaque accès et ne pas être conservés en mémoire dans le système d'information. </p>

    <p>Lorsqu'ils sont choisis par l'utilisateur, les paramètres doivent respecter un certain degré de complexité et être modifiés régulièrement.</p>

    <hr style="width:60%; border:1px black solid; margin:10px auto;">

    <h2>5. Messagerie électronique </h2>
    <p>La messagerie électronique est un moyen d'amélioration de la communication au sein du site. Chaque utilisateur dispose d’un service de discussion.  </p>

    <h3>Conseils généraux </h3>

    <p>L'attention des utilisateurs est attirée sur le fait qu'un message électronique a la même portée qu'un courrier manuscrit et peut rapidement être communiqué à des tiers. Il convient de prendre garde au respect d'un certain nombre de principes, afin d'éviter les dysfonctionnements du système d'information. </p>

    <hr style="width:60%; border:1px black solid; margin:10px auto;">

    <h2>6. Données personnelles </h2>
    <p>La loi n° 78­17 du 6 janvier 1978 relative à l'informatique, aux fichiers et aux libertés, définit les conditions dans lesquelles des traitements de données personnels peuvent être opérés. Elle institue au profit des personnes concernées par les traitements des droits que la présente invite à respecter à l'égard des utilisateurs. </p>

    <p>Des traitements de données automatisés et manuels sont effectués dans le cadre des systèmes de contrôle, prévus dans la présente charte. Ils sont, en tant que de besoin, déclarés conformément à la loi du 6 janvier 1978. </p>

    <p>Il est rappelé aux utilisateurs que les traitements de données à caractère personnel doivent être déclarés à la Commission nationale de l'informatique et des libertés, en vertu de la loi n° 78­17 du 6 janvier 1978. </p>

    <p>La présente charte est applicable à compter du 7 Juin 2016. Elle a été adoptée après information et consultation  de tout les représentant du site mySporTeam.</p>
  </div>
</div>

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

          <div id="blockcharte" style="display:inline-flex; align-items:center; width:110%; margin-right:30px; margin-bottom:10px; cursor:help" onclick="checkthebox()">
            <span style="font-style:italic; font-size:12px;display:inline-block; width:80%;"><?php echo lang('Pour finaliser votre inscription, vous acceptez les')?> <span style="font-weight:bold; cursor:pointer;" onclick="modalinfo(this)">Conditions Générales d'Utilisation</span> du site.</span>
            <input id="charte" type="checkbox" style="display:inline-block; width:5%; padding:0px; margin:0px;height:20px;padding-bottom:20px;" name="charte" required> <br />
          </div>

          <div id="messageMDP" class=""></div>

          <input id="submit" type="submit" name="Envoyer" value="S'inscrire"> <br />
        </fieldset>
      </form>
    </nav>
  </div>
</div>
