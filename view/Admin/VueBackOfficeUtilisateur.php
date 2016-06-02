<!--Partie Modal Modification-->
<?php foreach ($users as $key => $value): ?>
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
            <div class="content-imggroupe">
              <h4 class="title" style="margin-left:10px;"><?php echo lang("Image de l'utilisateur") ?></h4>
              <img class='classImage imguser' src="<?php echo image('Users/Profil/'.$value['id'].'.jpg')?>" alt=""/>
              <label for="photo" class="boutonInputFile modifgroupeimg"><?php echo lang("Modifier") ?></label>
              <input id="photo" class="files" type="file" name="photo" style="display:none;">
            </div>
            <div class="infouser">
              <h3 style='margin-bottom:10px;'><?php echo lang("Informations") ?> :</h3>
              <div class="content-input">
                <label class="textlabel" for="pseudo"><?php echo lang("Pseudo") ?></label>
                <input id="pseudo" type="text" name="pseudo" value="<?php echo $value['pseudo']?>" >
              </div>
              <div class="content-input">
                <label class="textlabel" for="email"><?php echo lang("Email") ?></label>
                <input id="email" type="email" name="pseudo" value="<?php echo $value['email']?>">
              </div>
              <div class="content-input">
                <label class="textlabel" for="Numéro"><?php echo lang("Numéro") ?></label>
                <input id="Numéro" type="text" name="numero" value="<?php echo $value['numero_telephone']?>">
              </div>
              <div class="content-box">
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
          <input type="submit" name="modifiergroupe" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:0px; width:100%; margin-top:20px;" value="Enregistrer les modifications">
        </form>
      </div>
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
          <i class="fa fa-users"></i>
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
          <i class="fa fa-bed"></i>
          <p><?php echo lang("Forum") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficereglage')?>">
      <li class="nextline">
          <i class="fa fa-cog"></i>
          <p><?php echo lang("Réglages") ?></p>
      </li>
    </a>

  </ul>
</div>




<div class="main-panel">
  <div class="navbar navbar-header">
    <p class="title"><?php echo lang("Utilisateurs") ?></p>
    <i class="subtitle"><?php echo lang("Modération des utilisateurs du site.") ?></i>
  </div>
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
        </tr>
        <?php foreach ($users as $key => $value): ?>
            <tr>
              <td><?php echo ucfirst($value['pseudo']) ?></td>
              <td class="centre"><?php echo $value['email']?></td>
              <td><?php echo $nbGroupeUsers[$value['id']]?></td>
              <td><?php echo $nbPostUsers[$value['id']]?></td>
              <td id="<?php echo $value['id']?>" class="infoCell" onclick="modalinfo(this)"><p class="plusButton" style="top:65px;">+</p></td>
            </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
