<div class="fond_mongroupe">
  <div id="image_de_fond">
    <img src="<?php echo image('Users/Bannière/'.$pseudouser.'.jpg')?>"/>
  </div>
  <div id="haut_mongroupe">
    <img src="<?php echo image('Users/Profil/'.$pseudouser.'.jpg')?>"/>
    <h1><?php echo $_SESSION['user']['pseudo'] ?></h1>
    <div id="menu_mongroupe">
      <nav>
        <ul style='margin-top:15px;'>
          <a href="<?php goToPage('profil')?>" id="selectionne"><li><?php echo lang('Informations personnelles') ?></li></a>
          <a href="<?php  goToPage('groupesUtilisateur')?>" id="non_selectionne"><li><?php echo lang('Gérer mes groupes') ?></li></a>
          <a href="<?php  goToPage('planningUtilisateur')?>" id="non_selectionne"><li><?php echo lang('Planning') ?></li></a>
          <a id="creergroupe" href="<?php goToPage('creationgroupe')?>" ><li><?php echo lang('Créer un groupe') ?></li></a>
        </ul>
      </nav>
    </div>
  </div>

  <div class="profil">
    <div class="forme_case radius_mongroupe infos_profil">
      <div class="titre"><h1><?php echo lang('Informations personnelles')?>: </h1></div>
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
      <div class="infos">
        <div class="bouttonchangemdp">
          <?php echo lang('Changer son mot de passe') ?> </a></li>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <ul>
            <li>
              <?php echo lang('Photo de profil') ?> : (1Mo max)
              <div class="import">
                <img class="classImage UploadedImage" style="padding:0px;margin-top:10px;" <?php if(file_exists(image('Users/Profil/'.$pseudouser.'.jpg'))){?>  src="<?php echo image('Users/Profil/'.$pseudouser.'.jpg')?>"
              <?php  }?>/>
                <label for="photo" class="boutonInputFile" style="width:60%; margin:10px auto;"><?php echo lang("Importer un fichier") ?></label>
                <input id="photo" class="files" type="file" name="photo" style="display:none; ">
              </div>
            </li>
            <li><?php echo lang('Photo de couverture')?> (5Mo max)
              <div class="import">
                <img class="classImage UploadedImage" style="padding:0px;margin-top:10px;" <?php if(file_exists(image('Users/Bannière/'.$pseudouser.'.jpg'))){?> src="<?php echo image('Users/Bannière/'.$pseudouser.'.jpg')?>" <?php }?>/>
                <label for="couverture" class="boutonInputFile" style="width:60%; margin:10px auto;"><?php echo lang("Importer un fichier") ?></label>
                <input id="couverture" class="files" type="file" name="couverture" style="display:none;">
              </div>
            </li>
            <li>Email <span style="color:red;">*</span> : <div id="modifprofil" style="display:inline-block;" title="<?php echo $_SESSION['user']['email']?>" class="modifier_profil"><?php showProfil('email');?></div></li>
            <li><?php echo lang('Nom') ?><span style="color:red;">*</span>: <div id="modifprofil" style="display:inline-block;" title="<?php echo $_SESSION['user']['nom']?>" class="modifier_profil"><?php showProfil('nom');?></div></li>
            <li><?php echo lang('Prénom') ?><span style="color:red;">*</span>: <div id="modifprofil" style="display:inline-block;" title="<?php echo $_SESSION['user']['prenom']?>" class="modifier_profil"><?php showProfil('prenom');?></div></li>
            <li><?php echo lang('Sexe') ?><span style="color:red;">*</span>  : <div id="modifprofil" style="display:inline-block;" title="<?php echo $_SESSION['user']['sexe']?>" class="modifier_profil"><?php showProfil('sexe');?> </div></li>
            <li><?php echo lang('Adresse') ?> : <div id="modifprofil" style="display:inline-block;" title="<?php echo $_SESSION['user']['adresse']?>" class="modifier_profil"><?php showProfil('adresse');?> </div></li>
            <li><?php echo lang('Téléphone') ?>  : <div id="modifprofil" style="display:inline-block;" title="<?php echo $_SESSION['user']['numero_telephone']?>" class="modifier_profil"><?php showProfil('numero_telephone');?> </div></li>
            <li><?php echo lang('Lieu de naissance')?> : <div id="modifprofil" style="display:inline-block;"  title="<?php echo $_SESSION['user']['naissance']?>" class="modifier_profil"><?php showProfil('naissance');?> </div></li>
            <li>
              <div style="vertical-align:top; display:inline-block;">
                <?php echo lang('Ville') ?> <span style="color:red;">*</span> :
              </div>
              <div id="modifprofil" class="modifier_profil_ville" style="display:inline-block;"  title="<?php echo $nomville ?>">
                <?php if(isset($nomville)){ echo $nomville; }else{ echo "<i style='font-size:13px;'>".lang('Non spécifié')."</i>";;}?>
              </div>
            </li>
            <li><span id="modifprofil" class="modifier_profil_submit"><img class="imgeditprofile" title="<?php echo lang('Editer les informations')?>" src="<?php echo image('Users/icone_modifier.png')?>" onclick="modifier_profil()"/></span></li>
          </ul>
        </form>
      </div>
    </div>
  </div>
</div>
