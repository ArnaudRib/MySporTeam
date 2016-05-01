<div id="image_de_fond">
<img  src="/Images/image_groupe.jpg"/>
</div>
  <div class="hautdugroupe">
    <img id="image_mongroupe" src="/Images/sport3.jpg"/>
    <h1>Nom du groupe</h1>
    <div class="menu_mongroupe">
      <nav>
        <ul>
          <a href="<?php echo goToPage('groupe/1/informations') ?>" ><li>Informations</li></a>
          <a href="<?php echo  goToPage('groupe/1/publications/1')?>" ><li>Publications</li></a>
          <a href="<?php echo  goToPage('groupe/1/evenements/1')?>" ><li>Evenements</li></a>
          <a href="<?php echo  goToPage('groupe/1/membres')?>" ><li>Abonnés</li></a>
        </ul>
      </nav>
      <div class="bouton_inscription">
        <a id="inscription" href="">S'abonner</a>
      </div>
    </div>
  </div>

<div class="corps_mongroupe">
    <?php for ($i=0; $i <4 ; $i++) {?>
      <div class="case_mongroupeevenement">
        <img src="/Images/evenement1.jpg"/>
        <div class="texteevenement">
        <h1>#Nom evenement</h1>
        <p>Texte</p>
        <a href="" id="">ajouter au planning</a>
      </div>
      </div>
    <?php  } ?>
</div>
