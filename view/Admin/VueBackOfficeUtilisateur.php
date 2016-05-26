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
          <th>Pseudo</th>
          <th>Adresse email</th>
          <th>Nombre de groupes</th>
          <th>Nombres de posts sur le forum</th>
          <th style="background-color:rgb(85, 182, 244);">Plus d'informations</th>
        </tr>
        <?php foreach ($users as $key => $value): ?>
            <tr>
              <td><?php echo ucfirst($value['pseudo']) ?></td>
              <td class="centre"><?php echo $value['email'] ?></td>
              <td><?php echo $nbGroupeUsers[$value['id']] ?></td>
              <td><?php echo $nbPostUsers[$value['id']] ?></td>
              <td id="<?php echo $value['id']?>" class="infoCell" onclick="modalinfo(this)"><p class="plusButton" style="top:65px;">+</p></td>
            </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
