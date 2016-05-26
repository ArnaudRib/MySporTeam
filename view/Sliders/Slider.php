<!DOCTYPE html>
<html>
<?php require_once ('../../config/generalFunctions.php');?>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/asset/css/Slider/Slider<?php echo $_GET['type']?>.css"/>
    <title>Test Slider</title>
  </head>
  <body>
    <?php $ListImg=unserialize($_GET['tab']); ?>
    <?php GenerateSlider($ListImg) ?>
    <script src="/asset/js/Slider/Slider<?php echo $_GET['type'] ?>.js"></script>
  </body>
</html>
