<div class="bodybackground">
  <div class="blockinscription">
    <nav id="creationgroupe"> <!-- remettre <nav id="creationgroupe"> si tu veux pas noir-->

      <?php if($isLeader==true):?>
      <form action="<?php  ?>" method="post" enctype="multipart/form-data" >
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
            <input id="nom" type="text" name="nom" placeholder="Nom événement" required/></div>
          <div style="display:block;margin-left:20px;">
            <label for="number" class="fa fa-line-chart labelnom"></label>
            <input id="number" type="number" placeholder="Nombre de participants" name="nombre" min="0" required/>
          </div>
          <div style="display:block;margin-left:20px;">
            <div class="search">
            <label for="ville" class="fa fa-home labelnom"></label>
            <input id="search" class="barRecherche blackborder" type="text" class="form-control" name="ville" value="" style="width:70%; margin: 10px 0px; font-size:15px;" placeholder="Ville"  onkeyup="getresults(this.value, event); out(event)" autocomplete="off" onfocus="showsearch()" spellcheck="false">
            <p id="results">
              <span style="font-size:20px; padding-top:30px;">Veuillez rentrer un nom de ville.</span>
            </p>
            </div>
          </div>
          <div style="display:block;margin-left:20px;">
            <label for="datetime" class="fa fa-home labelnom"></label>
            <input id="ville" type="datetime" name="date_debut" required/>
          </div>
          <div style="display:block;margin-left:20px;">
            <label for="datetime" class="fa fa-home labelnom"></label>
            <input id="ville" type="datetime" name="date_fin"required/>
          </div>

        <div class="ChangePictureSport">
          <label for="baniere" class="boutonInputFile">Ajouter une photo d'illustration</label>
          <input id="baniere" class="files" type="file" name="baniere" style="display:none;">
          <img class="UploadedImage classImage" />
        </div>

        <textarea class="areacreation" name="description" rows="10" cols="50" placeholder="Description"></textarea>

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
