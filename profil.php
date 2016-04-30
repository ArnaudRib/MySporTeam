<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="stylesheet.css"/>
  <link rel="stylesheet" href="calendrier.css"/>
  <title>Page Groupe</title>
  <meta charset="utf-8" />
</head>


<body>
  <!--Menu en haut de la page-->
  <?php include("header.php"); ?>
  <div class="haut_mongroupe">
    <div class="hautdugroupe">
      <img id="image_mongroupe" src="Images/sport3.jpg"/>
      <h1>Mon profil</h1>
      <div class="menu_mongroupe">
        <nav>
          <ul>
            <a href="javascript:showonlyone('informations_profil');" ><li>Informations</li></a>
            <a href="javascript:showonlyone('groupes_profil');" ><li>Groupes</li></a>
            <a href="javascript:showonlyone('calendrier_profil');" ><li>Planning</li></a>
            <a href="deconnexion.php"><li><img id="bouton_on-off" src="Images/bouton_on-off.png" /></li></a>
          </ul>
        </nav>
      </div>
    </div>
  </div>

  <div class="profil" id="informations_profil">

    <div class="gauche_profil">
      <ul>
        <h1>Groupes</h1>
        <li>FootClub</li>
        <li>TennisClub</li>
        <li>RugbyClub</li>
        <li>FightClub</li>
      </ul>

      <ul>
        <h1>Sports</h1>
        <li>Football</li>
        <li>Tennis</li>
        <li>Rugby</li>
        <li>Boxe</li>
      </ul>
    </div>

    <div class="corps_profil">
      <ul>
        <li id="actualite">
          <h1>AuteurPublication</h1>
          <h2>GroupePublication -- date</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat.</p>
        </li>
        <li id="actualite">
          <h1>AuteurPublication</h1>
          <h2>GroupePublication -- date</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat.</p>
        </li><li id="actualite">
          <h1>AuteurPublication</h1>
          <h2>GroupePublication -- date</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat.</p>
        </li>
      </ul>
    </div>
  </div>

  <div class="profil" id="groupes_profil">
    <div id="groupe">
      <h1>Nom du groupe</h1>
      <h2> son niveau </h2>
      <p>
        Informations sur le groupe : Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris.
        Vestibulum maximus libero id sapien tempor placerat.
      </p>
      <a href="">Prochain evenement</a>
    </div>
  </div>

  <div class="profil" id="calendrier_profil">
    <div class="calendrier">
      <?php
      $year = date('Y');
      $currentMonth = date('n');
      for ($i=0; $i < 12; $i++) {
        $numb_of_days[$i] = cal_days_in_month(CAL_GREGORIAN, $i+1, intval($year));
      }
      ?>

      <?php for($mois=1;$mois<13;$mois++): ?>
        <?php
        $decalage = date('w', strtotime($year."-$mois-01"));
        if ($decalage == 0) $decalage = 7;
        $taille = ceil(($decalage + $numb_of_days[$mois-1]-1)/7)*7;


        ?>
        <?php if($mois==$currentMonth) : ?>
          <div class="mois" id="<?php echo $mois ?>" style="display: inline;">
          <?php else : ?>
            <div class="mois" id="<?php echo $mois ?>" style="display: none;">
            <?php endif; ?>
            <button class="nav" id="next" onclick="changeMois(1)">></button>
            <button class="nav" id="previous" onclick="changeMois(-1)"><</button>
            <h2><?php echo ucfirst(strftime('%B', mktime(0,0,0,$mois, 10))) ?> <?php echo $year ?></h2>
            <table>
              <thead>
                <tr class="jourSemaine">
                  <td>Lundi</td>
                  <td>Mardi</td>
                  <td>Mercredi</td>
                  <td>Jeudi</td>
                  <td>Vendredi</td>
                  <td>Samedi</td>
                  <td>Dimanche</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php $d=1; ?>
                  <?php for ($i = 0; $i < $taille; $i++): ?>
                    <?php if ($i % 7 == 0): ?>
                    </tr>
                    <tr>
                    <?php endif; ?>
                    <?php if ($i < $decalage -1 || $i > $numb_of_days[$mois-1] + $decalage-2):
                      ?>
                      <td class="disabled">
                      </td>
                    <?php else: ?>
                      <td>
                        <span class="chiffreSemaine"><?php echo $d < $numb_of_days[$mois-1]+1 ? $d : null; $d++; ?></span>
                        <div class="event important">Evenement 1</div>
                        <div class="event pas_important">Event 2</div>
                      </td>
                    <?php endif;?>

                  <?php endfor;?>
                </tr>
              </tbody>
            </table>
          </div>
        <?php endfor;?>
      </div>
    </div>

    <script type="text/javascript" src="calendrier.js"></script>
    <script type="text/javascript" src="profil.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
  </body>
