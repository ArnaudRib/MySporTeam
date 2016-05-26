function displayIcones(){
  var listeicone= document.getElementById('listeicones');
  listeicone.classList.toggle('showimage');
}

function displayPopUp()
{
  MakeVisible()
}

function MakeVisible() {
  var d = document.getElementById("GeneralPopUp");
  var interieur = document.getElementById("FirstdivPopUp");
  d.classList.toggle("visible");
  interieur.classList.toggle("visible2");
}

var outside = document.getElementById('GeneralPopUp');
var inside = document.getElementById('FirstdivPopUp');

function closePopUp(){
  outside.classList.toggle("visible");
  inside.classList.toggle("visible2");
}

function ClickOutside(e){
  if (e.target==outside){
    outside.classList.toggle("visible");
    inside.classList.toggle("visible2");
  }
}

document.onclick = ClickOutside;
