<header>
<<<<<<< HEAD
<div class="menuheader">
  <div class="menu">
    <div class="logo">
      <a href="index.php"><img src="Images/logomysporteam.png"/></a>
=======
  <div class="menuheader">
    <div class="menu">
      <div class="logo">
        <a ref="index.php"><img id="logo_header" src="Images/logomysporteam.png"/></a>
      </div>
      <nav class="menuderoulant">
        <ul>
          <li> <input type="searchbar" placeholder="Entrez votre recherche" name="Recherche"/></li>
          <li> <a href="index.php">Accueil</a></li>
          <li> <a href="">Forums</a></li>
          <?php if(!isset($_SESSION['pseudo'])) : ?>
            <li> <a href="connexion.php">Connexion</a></li>
            <li> <a href="Inscription.php">Inscription</a></li>
          <?php else : ?>
            <li> <a href="calendrier.php">Calendrier</a></li>
            <li> <a href="pagegroupe.php">Groupe</a></li>
            <li> <a href="profil.php">Profil</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
    <div class="boutonmenu" onclick="showmenu()">☰</div>
  </div>

  <div class="menushort">
    <div class="logo2">
      <a ref="index.php"><img src="Images/logomysporteam.png"/></a>
>>>>>>> Alexis
    </div>
    <nav>
      <ul>
        <li> <input type="searchbar" placeholder="Entrez votre recherche" name="Recherche"/></li>
<<<<<<< HEAD
        <li> <a href="pagegroupe.php">Accueil</a></li>
        <li> <a href="forum.php">Forums</a></li>
        <li> <a href="connexion.php">Connexion</a></li>
=======
        <li> <a href="index.php">Accueil</a></li>
        <li> <a href="">Forums</a></li>
        <?php if(!isset($_SESSION['pseudo'])) : ?>
          <li> <a href="connexion.php">Connexion</a></li>
          <li> <a href="Inscription.php">Inscription</a></li>
        <?php else : ?>
          <li> <a href="calendrier.php">Calendrier</a></li>
          <li> <a href="pagegroupe.php">Groupe</a></li>
          <li> <a href="profil.php">Profil</a></li>
          <li> <a href="deconnexion.php"><img id="bouton_on-off" src="Images/bouton_on-off.png" /></a></li>
        <?php endif; ?>
>>>>>>> Alexis
      </ul>
    </nav>
  </div>



  <script type="text/javascript">
  function showmenu(){
    document.querySelector('.menuderoulant').classList.toggle("visible3");
  }
  </script>
</header>
