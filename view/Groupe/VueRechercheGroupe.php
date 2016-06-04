<div class="bodybackground">
  <div class="blockrecherchegroupe">

<div class="container" style="margin:0 auto;">
  <div  id="FiltreRechercheSport" class="filtre">
    <form class="filtreGroupeForm" action="recherchegroupe" method="post">
      <div class="blockfiltretitre" style="width:100%;">
        <h2 class="FiltreH1" style="display:inline-block;"><?php echo lang('Recherche de groupes') ?></h1>
          <span id="bouttonfiltre" class="plusboutton fa fa-plus" style="display:inline-block;" onclick="displayFiltre()"></span>
        </div>
        <p style="text-align:center; font-size:18px; margin:10px auto; margin-top:20px; width:60%;" class="infobox"><?php echo lang('Remplissez au moins un des champs')?>.</p>
        <div class="search">
          <input id="search" class="barRecherche blackborder" type="text" class="form-control" name="ville" value="" style="width:70%; margin: 10px 0px; font-size:15px;" placeholder="Ville"  onkeyup="getresults(this.value, event); out(event)" autocomplete="off" onfocus="showsearch()" spellcheck="false">
          <p id="results">
            <span style="font-size:20px; padding-top:30px;"><?php echo lang('Veuillez rentrer un nom de ville.') ?></span>
          </p>
        </div>
        <div class="niveau">
          <h3><?php echo lang('Niveau') ?></h2>
            <?php $i=0; ?>
            <?php foreach ($niveaux as $key => $value): ?>
              <div class="eachniveau">
                <input id="niveau<?php echo $i ?>" type="radio" name="niveau" value="<?php echo $value['id']?>">
                <label for="niveau<?php echo $i ?>"><?php echo lang($value['nom']) ?></label>
              </div>
              <?php $i++;?>
            <?php endforeach; ?>
          </div>
          <div class="sportblock">
            <select class="sportSelect" name="sport">
              <option selected value=""> --- <?php echo lang('Sport') ?> --- </option>
              <?php foreach ($sports as $key => $value): ?>
                <option value="<?php echo $value['id']?>"> <?php echo ucfirst($value['nom']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="sportblock">
            <select class="sportSelect" name="departement">
              <option selected value=""> --- <?php echo lang('Departement') ?> --- </option>
              <?php foreach ($departements as $key => $value): ?>
                <option value="<?php echo $value['departement_code']?>"><?php echo ucfirst($value['departement_code']) ?> - <?php echo ucfirst($value['name']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <input type="submit" class="buttonsubmit" name="rechercheAvancee">
        </form>
      </div>

      <div class="recherchegroupe">
        <?php foreach ($groupes as $key => $value): ?>
          <?php $nomgroupe=str_replace(' ', '-', $value['nom']);?>
          <?php $nomSport=str_replace(' ', '-', $sportGroupe[$value['id']]) ?>
          <a href="<?php goToPage('informationsgroupe', ['id'=> $value['id']])?>">
            <div id="<?php echo count($groupes) ?>"  class="groupe" style="background-image:url('<?php echo image("Svg/$nomSport.svg")?>')">
              <div style="width:90%; display: inline-flex;align-items: center;text-align:right; margin-left:10%;">
                <div class="imagegroupe usualbackground" style="background-image:url('<?php echo image('Groupes/Profil/'.$nomgroupe.'.jpg') ?>');"> </div>
                <div class="nomgroupe">
                  <h3 class="titregroupe"><?php echo $value['nom'] ?></h3>
                  <hr style="border:1px rgb(28, 7, 106) solid;margin-bottom:8px;">
                  <p style="background-color:rgba(99, 204, 255, 0.77);"><?php echo ucfirst($sportGroupe[$value['id']]) ?><p>
                  <p><u style="font-size:15px;">Niveau</u> : <?php echo $niveau[$value['id']] ?></p>
                  <p><u style="font-size:15px;">Ville</u> : <?php echo $villesGroupe[$value['id']]?></p>
                  <p><u style="font-size:15px;">Département</u> : <?php echo $departementGroupe[$value['id']][1]?> (<?php echo $departementGroupe[$value['id']][0]?>)</p>
                  <p style="margin:2px auto; width:60%; background-color:<?php echo $value['public']==1 ? 'rgb(47, 255, 80)' : 'rgb(255, 70, 70)' ?>"><?php echo $value['public']==1 ? 'Public' : 'Privé'?></p>
                </div>
              </div>
              <div class="descriptiongroupe">
                <u style="font-size:16px;"><?php echo lang('Description du groupe')?></u> </br>
                <?php echo $value['description']?>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
        <?php if(empty($groupes)):?>
          <div class="blockNoMatch">
            Aucun groupe ne semble correspondre à votre recherche. </br>Peut-être devriez-vous préciser moins de paramètres?
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
