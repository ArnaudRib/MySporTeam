<?php

if (!$photo) ://Si la recherche ne donne rien?>
  <p style="color:red;"> <?php echo "Désolé :( </br> Il n'y a pas de sport s'appelant $resultat !";?> </p>

<?php else:
 foreach ($photo as $result) : //row choisit une seule ligne. ?>
  <a href="<?php goToPage('sportgroupe', ['id_sport'=>$result['id']]) ?>">
    <div title="<?php echo $result['nom']?>" class="boxes" style="background-image: url('<?php echo image($result['chemin'])?>')";></div>
  </a>
<?php endforeach;?>
<?php endif; ?>
