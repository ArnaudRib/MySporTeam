<!--Partie Modal Modification-->
<?php foreach ($users as $key => $value): ?>
  <div id="modalinfo<?php echo $value['id']?>" class="modalinfo">
    <div id="insideModalInfo<?php echo $value['id']?>" class="insideModalInfo">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalInfo(this)">&#10006;</p>
      <div class="block95 card" style="margin-top:80px;">
        <img width="50px" height="50px" style="display:inline-block;float:right;margin-right:30px;" src="<?php if($value['sexe']=='H'){echo image('svg/homme.svg'); }else{ echo image('svg/femme.svg');}?>" alt="" />
        <div class="header">
          <h4 class="title" style="margin-left:10px; text-align:left;">Modérer l'utilisateur <?php echo $value['pseudo']?>.</h4>
          <p class="sousheader" style="text-align:left;">
            <i>Effectuez vos changements.</i>
          </p>
        </div>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="card" style="padding-bottom:20px;">
            <input type="hidden" name="id_user" value="<?php echo $value['id']?>">
            <div class="content-imggroupe">
              <h4 class="title" style="margin-left:10px;">Image de l'utilisateur</h4>
              <img class='classImage imguser' src="<?php echo image('Users/Profil/'.$value['id'].'.jpg')?>" alt=""/>
              <label for="photo" class="boutonInputFile modifgroupeimg">Modifier</label>
              <input id="photo" class="files" type="file" name="photo" style="display:none;">
            </div>
            <div class="infouser">
              <h3 style='margin-bottom:10px;'>Informations :</h3>
              <div class="content-input">
                <label class="textlabel" for="pseudo">Pseudo</label>
                <input id="pseudo" type="text" name="pseudo" value="<?php echo $value['pseudo']?>" >
              </div>
              <div class="content-input">
                <label class="textlabel" for="email">Email</label>
                <input id="email" type="email" name="pseudo" value="<?php echo $value['email']?>">
              </div>
              <div class="content-input">
                <label class="textlabel" for="Numéro">Numéro</label>
                <input id="Numéro" type="text" name="numero" value="<?php echo $value['numero_telephone']?>">
              </div>
              <div class="content-box">
                <div class="radiobox">
                  <label  for="NonAdmin">Non Admin</label>
                  <input style=" height:15px;" id="NonAdmin" type="radio" name="admin" value="0" <?php if($value['admin_util']==0) { echo 'selected checked'; }; ?>>
                </div>
                <div class="radiobox">
                  <label for="Admin">Admin</label>
                  <input style="height:15px;" id="Admin" type="radio" name="admin" value="1" <?php if($value['admin_util']==1) { echo 'selected checked'; }; ?>>
                </div>
              </div>
            </div>
            <div style="text-align:center;">
              <button type="submit" class="BoutonType deleteboutton" style="width:80%;" name="deleteuser">Supprimer l'utilisateur.</button>
            </div>
            <!-- RAJOTUER ICI LA SUITE DES TRUCS DU USER.-->
          </div>
          <input type="submit" name="modifieruser" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:0px; width:100%; margin-top:20px;" value="Enregistrer les modifications">
        </form>
      </div>
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
