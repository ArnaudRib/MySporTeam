<?php // POUR AFFICHER LA REQUETE SQL
//var_dump($datagroupe); ?>

<div class="haut_mongroupe">
  <div class="hautdugroupe">
    <img id="image_mongroupe" src="/Images/sport3.jpg"/>
    <h1><?php echo $datagroupe['nom'] ?></h1>
    <div class="menu_mongroupe">
      <nav>
        <ul>
           <!--channger le /1 final : mettre page simple evenements si necessaire-->
          <a href="<?php echo goToPage('groupe/1/informations') ?>" ><li>Informations</li></a>
          <a href="<?php echo  goToPage('groupe/1/publications/1')?>" ><li>Publications</li></a>
          <a href="<?php echo  goToPage('groupe/1/evenements/1')?>" ><li>Evenements</li></a>
          <a href="<?php echo  goToPage('groupe/1/membres')?>" ><li>Abonnés</li></a>
          <!-- APRES CA DEVRA ETRE UN TRUC COMME CA
          <a href="groupe/<?php //goToPage('groupe/$id_groupe/informations')?>/informations" ><li>Informations</li></a>
        -->
        </ul>
      </nav>
      <div class="bouton_inscription">
        <a id="inscription" href="">S'abonner</a>
      </div>
    </div>
  </div>
</div>

<div class="corps_mongroupe">

  <div class="cote_gauche">
    <div class="forme_case" id="nom_sport">
      <h1>#Sports</h1>
    </div>

    <div class="mongroupe_apropos forme_case">
      <div id="titre">
        <h1>Informations groupe</h1>
      </div>
      <div id="text_mongroupe">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat. Etiam fermentum purus non gravida accumsan.</p>
      </div>
    </div>

    <div class="mongroupe_lieu forme_case">
      <div id="titre">
        <h1>Lieu</h1>
      </div>
      <div id="text_mongroupe">
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat. Etiam fermentum purus non gravida accumsan.</p>
      </div>
    </div>

    <div class="mongroupe_Niveau forme_case">
      <div id="titre">
        <h1>Niveau du groupe</h1>
      </div>
      <div id="text_mongroupe">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat. Etiam fermentum purus non gravida accumsan.</p>
      </div>
    </div>
  </div>


  <div class="mur_mongroupe">
    <div class="forme_case">
      <ul>
        <li id="publication">
          <h1>#nomPublication</h1>
          <h2>#datepublication</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat.</p>
        </li>
        <li id="publication">
          <h1>#nomPublication</h1>
          <h2>#datepublication</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat.</p>
        </li>
        <li id="publication">
          <h1>#nomPublication</h1>
          <h2>#datepublication</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat.</p>
        </li>
        <ul>
    </div>
  </div>


      <div class="cote_droit">
        <div class="mongroupe_evenements forme_case">
          <div id="titre">
            <h1>Futurs évenements</h1>
          </div>
          <div class="evenements">
            <ul>
              <a href=""><li><img src="/Images/evenement1.jpg"/><h2>#evenments1<h2></li></a>
              <a href=""><li><img src="/Images/evenement2.jpg"/><h2>#evenments1<h2></li></a>
              <a href=""><li><img src="/Images/evenement3.jpg"/><h2>#evenments1<h2></li></a>
            <ul>
          </div>
        </div>
        <div class="mongroupe_perticipants forme_case">
          <div id="titre">
            <h1>Nombre de Participants</h1>
          </div>
          <div id="text_mongroupe">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat. Etiam fermentum purus non gravida accumsan.</p>
          </div>
        </div>
      </div>
