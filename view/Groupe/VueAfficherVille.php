<?php
if (count($rechercheVille) == 0) {
  echo "<span style='font-size:20px; padding-top:15px; color:black;'>Aucune ville trouvée.</span>";
}
 ?>
<ul>
<?php
foreach ($rechercheVille as $key => $value) {
  ?>
    <li onclick="get(this.innerHTML)"><?php echo $value['name'] ?></li>
  <?php
}
