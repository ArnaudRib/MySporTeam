<div class="bodybackground">
  <div class="blockinscription">
    <nav id="creationgroupe"> <!-- remettre <nav id="creationgroupe"> si tu veux pas noir-->

      <form action="<?php goTopage('creationgroupe')?>" method="post" enctype="multipart/form-data" >
        <h1 class=""> <?php echo lang("Créer votre Groupe") ?> </h1>
        <?php if($error!=''):?>
          <div class="errorbox blackborder radius">
            <?php echo $error;?>
          </div>
        <?php endif; ?>
        <?php if($succes!=''): ?>
          <div class="successbox blackborder radius" style='margin:20px auto; margin-bottom:0px'>
            <?php echo $succes;?>
          </div>
        <?php endif; ?>

        <fieldset>
          <div style="display:block; margin-left:20px;">
            <label for="nom" class="fa fa-group labelnom"></label>
            <input id="nom" type="text" name="nom" placeholder="Nom du Groupe"/></div>
          <div style="display:block;margin-left:20px;">
            <label for="number" class="fa fa-line-chart labelnom"></label>
            <input id="number" type="number" placeholder="Nombre de membres : 45max" name="nombre" min="0" max="45"/>
          </div>
          <div style="display:block;margin-left:20px;">
            <label for="ville" class="fa fa-home labelnom"></label>
            <input id='ville' type="text" name="ville" placeholder="Ville"/></br>
          </div>

        <div style="text-align:center; margin-right:-20px;margin-right: 4px; margin-left: -37px;">
          <select name="categorie" class="selectcreation"  require >
            <option selected value=""> --- <?php echo lang("Catégorie") ?> --- </option>
            <?php foreach ($categorie as $key => $value): ?>
              <option value="<?php echo $value['id']?>"><?php echo $value['nom']?></option>
            <?php endforeach; ?>
          </select>
          <select  class="selectcreation" name="sport">
            <option value="" selected> --- <?php echo lang("Sport") ?> --- </option>
            <?php foreach ($sports as $key => $value): ?>
              <option value="<?php echo $value['id']?>"> <?php echo ucfirst($value['nom'])?> </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div style="text-align:center;">
          <label for='public' style="display: inline-block; width: 60px; float: none;"><?php echo lang("Public") ?></label>
          <input id='public' style="display: inline-block; width: 30px; padding: 0; margin: 0; height:15px" type="radio" name="visibilite" value="public">
          <label for='prive' style="display: inline-block; width: 60px; float: none;"><?php echo lang("Privé") ?></label>
          <input id='prive' type="radio" name="visibilite" value="prive" style="display: inline-block; width: 30px; height: 15px">
        </div>

        <div class="ChangePictureSport">
          <label for="photo" class="boutonInputFile"><?php echo lang("Ajouter une photo de groupe.") ?></label>
          <input id="photo" class="files" type="file" name="photogroupe" style="display:none;">
          <img class="UploadedImage classImage" />
        </div>

        <div class="ChangePictureSport">
          <label for="Bannière" class="boutonInputFile"><?php echo lang("Ajouter une photo Bannière de groupe.") ?></label>
          <input id="Bannière" class="files" type="file" name="Bannière" style="display:none;">
          <img class="UploadedImage classImage" />
        </div>

        <textarea class="areacreation" name="description" rows="10" cols="50" placeholder="Description"></textarea>

        <div style="text-align:center;">
          <input class="subboutton" id="submit" type="submit" name="Envoyer" value="Valider">
        </div>
      </fieldset>
    </form>

    </nav>
  </div>
</div>
