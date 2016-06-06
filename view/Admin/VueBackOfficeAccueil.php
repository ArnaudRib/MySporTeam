<div class="sidebar">
  <a href="<?php goToPage('Accueil')?>">
  <div class="TitreSite">
    <?php echo lang("MySporTeam") ?>
  </div>
</a>
  <ul class="menu">
    <a href="<?php goToPage('backoffice')?>">
      <li class="nextline active">
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
      <li class="nextline">
          <i class="fa fa-hand-spock-o"></i>
          <p><?php echo lang("Aide") ?></p>
      </li>
    </a>

  </ul>
</div>




<div class="main-panel">
  <div class="navbar navbar-header">
    <p class="title"><?php echo lang("Gestion des données du site") ?></p>
    <i class="subtitle"><?php echo lang("Statistiques") ?></i>
  </div>
  <div class="block95 card">
    <div class="header">
      <div style="display:inline-block;">
        <h4 class="title"><?php echo lang("Statistiques Importantes") ?> </h4>
        <p class="sousheader">
          <?php echo lang('Chiffres clés');?>
        </p>
      </div>
      <div style="block95">
        <div class="Figures">
          <div class="card" style="width:70%; margin:0 auto;box-shadow:0px 0px 5px black;">
            <div class="TitreStat">
              Nombre d'Utilisateurs
            </div>
            <div class="StatsFigure">
              <?php echo $nbuser['nbuser'] ?>
            </div>
          </div>
        </div>

        <div class="Figures">
          <div class="card" style="width:70%; margin:0 auto;box-shadow:0px 0px 5px black;">
            <div class="TitreStat">
              Nombre de Groupes
            </div>
            <div class="StatsFigure">
              <?php echo $nbgroupe['nbgroup']?>
            </div>
          </div>
        </div>

        <div class="Figures">
          <div class="card" style="width:70%; margin:0 auto; box-shadow:0px 0px 5px black;">
            <div class="TitreStat">
              Nombre de vues totales (forum)
            </div>
            <div class="StatsFigure">
              <?php echo $nbvues['nbvues'] ?>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="centered-content">

    </div>
  </div>
</div>
