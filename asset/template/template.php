<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <?php
  require('loadcss.php');
  loadcss($nomcss); //nomcss devra être un tableau.?>
  <title><?php echo $titre ?></title>
</head>

<body>
<!--Menu en haut de la page-->
<?php include("header.php"); ?>
<!--Contenu de la page-->
<?php include($content); ?>
<!--Menu en bas de la page-->
<?php include("footer.php"); ?>
</body>
</html>
