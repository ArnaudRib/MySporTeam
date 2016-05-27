<div class="fond_mongroupe">
  <div id="image_de_fond">
    <?php $nomgroupe=str_replace(' ', '-', $datagroupe['nom']);?>
  <img src="<?php echo image('Groupes/Banière/'.$nomgroupe.'.jpg')?>"/>
  </div>
    <div id="haut_mongroupe">
      <img src="<?php echo image('Groupes/Profil/'.$nomgroupe.'.jpg')?>"/>
      <h1><?php echo $datagroupe['nom']?></h1>
      <div id="menu_mongroupe">
        <nav>
          <ul style='margin-top:15px;'>
            <a href="<?php  goToPage('informationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li>Informations</li></a>
            <a href="<?php  goToPage('publicationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="selectionne"><li>Publications</li></a>
            <a href="<?php  goToPage('evenementsgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>'1'])?>" id="non_selectionne"><li>Evènements</li></a>
            <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>" id="non_selectionne"><li>Membres</li></a>
            <?php if($isMembre==false):?>
            <li id="abonnement" style="margin-top:-10px;">
              <form class="" action="" method="post">
                <input  type="submit" name="abonnement" value="Rejoindre" style='cursor:pointer;'>
              </form>
            </li>
          <?php elseif($isLeader==true): ?>
            <li id="abonnement" style="margin-top:-10px; margin-left:60px; padding:4px;">
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
    <div class="cote">
      <div class="radius_mongroupe forme_case" id="nom_sport">
        <h1><?php echo ucfirst($sport['nom'])?></h1>
      </div>
      <div class="radius_mongroupe forme_case">
        <div class="titre">
          <h1>Informations groupe</h1>
        </div>
        <div>
          <p style="width: 425px;"><?php echo $datagroupe['description']?></p>
          <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
        </div>
      </div>
      <div class="radius_mongroupe mongroupe_lieu forme_case">
        <div class="titre">
          <h1>Lieu</h1>
        </div>
        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script><div style='overflow:hidden;height:200px;width:100%;'><div id='gmap_canvas' style='height:200px;width:100%;'></div><div><small><a href="http://embedgooglemaps.com">
        </a></small></div><div><small><a href="http://youtubeembedcode.com">embed youtube code</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(<?php echo $ville['longitude']?>,<?php echo $ville['latitude']?>),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?php echo $ville['longitude']?>,<?php echo $ville['latitude']?>)});infowindow = new google.maps.InfoWindow({content:'<strong>Localisation</strong><br><?php echo $ville['name']?><br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
      </div>
    </div>


    <div id="mur_mongroupe">
      <?php if($isLeader==true): ?>
        <form class="" action="" method="post">
           <div class="PostPublication">
             <p class="headerPostPub titre">Poster une nouvelle publication<p>
             <label for="titre"></label>
             <input class="inputinfogroupe" type="text" name="titre" value="" id="pseudo" placeholder="Titre"/>
             <label for="publication"></label><br />
             <textarea class="areagroupinfo" name="publication" value="" placeholder="Publication"></textarea>
             <div style="text-align:center;">
               <input class="buttonPostPub" type="submit" name="Poster" value="Poster">
             </div>
           </div>
        </form>

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

      <?php endif?>
      <div>
        <?php if ($publication!=NULL):
          foreach ($publication as $key => $value):?>
          <div id="<?php echo $i=count($publication) ?>" class="publication forme_case radius_mongroupe">
            <?php if($isLeader):?>
              <form class="" action="" method="post">
                <label for="deletebutton" class="deletebutton">&#10006;</label>
                <input type="hidden" name="id_publication" value="<?php echo $value['id']?>">
                <input id="deletebutton" type="submit" name="deletePub" value="delete" style="display:none;">
              </form>
            <?php endif?>
            <h1><?php echo $value['titre']?></h1>
            <h2><?php echo diffDate($value['date']);?></h2>
            <p><?php echo $value['texte']?></p>
            <h5 class="posteurPub">Publié par : <span><?php echo $user[$value['id']]?> </span></h5>
          </div>
        <?php  endforeach;

          else:?>
            <div  class="publication forme_case radius_mongroupe">
              <h1> Aucune Publication</h1>
            </div>
            <?php
          endif; ?>
      </div>
    </div>


    <div class="cote">
      <div class="radius_mongroupe mongroupe_evenements forme_case">
        <div class="titre">
          <h1>Futurs évènements</h1>
        </div>
        <?php if ($evenement!=NULL):
            foreach ($evenement as $key => $value):?>
            <a href="<?php goToPage('unevenementgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>$value['id']])?>">
            <div class="evenenement"><img src="<?php echo image('Groupes/Evenements/'.$value['id'].'.jpg')?>"/></div>
            </a>
          <?php endforeach;
          else:?>
            <div  class="publication forme_case radius_mongroupe">
              <h1> Aucun événement</h1>
            </div>
            <?php
          endif; ?>
    </div>
  </div>

</div>


  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
