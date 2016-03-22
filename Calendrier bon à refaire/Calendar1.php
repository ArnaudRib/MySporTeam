<?php

# FORME DES EVENEMENTS
#
# [ "nom-calendrier" => [ "0" => ["date1", "titre", "descrition"],
#                         "1" => ["date2", "titre", "descrition"]
#                       ],
#   "nom-calendrier1" => [...]
# ]
#

function daysInMonth($date)
{
  $month = intval(date('m', $date));
  $year = intval(date('Y', $date));
  return cal_days_in_month(CAL_GREGORIAN, $month, $year);
}

function Calendar($range = 12, $events)
{
  echo '<div class="calendrier">';
  if (count($events) > 1) {
    generateSidebar($events);
  }
  generateCalendar($range, $events);
  echo '</div>';
}

function generateSidebar($events)
{
  echo '<div class="sidebar">';
  $colorCount = 0;
  foreach ($events as $cal => $event) {
    $color = getColor($events, $colorCount);
    $colorCount++;
    ?>
    <label class="calendar-label" style="background-color:<?php echo $color ?>">
      <input type="checkbox" name="cal-1" checked="true" onchange="refreshCal(this)" calendrier="<?php echo $cal ?>">
      <label><?php echo $cal ?></label>
    </label>
  <?php
  }
  echo '</div>';
}

function generateCalendar($range, $events)
{
  for ($k=-$range/2; $k < 1+($range/2); $k++) {
    $date = strtotime($k.' months');
    $strdate = explode("-",date('m-Y', $date));
    $days = daysInMonth($date);
    $decalage = date('w', strtotime($strdate[1]."-".$strdate[0]."-01")) == "0" ? 6 : date('w', strtotime($strdate[1]."-".$strdate[0]."-01"))-1 ;
    $taille = ceil(($decalage + $days)/7)*7;
    $day = 1;
    ?>
    <div class="cal" id="<?php echo ltrim($strdate[0], 0) ?>">
      <h2><?php echo ucfirst(strftime('%B', $date)) ?> <?php echo $strdate[1]; ?></h2>
      <button class="nav" id="next" onclick="changeCal(1)">〉</button>
      <button class="nav" id="previous" onclick="changeCal(-1)">〈</button>
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
      <?php for ($i = 0; $i < $taille; $i++): ?>
        <?php
        if (date('Ymd') == date('Ym',$date).sprintf('%02d', $day)) {
          $today = "today";
        } else {
          $today = "";
        }
        ?>
        <?php if ($i % 7 == 0 && $i != $taille): ?>
        </tr>
        <tr>
        <?php endif; ?>
        <?php if ($i < $decalage || $i > $days + $decalage-1): ?>
          <td class="disabled">
          </td>
        <?php else: ?>
          <td>
            <h2 class="<?php echo $today ?>"><?php echo $d < $days+1 ? $day : null; ?></h2>
            <div class="event-list">
              <?php displayEvents($day, $strdate, $events); ?>
            </div>
            <?php displayModals($day, $strdate, $events); ?>
          </td>
          <?php $day++; ?>
        <?php endif; ?>
      <?php endfor; ?>
        </tr>
      </table>
    </div>
    <?php
    // echo $taille."<br>";
    // echo $decalage."<br>";
    // echo "mois: ".$strdate[0]."<br>";
    // echo "année: ".$strdate[1]."<br><br>";
  }
}

function getColor($events, $colorCount)
{
  $colorlist = [0,30,50,80,140,170,200,220,260];
  $numbCal = count($events);
  $fadelvl = floor($colorCount/count($colorlist));
  $color = $colorlist[$colorCount - $fadelvl * count($colorlist)];
  $fadelvl = 50-$fadelvl*8;
  $GLOBALS['colorCount']++;
  return "hsl(".$color.", 100%, ".$fadelvl."%)";
}

function displayEvents($day, $strdate, $events)
{
  $curdate = date("Y-m-d", strtotime($strdate[1].'-'.$strdate[0].'-'.$day));
  $colorCount = 0;
  $id = 0;
  foreach ($events as $cal => $event) {
    $color = getColor($events, $colorCount);
    $colorCount++;
    foreach ($event as $content) {
      // echo date('Y-m-d', strtotime($date))."  ".$curdate."<br>";
      if (date('Y-m-d', strtotime($content[0])) == $curdate) {
        ?>
        <span class="event" num="<?php echo $id ?>" day="<?php echo $day ?>" calendrier="<?php echo $cal ?>" style="background-color: <?php echo $color ?>" onclick="showModal(this)">
          <?php echo $content[1] ?>
        </span>
        <?php
        $id++;
      }
    }
  }
}

function displayModals($day, $strdate, $events)
{
  $curdate = date("Y-m-d", strtotime($strdate[1].'-'.$strdate[0].'-'.$day));
  $id = 0;
  $colorCount = 0;
  foreach ($events as $cal => $event) {
    $color = getColor($events, $colorCount);
    $colorCount++;
    foreach ($event as $content) {
      if (date('Y-m-d', strtotime($content[0])) == $curdate) {
        $horaires = date("H:i",strtotime($content[3]))." - ".date("H:i",strtotime($content[4]));
        ?>
        <div class="modal" num="<?php echo $id ?>" calendrier="<?php echo $cal ?>" day="<?php echo $day ?>">
          <div class="head" style="background-color: <?php echo $color ?>">
            <button onclick="hideModal(this)">╳</button>
            <h2><?php echo $content[1] ?></h2>
            <h3 class="subtitle"><?php echo $horaires ?></h3>
          </div>
          <p>
            <?php echo $content[2] ?>
          </p>
        </div>
        <?php
        $id++;
      }
    }
  }
}
