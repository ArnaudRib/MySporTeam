<div class="bodybackground">
  <div class="blockinscription">
    <nav id="creationgroupe"> <!-- remettre <nav id="creationgroupe"> si tu veux pas noir-->

      <?php if($isLeader):?>
      <form class="" action="" method="post" enctype="multipart/form-data">
        <h1 class=""> <?php echo lang("Créer un événement") ?> </h1>
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
            <input id="nom" type="text" name="nom" placeholder="Nom événement" value="<?php if(!empty($_POST)){echo $_POST['nom'];}?>" required/></div>
          <div style="display:block;margin-left:20px;">
            <label for="number" class="fa fa-line-chart labelnom"></label>
            <input id="number" type="number" placeholder="Nombre de participants" name="nombre" value="<?php if(!empty($_POST)){echo $_POST['nombre'];}?>" min="0" required/>
          </div>
          <div style="display:block;margin-left:20px;">
            <div class="search">
            <label for="ville" class="fa fa-home labelnom"></label>
            <input id="search" class="" type="text" class="form-control" name="ville" placeholder="Ville"  value="<?php if(!empty($_POST)){echo $_POST['ville'];}?>" onkeyup="getresults(this.value, event); out(event)" autocomplete="off" onfocus="showsearch()" spellcheck="false">
            <p id="results">
              <span style="font-size:20px; padding-top:30px;">Veuillez rentrer un nom de ville.</span>
            </p>
            </div>
          </div>
          <div style="display:block;margin-left:20px;">
            <div class="titlehorraire">
              Date de début :
            </div>
            <label for="date_debut" class="fa fa-clock-o labelnom"></label>
            <input id="date_debut" type="text" class="heuresinput" name="date_debut" value="dd/mm/yyyy" required/>
            <select class="selecttemps" name="heure_debut">
              <option selected value=""><?php echo lang('Heure') ?></option>
              <?php for ($i=0; $i <24 ; $i++) :?>
                <option value="<?php if($i>=10){echo $i;}else{echo '00';} ?>"><?php if($i>=10){echo $i;}else{echo '0'.$i;} ?></option>
              <?php endfor ?>
            </select>
            <select class="selecttemps" name="minute_debut">
              <option selected value=""><?php echo lang('Minute') ?> </option>
              <?php for ($i=0; $i <60 ; $i++) :?>
                <option value="<?php if($i>=10){echo $i;}else{echo '00';} ?>"><?php if($i>=10){echo $i;}else{echo '0'.$i;} ?></option>
              <?php endfor ?>
            </select>
            <select class="selecttemps" name="seconde_debut">
              <option selected value=""><?php echo lang('Seconde') ?> </option>
              <?php for ($i=0; $i <61-0 ; $i++) :?>
                <option value="<?php if($i>=10){echo $i;}else{echo '0'.$i;} ?>"><?php if($i>=10){echo $i;}else{echo '0'.$i;} ?></option>
              <?php endfor ?>
            </select>

          </div>
          <div style="display:block;margin-left:20px;">
            <div class="titlehorraire">
              Date de fin :
            </div>
            <label for="date_fin" class="fa fa-clock-o labelnom"></label>
            <input id="date_fin" class="heuresinput" type="text" name="date_fin" value="dd/mm/yyyy" required/>
            <select class="selecttemps" name="heure_fin">
              <option selected value=""><?php echo lang('Heure') ?></option>
              <?php for ($i=0; $i <24 ; $i++) :?>
                <option value="<?php if($i>=10){echo $i;}else{echo '00';} ?>"><?php if($i>=10){echo $i;}else{echo '0'.$i;} ?></option>
              <?php endfor ?>
            </select>
            <select class="selecttemps" name="minute_fin">
              <option selected value=""><?php echo lang('Minute') ?> </option>
              <?php for ($i=0; $i <60 ; $i++) :?>
                <option value="<?php if($i>=10){echo $i;}else{echo '00';} ?>"><?php if($i>=10){echo $i;}else{echo '0'.$i;} ?></option>
              <?php endfor ?>
            </select>
            <select class="selecttemps" name="seconde_fin">
              <option selected value=""><?php echo lang('Seconde') ?> </option>
              <?php for ($i=0; $i <60 ; $i++) :?>
                <option value="<?php if($i>=10){echo $i;}else{echo '0'.$i;} ?>"><?php if($i>=10){echo $i;}else{echo '0'.$i;} ?></option>
              <?php endfor ?>
            </select>
          </div>

        <div class="ChangePictureSport">
          <label for="baniere" class="boutonInputFile">Ajouter une photo d'illustration</label>
          <input id="baniere" class="files" type="file" name="baniere" style="display:none;">
          <img class="UploadedImage classImage" />
        </div>

        <textarea class="areacreation" style="width:100%;" name="description" rows="10" cols="50" placeholder="Description"><?php if(!empty($_POST)){echo $_POST['description'];}?></textarea>

        <div style="text-align:center;">
          <input class="subboutton" id="submit" type="submit" name="Envoyer" value="Valider">
        </div>
      </fieldset>
    </form>
  <?php else:?>
    <h1>Erreur, vous n'êtes pas l'administrateur de groupe<h1>
    <?php endif;?>

    </nav>
  </div>
</div>
