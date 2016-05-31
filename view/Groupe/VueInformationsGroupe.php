<a href="<?php goToPage('createevenement',['id'=>$datagroupe['id']])?>" style="color:red; font-size:30px; margin-left:40px;"> click me maistret -,-</a>
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
          <a href="<?php  goToPage('informationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="selectionne"><li>Informations</li></a>
          <a href="<?php  goToPage('publicationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li>Publications</li></a>
          <a href="<?php  goToPage('evenementsgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>'1'])?>" id="non_selectionne"><li>Evènements</li></a>
          <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>" id="non_selectionne"><li>Membres</li></a>
          <?php if($isMembre==false):?>
          <li id="abonnement" style="margin-top:-10px;">
            <form class="" action="" method="post">
              <input  type="submit" name="abonnement" value="Rejoindre" style='cursor:pointer;'>
            </form>
          </li>
        <?php elseif($isLeader==true):?>
          <li id="abonnement" style="margin-top:-10px; margin-left:60px; padding:4px;">
          <a href="<?php goToPage('createevenement',['id'=>$datagroupe['id']])?>">Créer un événement</a>
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
    <div class="cote_informations">
      <div class="radius_mongroupe forme_case" id="nom_sport">
        <h1><?php echo ucfirst($sport['nom'])?></h1>
      </div>
      <div class="radius_mongroupe forme_case">
        <div class="titre">
          <h1>Informations groupe</h1>
        </div>
        <?php if(!empty($_POST['modif'])):?>
          <form class="" action="" method="post">
            <label for="publication"></label><br />
            <textarea class="areagroupinfo" name="informations" value="" placeholder="Informations relatives à votre groupe." required><?php echo $datagroupe['description']?></textarea>
        <?php else:?>
        <div>
          <p><?php echo $datagroupe['description']?></p>
          <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
        </div>
        <?php endif;?>
      </div>
      <div class="radius_mongroupe forme_case">
        <div class="titre">
          <h1>Contact</h1>
        </div>
        <?php if(!empty($_POST['modif'])):?>
          <h2>Mail</h2>
          <input class="inputinfogroupe" type="text" name="mail" value="<?php echo $datagroupe['mail']?>" id="pseudo" required/>
          <h2>Téléphone</h2>
          <input class="inputinfogroupe" type="text" name="telephone" value="<?php echo $datagroupe['telephone']?>" id="pseudo" required/>

          <div class="search">
            <h2>Ville</h2>
            <input id="search" class="inputinfogroupe" style="margin-left:20px;" type="text" class="form-control" name="ville" value="" style="width:70%; margin: 10px 0px; font-size:15px;" placeholder="Ville"  onkeyup="getresults(this.value, event); out(event)" autocomplete="off" onfocus="showsearch()" spellcheck="false">
            <p id="results">
              <span style="font-size:20px; padding-top:30px;">Veuillez rentrer un nom de ville.</span>
            </p>
          </div>

        <?php else:?>
        <div>
          <h2>Mail</h2>
          <p><?php echo $datagroupe['mail']?></p>
          <h2>Téléphone</h2>
          <p><?php echo $datagroupe['telephone']?></p>
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
