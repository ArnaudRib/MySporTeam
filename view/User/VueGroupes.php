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
          <a href="<?php  goToPage('profil')?>" id="non_selectionne"><li>Informations personnels</li></a>
          <a href="<?php  goToPage('groupesUtilisateur')?>" id="selectionne"><li>Mes Groupes</li></a>
          <a href="<?php  goToPage('planningUtilisateur')?>" id="non_selectionne"><li>Planning</li></a>
          <a id="creergroupe" href="<?php goToPage('creationgroupe')?>" ><li>Créer un groupe</li></a>
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
          <?php
          for ($i=0; $i < sizeof($sports); $i++) {
            ?><li><?=$sports[$i] ?></li><?php
          }
          ?>
        </ul>
      </div>
    </div>
    <?php for($i=0; $i < sizeof($dataGroupUser); $i++): ?>
    <div id="publication" class="radius_mongroupe forme_case">
      <div class="titre">
        <h1><?=$dataGroupUser[$i]['nom'] ?></h1>
        <h2><?=$dataGroupUser[$i]['date_creation'] ?></h2>
        <h2><?=$dataGroupUser[$i]['nom_leader'] ?></h2>
        <h2><?=$dataGroupUser[$i]['nbmax_sportifs'] ?></h2>
      </div>
      <p><?=$dataGroupUser[$i]['description'] ?></p>
    </div>
  <?php endfor; ?>
  </div>

</div>
