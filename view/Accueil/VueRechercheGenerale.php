<div class="BlockVille">
  <div class="headerVille">
    <div class="left-block">
      Villes
    </div>
    <div class="right-block">
      + de villes ..
    </div>
  </div>
<?php if (count($rechercheVille) == 0) :?>
     <span style='font-size:20px; padding-top:15px; color:black;'>Aucune ville trouvée.</span>
  <?php endif; ?>
  <ul style="padding:7px;">
  <?php foreach ($rechercheVille as $key => $value) :?>
    <li onclick="get(this.innerHTML)"><?php echo $value['name'] ?></li>
  <?php endforeach; ?>
  </ul>
</div>

<hr class="separation">

<div class="BlockVille">
  <div class="headerVille">
    <div class="left-block">
      Groupes
    </div>
    <div class="right-block">
      + de groupes ..
    </div>
  </div>
<?php if (count($recherchegroupe) == 0) :?>
     <span style='font-size:20px; padding-top:15px; color:black;'>Aucun groupe trouvé.</span>
  <?php endif; ?>
  <ul>
  <?php foreach ($recherchegroupe as $key => $value) :?>
    <li onclick="get(this.innerHTML)"><?php echo $value['nom'] ?></li>
  <?php endforeach; ?>
</div>

<div class="separation"></div>

<div class="BlockVille">
  <div class="headerVille">
    <div class="left-block">
      Utilisateurs
    </div>
    <div class="right-block">
      + d'utilisateurs ..
    </div>
  </div>
<?php if (count($rechercheuser) == 0) :?>
     <span style='font-size:20px; padding-top:15px; color:black;'>Aucun utilisateur trouvé.</span>
  <?php endif; ?>
  <ul>
  <?php foreach ($rechercheuser as $key => $value) :?>
    <li onclick="get(this.innerHTML)"><?php echo $value['pseudo'] ?></li>
  <?php endforeach; ?>
</div>
