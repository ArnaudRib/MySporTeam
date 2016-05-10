<?php
if (count($rechercheVille) == 0) {
  echo "pas de résultats";
}
 ?>
<ul>
<?php
foreach ($rechercheVille as $key => $value) {
  ?>
    <li onclick="get(this.innerHTML)"><?php echo $value['name'] ?></li>
  <?php
}
