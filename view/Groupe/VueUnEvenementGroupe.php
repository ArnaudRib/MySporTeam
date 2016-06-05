<div class="fond_mongroupe">
  <div id="image_de_fond">
    <?php $nomgroupe=str_replace(' ', '-', $datagroupe['nom']);?>
    <img src="<?php echo image('Groupes/Bannière/'.$nomgroupe.'.jpg')?>"/>
  </div>
  <div id="haut_mongroupe">
    <img src="<?php echo image('Groupes/Profil/'.$nomgroupe.'.jpg')?>"/>
    <h1><?php echo $datagroupe['nom']?></h1>
    <div id="menu_mongroupe">
      <nav>
        <ul style='margin-top:15px;'>
          <a href="<?php  goToPage('informationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Informations') ?></li></a>
          <a href="<?php  goToPage('publicationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Publications') ?></li></a>
          <a href="<?php  goToPage('evenementsgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>'1'])?>" id="selectionne"><li><?php echo lang('Evènements') ?></li></a>
          <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>" id="non_selectionne"><li><?php echo lang('Membres') ?></li></a>
           <?php if($isMembre==false):
          if($datagroupe['public']!="0"):
          if((intval($datagroupe['nbmax_sportifs']))-(intval($NBmembres['0']['COUNT(id)']))>0):?>
          <li id="abonnement" style="margin-top:-10px;">
            <form class="" action="" method="post">
              <input  type="submit" name="abonnement" value="Rejoindre" style='cursor:pointer;'>
            </form>
          </li>
          <?php
          else:
          endif;
          endif;
        elseif($isLeader==true):?>
          <li id="abonnement" style="margin-top:-10px; margin-left:60px; padding:4px;">
            <a href="<?php goToPage('createevenement',['id'=>$datagroupe['id']])?>"><?php echo lang("Créer un événement") ?></a>
          </li>
          <?php else:?>
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
      <h1><?php echo ucfirst($sport['nom'])?> (<?php echo $niveau['nom']?>)</h1>
    </div>
    <div  style="display:inline-block;width:27%;vertical-align:top;">
      <?php if($isMembre==false):?>
        <h1 class="radius_mongroupe participation2" style="">Rejoignez le groupe pour vous inscrire</h1>
      <?php else:
        if($isParticipant==false):
          if((intval($evenement['places']))-(intval($participants['0']['COUNT(id)']))==0):?>
          <h1 class="radius_mongroupe participation2" style="">Complet</h1>
        <?php else: ?>
          <form action="" method="post" style="text-align:center;">
            <input style="width:100%;" class="participation" type="submit" name="addPlanning" value="Ajouter au planning" style='cursor:pointer;'>
          </form>
        <?php endif;
          else:?>
          <form action="" method="post" style="text-align:center;">
            <input style="width:100%;" class="participation" type="submit" name="deletePlanning" value="Supprimer du planning" style='cursor:pointer;'>
          </form>
        <?php endif;?>
      <?php endif;?>
    <!-- Vas falloir faire un submit ici un jour ;D -->
  </div>

  <div class="cote_informations">
    <div class="radius_mongroupe forme_case" style="text-align:center;background-color:green; color:white;display:inline-block;width:49%;vertical-align:top;">
      <p><?php echo $evenement['places']?> places</p>
    </div>
    <div class="radius_mongroupe forme_case" style="text-align:center;background-color:green; color:white;display:inline-block;width:49%;vertical-align:top;">
      <?php if((intval($participants['0']['COUNT(id)']))<2):?>
        <p><?php echo intval($participants['0']['COUNT(id)']);?> participant</p>
      <?php else:?>
        <p><?php echo intval($participants['0']['COUNT(id)']);?> participants</p>
      <?php endif;?>
    </div>
    <div class="radius_mongroupe forme_case">
      <div class="titre">
        <h1><?php echo lang('Informations évènement') ?></h1>
      </div>
      <div>
      <?php if(!empty($_POST['modif'])):?>
        <form class="" action="" method="post">
          <h2>date début</h2>
          <for="date_debut"></label><br />
          <input class="inputinfogroupe" type="datetime" name="date_debut" value="<?php echo $evenement['date_debut']?>" id="pseudo" required/>
          <h2>date fin</h2>
          <for="date_fin"></label><br />
          <input class="inputinfogroupe" type="datetime" name="date_fin" value="<?php echo $evenement['date_fin']?>" id="pseudo" required/>
        <?php else:?>
          <h2>date début</h2>
          <h2 style="font-size:15px; color:grey;"><?php echo $evenement['date_debut']?></h2>
          <h2>date fin</h2>
          <h2 style="font-size:15px; color:grey;"><?php echo $evenement['date_fin']?></h2>
        <?php endif;
          if(!empty($_POST['modif'])):?>
            <label for="publication"></label><br />
            <textarea class="areagroupinfo" name="informations" value="" placeholder="Informations relatives à votre événement." required><?php echo $evenement['description']?></textarea>
        <?php else:?>
            <div>
              <p><?php echo $evenement['description']?></p>
              </div>
        <?php endif;?>
          <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
        </div>
      </div>
      <div class="radius_mongroupe forme_case">
        <div class="titre">
          <h1><?php echo lang('Contact') ?></h1>
        </div>
        <?php if(!empty($_POST['modif'])):?>
          <h2><?php echo lang('Mail') ?></h2>
          <input class="inputinfogroupe" type="text" name="mail" value="<?php echo $evenement['mail']?>" id="pseudo" required/>
          <h2><?php echo lang('Téléphone') ?></h2>
          <input class="inputinfogroupe" type="text" name="telephone" value="<?php echo $evenement['telephone']?>" id="pseudo" required/>
          <h2>Ville</h2>
          <input id="search" class="inputinfogroupe" style="margin-left:20px;" type="text" class="form-control" name="ville" value="" style="width:70%; margin: 10px 0px; font-size:15px;" placeholder="Ville"  onkeyup="getresults(this.value, event); out(event)" autocomplete="off" onfocus="showsearch()" spellcheck="false">
          <p id="results">
            <span style="font-size:20px; padding-top:30px;">Veuillez rentrer un nom de ville.</span>
          </p>
        <?php else:?>
          <div>
            <h2><?php echo lang('Mail') ?></h2>
            <p><?php echo $evenement['mail']?></p>
            <h2><?php echo lang('Téléphone') ?></h2>
            <p><?php echo $evenement['telephone']?></p>
          </div>
        <?php endif;?>
      </div>
      <div class="radius_mongroupe forme_case">
        <div class="titre">
          <h1>Club</h1>
        </div>
        <a href="<?php goToPage('clubinfo',['id_club'=>$club['id']])?>" style="font-size:15px; "><?php echo $club['nom']?></a>
      </div>
      <?php if(!empty($_POST['modif'])):?>
        <form class="" action="" method="post">
          <input class="buttonmodif" type="submit" name="enregistrement" value="Enregistrer les modifications">
        </form>
        <?php endif;
      if($isLeader):
        if(empty($_POST['modif'])):?>
        <form class="" action="" method="post">
          <input type="submit" class="buttonmodif" name="modif" value="Modifier les informations" style='cursor:pointer;'>
        </form>
      <?php endif;?>
    <?php endif;?>

      </form>
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

  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>