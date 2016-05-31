<div class="BlockVille">
  <div class="headerVille">
    <div class="left-block">
      <?php echo lang("Villes") ?>
    </div>
    <div class="right-block">
      <?php echo lang("+ de villes ..") ?>
    </div>
  </div>
<?php if (count($rechercheVille) == 0) :?>
     <span style='font-size:20px; padding-top:15px; color:black;'><?php echo lang("") ?>Aucune ville trouvée.</span>
  <?php endif; ?>
  <ul style="padding:7px;">
  <?php foreach ($rechercheVille as $key => $value) :?>
    <li onclick="get(this.innerHTML)"><?php echo $value['name']?></li>
  <?php endforeach; ?>
  </ul>
</div>

<hr class="separation">

<div class="BlockVille">
  <div class="headerVille">
    <div class="left-block">
      <?php echo lang("Groupes") ?>
    </div>
    <div class="right-block">
      <?php echo lang("+ de groupes ..") ?>
    </div>
  </div>
<?php if (count($recherchegroupe) == 0) :?>
     <span style='font-size:20px; padding-top:15px; color:black;'><?php echo lang("Aucun groupe trouvé.") ?></span>
  <?php endif; ?>
  <ul>
  <?php foreach ($recherchegroupe as $key => $value) :?>
    <li onclick="get(this.innerHTML)"><?php echo $value['nom']?></li>
  <?php endforeach; ?>
</div>

<div class="separation"></div>

<div class="BlockVille">
  <div class="headerVille">
    <div class="left-block">
      <?php echo lang("Utilisateurs") ?>
    </div>
    <div class="right-block">
      <?php echo lang("+ d'utilisateurs ..") ?>
    </div>
  </div>
<?php if (count($rechercheuser) == 0) :?>
     <span style='font-size:20px; padding-top:15px; color:black;'><?php echo lang("Aucun utilisateur trouvé.") ?></span>
  <?php endif; ?>
  <ul>
  <?php foreach ($rechercheuser as $key => $value) :?>
    <li onclick="get(this.innerHTML)"><?php echo $value['pseudo']?></li>
  <?php endforeach; ?>
</div>
