<div class="backgroundimage usualbackground">
  <span>
    <div class="container centre">
        <h1><?php echo ucfirst($sport['nom']) ?></h1>
        <h3><i><?php echo ucfirst($sport['description']) ?></i></h3>
    </div>
    <div class="centre">
      <a href="<?php goToPage('recherchegroupe')?>">
        <h1 style="color:red;">Accéder à la recherche avancée de groupes.</h1>
      </a>
    </div>
  </span>
  <div class="backgroundimage image usualbackground" style="background-image:url(<?php echo $photo['photo']?>);"></div>
</div>
