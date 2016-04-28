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
      "../images/chintoc.jpg",
      "../images/sport.png",
      "../images/sport2.jpg",
      "../images/sport3.jpg"
      ]?>
    <?php CreationSlider($ListImg) ?>

    <script src="SliderSlide.js"></script>
  </body>

</html>
