<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/asset/css/font-awesome.css">
  <?php
  $this->loadcss(); //nomcss devra être un tableau.?>
  <title><?php echo $this->titre ?></title>
</head>

<body>
<!--Menu en haut de la page-->
<div class="bodybackground">
  <?php include("header.php"); ?>
</div>
<!--Contenu de la page-->
<?php include($this->fichier); ?>
<!--Menu en bas de la page-->
<?php include("footer.php"); ?>
</body>

<?php $this->loadjs();?>
<script type="text/javascript" src="asset/js/header.js"/>

</html>
