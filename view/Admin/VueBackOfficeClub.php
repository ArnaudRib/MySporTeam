<!--Partie Modal Suppression-->
<?php foreach ($clubs as $key => $value): ?>
  <div id="modalsuppr<?php echo $value['id']?>" class="modalsuppr">
    <div id="insideModalSuppr<?php echo $value['id']?>" class="insideModalSuppr">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalSuppr(this)">&#10006;</p>
      <p class="errorbox" style="font-style:normal; font-size:16px; margin:80px auto; padding: 40px 0;">
        <?php echo lang("Êtes-vous sûrs de vouloir supprimer ce club?") ?></br>
        <i style="font-size:13px;"><?php echo lang("Supprimer le club effacera toutes les données qui lui sont relatives. Changements définitifs.") ?></i>
      </p>
      <div style='text-align:center; margin:40px auto; width:80%;'>
        <form class="" action="" method="post" style='display:inline-block; width:49%;'>
          <input type="hidden" name="id_club" value="<?php echo $value['id']?>">
          <input type="submit" name="Suppr" value="Oui" class="btn btn-4 btn-4a" style='margin:0; width:100%; height:50px; text-align:center;'>
        </form>
        <button id="<?php echo $value['id']?>" type="button" name="button" style='display:inline-block; width:49%; text-align:center; margin:0;' class="btn btn-4 btn-4a" onclick="closeModalSuppr(this)">Non</button>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<!--Partie Modal Modification-->
<?php foreach ($clubs as $key => $value): ?>
  <div id="modalinfo<?php echo $value['id']?>" class="modalinfo">
    <div id="insideModalInfo<?php echo $value['id']?>" class="insideModalInfo">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalInfo(this)">&#10006;</p>
      <div class="block95 card" style="margin-top:80px;">
        <div class="header">
          <h4 class="title" style="margin-left:10px; text-align:left;"><?php echo lang("Modérer le club") ?> : <?php echo $value['nom']?>.</h4>
          <p class="sousheader" style="text-align:left;">
            <i><?php echo lang("Effectuez vos changements.") ?></i>
          </p>
        </div>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="card" style="padding-bottom:20px;">
            <input type="hidden" name="id_club" value="<?php echo $value['id']?>">
            <div class="content-imggroupe">
              <h4 class="title" style="margin-left:10px;"><?php echo lang("Bannière du club") ?></h4>
              <img class='classImage imguser' src="<?php echo image('Groupes/Club/'.$value['id'].'.jpg')?>" alt=""/>
              <label for="photo<?php echo $value['id']?>" class="boutonInputFile modifgroupeimg"><?php echo lang("Modifier") ?></label>
              <input id="photo<?php echo $value['id']?>" class="files" type="file" name="photo" style="display:none;">
            </div>
            <div class="infouser">
              <h3 style='margin-bottom:10px;'><?php echo lang("Informations") ?> :</h3>
              <div class="content-input">
                <label class="textlabel" for="nom"><?php echo lang("Nom du Club") ?></label>
                <input id="pseudo" type="text" name="nom" value="<?php echo $value['nom']?>" >
              </div>
              <div class="content-input">
                <label class="textlabel" for="email"><?php echo lang("Email") ?> :</label>
                <input id="email" type="email" name="email" value="<?php echo $value['email']?>">

              </div>
              <div class="content-input">
                <label class="textlabel" for="Téléphone"><?php echo lang("Téléphone") ?></label>
                <input id="Numéro" type="text" name="telephone" value="<?php echo $value['telephone']?>">
              </div>

              <div class="content-input">
                <label class="textlabel" for="adresse"><?php echo lang("Adresse") ?></label>
                <input id="Numéro" type="text" name="adresse" value="<?php echo $value['adresse']?>">
              </div>

              <div class="content-input">
                <label class="textlabel" for="lien"><?php echo lang("Lien du site") ?></label>
                <input id="Numéro" type="text" name="lien" value="<?php echo $value['lien']?>">
              </div>
              <div class="content-descriptiongroupe">
                <label for="informations" style="display:block;"><?php echo lang("Modifier la description") ?> : </label>
                <textarea name="informations" style="display:block; border:1px black solid; border-radius:10px; padding:5px;" rows="3" cols="75" maxlength="30" placeholder="Description du club (MAX : 30 caractères)."><?php echo $value['informations']?></textarea>
              </div>
            </div>

            <!-- RAJOTUER ICI LA SUITE DES TRUCS DU Club.-->
          </div>
          <input type="submit" name="modifierclub" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:0px; width:100%; margin-top:20px;" value="Enregistrer les modifications">
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
      <li class="nextline">
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
      <li class="nextline active">
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
    <p class="title"><?php echo lang("Clubs") ?></p>
    <i class="subtitle"><?php echo lang("Modération des clubs du site.") ?></i>
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
      <h4 class="title"><?php echo lang("Liste des clubs.") ?></h4>
      <p class="sousheader">
        <i> <?php echo lang("Cliquez sur une ligne pour modifier.") ?> </p>
      </p>
    </div>
    <div class="content_tableau">
      <table>
        <tr class="header_tableau">
          <th><?php echo lang("Nom du Club") ?></th>
          <th><?php echo lang("Adresse") ?></th>
          <th><?php echo lang("Adresse email") ?></th>
          <th><?php echo lang("Téléphone") ?></th>
          <th><?php echo lang("Lien du site") ?></th>
          <th style="background-color:rgb(85, 182, 244);"><?php echo lang("Plus d'informations") ?></th>
          <th style='background-color:rgb(255, 61, 61);'><?php echo lang("Supprimer") ?></th>
        </tr>
        <?php foreach ($clubs as $key => $value): ?>
            <tr class="lignesport">
              <td><?php echo ucfirst($value['nom']) ?></td>
              <td class="centre"><?php echo $value['adresse']?></td>
              <td class="centre"><?php echo $value['email']?></td>
              <td class="centre"><?php echo $value['telephone']?></td>
              <td class="centre"><?php echo $value['lien']?></td>
              <td id="<?php echo $value['id']?>" class="infoCell" onclick="modalinfo(this)"><p class="plusButton" style="top:65px;">+</p></td>
              <td id="<?php echo $value['id']?>" class="supprCell" onclick="modalSuppr(this)"><p class="closeButton"  style="top:65px;">&#10006;</p></td>
            </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>

  <div class="centre">
    <button id="boutonADD" class="btn btn-4 btn-4a" onclick="displayAdd()">
      <?php echo lang("Ajouter un club") ?> <span style="font-size:25px; padding-left:30%;">+</span>
    </button>
    <button id="boutonREMOVE" class="btn btn-4 btn-4a backbuttonred hidden" onclick="displayAdd()">
      <?php echo lang("Annuler") ?> <span style="font-size:20px; padding-left:40%;">x</span>
    </button>
  </div>

  <div id="Add" class="hiddensize">
    <div class="block95 card">
      <div class="header">
        <h4 class="title"><?php echo lang("Ajouter un club") ?></h4>
        <p class="sousheader">
          <i><?php echo lang("Remplissez les informations qui suivent.") ?></p>
        </p>
      </div>
      <div class="block80">
        <form class="" action="" method="post" enctype="multipart/form-data">
          <fieldset>
            <div class="ajoutclub">
            <div class="infoclub">
              <label class="textlabel" for="nom"><?php echo lang("Nom du club") ?></label>
              <input type="text" value="<?php echo $_POST['nom']?>" class="inputfieldset" name="nom" placeholder="ex : Forest Hill" required >
            </div>
            <div class="infoclub">
              <label class="textlabel" for="adresse"><?php echo lang("Adresse") ?></label>
              <input type="text" value="<?php echo $_POST['adresse']?>" class="inputfieldset" name="adresse" placeholder="ex : 1 avenue des champs elysées" required >
            </div>
            <div class="infoclub">
              <label class="textlabel" for="email"><?php echo lang("Adresse email") ?></label>
              <input type="text" value="<?php echo $_POST['email']?>" class="inputfieldset" name="email" placeholder="ex : xxxx@mysporteam.com" required >
            </div>
            <div class="infoclub">
              <label class="textlabel" for="telephone"><?php echo lang("Téléphone") ?></label>
              <input type="text" value="<?php echo $_POST['telephone']?>" class="inputfieldset" name="telephone" placeholder="ex : 0130562347" required >
            </div>
            <div class="infoclub">
              <label class="textlabel" for="lien"><?php echo lang("Lien du site") ?></label>
              <input type="text" value="<?php echo $_POST['lien']?>" class="inputfieldset" name="lien" placeholder="ex : www.xxxx.com" required >
            </div>
            <div class="infoclub">
            <textarea name="informations" style="border-radius: 10px 10px 10px 10px; margin-left: 4%;"value="<?php echo $_POST['informations']?>" rows="3" cols="75" maxlength="30" placeholder="Description du club (MAX : 50 caractères)."></textarea>
            </div>

            <div class="import" style="margin-left:4%">
              <p class="PoliceInputFile"><?php echo lang("Importer une bannière du club (.jpg)") ?> :</p>
              <label for="photo" class="boutonInputFile"><?php echo lang("Importer un fichier") ?></label>
              <input id="photo" class="files" type="file" name="photo" style="display:none;">
              <img class="UploadedImage classImage" />
            </div>

            <input type="submit" name="addclub" value="Ajouter un club" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:8px;">
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
