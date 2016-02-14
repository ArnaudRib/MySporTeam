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

      <!--Contenu de la page-->
      <nav id="content">
        <h1 class="centre">Bienvenue</h1>
        <!--Partie Photographie-->
        <section>
          <div class="ligne1">
            <div class="div1 usualbackground">
              <span class="Police1">test</span>
              <div class="img1 usualbackground" style="background-image:url('images/sport.png');"></div>

            </div><div class="div1 usualbackground" >
              <span class="Police1">test</span>
              <div class="img1 usualbackground" style="background-image:url('images/sport2.jpg');"></div>
            </div>
          </div>
          <div class="ligne2">
            <div class="div1 usualbackground">
              <span class="Police1">test</span>
              <div class="img1 usualbackground" style="background-image:url('images/sport3.jpg');"></div>
            </div><div class="div1 usualbackground">
              <span class="Police1">test</span>
              <div class="img1 usualbackground" style="background-image:url('images/sport4.jpg');"></div>
            </div>
          </div>
        </section>

        <!--Partie Texte-->
        <aside>
          <div class="div2 usualbackground">
            <div class="img2 usualbackground" style="background-image:url('images/chintoc.jpg');"></div>
              <div class="div2bis">
                <div class="Haut1">
                <p>test</p>
                </div><div class="Bas1">
                  <p>test</p>
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
