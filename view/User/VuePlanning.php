<div class="fond_mongroupe">
  <div id="image_de_fond">
    <img src="<?php echo image('Users/.png')?>"/>
  </div>
  <div id="haut_mongroupe">
    <img src="<?php echo image('Users/.png')?>"/>
    <h1><?php echo $_SESSION['user']['pseudo'] ?></h1>
    <div id="menu_mongroupe">
      <nav>
        <ul style='margin-top:15px;'>
          <a href="#" id="selectionne"><li><?php echo lang('Informations personnels') ?></li></a>
          <a href="<?php  goToPage('',['id'=>'1', 'id_publication'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Gérer mes groupes') ?></li></a>
          <a href="<?php  goToPage('',['id'=>'1', 'id_evenement'=>'1'])?>" id="non_selectionne"><li><?php echo lang('Planning') ?></li></a>
          <a id="creergroupe" href="<?php goToPage('creationgroupe')?>" ><li><?php echo lang('Créer un groupe') ?></li></a>
        </ul>
      </nav>
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
              <?php $d=1; ?>
              <?php for ($i = 0; $i < $taille; $i++): ?>
                <?php if ($i % 7 == 0): ?>

                  <tr>
                  <?php endif; ?>
                  <?php if ($i < $decalage -1 || $i > $numb_of_days[$mois-1] + $decalage-2):
                    ?>
                    <td class="disabled">
                    </td>
                  <?php else: ?>
                    <td>
                      <div class="chiffreSemaine"><?php echo $d < $numb_of_days[$mois-1]+1 ? $d : null; $d++; ?></div>
                      <?php
                      $d = $d < 10 ? "0{$d}" : $d;
                      $month = $mois < 10 ? "0{$mois}" : $mois;
                      $date="{$year}-{$month}-{$d}";
                      $showedEvent=0;
                      foreach ($events as $key => $value) {
                        if($value['date'] == $date) {
                          $showedEvent++;
                          ?><div class="event">.</div><?php
                        }
                      }
                      if($showedEvent>0) {
                        ?><div class="infos_event"><p> Informations dbbbvbe dvbvdjbj dsvbjdj sdv s</p></div><?php
                      }
                      ?>
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
