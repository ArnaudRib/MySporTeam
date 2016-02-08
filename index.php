<?php?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
        <title>MySporTeam</title>
        <meta charset="utf-8" />
    </head>


    <body>
      <!--Menu en haut de la page-->
      <header>
        <div class="memeligne">
          <h4 style="display: inline-block; margin-left:30px;margin-right:30px; vertical-align: top;
padding: 7px 0px;">MySporTeam</h4>
          <ul class="menu">
            <li>Accueil</li>
            <li>MySporTeam</li>
            <li>Cours</li>
            <li>Training</li>
            <li>Compétitions</li>
            <li>Forums</li>
          </ul>
        </div>
      </header>

      <!--Contenu de la page-->
      <div id="content"> 
        <h1 class="centre">Bienvenue</h1>
        <h2>Affichage de texte avec PHP</h2>
        <p>
            Cette ligne a été écrite entièrement en HTML.<br />
            <?php echo "Celle-ci a été écrite entièrement en PHP."; ?>
        </p>
      </div>

      <!--Footer de la page-->
      <footer>
        <p class="centre">Ceci est un test.</p>
      </footer>
  </body>

</html>
