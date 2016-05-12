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

    <a href="<?php goToPage('backofficesport')?>">
      <li class="nextline active">
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
    <p class="title">Sports</p>
    <i class="subtitle">Edition des sports.</i>
  </div>
  <div class="block95 hauteur80">
    <table>
      <tr>
        <th>Nom</th>
        <th>Nombre de groupes associés</th>
        <th>Description</th>
        <th>Type</th>
      </tr>
      <?php foreach ($sports as $key => $value): ?>
        <tr>
          <td><?php echo ucfirst($value['nom']) ?></td>
          <td class="centre"><?php echo $nbgroupe[$value['id']][0]['nbGroupe'] ?></td>
          <td><?php echo $value['description'] ?></td>
          <td><?php echo $types[$value['id_type']-1]['titre'] ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>
