<div class="fond_mongroupe">
  <div id="image_de_fond">
  <img src="Images/image_groupe.jpg"/>
  </div>
    <div id="haut_mongroupe">
      <img src="Images/sport3.jpg"/>
      <h1>Nom du groupe</h1>
      <div id="menu_mongroupe">
        <nav>
          <ul>
            <a href="pagegroupe_publication.php" id="non_selectionne"><li>Publications</li></a>
            <a href="pagegroupe_informations.php" id="non_selectionne" ><li>A propos</li></a>
            <a href="pagegroupe_evenements.php" id="selectionne"><li>Evenements</li></a>
            <a href="pagegroupe_membres.php" id="non_selectionne"><li>Abonnées</li></a>
            <a id="abonnement" href="" ><li>S'abonner</li></a>
          </ul>
        </nav>
    </div>
  </div>

  <div id="corps_mongroupe">
    <div class="radius_mongroupe forme_case" id="nom_sport">
      <h1>Nom evenement</h1>
    </div>

    <div class="cote_informations">
      <div class="radius_mongroupe forme_case">
        <div class="titre">
          <h1>Informations evenement</h1>
        </div>
        <div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat. Etiam fermentum purus non gravida accumsan.</p>
          <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
        </div>
      </div>
      <div class="radius_mongroupe forme_case">
        <div class="titre">
          <h1>Contact</h1>
        </div>
        <div>
          <h2>Mail</h2>
          <p>aaaaaaaaaaaaaaaaaa@gmail.com</p>
          <h2>Téléphone</h2>
          <p>03 XX XX XX XX</p>
        </div>
      </div>
      </div>

      <div class="cote_informations">
        <div class="radius_mongroupe forme_case" style="background-color:green; color:white;display:inline-block;width:49%;vertical-align:top;">
              <p>XX places restantes</p>
        </div>
          <div class="participation" style="display:inline-block;width:49%;vertical-align:top;">
            <a href="" ><p>ajouter au planning</p></a>
        </div>
        <div class="radius_mongroupe forme_case">
          <div class="titre">
            <h1>Lieu</h1>
          </div>
          <div>
            <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:100%;'><div id='gmap_canvas' style='height:440px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">									google maps carte
            </a></small></div><div><small><a href="http://youtubeembedcode.com">embed youtube code</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(50.666666666,3.083333),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(50.666666666,3.083333)});infowindow = new google.maps.InfoWindow({content:'<strong>Titre</strong><br>Marcq-en-Baroeul, France<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
          </div>
        </div>
        </div>
  <div id="fb-root"></div>
</div>
