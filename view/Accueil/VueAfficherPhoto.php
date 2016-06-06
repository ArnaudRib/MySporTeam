<?php

if (!$photo) ://Si la recherche ne donne rien?>
  <div class="errorbox"> <?php echo "Aucun sport ne semble contenir '$resultat' dans son nom.";?> </div>

<?php else:
 foreach ($photo as $result) : //row choisit une seule ligne. ?>
  <a href="<?php goToPage('sportgroupe', ['id_sport'=>$result['id']]) ?>">
    <div title="<?php echo $result['nom']?>" class="boxes" style="background-image: url('<?php echo image($result['chemin'])?>')";></div>
  </a>
<?php endforeach;?>
<?php endif; ?>
