<div class="fond_mongroupe">
  <div id="image_de_fond">
  <img src="<?php image('Groupes/image_groupe.jpg')?>"/>
  </div>
    <div id="haut_mongroupe">
      <img src="<?php image('Groupes/sport3.jpg')?>"/>
      <h1>Nom du groupe</h1>
      <div id="menu_mongroupe">
        <nav>
          <ul>
            <a href="<?php goToPage('informationsgroupe',['id'=>'1']) ?>" id="non_selectionne"><li>Informations</li></a>
            <a href="<?php goToPage('publicationsgroupe',['id'=>'1', 'id_publication'=>'1'])?>" id="selectionne"><li>Publications</li></a>
            <a href="<?php goToPage('evenementsgroupe',['id'=>'1', 'id_evenement'=>'1'])?>" id="non_selectionne"><li>Evenements</li></a>
            <a href="<?php goToPage('membresgroupe',['id'=>'1'])?>" id="non_selectionne"><li>Abonnés</li></a>
            <a id="abonnement" href="" ><li>S'abonner</li></a>
          </ul>
        </nav>
    </div>
  </div>

  <div id="corps_mongroupe">
    <div class="cote">
      <div class="radius_mongroupe forme_case" id="nom_sport">
        <h1>#Sports</h1>
      </div>

      <div class="radius_mongroupe forme_case">
        <div class="titre">
          <h1>Informations groupe</h1>
        </div>
        <div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat. Etiam fermentum purus non gravida accumsan.</p>
          <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
        </div>
      </div>



      <div class="radius_mongroupe mongroupe_lieu forme_case">
        <div class="titre">
          <h1>Lieu</h1>
        </div>
        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:200px;width:100%;'><div id='gmap_canvas' style='height:200px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">									google maps carte
        </a></small></div><div><small><a href="http://youtubeembedcode.com">embed youtube code</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(50.666666666,3.083333),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(50.666666666,3.083333)});infowindow = new google.maps.InfoWindow({content:'<strong>Titre</strong><br>Marcq-en-Baroeul, France<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
      </div>


    </div>


    <div id="mur_mongroupe">
      <div>
        <?php for($i=0;$i<=4;$i++){ ?>
          <div id="publication" class="forme_case radius_mongroupe">
            <h1>#nomPublication</h1>
            <h2>#datepublication</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat.</p>
          </div>
          <?php  } ?>
      </div>
    </div>


    <div class="cote">
      <div class="radius_mongroupe mongroupe_evenements forme_case">
        <div class="titre">
          <h1>Futurs évènements</h1>
        </div>
          <?php for($i=0;$i<=4;$i++){ ?>
            <div class="evenenement"><img src="<?php image('Groupes/Evenements/evenement1.jpg')?>"/></div>
          <?php  } ?>
    </div>
  </div>

</div>

  <div id="fb-root"></div>
