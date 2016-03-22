<!--MODEL-->
<?php

include("connectBDD.php");

if(isset($_GET['resultat'])){
  $text = $_GET['resultat'];
}else{
  $text= '';
}
$sql = "SELECT id, nom, photo FROM Sports WHERE nom LIKE '%$text%' LIMIT 10";
$results = $db->query($sql)->fetchAll();

if (!$results) { //Si la recherche ne donne rien?>
  <p style="color:red;"> <?php echo "Désolé :( </br> YA PAS DE SPORT QUI S'APPELLE $text !!!";?> </p>
<?php
}

foreach ($results as $result) { //row choisit une seule ligne.
  ?>
    <div title="<?php echo $result['nom']?>" class="boxes" style="background-image: url('<?php echo $result['photo']?>')";></div>
  <?php
}
?>
