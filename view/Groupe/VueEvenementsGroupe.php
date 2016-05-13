<div class="fond_mongroupe">
  <div id="image_de_fond">
  <img src="<?php echo image('Groupes/image_groupe.jpg')?>"/>
  </div>
    <div id="haut_mongroupe">
      <img src="<?php echo image('Groupes/sport3.jpg')?>"/>
      <h1>Nom du groupe</h1>
      <div id="menu_mongroupe">
        <nav>
          <ul>
            <a href="<?php  goToPage('informationsgroupe',['id'=>'1']) ?>" id="non_selectionne"><li>Informations</li></a>
            <a href="<?php  goToPage('publicationsgroupe',['id'=>'1', 'id_publication'=>'1'])?>" id="non_selectionne"><li>Publications</li></a>
            <a href="<?php  goToPage('evenementsgroupe',['id'=>'1'])?>" id="selectionne"><li>Evenements</li></a>
            <a href="<?php  goToPage('membresgroupe',['id'=>'1'])?>" id="non_selectionne"><li>Abonnés</li></a>
            <a id="abonnement" href="" ><li>S'abonner</li></a>
          </ul>
        </nav>
    </div>
  </div>

  <?php $evenement=10; ?>
  <?php $hauteur=30+310*($evenement); ?> <!-- REMPLACER $EVENEMNT PAR COUNT($EVENEMENT) plus tard qd requete. permet de setup la hauteur de la page. Evite pb ac footer -->
  <div id="corps_mongroupe" style="height:<?php echo $hauteur?>px">
      <?php for ($i=1; $i <$evenement ; $i++) {?>
        <div class="case_mongroupeevenement radius_mongroupe forme_case">
          <img src="<?php echo image('Groupes/Evenements/evenement1.jpg')?>"/>
          <div class="texteevenement">
          <h1>#Nom evenement</h1>
          <p>Texte</p>
          <a href="<?php goToPage('unevenementgroupe',['id'=>'1', 'id_evenement'=>$i])?>" >Plus d'info</a>
          <a href="" >ajouter au planning</a>
        </div>
        </div>
      <?php  } ?>
  </div>
</div>
