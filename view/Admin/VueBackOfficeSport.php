<div class="sidebar">
  <a href="<?php goToPage('Accueil')?>">
    <div class="TitreSite">
      MySporTeam
    </div>
  </a>
  <ul class="menu">
    <a href="<?php goToPage('backoffice')?>">
      <li class="nextline">
          <i class="fa fa-home"></i>
          <p>Accueil</p>
      </li>
    </a>

    <a href="<?php goToPage('backofficegroupe')?>">
      <li class="nextline">
          <i class="fa fa-users"></i>
          <p>Groupes</p>
      </li>
    </a>

    <a href="<?php goToPage('backofficetype')?>">
      <li class="nextline">
          <i class="fa fa-wrench"></i>
          <p>Types</p>
      </li>
    </a>
    
    <a href="<?php goToPage('backofficesport')?>">
      <li class="nextline active">
          <i class="fa fa-heart"></i>
          <p>Sports</p>
      </li>
    </a>

    <a href="<?php goToPage('backofficeforum')?>">
      <li class="nextline">
          <i class="fa fa-bed"></i>
          <p>Forum</p>
      </li>
    </a>

    <a href="<?php goToPage('backofficereglage')?>">
      <li class="nextline">
          <i class="fa fa-cog"></i>
          <p>Réglages</p>
      </li>
    </a>

  </ul>
</div>


<div class="main-panel">
  <div class="navbar navbar-header">
    <p class="title">Sports</p>
    <i class="subtitle">Edition des sports.</i>
  </div>

  <?php if(isset($_POST['Envoyer'])):
    if(empty($error)):?>
      <div class="successbox fa fa-check">
        <div style="margin-left:20px; display:inline-block;">Les fichiers ont été importés avec succès!</div>
      </div>
    <?php else:?>
      <div class="errorbox fa fa-times-circle">
        <div style="margin-left:20px; display:inline-block;"><?php echo $error;?></div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <div class="block95 card">
    <div class="header">
      <h4 class="title">Liste des sports</h4>
      <p class="sousheader">
        <i> Cliquez sur une ligne pour modifier. </p>
      </p>
    </div>
    <div class="content_tableau">
      <table>
        <tr class="header_tableau">
          <th>Nom</th>
          <th>Nombre de groupes associés</th>
          <th>Description</th>
          <th>Type</th>
        </tr>
        <?php foreach ($sports as $key => $value): ?>
            <tr class="lignesport" onclick="location.href='<?php goToPage('backofficeAsport', ['id_sport'=>$value['id']]) ?>'">
              <td><?php echo ucfirst($value['nom']) ?></td>
              <td class="centre"><?php echo $nbgroupe[$value['id']]?></td>
              <td><?php echo $value['description'] ?></td>
              <td><?php echo $types[$value['id_type']-1]['titre'] ?></td>
            </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>

  <div class="centre">
  	<button id="boutonADD" class="btn btn-4 btn-4a" onclick="displayAdd()">
      Ajouter un sport <span style="font-size:25px; padding-left:30%;">+</span>
    </button>
    <button id="boutonREMOVE" class="btn btn-4 btn-4a backbuttonred hidden" onclick="displayAdd()">
      Annuler <span style="font-size:20px; padding-left:40%;">x</span>
    </button>
  </div>

  <div id="Add" class="hiddensize">
    <div class="block95 card">
      <div class="header">
        <h4 class="title">Ajouter un sport</h4>
        <p class="sousheader">
          <i>Remplissez les informations qui suivent.</p>
        </p>
      </div>
      <div class="block80">
        <form class="" action="" method="post" enctype="multipart/form-data">
          <fieldset>
            <label class="textlabel" for="nom">Nom du sport</label>
            <input type="text" value="<?php echo $_POST['nom'] ?>" class="inputfieldset" name="nom" placeholder="Ex : football" required >
            <textarea name="description" value="<?php echo $_POST['description'] ?>" rows="3" cols="75" maxlength="30" placeholder="Description du sport (MAX : 30 caractères)."></textarea>

            <select class="" name="id_type" style="display:block;">
              <option selected value=""> --- Type --- </option>
              <?php foreach ($types as $key => $value): ?>
                <option value="<?php echo $value['id']?>"> <?php echo $value['titre'] ?></option>
              <?php endforeach; ?>
            </select>

            <div class="import">
              <p class="PoliceInputFile">Importer une photo du sport (.jpg):</p>
              <label for="photo" class="boutonInputFile">Importer un fichier</label>
              <input id="photo" class="files" type="file" name="photo" style="display:none;">
              <img class="UploadedImage" />
            </div>
            <div class="import">
              <p class="PoliceInputFile">Importer une icone du sport (<a href="http://www.freepik.com/free-icons/sports" target="_blank">.svg</a>) :</p>
              <label for="icone" class="boutonInputFile">Importer un fichier</label>
              <input id="icone" class="files" type="file" name="icone" style="display:none;">
              <img class="UploadedImage" />
            </div>
            <input type="submit" name="Envoyer" value="Ajouter un sport" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:8px;">
          </fieldset>
        </form>
      </div>
    </div>
  </div>

</div>
