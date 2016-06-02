<div class="fond_mongroupe">
  <div id="image_de_fond">
    <img src="<?php echo image('Users/.png')?>"/>
  </div>
  <div id="haut_mongroupe">
    <img src="<?php echo image('Users/.png')?>"/>
    <h1><?php echo $_SESSION['user']['pseudo'] ?></h1>
    <div id="menu_mongroupe">
      <nav>
        <ul style='margin-top:15px;'>
        </ul>
      </nav>
    </div>
  </div>

  <div class="profil profilUnUtilisateur">

    <div class="sesInfos fond">
      <h1 class="titre">Ses Informations personnelles</h1>
      <label for="">
        <?php if( date("m")==date("m",strtotime($dataUser['naissance'])) && date("d")==date("d",strtotime($dataUser['naissance'])) ) : ?>
          <img class="iconeBirthday" src="<?php echo image('Users/anniversaire.png')?>" alt="" />
        <?php endif; ?>
        Pseudo :
        <?=$dataUser['pseudo'] ?>
      </label>
      <label for="">Prénom : <?=$dataUser['prénom']?></label>
      <label for="">Email : <?=$dataUser['email'] ?></label>
      <label for="">Ville : <?=$dataUser['id_ville'] ?></label>
  </div>

  <div class="sesGroupes fond">
    <h1 class="titre">Ses Groupes</h1>
    <?php foreach ($groupUser as $key => $value) {
      if($value['public']==1) :  ?>
      <div class="infos_groupe"><a href="">
        <h2><?=$value["nom_groupe"] ?></h2>
        <h3><?=$value["localisation"]  ?></h3>
        <h4>Sport : <?=$value["nom_sport"]  ?></h3>
        <h4>Nombres max de sportifs : <?=$value["nbmax_sportifs"]  ?></h4>
      </div></a>
    <?php endif; ?>
    <?php
  } ?>
  </div>

</div>
