<?php
function CreationSlider($ListImg)
{
  ?>
   <!--SLIDER FADE-->
  <div class="slider">
  <div class="navigation">
    <div class="flechenext" onclick="Next()"></div>
      <div class="flecheback rotate" onclick="Back()"></div>
    </div>
    <div class="notnavigation">
    <?php for ($i=0; $i < count($ListImg); $i++) {?>
    <div id="<?php echo $i+1 ?>" style="background-image:url('<?php echo $ListImg[$i] ?>');" class="<?php if ($i==0){echo "visible";}?>"></div>
    <?php  }?>
    </div>
  </div>
  </br>
<?php
}
?>
