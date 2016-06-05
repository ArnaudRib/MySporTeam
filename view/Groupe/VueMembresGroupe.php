<div class="fond_mongroupe">
  <div id="image_de_fond">
    <?php $nomgroupe=str_replace(' ', '-', $datagroupe['nom']);?>
  <img src="<?php echo image('Groupes/Bannière/'.$nomgroupe.'.jpg')?>"/>
  </div>
    <div id="haut_mongroupe">
      <img src="<?php echo image('Groupes/Profil/'.$nomgroupe.'.jpg')?>"/>
      <h1><?php echo $datagroupe['nom']?></h1>
      <div id="menu_mongroupe">
        <nav>
          <ul style='margin-top:15px;'>
            <a href="<?php  goToPage('informationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Informations') ?></li></a>
            <a href="<?php  goToPage('publicationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Publications') ?></li></a>
            <a href="<?php  goToPage('evenementsgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Evènements') ?></li></a>
            <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>" id="selectionne"><li><?php echo lang('Membres') ?></li></a>
<?php if($isMembre==false):
          if($datagroupe['public']!="0"):
          if((intval($datagroupe['nbmax_sportifs']))-(intval($NBmembres['0']['COUNT(id)']))>0):?>
          <li id="abonnement" style="margin-top:-10px;">
            <form class="" action="" method="post">
              <input  type="submit" name="abonnement" value="Rejoindre" style='cursor:pointer;'>
            </form>
          </li>
          <?php
          else:
          endif;
          else: 
          if($isInvit==true):?>
          <li id="abonnement" style="margin-top:-10px; margin-left:40px;">
            <form class="" action="" method="post">
              <input  type="submit" name="abonnement" value="Accepter l'invitation" style='cursor:pointer;'></input>
            </form>
            </li>
            <li id="desabonnement" style="margin-top:-10px; margin-left:10px;">
            <form class="" action="" method="post">
              <input  type="submit" name="desiste" value=" X " style='cursor:pointer;'></input>
            </form>
            </li>
          <?php endif;
          endif;
        elseif($isLeader==true):?>
          <li id="abonnement" style="margin-top:-10px; margin-left:60px; padding:4px;">
            <a href="<?php goToPage('invitmembres',['id'=>$datagroupe['id']])?>"><?php echo lang("Ajouter des membres") ?></a>
          </li>
          <?php else:?>
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
    <?php if($datagroupe['public']!="0"):?>
    <div  style="font-size:11px;padding:4px;" class="forme_case radius_mongroupe">
             <h1> <?php echo lang('Nombre maximum de membres')?>: <?php echo $datagroupe['nbmax_sportifs']?></h1>
             <h1> <?php echo lang('Nombre de membres')?>: <?php echo $NBmembres['0']['COUNT(id)']?></h1>
    </div>
<?php foreach ($membre as $key => $value):?>
        <div id="<?php echo $i=count($membre) ?>" class="case_membre radius_mongroupe forme_case">
          <img src="<?php echo image('Groupes/sport3.jpg')?>" />
          <a href="<?php goToPage('profilUnUtilisateur',['pseudo'=>$value['pseudo']])?>"><h1><?php echo $value['pseudo']?></h1></a>
          <?php if($isLeader==true):
            if(($value['leader_groupe'])!=1):?>
          <form style="float:right; margin-right:30px;" class="" action="" method="post">
            <!--<label style="display:inline-block;" for="deletebutton" class="deletebutton">&#10006;</label>-->
            <input type="hidden" name="id_utilisateur" value="<?php echo $value['id_utilisateur']?>">
            <input class="deletebutton"  type="submit" name="deleteUser" value="&#10006;">
          </form>
          <form style="float:right; margin-right:30px; margin-top:40px; class="" action="" method="post">
            <!--<label style="display:inline-block;" for="deletebutton" class="deletebutton">&#10006;</label>-->
            <input type="hidden" name="id_utilisateur" value="<?php echo $value['id_utilisateur']?>">
            <input class="addbutton" type="submit" name="addLeader" value="&#10010;">
          </form>
        <?php endif;
      endif;?>
        </div>
        <?php
      endforeach;
      else:
      if($isMembre==false):
        ?>
        <div  class="publication forme_case radius_mongroupe">
             <h1> <?php echo lang('Groupe privé. Membres masqués.') ?></h1>
             </div>
        <?php else:
        foreach ($membre as $key => $value):?>
       
        <div id="<?php echo $i=count($membre) ?>" class="case_membre radius_mongroupe forme_case">
          <img src="<?php echo image('Groupes/sport3.jpg')?>" />
          <a href="<?php goToPage('profilUnUtilisateur',['pseudo'=>$value['pseudo']])?>"><h1><?php echo $value['pseudo']?></h1></a>
          <?php if($isLeader==true):
            if(($value['leader_groupe'])!=1):?>
          <form style="float:right; margin-right:30px;" class="" action="" method="post">
            <!--<label style="display:inline-block;" for="deletebutton" class="deletebutton">&#10006;</label>-->
            <input type="hidden" name="id_utilisateur" value="<?php echo $value['id_utilisateur']?>">
            <input class="deletebutton"  type="submit" name="deleteUser" value="&#10006;">
          </form>
        <?php endif;
      endif;?>
        </div>
        <?php
      endforeach;
        endif;
        endif;?>

  </div>
