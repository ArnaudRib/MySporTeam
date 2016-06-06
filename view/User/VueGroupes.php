<div class="fond_mongroupe">
  <div id="image_de_fond">
    <img src="<?php echo image('Users/Bannière/'.$pseudouser.'.jpg')?>" alt="La photo n'a pas encore été ajoutée."/>
  </div>
  <div id="haut_mongroupe">
    <div class="imgprofilsize">
      <img src="<?php echo image('Users/Profil/'.$pseudouser.'.jpg')?>" alt="La photo n'a pas encore été ajoutée."/>
    </div>
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

    <div class="cote_mesgroupes radius_mongroupe forme_case" style="vertical-align:top; margin:10px;">
      <div class="titre">
        <h1><?php echo lang('Sports pratiqués')?></h1>
      </div>
      <div class="sports_mesgroupes">
        <ul>
          <?php foreach ($sports as $key => $value) :?>
            <?php $nomphotosport=str_replace(' ', '-', $value['nom']) ?>
            <a href="<?php goToPage('sportgroupe', ['id_sport'=>$value['id_sport']])?>">
              <li class="sportitem" style="margin:5px;">
                <?=ucfirst($value['nom']) ?>
                <img style="display:inline-block; width:20px;float:right; margin-right:20px;" src="<?php echo image('svg/'.$nomphotosport.'.svg')?>" alt="" />
              </li>
            </a>
        <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <div class="sesGroupes fond" style="display:inline-block; width:60%;">
      <h1 class="titre"><?php echo lang('Mes Groupes')?></h1>
      <?php foreach ($dataGroupUser as $key => $value) :?>
        <a href="<?php goToPage('informationsgroupe', ['id'=>$value['id']])?>">
          <div class="infos_groupe">
            <h2><?=$value["NomGroupe"] ?></h2>
            <h4 ><span style='color:black; text-decoration: underline;'>Création :</span> <?=DiffDate($value['date_creation']) ?></h4>
            <h4 ><span style='color:black; text-decoration: underline;'>Leader :</span> <?=$leader_groupe[$value['id']] ?></h4>
            <h4 ><span style='color:black; text-decoration: underline;'>Nombre maximum de membres :</span> <?=$value['nbmax_sportifs'] ?></h4>
          </div>
        </a>
      <?php endforeach;?>
    </div>


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
