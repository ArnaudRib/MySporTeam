<div class="faq encadrementTitre blackborder radius">
  <h1> FAQ </h1>
</div>

<div class="question">
    <div class="container light-background">
      <?php foreach ($aide as $type => $contenu) :?>
        <?php $hauteur=50+80*(count($contenu)); ?>
        <div class="blockSection blackborder radius light-blue-background" style="<?php echo 'height:'.$hauteur.'px;'?>">
          <h2 class="TitreSection centre radius">
            <?php echo $type ?>
          </h2>
        <div class="block80">
        <?php foreach ($contenu as $questionreponse) :?>
          Q : <?php echo ($questionreponse[0]);?></br>
          R : <?php echo ($questionreponse[1]);?></br></br>
        <?php endforeach; ?>
      </div>
    </div>
      <?php endforeach; ?>


    </div>

</div>
