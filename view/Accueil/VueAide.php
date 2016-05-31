<div class="bodybackground">
  <div class="blockaide">

    <div class="faq encadrementTitre blackborder radius">
      <h1> <?php echo lang("FAQ") ?> </h1>
    </div>

    <div class="question">
      <div class="container light-background OmbreContainer centre">
        <?php foreach ($aide as $type => $contenu) :?>
          <?php $hauteur=50+90*(count($contenu)); ?>
          <div class="blockSection blackborder radius light-blue-background" style="<?php echo 'height:'.$hauteur.'px;'?>; text-align:left;">
            <h2 class="TitreSection centre radius">
              <?php echo $type ?>
            </h2>
            <div class="block80">
              <?php foreach ($contenu as $questionreponse) :?>
                <?php echo lang("Q") ?> : <?php echo ($questionreponse[0]);?></br>
                <?php echo lang("R") ?> : <?php echo ($questionreponse[1]);?></br></br>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
