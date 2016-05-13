<div class="fond_mongroupe">
  <div id="image_de_fond">
  <img src="<?php echo image('Groupes/image_groupe.jpg')?>"/>
  </div>
    <div id="haut_mongroupe">
      <img src="<?php echo image('Groupes/sport3.jpg')?>"/>
      <h1>Nom du groupe</h1>
      <div id="menu_mongroupe">
        <nav>
          <ul>
            <a href="<?php goToPage('informationsgroupe',['id'=>'1']) ?>" id="non_selectionne"><li>Informations</li></a>
            <a href="<?php  goToPage('publicationsgroupe',['id'=>'1', 'id_publication'=>'1'])?>" id="non_selectionne"><li>Publications</li></a>
            <a href="<?php  goToPage('evenementsgroupe',['id'=>'1', 'id_evenement'=>'1'])?>" id="non_selectionne"><li>Evenements</li></a>
            <a href="<?php  goToPage('membresgroupe',['id'=>'1'])?>" id="selectionne"><li>Abonnés</li></a>
            <a id="abonnement" href="" ><li>S'abonner</li></a>
          </ul>
        </nav>
    </div>
  </div>

  <div id="corps_mongroupe">
    <?php
     $valeur=8;
    while($valeur!=0){ ?>
        <div id="case_membre" class="radius_mongroupe forme_case">
          <img src="/asset/images/Groupes/sport3.jpg" />
          <a href=""><h1>#Nom de la personne</h1></a>
        </div>
        <?php
          $valeur=$valeur-1;
        }
        ?>

  </div>
