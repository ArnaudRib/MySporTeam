<div class="fond_mongroupe">
  <div id="image_de_fond">
  <img src="<?php echo image('Groupes/Banière/'.$datagroupe['id'].'.jpg')?>"/>
  </div>
    <div id="haut_mongroupe">
      <img src="<?php echo image('Groupes/Profil/'.$datagroupe['id'].'.jpg')?>"/>
      <h1><?php echo $datagroupe['nom']?></h1>
      <div id="menu_mongroupe">
        <nav>
          <ul style='margin-top:15px;'>
            <a href="<?php  goToPage('informationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li>Informations</li></a>
            <a href="<?php  goToPage('publicationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li>Publications</li></a>
            <a href="<?php  goToPage('evenementsgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>'1'])?>" id="selectionne"><li>Evènements</li></a>
            <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>" id="non_selectionne"><li>Membres</li></a>
            <?php if($isMembre==false):?>
            <li id="abonnement" style="margin-top:-10px;">
              <form class="" action="" method="post">
                <input  type="submit" name="abonnement" value="Rejoindre" style='cursor:pointer;'>
              </form>
            </li>
          <?php elseif($isLeader==true): ?>
            <li id="abonnement" style="margin-top:-10px; margin-left:50px; padding:4px;">
            <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>">Modif</a>
            </li>
            <li id="abonnement" style="margin-top:-10px; margin-left:10px; padding:4px;">
            <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>">Créer un événement</a>
            </li>
            <?php else: ?>
              <li id="desabonnement" style="margin-top:-10px;">
              <form class="" action="" method="post">
                <input type="submit" name="abonnement" value="Désinscrire" style='cursor:pointer;'>
              </form>
              </li>
            <?php endif;?>
          </ul>
        </nav>
      </div>
  </div>

  <div id="corps_mongroupe">
    <div class="radius_mongroupe forme_case" id="nom_sport" style="width:70%; display:inline-block;">
      <h1><?php echo $evenement['nom']?></h1>
    </div>
    <div class="participation" style="display:inline-block;width:27%;vertical-align:top;">
      <a href="" ><p>ajouter au planning</p></a>
  </div>

    <div class="cote_informations">
      <div class="radius_mongroupe forme_case" style="text-align:center;background-color:green; color:white;display:inline-block;width:49%;vertical-align:top;">
            <p><?php echo $evenement['places']?> participants</p>
      </div>
      <div class="radius_mongroupe forme_case" style="text-align:center;background-color:green; color:white;display:inline-block;width:49%;vertical-align:top;">
            <p>XX places restantes</p>
      </div>
      <div class="radius_mongroupe forme_case">
        <div class="titre">
          <h1>Informations évènement</h1>
        </div>
        <div>
          <p><?php echo $evenement['description']?></p>
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

        <div class="radius_mongroupe forme_case">
          <div>
            <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:440px;width:100%;'><div id='gmap_canvas' style='height:440px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">									google maps carte
            </a></small></div><div><small><a href="http://youtubeembedcode.com">embed youtube code</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(<?php echo $ville['longitude']?>,<?php echo $ville['latitude']?>),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?php echo $ville['longitude']?>,<?php echo $ville['latitude']?>)});infowindow = new google.maps.InfoWindow({content:'<strong>Localisation</strong><br><?php echo $ville['name']?><br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
          </div>
            </div>
        </div>
        </div>
  <div id="fb-root"></div>
</div>
