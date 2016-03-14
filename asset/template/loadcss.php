<?php
function loadcss($nomcss){ //Sous forme de tableau!
  foreach ($nomcss as $nom) {
    echo '<link rel="stylesheet" href="asset/css/'.$nom.'">';
  }
}
 ?>
