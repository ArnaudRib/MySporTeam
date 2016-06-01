<?php
// function showProfil($data) {
//   if($_SESSION['user'][$data] != "-" AND $_SESSION['user'][$data] !=1) {
//     echo $_SESSION['user'][$data];
//   }
//   else {
//     echo "";
//   }
// }

//
// echo uploadPhoto($_SESSION['user']['id'].'.jpg', "Users/Profil", "photo_profil");
// echo uploadPhoto($_SESSION['user']['id'].'.jpg', "Users/Bannière", "photo_couverture");
?>

<div class="fond_mongroupe">
  <div id="image_de_fond">
    <img src="<?php echo image('Users/Bannière/'.$_SESSION['user']['id'].'.jpg')?>"/>
  </div>
  <div id="haut_mongroupe">
    <img src="<?php echo image('Users/Profil/'.$_SESSION['user']['id'].'.jpg')?>"/>
    <h1><?php echo $_SESSION['user']['pseudo'] ?></h1>
    <div id="menu_mongroupe">
      <nav>
        <ul style='margin-top:15px;'>
          <a href="#" id="selectionne"><li><?php echo lang('Informations personnels') ?></li></a>
          <a href="<?php  goToPage('',['id'=>'1', 'id_publication'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Gérer mes groupes') ?></li></a>
          <a href="<?php  goToPage('',['id'=>'1', 'id_evenement'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Planning') ?></li></a>
          <a id="creergroupe" href="<?php goToPage('creationgroupe')?>" ><li><?php echo lang('Créer un groupe') ?></li></a>
        </ul>
      </nav>
    </div>
  </div>

  <div class="profil">
    <div class="forme_case radius_mongroupe infos_profil">
      <div class="titre"><h1><?php echo lang('Informations personnelles :') ?> </h1></div>
      <div class="infos">
        <form class="" action="" method="post" enctype="multipart/form-data">
          <ul>
            <li><?php echo lang('Photo de profil') ?>  :  (1Mo max):  <input type="file" name="photo_profil" /><input type="submit" name="submit" value="-"></li>
            <li>Photo de couverture (5Mo max):  <input type="file" name="photo_converture" /></li>
            <li><?php echo lang('Email') ?> <?php showProfil('pseudo');?></li>
            <li>Email : <span class="modifier_profil"><?php showProfil('email');?></span></li>
            <li><a href=""> <?php echo lang('changer son mot de passe') ?> </a></li>
            <li><?php echo lang('Nom') ?> : <span class="modifier_profil"><?php showProfil('nom');?></span></li>
            <li><?php echo lang('Prénom') ?> : <span class="modifier_profil"><?php showProfil('prénom');?></span></li>
            <li><?php echo lang('Sexe') ?>  : <span class="modifier_profil"><?php showProfil('sexe');?> </span></li>
            <li><?php echo lang('Adresse') ?> : <span class="modifier_profil"><?php showProfil('adresse');?> </span></li>
            <li><?php echo lang('Téléphone') ?>  :  <span class="modifier_profil"><?php showProfil('numero_telephone');?> </span></li>
            <li><?php echo lang('Lieu de naissance') ?> : <span class="modifier_profil"><?php showProfil('naissance');?> </span></li>
            <li><?php echo lang('Ville') ?> : <span class="modifier_profil"><?php showProfil('id_ville');?></span></li>
            <li><span class="modifier_profil_submit"><img src="<?php echo image('Users/icone_modifier.png')?>" onclick="modifier_profil()"/></span></li>
          </ul>
        </form>
      </div>
    </div>
  </div>
</div>
