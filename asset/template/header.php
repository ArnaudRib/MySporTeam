<header>
  <span style="color:white;">Pages faites (TEMPORAIRE):
    <a style="color:white; margin: 0px 20px;" href='<?php goToPage('Accueil'); ?>'>Accueil</a>
    <a style="color:white;margin: 0px 20px;" href="<?php goToPage('informationsgroupe',['id'=>'1']);?>">Pages groupe</a>
    <a style="color:white;margin: 0px 20px;" href="<?php goToPage('connexion');?>">connexion</a>
    <a style="color:white;margin: 0px 20px;" href='<?php goToPage('inscription');?>'>inscription</a>
    <a style="color:white;margin: 0px 20px;" href='<?php goToPage('recherchegroupe');?>'>recherchegroupe</a>
    <a style="color:white;margin: 0px 20px;" href='<?php goToPage('forum');?>'>forum</a>
    <a style="color:white;margin: 0px 20px;" href='<?php goToPage('creationgroupe');?>'>creationgroupe</a>
    <a style="color:white;margin: 0px 20px;" href='<?php goToPage('aide');?>'>aide</a>
    <a style="color:white;margin: 0px 20px;" href='<?php goToPage('backoffice');?>'>Admin</a>
    <a style="color:white;margin: 0px 20px;" href="<?php goToPage('sportgroupe',['id_sport'=>'1']);?>">groupe/Sport(accessible depuis page principale sur photo)</a>
  </span>


<div class="menuheader">
  <div class="menu">
    <div class="logo">
      <a href="<?php goToPage("Accueil") ?>"><img src="<?php echo image('General/Logomysporteam.png')?>"/></a>
    </div>
    <nav class="menuderoulant">
      <ul>
        <?php if(isLogged()): ?>
        <li> <a style="color:white;" href='<?php goToPage('Accueil'); ?>'>Accueil</a></li>
        <li> <a style="color:white;" href='<?php goToPage('profil'); ?>'>Mon profil</a></li>
        <li> <a style="color:white;" href='<?php goToPage('forum');?>'>Forums</a></li>
        <li> <a href="<?php goToPage('deconnexion');?>"><img src="<?php echo image('General/bouton_on-off.png') ?>" width="20px" height="20px"/></a></li>
        <?php else: ?>
          <li> <a style="color:white;" href='<?php goToPage('Accueil'); ?>'>Accueil</a></li>
          <li> <a style="color:white;" href='<?php goToPage('forum');?>'>Forums</a></li>
          <li> <a style="color:white;" href="<?php goToPage('connexion');?>">Connexion</a></li>
        <?php endif; ?>
        <li>
          <input type="text" class="barRecherche" placeholder="Entrez votre recherche" name="Recherche"/></li>
      </ul>
    </nav>
  </div>
  <div class="boutonmenu" onclick="showmenu()">☰</div>
</div>

<div class="menushort">
  <div class="logo2">
    <a href="<?php goToPage("Accueil") ?>"><img src="<?php echo image('General/Logomysporteam.png')?>"/></a>
  </div>
  <nav>
      <ul>
        <li> <input type="searchbar" placeholder="Entrez votre recherche" name="Recherche"/></li>
        <?php if(isLogged()): ?>
        <li> <a style="color:white;" href='<?php goToPage('Accueil'); ?>'>Accueil</a></li>
        <li> <a style="color:white;" href='<?php goToPage(''); ?>'>Mon profil</a></li>
        <li> <a style="color:white;" href='<?php goToPage('forum');?>'>Forums</a></li>
        <li> <a href="<?php goToPage('deconnexion');?>"><img src="<?php echo image('General/bouton_on-off.png') ?>" width="20px" height="20px"/></a></li>
        <?php else: ?>
          <li> <a style="color:white;" href='<?php goToPage('Accueil'); ?>'>Accueil</a></li>
          <li> <a style="color:white;" href='<?php goToPage('forum');?>'>Forums</a></li>
          <li> <a style="color:white;" href="<?php goToPage('connexion');?>">Connexion</a></li>
        <?php endif; ?>
    </ul>
  </nav>
</div>



</header>
