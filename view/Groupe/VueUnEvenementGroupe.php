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
            <a href="<?php  goToPage('informationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Informations') ?></li></a>
            <a href="<?php  goToPage('publicationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Publications') ?></li></a>
            <a href="<?php  goToPage('evenementsgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>'1'])?>" id="selectionne"><li><?php echo lang('Evènements') ?></li></a>
            <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>" id="non_selectionne"><li><?php echo lang('Membres') ?></li></a>
            <?php if($isMembre==false):?>
            <li id="abonnement" style="margin-top:-10px;">
              <form class="" action="" method="post">
                <input  type="submit" name="abonnement" value="Rejoindre" style='cursor:pointer;'>
              </form>
            </li>
          <?php elseif($isLeader==true): ?>
            <li id="abonnement" style="margin-top:-10px; margin-left:60px; padding:4px;">
            <a href="<?php goToPage('createevenement',['id'=>$datagroupe['id']])?>"><?php echo lang('Créer un événement') ?></a>
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
    <div  style="display:inline-block;width:27%;vertical-align:top;">
        <?php if($isMembre==false):?>
          <h1 class="radius_mongroupe participation2" style="font-size:18px; color:white; padding:2px; background-color:blue;text-align:center;text-decoration:none;">Rejoignez le groupe pour vous inscrire</h1>
        <?php else:
         if($isParticipant==false):?>
        <form action="" method="post" style="text-align:center;">
          <input style="width:100%;" class="participation" type="submit" name="ajout" value="Ajouter au planning" style='cursor:pointer;'>
        </form>
      <?php else:?>
        <form action="" method="post" style="text-align:center;">
          <input style="width:100%;" class="participation" type="submit" name="ajout" value="Supprimer du planning" style='cursor:pointer;'>
        </form>
      <?php endif;
      endif;?>
        <!-- Vas falloir faire un submit ici un jour ;D -->
    </div>

    <div class="cote_informations">
      <div class="radius_mongroupe forme_case" style="text-align:center;background-color:green; color:white;display:inline-block;width:49%;vertical-align:top;">
            <p><?php echo $evenement['places']?> <?php echo lang('participants') ?></p>
      </div>
      <div class="radius_mongroupe forme_case" style="text-align:center;background-color:green; color:white;display:inline-block;width:49%;vertical-align:top;">
            <p>XX <?php echo lang('places restantes') ?></p>
      </div>
      <div class="radius_mongroupe forme_case">
        <div class="titre">
          <h1><?php echo lang('Informations évènement') ?></h1>
        </div>
        <div>
          <<?php if(!empty($_POST['modif'])):?>
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
            <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
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
          <h2><?php echo lang('Ville') ?></h2>
          <input class="inputinfogroupe" style="margin-bottom:15px;" type="text" name="ville" value="<?php echo $ville['name']?>" id="pseudo" required/>
        <?php else:?>
        <div>
          <h2><?php echo lang('Mail') ?></h2>
          <p><?php echo $evenement['mail']?></p>
          <h2><?php echo lang('Téléphone') ?></h2>
          <p><?php echo $evenement['telephone']?></p>
        </div>
      <?php endif;?>
      </div>
      <?php if(!empty($_POST['modif'])):?>
        <input class="buttonmodif" type="submit" name="enregistrement" value="Enregistrer les modifications">
      <?php endif;

      if($isLeader):
        if(empty($_POST['modif'])):?>
          <form action="" method="post" style="text-align:center;">
            <input class="buttonmodif" type="submit" name="modif" value="Modifier les informations" style='cursor:pointer;'>
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
