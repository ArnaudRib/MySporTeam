<!DOCTYPE html>

<?php setlocale(LC_ALL, "fr_FR") ?>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="calendrier.css">
  <title>Calendrier de ouf</title>
</head>

<div class="Calendrier">
  <div class="side">
    <label class="green">
      <input type="checkbox" name="cal-1" checked="true" id="cal-1" onchange="refreshCal(this)" calendrier="1">
      <label>calendrier 1</label>
    </label>
    <label for="cal-2" class="red">
      <input type="checkbox" name="cal-2" checked="true" id="cal-2" onchange="refreshCal(this)" calendrier="2">
      <label>calendrier 2</label>
    </label>
  </div>

  <?php $year = date('Y');
  for ($i=0; $i < 12; $i++) {
    $numb_of_days[$i] = cal_days_in_month(CAL_GREGORIAN, $i+1, intval($year));
  }
  ?>

    <?php for ($mois = 1; $mois < 13; $mois++): ?>
      <?php $decalage = date('w', strtotime($year."-$mois-01")); ?>
      <?php if ($decalage == 0) $decalage = 7; ?>
      <?php
      $taille = ceil(($decalage + $numb_of_days[$mois-1]-1)/7)*7;
      ?>
    <div class="cal" id="<?php echo $mois ?>">
    <h2><?php echo ucfirst(strftime('%B', mktime(0,0,0,$mois, 10))) ?> <?php echo date('Y') ?></h2>
    <div class="nav" id="next" onclick="changeCal(1)">></div>
    <div class="nav" id="previous" onclick="changeCal(-1)"><</div>
    <table>
      <thead>
        <tr>
          <td>Lundi</td>
          <td>Mardi</td>
          <td>Mercredi</td>
          <td>Jeudi</td>
          <td>Vendredi</td>
          <td>Samedi</td>
          <td>Dimanche</td>
        </tr>
      </thead>
        <tr>
          <?php $d = 1; ?>
      <?php for ($i = 0; $i < $taille; $i++): ?>
        <?php if ($i % 7 == 0 && $i != $taille): ?>
        </tr>
        <tr>
        <?php endif; ?>
        <?php if ($i < $decalage -1 || $i > $numb_of_days[$mois-1] + $decalage-2): ?>
          <td class="disabled">

          </td>
        <?php else: ?>
          <td>
            <h2><?php echo $d < $numb_of_days[$mois-1]+1 ? $d : null; $d++; ?></h2>
            <span class="event green" calendrier="1">
              Event1
            </span>
            <span class="event red" calendrier="2">
              Event 2
            </span>
          </td>
        <?php endif; ?>
      <?php endfor; ?>
        </tr>
    </table>
  </div>
  <?php endfor; ?>
</div>


 </html>
