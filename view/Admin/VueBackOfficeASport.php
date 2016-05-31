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
    <p class="title"><?php echo lang("Sports") ?></p>
    <i class="subtitle"><?php echo lang("Edition des sports.") ?></i>
  </div>

  <?php if(isset($_POST['Envoyer'])):
    if(empty($error)):?>
      <div class="successbox fa fa-check">
        <div style="margin-left:20px; display:inline-block;"><?php echo lang("Modifications effectuées avec succès!") ?></div>
      </div>
    <?php else:?>
      <div class="errorbox fa fa-times-circle">
        <div style="margin-left:20px; display:inline-block;"><?php echo $error;?></div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <div class="block95 card">
    <div class="header">
      <div style="display:inline-block;">
        <h4 class="title"><?php echo lang("Modification du sport.") ?></h4>
        <p class="sousheader">
          <i> <?php echo ucfirst($sport['nom'])?> </p>
        </p>
      </div>
      <img width="50px" height="50px"  style="display:inline-block;float:right;margin-right:30px;" src="<?php echo image('svg/'.$sport['nom'].'.svg')?>" alt="" />
    </div>

    <div class="centered-content">
      <form class="" action="" method="post" enctype="multipart/form-data">
        <fieldset style="margin:0 auto;">
          <div style="display:block; width:80%;">
            <label for="description"><?php echo lang("Modifier la description") ?> : </label>
            <textarea name="description" value="<?php echo $sport['description']?>" rows="3" cols="75" maxlength="30" placeholder="Description du sport (MAX : 30 caractères)."><?php echo $sport['description']?></textarea>
          </div>
          <div style="display:block; width:80%;">
            <label for="id_type"><?php echo lang("Modifier le type du sport") ?> : </label>
            <select class="" name="id_type" style="display:block;">
              <option value=""> --- <?php echo lang("Type") ?> --- </option>
              <?php foreach ($types as $key => $value): ?>
                <option value="<?php echo $value['id']?>" <?php if($sport['id_type']==$value['id']) {echo 'selected';} ?> > <?php echo $value['titre']?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="block80">
            <div class="ChangePictureSport">
              <img class="UploadedImage classImage" src="<?php echo image('Sports/'.$sport['nom'].'.jpg')?>" style="margin-bottom:20px;"/>
              <label for="photo" class="boutonInputFile"><?php echo lang("Modifier l'image du sport.") ?></label>
              <input id="photo" class="files" type="file" name="photo" style="display:none;">
            </div>
            <div class="ChangePictureSport">
              <img class="UploadedImage classImage" style="box-shadow:0px 0px 0px;" src="<?php echo image('svg/'.$sport['nom'].'.svg')?>"/>
              <label for="icone" class="boutonInputFile"><?php echo lang("Modifier l'icone du sport.") ?></label>
              <input id="icone" class="files" type="file" name="icone" style="display:none;">
            </div>
          </div>
          <input type="submit" name="Envoyer" value="Modifier le sport" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:8px;">
        </fieldset>
      </form>
    </div>
  </div>
</div>
