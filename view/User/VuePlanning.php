<div class="fond_mongroupe">
  <div id="image_de_fond">
    <img src="<?php echo image('Users/Bannière/'.$pseudouser.'.jpg')?>"/>
  </div>
  <div id="haut_mongroupe">
    <img src="<?php echo image('Users/Profil/'.$pseudouser.'.jpg')?>"/>
    <h1><?php echo $_SESSION['user']['pseudo'] ?></h1>
    <div id="menu_mongroupe">
      <nav>
        <ul style='margin-top:15px;'>
          <a href="<?php goToPage('profil')?>" id="non_selectionne"><li><?php echo lang('Informations personnelles') ?></li></a>
          <a href="<?php  goToPage('groupesUtilisateur')?>" id="non_selectionne"><li><?php echo lang('Gérer mes groupes') ?></li></a>
          <a href="<?php  goToPage('planningUtilisateur')?>" id="selectionne"><li><?php echo lang('Planning') ?></li></a>
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
                    <td onclick="displayInfosEvent(<?= $d+1 ?>, <?= $mois?>)">
                      <div class="chiffreSemaine"><?php echo $d < $numb_of_days[$mois-1]+1 ? ($d < 10 ? "0{$d}" : $d) : null;  $d++;?></div>
                      <?php
                      $day = $d < 10 ? "0".($d-1)."" : $d-1;
                      $month = $mois < 10 ? "0{$mois}" : $mois;
                      $date= date("Y-m-d",mktime(0,0,0,$month, $day,$year));
                      $eventsDuJour=array();
                      $showedEvent=0;
                      foreach ($events as $key => $value) {
                        if(date('Y-m-d', strtotime($value['date_debut'])) == $date) {?>
                          <div class="event">
                            <?php echo $value['nom'];?>
                          </div>

                          <?php $showedEvent++;
                          $eventsDuJour[]=['nom'=>$value['nom'],'date_debut'=>$value['date_debut'],'date_fin'=>$value['date_fin'],'place'=>$value['places'],'description'=>$value['description']];
                        }
                      }?>
                      <?php if($showedEvent > 0): ?>
                        <div class="infos_event talkbubble" id="<?="infos_event_{$mois}_{$d}";?>" style="display:none;">
                          <?php
                          foreach ($eventsDuJour as $key => $value) {
                            ?><h3><?=$value['nom']?></h3>
                            <h4><?php echo '<span style="color:rgb(125, 125, 125);">From</span> '. date('l d F', strtotime($value['date_debut']))."</br>at ".date('H:i:s', strtotime($value['date_debut']));?></h4>
                            <h4><?php echo '<span style="color:rgb(125, 125, 125);">To</span> '. date('l d F', strtotime($value['date_fin']))."</br>at ".date('H:i:s', strtotime($value['date_fin']));?></h4>
                            <h4><span style="color:rgb(111, 111, 111);">Places</span> : <?=$value['place'] ?></h4>
                            <p style="font-size: 14px;font-style: italic; padding-left: 5px;"> <?=$value['description']?> <br> </p>
                            <hr style="border:1px rgba(99, 99, 99, 0.57) solid; margin:5px 15px;">
                          <?php
                        }?>
                      </div>
                    <?php endif;?>
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
