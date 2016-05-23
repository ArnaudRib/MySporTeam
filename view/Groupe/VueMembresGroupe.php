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
            <a href="<?php  goToPage('informationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li>Informations</li></a>
            <a href="<?php  goToPage('publicationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li>Publications</li></a>
            <a href="<?php  goToPage('evenementsgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>'1'])?>" id="non_selectionne"><li>Evènements</li></a>
            <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>" id="selectionne"><li>Membres</li></a>
            <?php if(empty($isMembre)):?>
            <li id="abonnement" style="margin-top:-10px;">
              <form class="" action="" method="post">
                <input  type="submit" name="abonnement" value="Rejoindre" style='cursor:pointer;'>
              </form>
            </li>
            <?php else: ?>
              <li id="desabonnement" style="margin-top:-10px;">
              <form class="" action="" method="post">
                <input type="submit" name="desabonnement" value="Désinscrire" style='cursor:pointer;'>
              </form>
              </li>
            <?php endif;?>
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
