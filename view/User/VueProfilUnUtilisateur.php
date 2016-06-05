<div class="fond_mongroupe">
  <div id="image_de_fond">
    <img src="<?php echo image('Users/Bannière/'.$pseudouser.'.jpg')?>" alt="La photo n'a pas encore été ajoutée."/>
  </div>
  <div id="haut_mongroupe">
    <img src="<?php echo image('Users/Profil/'.$pseudouser.'.jpg')?>" alt="La photo n'a pas encore été ajoutée."/>
    <h1><?php echo $dataUser['pseudo'] ?></h1>
    <div id="menu_mongroupe">
      <nav>
        <ul style='margin-top:15px;'>
        </ul>
      </nav>
    </div>
  </div>

  <div class="profil profilUnUtilisateur" style="margin-bottom:100px;">

    <div class="sesInfos fond">
      <h1 class="titre">Ses Informations personnelles</h1>
      <label for="">
        <?php if( date("m")==date("m",strtotime($dataUser['naissance'])) && date("d")==date("d",strtotime($dataUser['naissance'])) ) : ?>
          <img class="iconeBirthday" src="<?php echo image('Users/anniversaire.png')?>" alt="" />
        <?php endif; ?>
        Pseudo :
        <?=$dataUser['pseudo'] ?>
      </label>
      <label for="">Prénom : <?=$dataUser['prenom']?></label>
      <label for="">Email : <?=$dataUser['email'] ?></label>
      <label for="">Ville : <?php echo isset($nomville) ? $nomville : "<i>Non précisée</i>"?></label>
  </div>

  <div class="sesGroupes fond">
    <h1 class="titre">Ses Groupes</h1>
    <?php foreach ($groupUser as $key => $value) {
      if($value['public']==1) :  ?>
      <a href="<?php goToPage('informationsgroupe', ['id'=>$value['id']])?>">
        <div class="infos_groupe">
          <h2><?=$value["nom_groupe"] ?></h2>
          <h4>Adresse : <?php echo !empty($value["adresse"]) ? $value["adresse"] : 'Non précisée.' ?></h4>
          <h4>Sport : <?=$value["nom_sport"]  ?></h3>
          <h4>Nombres max de sportifs : <?=$value["nbmax_sportifs"]  ?></h4>
        </div>
      </a>
    <?php endif; ?>
    <?php
  } ?>
  </div>
  <div class="cote_mesgroupes radius_mongroupe forme_case" style="width:80%; margin:20px auto;text-align:center; display:block;">
    <div class="titre">
      <h1>Photos des groupes auxquels il est inscrit.</h1>
    </div>
    <div class="sports_mesgroupes" style='padding:20px;'>
      <?php CreateSlider($array, 'Fade', '100%', '400px'); ?>
      </div>
    </div>
  </div>

</div>
