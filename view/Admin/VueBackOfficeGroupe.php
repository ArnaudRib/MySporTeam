<!--Partie Modal Modification-->
<?php foreach ($groupes as $key => $value):
  $nomgroupe=str_replace(' ', '-', $value['nom']);?>
  <div id="modalinfo<?php echo $value['id']?>" class="modalinfo">
    <div id="insideModalInfo<?php echo $value['id']?>" class="insideModalInfo">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalInfo(this)">&#10006;</p>
      <div class="block95 card" style="margin-top:50px;">
        <div class="header">
          <h4 class="title" style="margin-left:10px; text-align:left;"><?php echo lang("Modifications des informations du groupe.") ?></h4>
          <p class="sousheader" style="text-align:left;">
            <i><?php echo lang("Effectuez vos changements.") ?></i>
          </p>
        </div>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="nomgroupe" value="<?php echo $nomgroupe ?>">
          <div class="card">
            <input type="hidden" name="id_groupe" value="<?php echo $value['id']?>">
            <div class="content-imggroupe">
              <h4 class="title" style="margin-left:10px;"><?php echo lang("Image du groupe") ?></h4>
              <img class='classImage imggroupe' src="<?php echo image('Groupes/Profil/'.$nomgroupe.'.jpg')?>" alt=""/>
              <label for="photo" class="boutonInputFile modifgroupeimg"><?php echo lang("Modifier") ?></label>
              <input id="photo" class="files" type="file" name="photo" style="display:none;">
            </div>
            <div class="infouser">
              <h3 style='margin-bottom:10px;'><?php echo lang("Informations") ?> :</h3>
              <div class="content-input">
                <label class="textlabel" for="nom"><?php echo lang("Nom du groupe") ?></label>
                <input id="pseudo" type="text" name="nom" value="<?php echo $value['nom']?>" >
              </div>
              <div class="content-input">
                <label class="textlabel" for="telephone"><?php echo lang("Téléphone") ?></label>
                <input id="telephone" name="telephone" value="<?php echo $value['telephone']?>">
              </div>
              <div class="content-input">
                <label class="textlabel" for="email"><?php echo lang("Email") ?></label>
                <input id="email" type="email" name="email" value="<?php echo $value['mail']?>">
              </div>
              <div class="content-input">
                <label class="textlabel" for="nbmax_sportif"><?php echo lang("Nombre maximal de sportifs") ?></label>
                <input id="nbmax_sportif" type="number" name="nbmax_sportif" min="0" value="<?php echo $value['nbmax_sportifs']?>">
              </div>
              <div class="content-descriptiongroupe">
                <label style="display: inline-block; width: 60px; float: none;"><?php echo lang("Public") ?></label> <input style="display: inline-block; width: 30px; padding: 0; margin: 0; height:15px" type="radio" value="1" name="visibiliy" value="<?php echo $value['public']?>">
                <label style="display: inline-block; width: 60px; float: none;"><?php echo lang("Privé") ?></label> <input type="radio" name="visibiliy" value="<?php echo $value['public']?>" value="2" style="display: inline-block; width: 30px; height: 15px">
              </div>
              <div class="content-descriptiongroupe">
                <label for="description" style="display:block;"><?php echo lang("Modifier la description") ?> : </label>
                <textarea name="description" style="display:block; border:1px black solid; border-radius:10px; padding:5px;" rows="3" cols="75" maxlength="30" placeholder="Description du sport (MAX : 30 caractères)."><?php echo $value['description']?></textarea>
              </div>
            </div>
            <!-- RAJOTUER ICI LA SUITE DES TRUCS DU GROUPE.-->
          </div>
          <input type="submit" name="modifiergroupe" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:0px; width:100%; margin-top:20px;" value="Enregistrer les modifications">
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!--Partie Modal Suppression-->
<?php foreach ($groupes as $key => $value): ?>
  <div id="modalsuppr<?php echo $value['id']?>" class="modalsuppr">
    <div id="insideModalSuppr<?php echo $value['id']?>" class="insideModalSuppr">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalSuppr(this)">&#10006;</p>
      <p class="errorbox" style="font-style:normal; font-size:16px; margin:80px auto; padding: 40px 0;">
        <?php echo lang("Êtes-vous sûrs de vouloir supprimer ce groupe?") ?></br>
        <i style="font-size:13px;"><?php echo lang("Supprimer le groupe effacera toutes les données qui lui sont relatives. Changements définitifs.") ?></i>
      </p>
      <div style='text-align:center; margin:40px auto; width:80%;'>
        <form class="" action="" method="post" style='display:inline-block; width:49%;'>
          <input type="hidden" name="id_groupe" value="<?php echo $value['id']?>">
          <input type="submit" name="Suppr" value="Oui" class="btn btn-4 btn-4a" style='margin:0; width:100%; height:50px; text-align:center;'>
        </form>
        <button id="<?php echo $value['id']?>" type="button" name="button" style='display:inline-block; width:49%; text-align:center; margin:0;' class="btn btn-4 btn-4a" onclick="closeModalSuppr(this)">Non</button>
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
      <li class="nextline">
          <i class="fa fa-user"></i>
          <p><?php echo lang("Utilisateurs") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficegroupe')?>">
      <li class="nextline active">
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
    <p class="title"><?php echo lang("Groupes") ?></p>
    <i class="subtitle"><?php echo lang("Supervision des groupes.") ?></i>
  </div>

  <?php if(!empty($_POST)):
    if(!empty($succes)):?>
      <div class="successbox fa fa-check">
        <div style="margin-left:20px; display:inline-block;"><?php echo $succes; ?></div>
      </div>
    <?php endif; ?>
    <?php if(!empty($error)):?>
      <div class="errorbox fa fa-times-circle">
        <div style="margin-left:20px; display:inline-block;"><?php echo $error;?></div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <div class="block95 card">
    <div class="header">
      <h4 class="title"><?php echo lang("Liste des groupes") ?></h4>
      <p class="sousheader">
        <i> <?php echo lang("Cliquez sur une ligne pour modifier.") ?> </p>
      </p>
    </div>
    <div class="content_tableau">
      <table>
        <tr class="header_tableau">
          <th><?php echo lang("Nom du groupe") ?></th>
          <th><?php echo lang("Nombre de membres") ?></th>
          <th style="background-color:rgb(85, 182, 244);"><?php echo lang("Plus d'informations") ?></th>
          <th style='background-color:rgb(255, 61, 61);'><?php echo lang("Supprimer") ?></th>
        </tr>
        <?php foreach ($groupes as $key => $value): ?>
          <tr class="lignesport">
            <td><?php echo ucfirst($value['nom']) ?></td>
            <td class="centre"><?php echo $nbmembres[$value['id']]?></td>
            <td id="<?php echo $value['id']?>" class="infoCell" onclick="modalinfo(this)" ><p class="plusButton" style="top:65px;">+</p></td>
            <td id="<?php echo $value['id']?>" class="supprCell" onclick="modalSuppr(this)"><p class="closeButton"  style="top:65px;">&#10006;</p></td>
          </tr>
        <?php endforeach; ?>
      </table>
  </div>
</div>
