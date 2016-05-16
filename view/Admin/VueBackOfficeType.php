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


    <a href="<?php goToPage('backofficegroupe')?>">
      <li class="nextline">
          <i class="fa fa-users"></i>
          <p>Groupes</p>
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
    <p class="title">Types</p>
    <i class="subtitle">Modifications des types de sports.</i>
  </div>
  <div class="block95 card">
    <div class="header">
      <h4 class="title">Liste des sports</h4>
      <p class="sousheader">
        <i> Cliquez sur une ligne pour modifier. </p>
      </p>
    </div>
    <div class="block80" style='margin:0 auto;'>
      <?php $i=1;?>
      <?php foreach ($types as $key => $value): ?>
        <div class="typesport">
          <div class="titretype">
            Type n°<?php echo $i?> : <?php echo $value['titre']?>
          </div>
          <div class="bouttons">
            <button type="button" class="BoutonType modifyboutton" name="Modify">Modifier</button>
            <button type="button" class="BoutonType deleteboutton" name="Delete">Supprimer</button>
          </div>
        </div>
        <?php $i+=1; ?>
      <?php endforeach; ?>

      <div class="centre">
      	<button id="boutonADD" class="btn btn-4 btn-4a" onclick="displayAdd()">
          Ajouter un type <span style="font-size:25px; padding-left:30%;">+</span>
        </button>
        <button id="boutonREMOVE" class="btn btn-4 btn-4a backbuttonred hidden" onclick="displayAdd()">
          Annuler <span style="font-size:20px; padding-left:40%;">x</span>
        </button>
      </div>

    </div>

  </div>

</div>
