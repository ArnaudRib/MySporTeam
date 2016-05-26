function popup()
{
  MakeVisible()
}

function MakeVisible() {
  var d = document.getElementById("popup");
  var interieur = document.getElementById("division1");
  d.classList.toggle("visible");
  interieur.classList.toggle("visible2");
}

function closePopUp(){
  outside.classList.toggle("visible");
  inside.classList.toggle("visible2");
}

var outside = document.getElementById('popup');
var inside = document.getElementById('division1');

function ClickOutside(e){
  if (e.target==outside){
    outside.classList.toggle("visible");
    inside.classList.toggle("visible2");
  }
}

document.onclick = ClickOutside;
