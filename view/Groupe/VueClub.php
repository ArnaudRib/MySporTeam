<div class="fond_mongroupe">
  <div id="image_de_fond">


    <div id="haut_mongroupe">
    <h1><?php echo $datagroupe['nom']?></h1>

  <div id="corps_mongroupe">
    <div class="cote_informations">
      <div class="radius_mongroupe forme_case">
        <div class="titre">
          <h1>Informations Club</h1>
        </div>
        <div>
          <p><?php echo $dataclub['information']?></p>
          <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
        </div>
      </div>
      <div class="radius_mongroupe forme_case">
        <div class="titre">
          <h1>Contacter le Club</h1>
        </div>
        <div>
          <h2> Adresse : </h2>
          <p><?php echo $dataclub['adresse']?></p>
          <h2>Email :</h2>
          <p><?php echo $dataclub['email']?></p>
          <h2>Téléphone :</h2>
          <p><?php echo $dataclub['telephone']?></p>
        </div>
      </div>
    </div>

    <div class="cote_informations">
      <div class="radius_mongroupe forme_case">
        <div>
          <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:100%;'><div id='gmap_canvas' style='height:440px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">									google maps carte
          </a></small></div><div><small><a href="http://youtubeembedcode.com">embed youtube code</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(<?php echo $ville['longitude']?>,<?php echo $ville['latitude']?>),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?php echo $ville['longitude']?>,<?php echo $ville['latitude']?>)});infowindow = new google.maps.InfoWindow({content:'<strong>Localisation</strong><br><?php echo $ville['name']?><br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
        </div>
      </div>
    </div>
  </div>
