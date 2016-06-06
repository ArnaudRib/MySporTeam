<!--Partie Popup-->
<div id="GeneralPopUp" class="GeneralPopUp">
  <p class="closeButtonPopup" onclick="closePopUp2()">&#10006;</p>
  <div id="FirstdivPopUp" class="FirstdivPopUp" style="width:100%; height:100%;">
    <div class="searchgeneral">
      <input id="searchgeneral" class="barRecherche" type="text" placeholder="Entrez votre recherche" style="padding-left:50px;" name="name" value="" onkeyup="getresults2(this.value, event); out(event)" autocomplete="off" onfocus="showsearch()" spellcheck="false">
      <p id="resultatsrecherche">
        <span style="font-size:20px; padding-top:15px; color:black;">Veuillez compléter le champ recherche...</span>
      </p>
    </div>
  </div>
</div>

<header>
  <div class="menuheader">
    <div class="menu">
      <div class="logo">
        <a href="<?php goToPage("Accueil") ?>"><img src="<?php echo image('General/Logomysporteam.png')?>"/></a>
      </div>
      <nav class="menuderoulant">
        <ul>
          <?php if(isLogged()): ?>
          <li> <a style="color:white;" href='<?php goToPage('Accueil'); ?>'><?php echo lang('Accueil') ?></a></li>
          <li> <a style="color:white;" href='<?php goToPage('profil'); ?>'><?php echo lang('Mon profil') ?></a></li>
          <li> <a style="color:white;" href='<?php goToPage('forum');?>'><?php echo lang('Forum') ?></a></li>
          <?php if(isAdmin()): ?>
            <li> <a style="color:white;" href='<?php goToPage('backoffice');?>'>BackOffice</a></li>
          <?php endif; ?>
          <li> <a href="<?php goToPage('deconnexion');?>"><img src="<?php echo image('General/bouton_on-off.png') ?>" width="20px" height="20px"/></a></li>
          <?php else: ?>
            <li> <a style="color:white;" href='<?php goToPage('Accueil'); ?>'><?php echo lang('Accueil') ?></a></li>
            <li> <a style="color:white;" href='<?php goToPage('forum');?>'><?php echo lang('Forum') ?></a></li>
            <li> <a style="color:white;" href="<?php goToPage('connexion');?>"><?php echo lang('Connexion') ?></a></li>
          <?php endif; ?>
          <li class="fa fa-search loupe" onclick="ShowSearchModal()"></li>
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
        <?php if(isLogged()): ?>
          <li> <a style="color:white;" href='<?php goToPage('Accueil'); ?>'><?php echo lang('Accueil') ?></a></li>
          <li> <a style="color:white;" href='<?php goToPage('profil'); ?>'><?php echo lang('Mon profil') ?></a></li>
          <li> <a style="color:white;" href='<?php goToPage('forum');?>'><?php echo lang('Forum') ?></a></li>
          <li> <a href="<?php goToPage('deconnexion');?>"><img src="<?php echo image('General/bouton_on-off.png') ?>" width="20px" height="20px"/></a></li>
        <?php else: ?>
          <li> <a style="color:white;" href='<?php goToPage('Accueil'); ?>'><?php echo lang('Accueil') ?></a></li>
          <li> <a style="color:white;" href='<?php goToPage('forum');?>'><?php echo lang('Forum') ?></a></li>
          <li> <a style="color:white;" href="<?php goToPage('connexion');?>"><?php echo lang('Connexion') ?></a></li>
        <?php endif; ?>
        <li class="fa fa-search loupe" onclick="ShowSearchModal()"></li>
      </ul>
    </nav>
  </div>
</header>
