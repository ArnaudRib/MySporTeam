<div class="haut_mongroupe">
  <div class="hautdugroupe">
    <img id="image_mongroupe" src="/mysporteam/asset/images/sport3.jpg"/ width='100%' height="250px;">
    <h1>Mon profil</h1>
    <div class="menu_mongroupe">
      <nav>
        <ul>
          <li><a href="javascript:showonlyone('informations_profil');" >Informations</li></a>
          <li><a href="javascript:showonlyone('groupes_profil');" >Groupes</li></a>
          <li><a href="javascript:showonlyone('calendrier_profil');" >Planning</li></a>
        </ul>
      </nav>
    </div>
  </div>
</div>

<div class="profil" id="informations_profil">
  <div class="gauche_profil">
    <ul>
      <h1>Groupes</h1>
      <li>FootClub</li>
      <li>TennisClub</li>
      <li>RugbyClub</li>
      <li>FightClub</li>
    </ul>

    <ul>
      <h1>Sports</h1>
      <li>Football</li>
      <li>Tennis</li>
      <li>Rugby</li>
      <li>Boxe</li>
    </ul>
  </div>

  <div class="corps_profil">
    <ul>
      <li id="actualite">
        <h1>AuteurPublication</h1>
        <h2>GroupePublication -- date</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat.</p>
      </li>
      <li id="actualite">
        <h1>AuteurPublication</h1>
        <h2>GroupePublication -- date</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat.</p>
      </li><li id="actualite">
        <h1>AuteurPublication</h1>
        <h2>GroupePublication -- date</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris. Vestibulum maximus libero id sapien tempor placerat.</p>
      </li>
    </ul>
  </div>
</div>

<div class="profil" id="groupes_profil">
  <div id="groupe">
    <h1>Nom du groupe</h1>
    <h2> son niveau </h2>
    <p>
      Informations sur le groupe : Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Proin quis pulvinar arcu, a hendrerit ex. In sollicitudin facilisis mauris.
      Vestibulum maximus libero id sapien tempor placerat.
    </p>
    <a href="">Prochain evenement</a>
  </div>
</div>

<div class="profil" id="calendrier_profil">
  <?php require_once('view/_required/calendrier.php') ?>
</div>
