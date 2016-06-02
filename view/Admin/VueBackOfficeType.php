<div class="sidebar">
  <a href="<?php goToPage('Accueil')?>">
    <div class="TitreSite">
      MySporTeam
    </div>
  </a>
  <ul class="menu">
    <a href="<?php goToPage('backoffice')?>">
      <li class="nextline">
          <i class="fa fa-home"></i>
          <p>Accueil</p>
      </li>
    </a>

    <a href="<?php goToPage('backofficeuser')?>">
      <li class="nextline">
          <i class="fa fa-user"></i>
          <p>Utilisateurs</p>
      </li>
    </a>

    <a href="<?php goToPage('backofficegroupe')?>">
      <li class="nextline">
          <i class="fa fa-users"></i>
          <p>Groupes</p>
      </li>
    </a>

    <a href="<?php goToPage('backofficeclub')?>">
      <li class="nextline">
          <i class="fa fa-users"></i>
          <p><?php echo lang("Clubs") ?></p>
      </li>
    </a>
    
    <a href="<?php goToPage('backofficetype')?>">
      <li class="nextline active">
          <i class="fa fa-wrench"></i>
          <p>Types</p>
      </li>
    </a>

    <a href="<?php goToPage('backofficesport')?>">
      <li class="nextline">
          <i class="fa fa-heart"></i>
          <p>Sports</p>
      </li>
    </a>

    <a href="<?php goToPage('backofficeforum')?>">
      <li class="nextline">
          <i class="fa fa-bed"></i>
          <p>Forum</p>
      </li>
    </a>

    <a href="<?php goToPage('backofficereglage')?>">
      <li class="nextline">
          <i class="fa fa-cog"></i>
          <p>Réglages</p>
      </li>
    </a>

  </ul>
</div>

<div class="main-panel">
  <div class="navbar navbar-header">
    <p class="title"><?php echo lang("Types") ?></p>
    <i class="subtitle"><?php echo lang("Modifications des types de sports.") ?></i>
  </div>
  <?php if(isset($_POST['type'])):
    if(empty($error)):?>
      <div class="successbox fa fa-check">
        <div style="margin-left:20px; display:inline-block;"><?php echo $succes; ?></div>
      </div>
    <?php else:?>
      <div class="errorbox fa fa-times-circle">
        <div style="margin-left:20px; display:inline-block;"><?php echo $error;?></div>
      </div>
    <?php endif; ?>
  <?php endif; ?>
  <div class="block95 card">
    <div class="header">
      <h4 class="title"><?php echo lang("Liste des sports") ?></h4>
      <p class="sousheader">
        <i> <?php echo lang("Cliquez sur une ligne pour modifier.") ?> </p>
      </p>
    </div>
    <div class="" style='margin:0 auto;'>
      <?php $i=1;?>
      <?php foreach ($types as $key => $value): ?>
        <form class="typesform" action="" method="post">
          <div class="typesport">
            <div class="titretype">
              <div style="display:inline-block;">Type n°<?php echo $i?> :</div>
              <input type="text" name="type" style="display:inline-block;" value="<?php echo $value['titre']?>">
              <input type="hidden" name="id_type" value="<?php echo $value['id']?>">
            </div>
            <div class="bouttons">
              <button type="submit" class="BoutonType modifyboutton" name="Modify">Modifier</button>
              <button type="submit" class="BoutonType deleteboutton" name="Delete">Supprimer</button>
            </div>
          </div>
        </form>
        <?php $i+=1; ?>
      <?php endforeach; ?>
    </div>
    <div class="centre">
    	<button id="boutonADD" class="btn btn-4 btn-4a" onclick="displayAdd()">
        <?php echo lang("Ajouter un type") ?><span style="font-size:25px; padding-left:30%;">+</span>
      </button>
      <button id="boutonREMOVE" class="btn btn-4 btn-4a backbuttonred hidden" onclick="displayAdd()">
        <?php echo lang("Annuler") ?>  <span style="font-size:20px; padding-left:40%;">x</span>
      </button>
    </div>

    <div id="Add" class="hiddensize">
      <div class="block95 card">
        <div class="header">
          <h4 class="title"><?php echo lang("Ajouter un type") ?></h4>
          <p class="sousheader">
            <i><?php echo lang("Remplissez les informations qui suivent.") ?></p>
          </p>
        </div>
          <form class="" action="" method="post">
            <fieldset>
              <label class="textlabel" for="nom"><?php echo lang("Nom du type") ?></label>
              <input type="text" class="inputfieldset" name="type" placeholder="Le nouveau type."  >
              <input type="submit" name="Add" value="Ajouter un type" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:8px;">
            </fieldset>
          </form>
      </div>
    </div>
  </div>
</div>
