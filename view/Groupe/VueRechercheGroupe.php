<div style="text-align:center">
  <h1>Nom du sport</h1>
</div>
<div class="filtre">
  <p><em> Filtres:</em> </p>
  <select  class="recherchefiltre" name="Catégorie">
    <option value="value 1">Catégorie</option>
  </select>
  <select class="recherchefiltre" name="Ville">
    <option value="value 1">Ville</option>
  </select>
  <select class="recherchefiltre" name="Niveau"> <!--a compléter-->
    <option value="value 1">Débutant</option>
    <option value="value 2">Club</option>
    <option value="value 2">Professionnel</option>
  </select>
  <div id="boutonrecherche"><solid>Rechercher</solid></div>
</div>

<div class="recherchegroupe">
  <?php foreach ($groupe as $key => $value): ?>
    <div id="<?php echo $i ?>"  class="groupe">
      <div class="imagegroupe usualbackground" style="background-image:url(asset/images/sport.png);"> </div>
      <div class="nomgroupe">
        <h3><?php echo $value['nom'] ?></h3>
        <p style="background-color:rgb(226, 195, 34)">Sport</p>
        <p>Catégorie</p>
        <p>Ville</p>
        <p>Niveau</p>
      </div>
      <div id="descriptiongroupe"> Homines enim eruditos et sobrios ut infaustos et inutiles vitant, eo quoque accedente quod et nomenclatores adsueti haec et talia venditare, mercede accepta lucris quosdam et prandiis inserunt subditicios ignobiles et obscuros.
      </div>
    </div>
  <?php endforeach; ?>

</div>
