<!DOCTYPE html>
<?php require_once ('../../config/generalFunctions.php'); ?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="SliderSlide.css"/>
    <title>Test Slider</title>
  </head>
  <body>
    <!--SLIDER Slide-->
    <?php $ListImg=[
      "/asset/images/chintoc.jpg",
      "/asset/images/sport.png",
      "/asset/images/sport2.jpg",
      "/asset/images/sport3.jpg"
      ]?>
    <?php GenerateSlider($ListImg) ?>

    <script src="SliderSlide.js"></script>
  </body>

</html>
