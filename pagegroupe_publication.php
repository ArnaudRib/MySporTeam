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
            <a href="pagegroupe_publication.php" id="selectionne"><li>Publications</li></a>
            <a href="pagegroupe_informations.php" id="non_selectionne"><li>#Nom du groupe</li></a>
            <a href="pagegroupe_evenements.php" id="non_selectionne"><li>Evenements</li></a>
            <a href="pagegroupe_membres.php" id="non_selectionne"><li>Abonnées</li></a>
          </ul>
        </nav>
        <div class="bouton_inscription">
          <a id="inscription" href="">S'abonner</a>
        </div>
      </div>
    </div>

  <div class="corps_mongroupe">
    <div class="cote_gauche"</div>

      <div class="forme_case" id="nom_sport">
        <h1>#Sports</h1>
      </div>

      <div class="mongroupe_apropos forme_case">
        <div id="titre">
          <h1>Informations groupe</h1>
        </div>
        <div id="text_mongroupe">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat. Etiam fermentum purus non gravida accumsan.</p>
          <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
        </div>
      </div>

      <div class="mongroupe_lieu forme_case">
        <div id="titre">
          <h1>Lieu</h1>
        </div>
        <div id="text_mongroupe">
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat. Etiam fermentum purus non gravida accumsan.</p>
        </div>
      </div>

      <div class="mongroupe_Niveau forme_case">
        <div id="titre">
          <h1>Niveau du groupe</h1>
        </div>
        <div id="text_mongroupe">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat. Etiam fermentum purus non gravida accumsan.</p>
        </div>
      </div>

    </div>


    <div class="mur_mongroupe">
      <div >
        <ul>
          <li id="publication" class="forme_case">
            <h1>#nomPublication</h1>
            <h2>#datepublication</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat.</p>
          </li>
          <li id="publication" class="forme_case">
            <h1>#nomPublication</h1>
            <h2>#datepublication</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat.</p>
          </li>
          <li id="publication" class="forme_case">
            <h1>#nomPublication</h1>
            <h2>#datepublication</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat.</p>
          </li>
        <ul>
    </div>
    </div>


    <div class="cote_droit">
      <div class="mongroupe_evenements forme_case">
        <div id="titre">
          <h1>Futurs évenements</h1>
        </div>
        <div class="evenements">
          <ul>
            <a href=""><li><img src="Images/evenement1.jpg"/><h2>#evenments1<h2></li></a>
            <a href=""><li><img src="Images/evenement2.jpg"/><h2>#evenments1<h2></li></a>
            <a href=""><li><img src="Images/evenement3.jpg"/><h2>#evenments1<h2></li></a>
          <ul>
      </div>
    </div>
    <div class="mongroupe_perticipants forme_case">
      <div id="titre">
        <h1>Nombre de Participants</h1>
      </div>
      <div id="text_mongroupe">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat. Etiam fermentum purus non gravida accumsan.</p>
      </div>
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
