<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <?php
  $this->loadcss(); //nomcss devra être un tableau.?>
  <title><?php echo $this->titre ?></title>
</head>

<body>
<div class="General">
  <!-- Menu side Admin panel -->
  <?php include("view/Admin/AdminSide.php"); ?>
  <!--Contenu de la page-->
  <?php include($this->fichier); ?>
</div>

</body>

<?php $this->loadjs();?>

</html>
