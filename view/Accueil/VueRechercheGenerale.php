<div class="BlockVille">
  <div class="headerVille">
    <div style="text-align:center; font-size:25px;">
      <?php echo lang("Groupes") ?>
    </div>

  </div>
<?php if (count($recherchegroupe) == 0) :?>
     <span style='font-size:20px; padding-top:15px; color:black;'><?php echo lang("Aucun groupe trouvé.") ?></span>
  <?php endif; ?>
  <ul>
  <?php foreach ($recherchegroupe as $key => $value) :?>
    <?php $nomgroupe=str_replace(' ', '-', $value['nom']); ?>
    <a href="<?php echo goToPage('informationsgroupe', ['id'=>$value['id']])?>">
      <li onclick="get(this.innerHTML)">
        <div class="photogroupeRecherche">
          <img src="<?php echo image('Groupes/Profil/'.$nomgroupe.'.jpg')?>" class="imgRecherche" alt="" />
        </div>
        <div class="nomgroupeRecherche">
          <?php echo $value['nom']?>
        </div>
      </li>
    </a>
  <?php endforeach; ?>
</div>

<div class="separation"></div>

<div class="BlockVille">
  <div class="headerVille">
    <div style="text-align:center; font-size:25px;">
      <?php echo lang("Utilisateurs") ?>
    </div>
  </div>
<?php if (count($rechercheuser) == 0) :?>
     <span style='font-size:20px; padding-top:15px; color:black;'><?php echo lang("Aucun utilisateur trouvé.") ?></span>
  <?php endif; ?>
  <ul>
  <?php foreach ($rechercheuser as $key => $value) :?>
    <?php $pseudo=str_replace(' ', '-', $value['pseudo']); ?>
    <a href="<?php echo goToPage('profilUnUtilisateur', ['pseudo'=>$value['pseudo']])?>">
      <li onclick="get(this.innerHTML)">
        <div class="photogroupeRecherche">
          <img src="<?php echo image('Users/Profil/'.$pseudo.'.jpg')?>" class="imgRecherche" alt="" />
        </div>
        <div class="nomgroupeRecherche">
          <?php echo $value['pseudo']?>
        </div>
      </li>
    </a>
  <?php endforeach; ?>
</div>

<div class="separation"></div>

<div class="BlockVille">
  <div class="headerVille">
    <div style="text-align:center; font-size:25px;">
      <?php echo lang("Clubs") ?>
    </div>
  </div>
<?php if (count($rechercheclub) == 0) :?>
     <span style='font-size:20px; padding-top:15px; color:black;'><?php echo lang("Aucun club trouvé.") ?></span>
  <?php endif; ?>
  <ul>
  <?php foreach ($rechercheclub as $key => $value) :?>
    <?php $clubnom=str_replace(' ', '-', $value['nom']); ?>
    <a href="<?php echo goToPage('clubinfo', ['id_club'=>$value['id']])?>">
      <li onclick="get(this.innerHTML)">
        <div class="photogroupeRecherche">
          <img src="<?php echo image('Clubs/Bannière/'.$clubnom.'.jpg')?>" class="imgRecherche" alt="" />
        </div>
        <div class="nomgroupeRecherche">
          <?php echo $value['nom']?>
        </div>
      </li>
    </a>
  <?php endforeach; ?>
</div>
