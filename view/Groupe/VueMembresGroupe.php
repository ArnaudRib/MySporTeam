<div class="fond_mongroupe">
  <div id="image_de_fond">

  <img src="<?php echo image('Groupes/image_groupe.jpg')?>"/>
  </div>
    <div id="haut_mongroupe">
      <img src="<?php echo image('Groupes/sport3.jpg')?>"/>
      <h1><?php echo $datagroupe['nom']?></h1>
      <div id="menu_mongroupe">
        <nav>
          <ul>
            <a href="<?php goToPage('informationsgroupe',['id'=>$datagroupe['id']]) ?>" id="non_selectionne"><li>Informations</li></a>
            <a href="<?php  goToPage('publicationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li>Publications</li></a>
            <a href="<?php  goToPage('evenementsgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>'1'])?>" id="non_selectionne"><li>Evènements</li></a>
            <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>" id="selectionne"><li>Abonnés</li></a>
            <a id="abonnement" href="" ><li>Rejoindre</li></a>
          </ul>
        </nav>
    </div>
  </div>

  <div id="corps_mongroupe">

    <?php foreach ($membre as $key => $value):?>
        <div id="<?php echo $i=count($membre) ?>" class="case_membre radius_mongroupe forme_case">
          <img src="<?php echo image('Groupes/sport3.jpg')?>" />
          <a href=""><h1><?php echo $value['pseudo']?></h1></a>
        </div>
        <?php
      endforeach;
        ?>

  </div>
