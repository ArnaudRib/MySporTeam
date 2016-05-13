
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
  <div class="block95 card">
    <div class="header">
      <h4 class="title">Liste des sports</h4>
      <p class="sousheader">
        <i> Cliquez sur une ligne pour modifier. </p>
      </p>
    </div>
    <div class="content">
      <table>
        <tr>
          <th>Nom</th>
          <th>Nombre de groupes associés</th>
          <th>Description</th>
          <th>Type</th>
        </tr>
        <?php foreach ($sports as $key => $value): ?>
            <tr class="lignesport" onclick="location.href='<?php goToPage('backofficeAsport', ['id_sport'=>$value['id']]) ?>'">
              <td><?php echo ucfirst($value['nom']) ?></td>
              <td class="centre"><?php echo $nbgroupe[$value['id']]?></td>
              <td><?php echo $value['description'] ?></td>
              <td><?php echo $types[$value['id_type']-1]['titre'] ?></td>
            </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>

  <div class="centre">
  	<button id="boutonADD" class="btn btn-4 btn-4a" onclick="displayAdd()">
      Ajouter un sport <span style="font-size:25px; padding-left:30%;">+</span>
    </button>
    <button id="boutonREMOVE" class="btn btn-4 btn-4a backbuttonred hidden" onclick="displayAdd()">
      Annuler <span style="font-size:20px; padding-left:40%;">x</span>
    </button>
  </div>

  <div id="Add" class="hiddensize">
    <div class="block95 card">
      <div class="header">
        <h4 class="title">Ajouter un sport</h4>
        <p class="sousheader">
          <i>Remplissez les informations qui suivent.</p>
        </p>
      </div>
      <div class="block80">
        <form class="" action="#" method="post">
          <fieldset>
            <label for="pseudo">Nom du sport</label>
            <input type="text" class="inputfieldset" name="pseudo" placeholder="Email ou Pseudo" required >
            <textarea name="description" rows="3" cols="75" placeholder="Description du sport"></textarea>

            <select class="" name="id_type" style="display:block;">
              <option selected value=""> --- Types --- </option>
              <?php foreach ($types as $key => $value): ?>
                <option value="<?php echo $i?>"> <?php echo $value['titre'] ?></option>
              <?php endforeach; ?>
            </select>

            <input type="submit" name="Envoyer" value="Se connecter" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:8px;">
          </fieldset>
        </form>
      </div>
    </div>
  </div>

</div>
