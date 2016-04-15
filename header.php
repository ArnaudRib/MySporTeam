<header>
<div class="menuheader">
  <div class="menu">
    <div class="logo">
      <a ref="index.php"><img src="Images/logomysporteam.png"/></a>
    </div>
    <nav class="menuderoulant">
        <ul>
        <li> <input type="searchbar" placeholder="Entrez votre recherche" name="Recherche"/></li>
        <li> <a href="pagegroupe_publication.php">Accueil</a></li>
        <li> <a href="connexion.php">Forums</a></li>
        <li> <a href="Inscription.php">Connexion</a></li>
      </ul>
    </nav>
  </div>
  <div class="boutonmenu" onclick="showmenu()">☰</div>
</div>

<div class="menushort">
  <div class="logo2">
    <a ref="index.php"><img src="Images/logomysporteam.png"/></a>
  </div>
  <nav>
      <ul>
      <li> <input type="searchbar" placeholder="Entrez votre recherche" name="Recherche"/></li>
      <li> <a href="pagegroupe_publication.php">Accueil</a></li>
      <li> <a href="connexion.php">Forums</a></li>
      <li> <a href="Inscription.php">Connexion</a></li>
    </ul>
  </nav>
</div>



  <script type="text/javascript">
    function showmenu(){
     document.querySelector('.menuderoulant').classList.toggle("visible3");
    }
  </script>
</header>
