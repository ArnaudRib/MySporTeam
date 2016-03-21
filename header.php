<header>

  <div class="menu">
    <div class="menuderoulant">
        <ul>
        <li> <input type="searchbar" placeholder="Entrez votre recherche" name="Recherche"/></li>
        <li> <a id="bouton" href="forums.php">Forums </a></li>
        <li> <a id="bouton" href="connexion.php">Connexion </a></li>
        <li> <a id="bouton" href="Inscription.php">Inscription </a></li>
      </ul>
    </div>
  </div>
  <div class="boutonmenu" onclick="showmenu()">☰</div>


  <script type="text/javascript">
    function showmenu(){
     document.querySelector('.menuderoulant').classList.toggle("visible3");
    }
  </script>
</header>
