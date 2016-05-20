<!--Partie Modal Modification-->
<?php foreach ($groupes as $key => $value): ?>
  <div id="modalinfo<?php echo $value['id']?>" class="modalinfo">
    <div id="insideModalInfo<?php echo $value['id']?>" class="insideModalInfo">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalInfo(this)">&#10006;</p>
      <div class="block95 card" style="margin-top:50px;">
        <div class="header">
          <h4 class="title" style="margin-left:10px; text-align:left;">Modifications des informations du groupe.</h4>
          <p class="sousheader" style="text-align:left;">
            <i>Effectuez vos changements.</p>
          </p>
        </div>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="card">
            <input type="hidden" name="id_groupe" value="<?php echo $value['id']?>">
            <div class="content-imggroupe">
              <h4 class="title" style="margin-left:10px;">Image du groupe</h4>
              <img class='classImage imggroupe' src="<?php echo image('Groupes/Profil/'.$value['id'].'.jpg')?>" alt=""/>
              <label for="photo" class="boutonInputFile modifgroupeimg">Modifier</label>
              <input id="photo" class="files" type="file" name="photo" style="display:none;">
            </div>
            <div class="content-descriptiongroupe">
              <label for="description" style="display:block;">Modifier la description : </label>
              <textarea name="description" style="display:block; border:1px black solid; margin:10px auto; border-radius:10px; padding:5px;" rows="3" cols="75" maxlength="30" placeholder="Description du sport (MAX : 30 caractères)."><?php echo $value['description'] ?></textarea>
            </div>
            <!-- RAJOTUER ICI LA SUITE DES TRUCS DU GROUPE.-->
          </div>
          <input type="submit" name="modifiergroupe" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:0px; width:100%; margin-top:20px;" value="Enregistrer les modifications">
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!--Partie Modal Suppression-->
<?php foreach ($groupes as $key => $value): ?>
  <div id="modalsuppr<?php echo $value['id']?>" class="modalsuppr">
    <div id="insideModalSuppr<?php echo $value['id']?>" class="insideModalSuppr">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalSuppr(this)">&#10006;</p>
    </div>
  </div>
<?php endforeach; ?>



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
      <li class="nextline active">
          <i class="fa fa-users"></i>
          <p>Groupes</p>
      </li>
    </a>

    <a href="<?php goToPage('backofficetype')?>">
      <li class="nextline">
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
    <p class="title">Groupes</p>
    <i class="subtitle">Supervision des groupes.</i>
  </div>
  <div class="block95 card">
    <div class="header">
      <h4 class="title">Liste des sports</h4>
      <p class="sousheader">
        <i> Cliquez sur une ligne pour modifier. </p>
      </p>
    </div>
    <div class="content_tableau">
      <table>
        <tr class="header_tableau">
          <th>Nom du groupe</th>
          <th>Nombre de membres</th>
          <th style="background-color:rgb(85, 182, 244);">Plus d'informations</th>
          <th style='background-color:rgb(255, 61, 61);'>Supprimer</th>
        </tr>
        <?php foreach ($groupes as $key => $value): ?>
            <tr class="">
              <td><?php echo ucfirst($value['nom']) ?></td>
              <td class="centre"><?php echo $nbmembres[$value['id']]?></td>
              <td id="<?php echo $value['id']?>" class="infoCell" onclick="modalinfo(this)" ><p class="plusButton" style="top:65px;">+</p></td>
              <td id="<?php echo $value['id']?>" class="supprCell" onclick="modalSuppr(this)"><p class="closeButton"  style="top:65px;">&#10006;</p></td>
            </tr>
        <?php endforeach; ?>
      </table>
  </div>
</div>
