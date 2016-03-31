<?php

if (!$photo) ://Si la recherche ne donne rien?>
  <p style="color:red;"> <?php echo "Désolé :( </br> YA PAS DE SPORT !!!";?> </p>

<?php else:
 foreach ($photo as $result) : //row choisit une seule ligne. ?>
    <div title="<?php echo $result['nom']?>" class="boxes" style="background-image: url('<?php echo $result['photo']?>')";></div>
<?php endforeach;?>
<?php endif; ?>
