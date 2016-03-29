<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="calendrier.css">
  <title>MySporTeam</title>
</head>
<body>
  <?php include("header.php"); ?>
  <div class="haut_calendrier" >
    <div class="titre_calendrier">
      <h1>Calendrier</h1>
    </div>
  </div>



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
    <script type="text/javascript" src="calendrier.js"></script>
  </body>
  </html>
