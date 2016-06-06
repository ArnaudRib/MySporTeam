var i=1;
var gallery=document.getElementsByClassName("notnavigation")[0].getElementsByTagName("div"); //récupère les images de SliderSlider.php
var TailleSlider=document.getElementsByClassName("slider")[0].offsetWidth; //récupère la tailledu slider

Initialisation();

function Automatique(){
  if (i<gallery.length){
    i++
  }else{
    i=1
  }
  Slide(i);
}

function Next(){
  if (i<gallery.length){
    i++
  }else{
    i=1
  }
  Slide(i);
}

function Back(){
  if (i>1){
    i--
  }else{
    i=gallery.length
  }
  Slide(i);
}


function Initialisation(){ //Mets les images sur une ligne
  for (var i = 0; i < gallery.length; i++) {
    gallery[i].style.left = (i*TailleSlider).toString() + 'px';
    gallery[i].style.transform="translateX(0px)";
  }
}

function Slide(numeroimage){ //Mets les images sur une ligne
  for (var i = 0; i < gallery.length; i++) {
    gallery[i].style.transform="translateX(-"+(TailleSlider*(numeroimage-1)).toString()+"px)";
    gallery[i].style.transition="all 0.8s ease";
    if(i==numeroimage-1){
      gallery[i].style.opacity="1";
    }else{
      gallery[i].style.opacity="0.1";
    }
  }
}

setInterval(Automatique, 5000);
