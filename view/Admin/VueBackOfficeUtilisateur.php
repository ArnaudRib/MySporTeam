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
      <li class="nextline active">
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
    <p class="title">Utilisateurs</p>
    <i class="subtitle">Modération des utilisateurs du site.</i>
  </div>
  <div class="block95 card">
    <div class="header">
      <h4 class="title">Liste des utilisateurs.</h4>
      <p class="sousheader">
        <i> Cliquez sur une ligne pour modifier. </p>
      </p>
    </div>
    <div class="content_tableau">
      <table>
        <tr class="header_tableau">
          <th>Nom</th>
          <th>Nombre de groupes associés</th>
          <th>Description</th>
          <th>Type</th>
        </tr>
        <?php foreach ($sports as $key => $value): ?>
            <tr class="lignesport" style="cursor:pointer;" onclick="location.href='<?php goToPage('backofficeAsport', ['id_sport'=>$value['id']]) ?>'">
              <td><?php echo ucfirst($value['nom']) ?></td>
              <td class="centre"><?php echo $nbgroupe[$value['id']]?></td>
              <td><?php echo $value['description'] ?></td>
              <td><?php echo $types[$value['id_type']-1]['titre'] ?></td>
            </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
