<?php
$tablab=['fr'=> image('General/Flags/fr.png'), 'en'=> image('General/Flags/en.png')];
?>

<footer style="text-align:center; margin:0 auto;">
  <div id="flags" class="visibility" style="text-align:center; margin:20px;">
    <?php foreach ($tablab as $key => $value): ?>
      <a href="/<?php echo $key ?>/">
      <img class="drapeau" src="<?php echo $value ?>" alt="" />
      </a>
    <?php endforeach; ?>
  </div>

  <div class="buttonlanguage" onclick="showlang()">
    Langues
  </div>
  <div style="display:inline-flex; align-items:center;">
    <div style="display:inline-block;">
      <a href=""><img class="imgfooter" src="<?php echo image('General/facebook.ico')?>" width="50px"/></a>
    </div>
    <div class="textfooter">
      Tout droits réservés, mySporteam<span style="font-size:13px;"><sup>TM</sup></span>.
    </div>
  </div>
</footer>

<script src="/asset/js/header.js"></script>
<script src="/asset/js/footer.js"></script>
