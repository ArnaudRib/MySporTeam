<!--Partie Popup-->
<?php foreach ($groupes as $key => $value): ?>
  <div id="modalinfo<?php echo $value['id']?>" class="modalinfo">
    <div id="insideModalInfo<?php echo $value['id']?>" class="insideModalInfo">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModal(this)" style="">&#10006;</p>
      <p style="position:absolute;font-color:red;"><?php  echo $value['id'] ?></p>
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
              <td id="<?php echo $value['id']?>" class="supprCell" onclick="modaldelete(this)"><p class="closeButton"  style="top:65px;">&#10006;</p></td>
            </tr>
        <?php endforeach; ?>
      </table>
  </div>
</div>
