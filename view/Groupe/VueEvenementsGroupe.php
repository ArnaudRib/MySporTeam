<div class="fond_mongroupe">
  <div id="image_de_fond">

  <img src="<?php echo image('Groupes/image_groupe.jpg')?>"/>
  </div>
    <div id="haut_mongroupe">
      <img src="<?php echo image('Groupes/sport3.jpg')?>"/>
      <h1><?php echo $datagroupe['nom']?></h1>
      <div id="menu_mongroupe">
        <nav>
          <ul>
            <a href="<?php  goToPage('informationsgroupe',['id'=>$datagroupe['id']]) ?>" id="non_selectionne"><li>Informations</li></a>
            <a href="<?php  goToPage('publicationsgroupe',['id'=>$datagroupe['id'], 'id_publication'=>'1'])?>" id="non_selectionne"><li>Publications</li></a>
            <a href="<?php  goToPage('evenementsgroupe',['id'=>$datagroupe['id']])?>" id="selectionne"><li>Evènements</li></a>
            <a href="<?php  goToPage('membresgroupe',['id'=>$datagroupe['id']])?>" id="non_selectionne"><li>Abonnés</li></a>
            <a id="abonnement" href="" ><li>Rejoindre</li></a>
          </ul>
        </nav>
    </div>
  </div>


  <?php /*$taille=10; ?>
  <?php $hauteur=30+310*($taille); */?> <!-- REMPLACER $EVENEMNT PAR COUNT($EVENEMENT) plus tard qd requete. permet de setup la hauteur de la page. Evite pb ac footer -->
  <div id="corps_mongroupe" />
  <?php if ($evenement!=NULL):
      foreach ($evenement as $key => $value):?>
        <div id="<?php echo $i=count($evenement) ?>" class="case_mongroupeevenement radius_mongroupe forme_case">
          <img src="<?php echo image('Groupes/Evenements/evenement1.jpg')?>"/>
          <div class="texteevenement">
            <h1><?php echo $value['nom']?></h1>
            <p><?php echo $value['description']?></p>
            <a href="<?php goToPage('unevenementgroupe',['id'=>$datagroupe['id'], 'id_evenement'=>$value['id']])?>" >Plus d'info</a>
            <a href="" >ajouter au planning</a>
          </div>
        </div>
      <?php  endforeach;
    else:?>
      <div  class="publication forme_case radius_mongroupe">
        <h1> Aucun événement</h1>
      </div>
      <?php
    endif; ?>
  </div>
</div>
