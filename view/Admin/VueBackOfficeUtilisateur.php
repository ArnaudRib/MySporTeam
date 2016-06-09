<!--Partie Modal Modification-->
<?php foreach ($users as $key => $value): ?>
  <?php $pseudouser=str_replace(' ', '-', $value['pseudo']); ?>
  <div id="modalinfo<?php echo $value['id']?>" class="modalinfo">
    <div id="insideModalInfo<?php echo $value['id']?>" class="insideModalInfo">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalInfo(this)">&#10006;</p>
      <div class="block95 card" style="margin-top:80px;">
        <img width="50px" height="50px" style="display:inline-block;float:right;margin-right:30px;" src="<?php if($value['sexe']=='H'){echo image('svg/homme.svg'); }else{ echo image('svg/femme.svg');}?>" alt="" />
        <div class="header">
          <h4 class="title" style="margin-left:10px; text-align:left;"><?php echo lang("Modérer l'utilisateur") ?> <?php echo $value['pseudo']?>.</h4>
          <p class="sousheader" style="text-align:left;">
            <i><?php echo lang("Effectuez vos changements.") ?></i>
          </p>
        </div>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="card" style="padding-bottom:20px;">
            <input type="hidden" name="id_user" value="<?php echo $value['id']?>">
            <input type="hidden" name="pseudouser" value="<?php echo $pseudouser ?>">
            <div class="content-imggroupe">
              <h4 class="title" style="margin-left:10px;"><?php echo lang("Image de l'utilisateur") ?></h4>
              <img class='classImage imguser' src="<?php echo image('Users/Profil/'.$pseudouser.'.jpg')?>" alt=""/>
              <label for="photo<?php echo $value['id']?>" class="boutonInputFile modifgroupeimg"><?php echo lang("Modifier") ?></label>
              <input id="photo<?php echo $value['id']?>" class="files" type="file" name="photo" style="display:none;">
            </div>

            <div class="content-imggroupe">
              <h4 class="title" style="margin-left:10px;"><?php echo lang("Image de l'utilisateur") ?></h4>
              <img class='classImage imguser' src="<?php echo image('Users/Bannière/'.$pseudouser.'.jpg')?>" alt=""/>
              <label for="couverture<?php echo $value['id']?>" class="boutonInputFile modifgroupeimg"><?php echo lang("Modifier") ?></label>
              <input id="couverture<?php echo $value['id']?>" class="files" type="file" name="couverture" style="display:none;">
            </div>

            <div class="infouser">
              <h3 style='margin-bottom:10px;'><?php echo lang("Informations") ?> :</h3>
              <div class="content-box" style="text-align:center;">
                <div class="radiobox">
                  <label  for="NonAdmin"><?php echo lang("Non Admin") ?></label>
                  <input style=" height:15px;" id="NonAdmin" type="radio" name="admin" value="0" <?php if($value['admin_util']==0) { echo 'selected checked'; }; ?>>
                </div>
                <div class="radiobox">
                  <label for="Admin"><?php echo lang("Admin") ?></label>
                  <input style="height:15px;" id="Admin" type="radio" name="admin" value="1" <?php if($value['admin_util']==1) { echo 'selected checked'; }; ?>>
                </div>
              </div>
            </div>
            <!-- RAJOTUER ICI LA SUITE DES TRUCS DU USER.-->
          </div>
          <input type="submit" name="modifieruser" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:0px; width:100%; margin-top:20px;" value="Enregistrer les modifications">
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<!--Partie Modal Suppression-->
<?php foreach ($users as $key => $value): ?>
  <div id="modalsuppr<?php echo $value['id']?>" class="modalsuppr">
    <div id="insideModalSuppr<?php echo $value['id']?>" class="insideModalSuppr">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalSuppr(this)">&#10006;</p>
      <p class="errorbox" style="font-style:normal; font-size:16px; margin:50px auto; padding: 40px 0;">
        <?php echo lang("Voulez vous supprimer cet utilisateur?") ?></br>
        <i style="font-size:13px;"><?php echo lang("Supprimer l'utilisateur effacera toutes les données qui lui sont relatives. Changements définitifs.") ?></i>
      </p>
      <div style='text-align:center; margin:40px auto; width:80%;'>
        <form class="" action="" method="post" style='display:inline-block; width:49%;'>
          <input type="hidden" name="id_user" value="<?php echo $value['id']?>">
          <input type="submit" name="SupprUser" value="Oui" class="btn btn-4 btn-4a" style='margin:0; width:100%; height:50px; text-align:center;'>
        </form>
        <button id="<?php echo $value['id']?>" type="button" name="button" style='display:inline-block; width:49%; text-align:center; margin:0;' class="btn btn-4 btn-4a" onclick="closeModalSuppr(this)"><?php echo lang('Annuler')?></button>
      </div>

      <?php if($value['banned']!=1): ?>
      <p class="errorbox" style="font-style:normal; font-size:16px; margin:20px auto; padding: 40px 0;">
        <?php echo lang("Ou peut-être préférez-vous le bannir?") ?></br>
        <i style="font-size:13px;"><?php echo lang("Bannir l'empèchera de se connecter et d'accéder aux fonctions principales du site") ?></i>
      </p>
      <div style='text-align:center; margin:40px auto; width:80%;'>
        <form class="" action="" method="post" style='display:inline-block; width:49%;'>
          <input type="hidden" name="id_user" value="<?php echo $value['id']?>">
          <input type="submit" name="Ban" value="Ban" class="btn btn-4 btn-4a" style='margin:0; width:100%; height:50px; text-align:center;'>
        </form>
        <button id="<?php echo $value['id']?>" type="button" name="button" style='display:inline-block; width:49%; text-align:center; margin:0;' class="btn btn-4 btn-4a" onclick="closeModalSuppr(this)"><?php echo lang('Annuler')?></button>
      </div>
      <?php else: ?>
        <p class="errorbox" style="font-style:normal; font-size:16px; margin:20px auto; padding: 40px 0;">
          Unban?</br>
          <i style="font-size:13px;"><?php echo lang("Souhaitez-vous enlever cet utilisateur de la blacklist?") ?>.</i>
        </p>
        <div style='text-align:center; margin:40px auto; width:80%;'>
          <form class="" action="" method="post" style='display:inline-block; width:49%;'>
            <input type="hidden" name="id_user" value="<?php echo $value['id']?>">
            <input type="submit" name="unBan" value="Unban" class="btn btn-4 btn-4a" style='margin:0; width:100%; height:50px; text-align:center;'>
          </form>
          <button id="<?php echo $value['id']?>" type="button" name="button" style='display:inline-block; width:49%; text-align:center; margin:0;' class="btn btn-4 btn-4a" onclick="closeModalSuppr(this)"><?php echo lang('Annuler')?></button>
        </div>
      <?php endif; ?>
    </div>
  </div>
<?php endforeach; ?>

<div class="sidebar">
  <a href="<?php goToPage('Accueil')?>">
  <div class="TitreSite">
    <?php echo lang("MySporTeam") ?>
  </div>
</a>
  <ul class="menu">
    <a href="<?php goToPage('backoffice')?>">
      <li class="nextline">
          <i class="fa fa-home"></i>
          <p><?php echo lang("Accueil") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficeuser')?>">
      <li class="nextline active">
          <i class="fa fa-user"></i>
          <p><?php echo lang("Utilisateurs") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficegroupe')?>">
      <li class="nextline">
          <i class="fa fa-users"></i>
          <p><?php echo lang("Groupes") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficeclub')?>">
      <li class="nextline">
          <i class="fa fa-odnoklassniki"></i>
          <p><?php echo lang("Clubs") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficetype')?>">
      <li class="nextline">
          <i class="fa fa-wrench"></i>
          <p><?php echo lang("Types") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficesport')?>">
      <li class="nextline">
          <i class="fa fa-heart"></i>
          <p><?php echo lang("Sports") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficeforum')?>">
      <li class="nextline">
          <i class="fa fa-archive"></i>
          <p><?php echo lang("Forum") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficeaide')?>">
      <li class="nextline">
          <i class="fa fa-hand-spock-o"></i>
          <p><?php echo lang("Aide") ?></p>
      </li>
    </a>

  </ul>
</div>




<div class="main-panel">
  <div class="navbar navbar-header">
    <p class="title"><?php echo lang("Utilisateurs") ?></p>
    <i class="subtitle"><?php echo lang("Modération des utilisateurs du site.") ?></i>
  </div>
  <?php if($error!=''):?>
    <div class="errorbox blackborder radius" style="font-size:15px; margin: 20px auto; ">
      <?php echo $error;?>
    </div>
  <?php endif; ?>
  <?php if($succes!=''): ?>
    <div class="successbox blackborder radius" style='margin:20px auto;padding:20px;'>
      <?php echo $succes;?>
    </div>
  <?php endif; ?>
  <div class="block95 card">
    <div class="header">
      <h4 class="title"><?php echo lang("Liste des utilisateurs.") ?></h4>
      <p class="sousheader">
        <i> <?php echo lang("Cliquez sur une ligne pour modifier.") ?> </p>
      </p>
    </div>
    <div class="content_tableau">
      <table>
        <tr class="header_tableau">
          <th><?php echo lang("Pseudo") ?></th>
          <th><?php echo lang("Adresse email") ?></th>
          <th><?php echo lang("Nombre de groupes") ?></th>
          <th><?php echo lang("Nombres de posts sur le forum") ?></th>
          <th style="background-color:rgb(85, 182, 244);"><?php echo lang("Plus d'informations") ?></th>
          <th style='background-color:rgb(255, 61, 61);'><?php echo lang("Supprimer ou Bannir") ?></th>
        </tr>
        <?php foreach ($users as $key => $value): ?>
            <tr>
              <td  <?php if($value['banned']==1):?> style="background-image:url('/asset/images/General/banned.png'); background-size:cover;"  <?php endif; ?>><?php echo ucfirst($value['pseudo']) ?></td>
              <td class="centre"><?php echo $value['email']?></td>
              <td><?php echo $nbGroupeUsers[$value['id']]?></td>
              <td><?php echo $nbPostUsers[$value['id']]?></td>
              <td id="<?php echo $value['id']?>" class="infoCell" onclick="modalinfo(this)"><p class="plusButton" style="top:65px;">+</p></td>
              <td id="<?php echo $value['id']?>" class="supprCell" onclick="modalSuppr(this)"><p class="closeButton"  style="top:65px;">&#10006;</p></td>
            </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
