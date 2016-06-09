<!--Partie Modal Suppression topics-->
<?php foreach ($topics as $key => $value): ?>
  <div id="modalsuppr<?php echo $value['id']?>" class="modalsuppr">
    <div id="insideModalSuppr<?php echo $value['id']?>" class="insideModalSuppr">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalSuppr(this)">&#10006;</p>
      <p class="errorbox" style="font-style:normal; font-size:16px; margin:80px auto; padding: 40px 0;">
        <?php echo lang("Êtes-vous sûrs de vouloir supprimer ce topic ?") ?></br>
        <i style="font-size:13px;"><?php echo lang("Supprimer le topic effacera toutes les données qui lui sont relatives. Changements définitifs.") ?></i>
      </p>
      <div style='text-align:center; margin:40px auto; width:80%;'>
        <form class="" action="" method="post" style='display:inline-block; width:49%;'>
          <input type="hidden" name="id_topic" value="<?php echo $value['id']?>">
          <input type="submit" name="Suppr" value="Oui" class="btn btn-4 btn-4a" style='margin:0; width:100%; height:50px; text-align:center;'>
        </form>
        <button id="<?php echo $value['id']?>" type="button" name="button" style='display:inline-block; width:49%; text-align:center; margin:0;' class="btn btn-4 btn-4a" onclick="closeModalSuppr(this)">Non</button>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<!--Partie Modal Modification topics-->
<?php foreach ($topics as $key => $value): ?>
  <div id="modalinfo<?php echo $value['id']?>" class="modalinfo">
    <div id="insideModalInfo<?php echo $value['id']?>" class="insideModalInfo">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalInfo(this)">&#10006;</p>
      <div class="block95 card" style="margin-top:80px;">
        <div class="header">
          <h4 class="title" style="margin-left:10px; text-align:left;"><?php echo lang("Modérer le topic") ?> : <?php echo $value['titre']?>.</h4>
          <p class="sousheader" style="text-align:left;">
            <i><?php echo lang("Effectuez vos changements.") ?></i>
          </p>
        </div>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="card" style="padding-bottom:20px;">
            <input type="hidden" name="id_topic" value="<?php echo $value['id']?>">
            <div class="infouser">
              <h3 style='margin-bottom:10px;'><?php echo lang("Informations") ?> :</h3>
              <div class="content-input">
                <label class="textlabel" for="titre"><?php echo lang("Nom du topic") ?></label>
                <input id="titre" type="text" name="titre" value="<?php echo $value['titre']?>" >
              </div>
              <div class="content-descriptiongroupe">
                <label for="description" style="display:block;"><?php echo lang("Modifier la description") ?> : </label>
                <textarea name="description" style="display:block; border:1px black solid; border-radius:10px; padding:5px;" rows="3" cols="75" maxlength="30" placeholder="Description du topic (MAX : 30 caractères)."><?php echo $value['description']?></textarea>
              </div>
            </div>

            <!-- RAJOTUER ICI LA SUITE DES TRUCS DU Topic.-->
          </div>
          <input type="submit" name="modifiertopic" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:0px; width:100%; margin-top:20px;" value="Enregistrer les modifications">
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>




<!-- DISCUSSION -->
<!--Partie Modal Suppression discussions-->
<?php foreach ($discussions as $key => $value): ?>
  <div id="modalsuppr2<?php echo $value['id']?>" class="modalsuppr">
    <div id="insideModalSuppr2<?php echo $value['id']?>" class="insideModalSuppr">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalSuppr2(this)">&#10006;</p>
      <p class="errorbox" style="font-style:normal; font-size:16px; margin:80px auto; padding: 40px 0;">
        <?php echo lang("Êtes-vous sûrs de vouloir supprimer cette discussion ?") ?></br>
        <i style="font-size:13px;"><?php echo lang("Supprimer la discussion effacera toutes les données qui lui sont relatives. Changements définitifs.") ?></i>
      </p>
      <div style='text-align:center; margin:40px auto; width:80%;'>
        <form class="" action="" method="post" style='display:inline-block; width:49%;'>
          <input type="hidden" name="id_discussion" value="<?php echo $value['id']?>">
          <input type="submit" name="Supprdiscussion" value="Oui" class="btn btn-4 btn-4a" style='margin:0; width:100%; height:50px; text-align:center;'>
        </form>
        <button id="<?php echo $value['id']?>" type="button" name="button" style='display:inline-block; width:49%; text-align:center; margin:0;' class="btn btn-4 btn-4a" onclick="closeModalSuppr(this)">Non</button>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<!--Partie Modal Modification discussions-->
<?php foreach ($discussions as $key => $value): ?>
  <div id="modalinfo2<?php echo $value['id']?>" class="modalinfo">
    <div id="insideModalInfo2<?php echo $value['id']?>" class="insideModalInfo">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalInfo2(this)">&#10006;</p>
      <div class="block95 card" style="margin-top:80px;">
        <div class="header">
          <h4 class="title" style="margin-left:10px; text-align:left;"><?php echo lang("Modérer la discussion") ?> : <?php echo $value['titre']?>.</h4>
          <p class="sousheader" style="text-align:left;">
            <i><?php echo lang("Effectuez vos changements.") ?></i>
          </p>
        </div>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="card" style="padding-bottom:20px;">
            <input type="hidden" name="id_discussion" value="<?php echo $value['id']?>">
            <div class="infouser">
              <h3 style='margin-bottom:10px;'><?php echo lang("Informations") ?> :</h3>
              <div class="content-input">
                <label class="textlabel" for="titre"><?php echo lang("Titre de la discussion") ?></label>
                <input id="titre" type="text" name="titre" value="<?php echo $value['titre']?>" >
              </div>
              <div class="content-input">
                <label class="textlabel" for="id_topic"><?php echo lang("id Topic") ?></label>
                <input id="pseudo" type="number" name="id_topic" value="<?php echo $value['id_topic']?>" >
              </div>
            </div>
            <!-- RAJOTUER ICI LA SUITE DES TRUCS DU Topic.-->
          </div>
          <input type="submit" name="modifierdiscussion" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:0px; width:100%; margin-top:20px;" value="Enregistrer les modifications">
          <?php dump($_POST);?>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>



<!-- MESSAGESSS -->
<!--Partie Modal Suppression discussions-->
<?php foreach ($discussions as $key => $value): ?>
  <div id="modalsuppr2<?php echo $value['id']?>" class="modalsuppr">
    <div id="insideModalSuppr2<?php echo $value['id']?>" class="insideModalSuppr">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalSuppr2(this)">&#10006;</p>
      <p class="errorbox" style="font-style:normal; font-size:16px; margin:80px auto; padding: 40px 0;">
        <?php echo lang("Êtes-vous sûrs de vouloir supprimer cette discussion ?") ?></br>
        <i style="font-size:13px;"><?php echo lang("Supprimer la discussion effacera toutes les données qui lui sont relatives. Changements définitifs.") ?></i>
      </p>
      <div style='text-align:center; margin:40px auto; width:80%;'>
        <form class="" action="" method="post" style='display:inline-block; width:49%;'>
          <input type="hidden" name="id_discussion" value="<?php echo $value['id']?>">
          <input type="submit" name="Supprdiscussion" value="Oui" class="btn btn-4 btn-4a" style='margin:0; width:100%; height:50px; text-align:center;'>
        </form>
        <button id="<?php echo $value['id']?>" type="button" name="button" style='display:inline-block; width:49%; text-align:center; margin:0;' class="btn btn-4 btn-4a" onclick="closeModalSuppr(this)">Non</button>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<!--Partie Modal Modification discussions-->
<?php foreach ($discussions as $key => $value): ?>
  <div id="modalinfo2<?php echo $value['id']?>" class="modalinfo">
    <div id="insideModalInfo2<?php echo $value['id']?>" class="insideModalInfo">
      <p id="<?php echo $value['id']?>" class="closeButtonModal" onclick="closeModalInfo2(this)">&#10006;</p>
      <div class="block95 card" style="margin-top:80px;">
        <div class="header">
          <h4 class="title" style="margin-left:10px; text-align:left;"><?php echo lang("Modérer la discussion") ?> : <?php echo $value['titre']?>.</h4>
          <p class="sousheader" style="text-align:left;">
            <i><?php echo lang("Effectuez vos changements.") ?></i>
          </p>
        </div>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="card" style="padding-bottom:20px;">
            <input type="hidden" name="id_message" value="<?php echo $value['id']?>">
            <div class="infouser">
              <h3 style='margin-bottom:10px;'><?php echo lang("Informations") ?> :</h3>
              <div class="content-input">
                <label class="textlabel" for="titre"><?php echo lang("Titre de la discussion") ?></label>
                <input id="pseudo" type="text" name="titre" value="<?php echo $value['titre']?>" >
              </div>
              <div class="content-input">
                <label class="textlabel" for="id_topic"><?php echo lang("id Topic") ?></label>
                <input id="pseudo" type="number" name="id_topic" value="<?php echo $value['id_topic']?>" >
              </div>
              <div class="content-descriptiongroupe">
                <label for="texte" style="display:block;"><?php echo lang("Modifier le message") ?> : </label>
                <textarea name="texte" style="display:block; border:1px black solid; border-radius:10px; padding:5px;" rows="3" cols="75" maxlength="30" placeholder="Détail du message"> <?php echo $value['texte']?></textarea>
              </div>
            </div>
            <!-- RAJOTUER ICI LA SUITE DES TRUCS DU Topic.-->
          </div>
          <input type="submit" name="modifierdiscussion" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:0px; width:100%; margin-top:20px;" value="Enregistrer les modifications">
          <?php dump($_POST);?>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>




<div class="sidebar">
  <a href="<?php goToPage('Accueil')?>">
  <div class="TitreSite">
    <?php echo lang("MySporTeam") ?>
  </div>
</a>
  <ul class="menu">
    <a href="<?php goToPage('backoffice')?>">
      <li class="nextline">
          <i class="fa fa-home"></i>
          <p><?php echo lang("Accueil") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficeuser')?>">
      <li class="nextline">
          <i class="fa fa-user"></i>
          <p><?php echo lang("Utilisateurs") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficegroupe')?>">
      <li class="nextline">
          <i class="fa fa-users"></i>
          <p><?php echo lang("Groupes") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficeclub')?>">
      <li class="nextline">
          <i class="fa fa-odnoklassniki"></i>
          <p><?php echo lang("Clubs") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficetype')?>">
      <li class="nextline">
          <i class="fa fa-wrench"></i>
          <p><?php echo lang("Types") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficesport')?>">
      <li class="nextline">
          <i class="fa fa-heart"></i>
          <p><?php echo lang("Sports") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficeforum')?>">
      <li class="nextline active">
          <i class="fa fa-archive"></i>
          <p><?php echo lang("Forum") ?></p>
      </li>
     </a>

   <a href="<?php goToPage('backofficeaide')?>">
      <li class="nextline">
          <i class="fa fa-hand-spock-o"></i>
          <p><?php echo lang("Aide") ?></p>
      </li>
    </a>
  </ul>
</div>


<div class="main-panel">
  <div class="navbar navbar-header">
    <p class="title"><?php echo lang("Forums") ?></p>
    <i class="subtitle"><?php echo lang("Modération des topics et des discussions des forums du site.") ?></i>
  </div>
  <?php if($error!=''):?>
    <div class="errorbox blackborder radius" style="font-size:15px; margin: 20px auto; ">
      <?php echo $error;?>
    </div>
  <?php endif; ?>
  <?php if($succes!=''): ?>
    <div class="successbox blackborder radius" style='margin:20px auto;padding:20px;'>
      <?php echo $succes;?>
    </div>
  <?php endif; ?>
  <div class="block95 card">
    <div class="header">
      <h4 class="title"><?php echo lang("Liste des topics.") ?></h4>
      <p class="sousheader">
        <i> <?php echo lang("Cliquez sur une ligne pour modifier.") ?> </p>
      </p>
    </div>
    <div class="content_tableau">
      <table>
        <tr class="header_tableau">
          <th><?php echo lang("Nom du topic") ?></th>
          <th><?php echo lang("id Topic") ?></th>
          <th style="background-color:rgb(85, 182, 244);"><?php echo lang("Modifier") ?></th>
          <th style='background-color:rgb(255, 61, 61);'><?php echo lang("Supprimer") ?></th>
        </tr>
        <?php foreach ($topics as $key => $value): ?>
            <tr class="lignesport">
              <td><?php echo ucfirst($value['titre']) ?></td>
              <td><?php echo $value['id'] ?></td>
              <td id="<?php echo $value['id']?>" class="infoCell" onclick="modalinfo(this)"><p class="plusButton" style="top:65px;">+</p></td>
              <td id="<?php echo $value['id']?>" class="supprCell" onclick="modalSuppr(this)"><p class="closeButton"  style="top:65px;">&#10006;</p></td>
            </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>

  <div class="centre">
    <button id="boutonADD" class="btn btn-4 btn-4a" style="padding-right: 100px;" onclick="displayAdd()">
      <?php echo lang("Ajouter un topic") ?> <span style="font-size:25px; padding-left:30%;">+</span>
    </button>
    <button id="boutonREMOVE" class="btn btn-4 btn-4a backbuttonred hidden" onclick="displayAdd()">
      <?php echo lang("Annuler") ?> <span style="font-size:20px; padding-left:40%;">x</span>
    </button>
  </div>

  <div id="Add" class="hiddensize">
    <div class="block95 card">
      <div class="header">
        <h4 class="title"><?php echo lang("Ajouter un topic") ?></h4>
        <p class="sousheader">
          <i><?php echo lang("Remplissez les informations qui suivent.") ?></p>
        </p>
      </div>
      <div class="block80">
        <form class="" action="" method="post" enctype="multipart/form-data">
          <fieldset>
            <div class="ajoutclub">
            <div class="infoclub">
              <label class="textlabel" for="nom"><?php echo lang("Nom du topic") ?></label>
              <input type="text" value="<?php echo $_POST['titre']?>" class="inputfieldset" name="titre" placeholder="" required >
            </div>
            <div class="infoclub">
            <textarea name="description" style="border-radius: 10px 10px 10px 10px; margin-left: 4%;"value="<?php echo $_POST['description']?>" rows="3" cols="75" maxlength="30" placeholder="Description du topic (MAX : 50 caractères)."></textarea>
            </div>

            <input type="submit" name="addtopic" value="Ajouter un topic" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:8px;">
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>

<!-- FIN TOPIC-->

  <div class="block95 card">
    <div class="header">
      <h4 class="title"><?php echo lang("Liste des discussions.") ?></h4>
      <p class="sousheader">
        <i> <?php echo lang("Cliquez sur une ligne pour modifier.") ?> </p>
      </p>
    </div>
    <div class="content_tableau">
      <table>
        <tr class="header_tableau">
          <th><?php echo lang("Titre") ?></th>
          <th><?php echo lang("Date de création") ?></th>
          <th><?php echo lang('Vues')?></th>
          <th>id topic</th>
          <th>id discussion</th>
          <th style="background-color:rgb(85, 182, 244);"><?php echo lang("Modifier") ?></th>
          <th style='background-color:rgb(255, 61, 61);'><?php echo lang("Supprimer") ?></th>
        </tr>
        <?php foreach ($discussions as $key => $value): ?>
            <tr class="lignesport">
              <td><?php echo ucfirst($value['titre']) ?></td>
              <td><?php echo DiffDate($value['creation_date']) ?></td>
              <td><?php echo !empty($value['vues']) ? $value['vues'] : lang('Aucune vue.')?></td>
              <td><?php echo $value['id_topic'] ?></td>
              <td><?php echo $value['id'] ?></td>
              <td id="<?php echo $value['id']?>" class="infoCell" onclick="modalinfo2(this)"><p class="plusButton" style="top:65px;">+</p></td>
              <td id="<?php echo $value['id']?>" class="supprCell" onclick="modalSuppr2(this)"><p class="closeButton"  style="top:65px;">&#10006;</p></td>
            </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  <div class="centre">
    <button id="boutonADD2" class="btn btn-4 btn-4a" onclick="displayAdd2()">
      <?php echo lang("Ajouter une discussion") ?> <span style="font-size:25px; padding-left:30%;">+</span>
    </button>
    <button id="boutonREMOVE2" class="btn btn-4 btn-4a backbuttonred hidden" onclick="displayAdd2()">
      <?php echo lang("Annuler") ?> <span style="font-size:20px; padding-left:40%;">x</span>
    </button>
  </div>

  <div id="Add2" class="hiddensize">
    <div class="block95 card">
      <div class="header">
        <h4 class="title"><?php echo lang("Ajouter une discussion") ?></h4>
        <p class="sousheader">
          <i><?php echo lang("Remplissez les informations qui suivent.") ?></p>
        </p>
      </div>
      <div class="block80">
        <form class="" action="" method="post" enctype="multipart/form-data">
          <fieldset>
            <div class="ajoutclub">
            <div class="infoclub">
              <label class="textlabel" for="nom"><?php echo lang("Titre de la discussion") ?></label>
              <input type="text" value="<?php echo $_POST['titre']?>" class="inputfieldset" name="titre" placeholder="" required >
            </div>

            <div class="infoclub">
              <label class="textlabel" for="id_topic"><?php echo lang("id Topic") ?></label>
              <input type="text" value="<?php echo $_POST['id_topic']?>" class="inputfieldset" name="id_topic" placeholder="" required >
            </div>

            <input type="submit" name="adddiscussion" value="Ajouter une discussion" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:8px;">
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>

  <!-- FIN DISCUSSION-->


</div>
