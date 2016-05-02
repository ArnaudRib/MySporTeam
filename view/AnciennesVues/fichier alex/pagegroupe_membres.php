<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="stylesheet.css"/>
  <title>Page Groupe</title>
  <meta charset="utf-8" />
</head>


<body>
  <!--Menu en haut de la page-->
  <?php include("header.php"); ?>
  <div id="image_de_fond">
  <img src="Images/image_groupe.jpg"/>
  </div>
    <div class="hautdugroupe">
      <img id="image_mongroupe" src="Images/sport3.jpg"/>
      <h1>Nom du groupe</h1>
      <div class="menu_mongroupe">
        <nav>
          <ul>
            <a href="pagegroupe_publication.php" id="non_selectionne"><li>Publications</li></a>
            <a href="pagegroupe_evenements.php" id="non_selectionne"><li>Evenements</li></a>
            <a href="pagegroupe_membres.php" id="selectionne"><li>Abonnées</li></a>
          </ul>
        </nav>
        <div class="bouton_inscription">
          <a id="inscription" href="">S'abonner</a>
        </div>
      </div>
    </div>

  <div class="corps_mongroupe">
    <?php
     $valeur=8;
    while($valeur!=0){ ?>
        <div id="case_membres">
          <img src="Images/sport3.jpg" />
          <a href=""><h1>#Nom de la personne</h1></a>
        </div>
        <?php
          $valeur=$valeur-1;
        }
?> </div>

  </body>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>