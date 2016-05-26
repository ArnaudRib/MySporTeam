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
            <a href="<?php  goToPage('evenementsgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>'1'])?>" id="selectionne"><li>Evènements</li></a>
            <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>" id="non_selectionne"><li>Membres</li></a>
            <?php if($isMembre==false):?>
            <li id="abonnement" style="margin-top:-10px;">
              <form class="" action="" method="post">
                <input  type="submit" name="abonnement" value="Rejoindre" style='cursor:pointer;'>
              </form>
            </li>
          <?php elseif($isLeader==true): ?>

            <li id="abonnement" style="margin-top:-10px; margin-left:60px; padding:4px;">
            <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>">Créer un événement</a>
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

  <?php /*$taille=10; ?>
  <?php $hauteur=30+310*($taille); */?> <!-- REMPLACER $EVENEMNT PAR COUNT($EVENEMENT) plus tard qd requete. permet de setup la hauteur de la page. Evite pb ac footer -->
  <div id="corps_mongroupe" />
  <?php if ($evenement!=NULL):
      foreach ($evenement as $key => $value):?>
        <div id="<?php echo $i=count($evenement) ?>" class="case_mongroupeevenement radius_mongroupe forme_case">
          <img src="<?php echo image('Groupes/Evenements/'.$value['id'].'.jpg')?>"/>
          <div class="texteevenement">
            <h1><?php echo $value['nom']?></h1>
            <p><?php echo $value['description']?></p>
            <a href="<?php goToPage('unevenementgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>$value['id']])?>" >Plus d'info</a>
            <a href="" >ajouter au planning</a>
          </div>
        </div>
      <?php  endforeach;
    else:?>
      <div  class="publication forme_case radius_mongroupe">
        <h1> Aucun événement</h1>
      </div>
      <?php
    endif; ?>
  </div>
</div>
