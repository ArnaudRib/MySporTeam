<div class="fond_mongroupe">
  <div id="image_de_fond">
    <?php $nomgroupe=str_replace(' ', '-', $datagroupe['nom']);?>
  <img src="<?php echo image('Groupes/Bannière/'.$nomgroupe.'.jpg')?>"/>
  </div>
    <div id="haut_mongroupe">
      <div class="imgprofilsize">
        <img src="<?php echo image('Groupes/Profil/'.$nomgroupe.'.jpg')?>"/>
      </div>
      <h1><?php echo $datagroupe['nom']?></h1>
      <div id="menu_mongroupe">
        <nav>
          <ul style='margin-top:15px;'>
            <a href="<?php  goToPage('informationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Informations') ?></li></a>
            <a href="<?php  goToPage('publicationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Publications') ?></li></a>
            <a href="<?php  goToPage('evenementsgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Evènements') ?></li></a>
            <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>" id="selectionne"><li><?php echo lang('Membres') ?></li></a>
            <?php if($isMembre==false):?>
            <li id="abonnement" style="margin-top:-10px;">
              <form class="" action="" method="post">
                <input  type="submit" name="abonnement" value="Rejoindre" style='cursor:pointer;'>
              </form>
            </li>
          <?php elseif($isLeader==true): ?>
            <li id="abonnement" style="margin-top:-10px; margin-left:60px; padding:4px;">
              <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>"><?php echo lang("Retour") ?></a>
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
    <?php if($isLeader):?>
      <?php $i=0; ?>
    <?php foreach ($nonmembre as $key => $value):?>
      <?php $estinvité=false;?>
        <div id="<?php echo count($membre) ?>" class="case_membre radius_mongroupe forme_case" style="vertical-align: top;">
          <img src="<?php echo image('Groupes/sport3.jpg')?>" />
          <a href="<?php goToPage('profilUnUtilisateur',['pseudo'=>$value['pseudo']])?>"><h1><?php echo $value['pseudo']?></h1></a>
          <?php foreach ($invites as $key => $valeur) :
            if($valeur['id_utilisateur']==$value['useful_id']):?>
              <i style="display:block; font-size:10px; float:right; top:0px;">Invitation en cours d'acceptation</i>
              <?php $estinvité=true;?>
            <?php endif;?>
          <?php endforeach; ?>
          <button id="<?php echo $i?>" class="plusbutton" style="<?php if($estinvité==true){echo 'display:none;';}?>" onclick="sendmessageblock(this)">&#10010;</button>
          <form id="messageblockinvitation" class="displaynone" style="float:right; margin-right:30px;" class="" action="" method="post">
            <input type="hidden" name="id_utilisateur" value="<?php echo $value['id_utilisateur']?>">
            <p style="text-align:center">Message</p>
            <textarea style="border:1px black solid; margin:5px; width:80%; float:right; padding:4px;" placeholder="Message d'invitation.." name="message" rows="8" cols="40"></textarea>
            <input type="submit" name="invitUser" class="buttonmodif" style="margin:0 5%;" value="Inviter l'utilisateur">
          </form>
      </div>
      <?php
      $i++;
      endforeach;
     else:?>
    <h1>Erreur, vous n'êtes pas l'administrateur de groupe<h1>
    <?php endif;?>

  </div>
