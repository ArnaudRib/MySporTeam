<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
        <title>MySporTeam</title>
        <meta charset="utf-8" />
    </head>


    <body>
      <!--Menu en haut de la page-->
      <?php include("header.php"); ?>

      <!--Partie Popup-->
      <div id="popup" class="popup">
        <div id="division1" class="division1">
          <div class="Recherche">
            <h2 style="margin-left:10%; margin-right:10%; text-align:left; font-size:1.8em; display:inline-block;">Sports</h2>
            <input id="search" type="text" name="search" class="searchbar" placeholder="Recherche..." onkeyup="getresults(this.value)"  autocomplete="off" spellcheck="false"/>
          </div>
          <div id="PhotoSport">
            <?php include("recherchesport.php"); ?>
        </div>

        </div>
      </div>

      <!--Contenu de la page-->
      <nav id="content">
        <h1 class="centre">Bienvenue</h1>
        <!--Partie Photographie-->
        <section>
          <div onclick="popup()" class="ligne1">
            <div class="div1 usualbackground">
              <span class="Police1">Sports</span>
              <div class="img1 usualbackground" style="background-image:url('images/sport.png');"></div>
            </div>
          </div>
          <div class="ligne2">
            <div class="div3 usualbackground">
              <span class="Police2">Forum</span>
              <div class="img2 usualbackground" style="background-image:url('images/sport3.jpg');"></div>
            </div><div class="div3 usualbackground">
              <span class="Police2">Aide</span>
              <div class="img2 usualbackground" style="background-image:url('images/sport4.jpg');"></div>
            </div>
          </div>
        </section>

        <!--Partie Texte-->
        <aside>
          <div class="div2 usualbackground">
            <div class="img3 usualbackground" style="background-image:url('images/chintoc.jpg');"></div>
              <div class="div2bis">
                <div class="Haut1" style="padding:20px; text-align:justify; font-size:20px;">
                <p><strong>MySporteam</strong> vous permet d'intéragir avec des personnes ayant les mêmes passions que vous ! </br></br>
                  En vous inscrivant, vous pourrez participer à des cours, des entraînements, des compétitions proche
                  de chez vous, et communiquer avec des passionnés du sport !</p>
                </div><div class="Bas1">
                  <div id="bouttoninscription">
                    <a href="inscription.php">
                      <button class="button">Première visite?</br><span style="font-size:15px;">Inscrivez vous!</span></button>
                    </a>
                  </div>
                </div>
            </div>
          </div>
        </aside>
      </nav>

      <iframe src="SliderFade/SliderFade.php" width="100%" height="500px"></iframe>
      <iframe src="SliderSlide/SliderSlide.php" width="100%" height="500px"></iframe>

      <!--Footer de la page-->
      <?php include("footer.php"); ?>

  </body>

</html>
