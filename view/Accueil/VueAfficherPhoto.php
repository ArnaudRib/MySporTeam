<?php

if (!$photo) ://Si la recherche ne donne rien?>
  <p style="color:red;"> <?php echo "Désolé :( </br> Il n'y a pas de sport s'appelant $resultat !";?> </p>

<?php else:
 foreach ($photo as $result) : //row choisit une seule ligne. ?>
    <div title="<?php echo $result['nom']?>" class="boxes" style="background-image: url('/asset/<?php echo $result['photo']?>')";></div>
<?php endforeach;?>
<?php endif; ?>
