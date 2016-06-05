<div class="fond_mongroupe">
  <div id="image_de_fond">
    <img src="<?php echo image('Users/Bannière/'.$pseudouser.'.jpg')?>" alt="La photo n'a pas encore été ajoutée."/>
  </div>
  <div id="haut_mongroupe">
    <img src="<?php echo image('Users/Profil/'.$pseudouser.'.jpg')?>" alt="La photo n'a pas encore été ajoutée."/>
    <h1><?php echo $_SESSION['user']['pseudo'] ?></h1>
    <div id="menu_mongroupe">
      <nav>
        <ul style='margin-top:15px;'>
          <a href="<?php goToPage('profil')?>" id="non_selectionne"><li><?php echo lang('Informations personnelles') ?></li></a>
          <a href="<?php  goToPage('groupesUtilisateur')?>" id="selectionne"><li><?php echo lang('Gérer mes groupes') ?></li></a>
          <a href="<?php  goToPage('planningUtilisateur')?>" id="non_selectionne"><li><?php echo lang('Planning') ?></li></a>
          <a id="creergroupe" href="<?php goToPage('creationgroupe')?>" ><li><?php echo lang('Créer un groupe') ?></li></a>
        </ul>
      </nav>
    </div>
  </div>

  <div id="mes_groupes" class="profil">

    <div class="cote_mesgroupes radius_mongroupe forme_case">
      <div class="titre">
        <h1>Trier par sport :</h1>
      </div>
      <div class="sports_mesgroupes">
        <ul>
          <?php foreach ($sports as $key => $value) :?>
            READ ME !!!! -> nécessite l'id du sport pour le lien -> :3 je crois que u as refait la requête :3..
            <a href="<?php goToPage('sportgroupe', ['id_sport'=>$value['id']])?>">
              <li style="margin:5px;"><?=ucfirst($value) ?></li>
            </a>
        <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <?php foreach ($dataGroupUser as $key => $value) :?>
      <div id="publication" class="radius_mongroupe forme_case">
        <div class="titre">
          <h1><?=$value['nom'] ?></h1>
        <hr style="border:1px black solid; width:80%; margin:0px auto;margin-bottom:7px;">
          <h2 style="color:red; margin-left:20px; display:block; margin-top:-5px;"><span style='color:white; text-decoration: underline;'>Création :</span> <?=DiffDate($value['date_creation']) ?></h2>
          <h2 style="color:red; margin-left:20px; display:block;"><span style='color:white; text-decoration: underline;'>Leader :</span> <?=$leader_groupe[$value['id']] ?></h2>
          <h2 style="color:red; margin-left:20px; display:block; padding-bottom:5px;"><span style='color:white; text-decoration: underline;'>Nombre maximum de membres :</span> <?=$value['nbmax_sportifs'] ?></h2>
        </div>
        <p style="width:90%; text-align:center; margin:0 auto;"><?=$value['description'] ?></p>
      </div>
    <?php endforeach?>
  </div>
  <div class="cote_mesgroupes radius_mongroupe forme_case" style="width:80%; margin:20px auto;text-align:center; display:block;">
    <div class="titre">
      <h1>Photos des groupes auxquels je suis inscrit.</h1>
    </div>
    <div class="sports_mesgroupes" style='padding:20px;'>
      <?php CreateSlider($array, 'Slide', '100%', '400px'); ?>
      </div>
    </div>
  </div>
</div>
