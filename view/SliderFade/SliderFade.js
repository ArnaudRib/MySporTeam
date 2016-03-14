var i=1;
var gallery = document.getElementsByClassName("notnavigation")[0].getElementsByTagName("div"); //récupère les images de SliderSlider.php


function Next(){
  MakeVisible(i);
  if (i<gallery.length){
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
    i=gallery.length
  }
  MakeVisible(i);
}

function MakeVisible(numeroimage) {
  var d = document.getElementById(numeroimage.toString());
  d.classList.toggle("visible");
}

setInterval(Next, 3000);
