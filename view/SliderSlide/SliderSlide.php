<!DOCTYPE html>
<?php include '../CreationSlider.php'; ?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="SliderSlide.css"/>
    <title>Test Slider</title>
  </head>
  <body>
    <!--SLIDER Slide-->
    <?php $ListImg=[
      "/mysporteam/asset/images/chintoc.jpg",
      "/mysporteam/asset/images/sport.png",
      "/mysporteam/asset/images/sport2.jpg",
      "/mysporteam/asset/images/sport3.jpg"
      ]?>
    <?php CreationSlider($ListImg) ?>

    <script src="SliderSlide.js"></script>
  </body>

</html>
