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
      <li class="nextline">
          <i class="fa fa-archive"></i>
          <p><?php echo lang("Forum") ?></p>
      </li>
    </a>

    <a href="<?php goToPage('backofficeaide')?>">
      <li class="nextline active">
          <i class="fa fa-hand-spock-o"></i>
          <p><?php echo lang("Aide") ?></p>
      </li>
    </a>

  </ul>
</div>



<div class="main-panel">
  <div class="navbar navbar-header">
    <p class="title"><?php echo lang("ok") ?></p>
    <i class="subtitle"><?php echo lang("ok") ?></i>
  </div>

  <?php if(isset($_POST['addQuest'])):
    if(empty($error)):?>
      <div class="successbox fa fa-check">
        <div style="margin-left:20px; display:inline-block;"><?php echo lang("Modifications effectuées avec succès!") ?></div>
      </div>
    <?php else:?>
      <div class="errorbox fa fa-times-circle">
        <div style="margin-left:20px; display:inline-block;"><?php echo $error;?></div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <?php if(isset($_POST['delete'])):
    if(!empty($succes)):?>
      <div class="successbox fa fa-check">
        <div style="margin-left:20px; display:inline-block;"><?php echo lang("Modifications effectuées avec succès!"); ?></div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

    <div class="block95 card">
      <div class="header">
        <h4 class="title" style="margin-left:10px; text-align:left;"><?php echo lang("Modifications de la section aide") ?>.</h4>
        <p class="sousheader" style="text-align:left;">
          <i><?php echo lang("Effectuez vos changements.") ?></i>
        </p>
        <div class="block95 card">
          <div class="header">
            <h4 class="title" style="margin-left:10px; text-align:left;"><?php echo lang("Modifications des questions") ?>.</h4>
            <p class="sousheader" style="text-align:left;">Ajouter une question-réponse.</p>
          </div>
          <div class="centered-content">
            <form class="" action="" method="post">
              <fieldset style="margin:0 auto;">
                <div class="content-input">
                  <label class="textlabel" for="nom"><?php echo lang("Nom de la section") ?></label>
                  <input type="text" value="<?php echo $_POST['nom']?>" class="inputfieldset" name="section" placeholder="Groupe" required >
                </div>

                <div class="content-input">
                  <label class="textlabel" for="nom">Question</label>
                  <input type="text" value="<?php echo $_POST['nom']?>" class="inputfieldset" name="question" placeholder="Mais où est donc ornicar?" required >
                </div>

                <div class="content-input">
                  <label class="textlabel" for="nom"><?php echo lang("Réponse") ?></label>
                  <input type="text" value="<?php echo $_POST['nom']?>" class="inputfieldset" name="reponse" placeholder="Jack is in the kitchen." required >
                </div>
                <input type="submit" name="addQuest" value="Ajouter une question réponse" class="button button--moema button--text-thick button--text-upper button--size-s" style="padding:8px;">
              </fieldset>
            </form>
          </div>
        </div>
        <div class="block95 card">
          <p style='font-style:italic; text-align:center; font-size:16px; padding:10px;'>Prévisualisation de la section aide :</p>
          <div class="question">
            <div style="background-color:white;" class="container light-background OmbreContainer centre">
              <?php foreach ($aide as $type => $contenu) :?>
                <div class="blockSection radius blue" style="height:auto; text-align:left;">
                  <h2 class="TitreSection centre radius">
                    <?php echo $type ?>
                  </h2>
                  <div class="block80" style="margin:0 auto;">
                      <?php foreach ($contenu as $questionreponse) :?>
                        <form class="" action="" method="post">
                          <label for="delete" class="closeButtonModal" style="font-size:20px; float:right; margin-top:5px; margin-left:10px;">&#10006;</label>
                          <input name="id_aide"  type="hidden" value="<?php echo $questionreponse[2] ?>">
                          <div class="question-reponse">
                            <div style="font-weight:bold"><?php echo lang("Q") ?> : <?php echo ($questionreponse[0]);?></br></div>
                            <?php echo lang("R") ?> : <?php echo ($questionreponse[1]);?></br></br>
                            </div>
                          <input type='submit' name="delete" id="delete" style="display:none;">
                        </form>
                      <?php endforeach; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
