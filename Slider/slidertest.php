<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="slider.css"/>
    <title>Test Slider</title>
  </head>
  <body>

    <script>
    var i=1;

    function Next(){
      MakeVisible(i);
      if (i<4){
        i++
      }else{
        i=1
      }
      MakeVisible(i);
    }

    function Back(){
      MakeVisible(i);
      if (i>1){
        i--
      }else{
        i=4
      }
      MakeVisible(i);
    }

    function MakeVisible(numeroimage) {
      var d = document.getElementById(numeroimage.toString());
      d.classList.toggle("visible");
    }

    </script>

    <div class="slider">
      <div class="navigation">
        <div class="flechenext" onclick="Next()"></div>
        <div class="flecheback rotate" onclick="Back()"></div>
      </div>
      <img id="1" src="/images/chintoc.jpg" class="visible"/>
      <img id="2" src="/images/sport.png"/>
      <img id="3" src="/images/sport2.jpg"/>
      <img id="4" src="/images/sport3.jpg"/>
    </div>
  </br>

  </body>

</html>
