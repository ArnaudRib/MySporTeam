<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="slider.css"/>
    <title>Test Slider</title>
  </head>
  <body>

    <script>
    function MakeVisible() {
      var d = document.getElementById("1");
      d.style.visibility='visible';
      d.style.margin='50px';
    }

    function MakeInvisible() {
      var d = document.getElementById("1");
      d.style.visibility='hidden';
    }

    function Next(){
      var d = 4;
      document.write(d);
      return(nbimage);
    }
    </script>

    <div class="slider">
      <img id="1" src="/images/chintoc.jpg" width:"500px" height="500px"/>
      <img id="2" src="/images/sport.png" width:"500px" height="500px"/>
      <img id="3" src="/images/sport2.jpg" width:"500px" height="500px"/>
      <img id="4" src="/images/sport3.jpg" width:"500px" height="500px"/>
      <name "nbimages" value=4;
    </div>
  </br>
    <button type="button" onclick="MakeVisible()">Click me</button>

    <button type="button" onclick="Next()">Show Number</button>

    <button type="button" onclick="MakeInvisible()">DONT Click me</button>

  </body>



</html>
