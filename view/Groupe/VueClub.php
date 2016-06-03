<div class="fond_club">
  <img style="display: block; width: 100%; height: 250px; background-position: 50% 50%;" src="<?php echo image('Clubs/Bannière/'.$nomclub.'.jpg')?>"/>
  <div class ="titre_club">
    <h1><?php echo $dataclub['nom']?></h1>
  </div>
  <div class = "description_club">
    <div class ="cote_club">
      <div class = "titre_club_informations">
        <h2><?php echo lang("Informations Club") ?></h2>
      </div>
      <div class = "information_club">
        <p class="information_club_text"><?php if(empty($dataclub['informations'])){echo '<i>Non précisées</i>';}else{echo $dataclub['informations'];}?></p>
      </div>
      <div class = "titre_club_informations">
        <h2><?php echo lang("Contacter le Club") ?></h2>
      </div>
      <div class = "information_club">
        <div>
          <h3> <?php echo lang("Adresse") ?> : </h3>
          <p><?php echo $dataclub['adresse']?></p>
          <h3><?php echo lang("Email") ?> :</h3>
          <p><?php echo $dataclub['email']?></p>
          <h3><?php echo lang("Téléphone") ?> :</h3>
          <p><?php echo $dataclub['téléphone']?></p>
          <h3><?php echo lang('Site du club')?> :</h3>
          <p><?php echo $dataclub['lien']?></p>
        </div>
      </div>
    </div>
    <div class ="cote_club">
      <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:100%;'><div id='gmap_canvas' style='height:440px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">									google maps carte
      </a></small></div><div><small><a href="http://youtubeembedcode.com">embed youtube code</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(<?php echo $ville['longitude']?>,<?php echo $ville['latitude']?>),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?php echo $ville['longitude']?>,<?php echo $ville['latitude']?>)});infowindow = new google.maps.InfoWindow({content:'<strong>Localisation</strong><br><?php echo $ville['name']?><br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
    </div>
  </div>

</div>
