<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <?php
  $this->loadcss(); //nomcss devra être un tableau.?>
  <title><?php echo $this->titre ?></title>
</head>

<body>
<!--Menu en haut de la page-->
<?php include("header.php"); ?>
<!--Contenu de la page-->
<?php include($this->fichier); ?>
<!--Menu en bas de la page-->
<?php include("footer.php"); ?>
</body>
</html>