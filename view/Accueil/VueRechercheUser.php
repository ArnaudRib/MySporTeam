<?php
if (count($rechercheuser) == 0) {
  echo "<div class='messagesearch'>Aucun utilisateur trouvé.</div>";
}
 ?>
<ul>
<?php
foreach ($rechercheuser as $key => $value) {
  $pseudoclear=str_replace(' ', '-', $value['pseudo']);
  ?>
    <li>
      <div style="display:inline-flex; align-items:center;">
        <img style="height:60px;padding:10px;" src="<?php echo image('Users/Profil/'.$pseudoclear.'.jpg')?>" alt="" />
      </div>
      <div style=" display:inline-block; padding-bottom:2px; width:60%;" onclick="get3(this.innerHTML)"><?php echo $value['pseudo'] ?></div>
    </li>
  <?php
}
