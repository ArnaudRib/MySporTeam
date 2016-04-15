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
  <img  src="Images/image_groupe.jpg"/>
</div>
    <div class="hautdugroupe">
      <img id="image_mongroupe" src="Images/sport3.jpg"/>
      <h1>Nom du groupe</h1>
      <div class="menu_mongroupe">
        <nav>
          <ul>
            <a href="pagegroupe_publication.php" id="non_selectionne"><li>Publications</li></a>
            <a href="pagegroupe_informations.php" id="non_selectionne"><li>#Nom du groupe</li></a>
            <a href="pagegroupe_evenements.php" id="selectionne"><li>Evenements</li></a>
            <a href="pagegroupe_membres.php" id="non_selectionne"><li>Abonnées</li></a>
          </ul>
        </nav>
        <div class="bouton_inscription">
          <a id="inscription" href="">S'abonner</a>
        </div>
      </div>
    </div>

  <div class="corps_mongroupe">
    <div class="mongroupe_evenements">
      <?php for ($i=0; $i <4 ; $i++) :?>
          <div id="case_evenement" class="usualbackground">
            <span class="Police1">#Nom evenement</span>
            <div class="usualbackground" style="background-image:url('Images/evenement1.jpg');">
            </div>
          </div>
      <?php endfor; ?>
    </div>
  </div>
  </body>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
