<div class="bodybackground">
  <div class="blockrecherchegroupe">

<div class="container" style="margin:0 auto;">
  <div  id="FiltreRechercheSport" class="filtre">
    <form class="filtreGroupeForm" action="recherchegroupe" method="post">
      <div class="blockfiltretitre" style="width:100%;">
        <h2 class="FiltreH1" style="display:inline-block;"><?php echo lang('Aucun événement') ?></h1>
          <span id="bouttonfiltre" class="plusboutton fa fa-plus" style="display:inline-block;" onclick="displayFiltre()"></span>
        </div>
        <div class="search">
            <input id="search" class="barRecherche blackborder" type="text" class="form-control" name="ville" value="" style="width:70%; margin: 10px 0px; font-size:15px;" placeholder="Ville"  onkeyup="getresults(this.value, event); out(event)" autocomplete="off" onfocus="showsearch()" spellcheck="false">
            <p id="results">
              <span style="font-size:20px; padding-top:30px;"><?php echo lang('Veuillez rentrer un nom de ville.') ?></span>
            </p>
          </div>
        <div class="niveau">
          <h3><?php echo lang('Niveau') ?></h2>
            <?php $i=1; ?>
            <?php foreach ($niveau as $key => $value): ?>
              <div class="eachniveau">
                <input type="radio" name="niveau" id="niveau<?php echo $i ?>" value="<?php echo $i?>">
                <label for="niveau<?php echo $i ?>"><?php echo $value['nom'] ?></label>
              </div>
              <?php $i+=1; ?>
            <?php endforeach; ?>
          </div>
          <div class="sportblock">
            <select class="sportSelect" name="sport">
              <option selected value=""> --- <?php echo lang('Sport') ?> --- </option>
              <?php foreach ($types as $key => $value): ?>
                <option value="<?php echo $i?>"> <?php echo $value['nom'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <input type="submit" class="buttonsubmit" name="filtre">
        </form>
      </div>

      <div class="recherchegroupe">
        <?php foreach ($groupe as $key => $value): ?>
          <?php $nomgroupe=str_replace(' ', '-', $value['nom']);?>
          <a href="<?php goToPage('informationsgroupe', ['id'=> $value['id']])?>">
            <div id="<?php echo $i=count($groupe) ?>"  class="groupe">
              <div style="width:100%; display:block;">
                <div class="imagegroupe usualbackground" style="background-image:url('<?php echo image('Groupes/Profil/'.$nomgroupe.'.jpg') ?>');"> </div>
                <div class="nomgroupe">
                  <h3 class="titregroupe"><?php echo $value['nom'] ?></h3>
                  <p style="background-color:rgb(226, 195, 34)"><?php echo lang('Sport') ?><p>
                    <p><?php echo lang('Catégorie') ?></p>
                    <p><?php echo $value['localisation']?></p>
                    <p><?php echo lang('Niveau') ?></p>
                </div>
              </div>
              <div class="descriptiongroupe"> <?php echo $value['description']?></div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
