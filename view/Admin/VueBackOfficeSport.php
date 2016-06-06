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
      <li class="nextline active">
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
    <p class="title"><?php echo lang("Sports") ?></p>
    <i class="subtitle"><?php echo lang("Edition des sports.") ?></i>
  </div>

  <?php if(isset($_POST['Envoyer'])):
    if(empty($error)):?>
      <div class="successbox fa fa-check">
        <div style="margin-left:20px; display:inline-block;"><?php echo $succes;?></div>
      </div>
    <?php else:?>
      <div class="errorbox fa fa-times-circle">
        <div style="margin-left:20px; display:inline-block;"><?php echo $error;?></div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <div class="block95 card">
    <div class="header">
      <h4 class="title"><?php echo lang("Liste des sports") ?></h4>
      <p class="sousheader">
        <i> <?php echo lang("Cliquez sur une ligne pour modifier.") ?> </p>
      </p>
    </div>
    <div class="content_tableau">
      <table>
        <tr class="header_tableau">
          <th><?php echo lang("Nom") ?></th>
          <th><?php echo lang("Nombre de groupes associés") ?></th>
          <th><?php echo lang("Description") ?></th>
          <th><?php echo lang("Type") ?></th>
        </tr>
        <?php foreach ($sports as $key => $value): ?>
            <tr class="lignesport" style="cursor:pointer;" onclick="location.href='<?php goToPage('backofficeAsport', ['id_sport'=>$value['id']]) ?>'">
              <td><?php echo ucfirst($value['nom']) ?></td>
              <td class="centre"><?php echo $nbgroupe[$value['id']]?></td>
              <td><?php echo $value['description']?></td>
              <td><?php echo $types[$value['id_type']-1]['titre']?></td>
            </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>

  <div class="centre">
  	<button id="boutonADD" class="btn btn-4 btn-4a" onclick="displayAdd()">
      <?php echo lang("Ajouter un sport") ?> <span style="font-size:25px; padding-left:30%;">+</span>
    </button>
    <button id="boutonREMOVE" class="btn btn-4 btn-4a backbuttonred hidden" onclick="displayAdd()">
      <?php echo lang("Annuler") ?> <span style="font-size:20px; padding-left:40%;">x</span>
    </button>
  </div>

  <div id="Add" class="hiddensize">
    <div class="block95 card">
      <div class="header">
        <h4 class="title"><?php echo lang("Ajouter un sport") ?></h4>
        <p class="sousheader">
          <i><?php echo lang("Remplissez les informations qui suivent.") ?></p>
        </p>
      </div>
      <div class="block80">
        <form class="" action="" method="post" enctype="multipart/form-data">
          <fieldset>
            <label class="textlabel" for="nom"><?php echo lang("Nom du sport") ?></label>
            <input type="text" value="<?php echo $_POST['nom']?>" class="inputfieldset" name="nom" placeholder="Ex : football" required >
            <textarea name="description" value="<?php echo $_POST['description']?>" rows="3" cols="75" maxlength="30" placeholder="Description du sport (MAX : 30 caractères)."></textarea>

            <select class="" name="id_type" style="display:block;">
              <option selected value=""> --- <?php echo lang("Type") ?> --- </option>
              <?php foreach ($types as $key => $value): ?>
                <option value="<?php echo $value['id']?>"> <?php echo $value['titre']?></option>
              <?php endforeach; ?>
            </select>

            <div class="import">
              <p class="PoliceInputFile"><?php echo lang("Importer une photo du sport (.jpg)") ?>:</p>
              <label for="photo" class="boutonInputFile"><?php echo lang("Importer un fichier") ?></label>
              <input id="photo" class="files" type="file" name="photo" style="display:none;">
              <img class="UploadedImage classImage" />
            </div>
            <div class="import">
              <p class="PoliceInputFile"><?php echo lang("Importer une icone du sport") ?> (<a href="http://www.freepik.com/free-icons/sports" target="_blank">.svg</a>) :</p>
              <label for="icone" class="boutonInputFile"><?php echo lang("Importer un fichier") ?></label>
              <input id="icone" class="files" type="file" name="icone" style="display:none;">
              <img class="UploadedImage classImage" />
            </div>
            <input type="submit" name="Envoyer" value="Ajouter un sport" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:8px;">
          </fieldset>
        </form>
      </div>
    </div>
  </div>

</div>
