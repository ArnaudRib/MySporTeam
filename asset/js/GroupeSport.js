function displayIcones(){
  var listeicone= document.getElementById('listeicones');
  listeicone.classList.toggle('showimage');
}

function displayPopUp()
{
  MakeVisible()
}

function MakeVisible() {
  var d = document.getElementById("GeneralPopUp2");
  var interieur2 = document.getElementById("FirstdivPopUp2");
  d.classList.toggle("visible");
  interieur2.classList.toggle("visible2");
}

var outside = document.getElementById('GeneralPopUp2');
var inside = document.getElementById('FirstdivPopUp2');

function closePopUp(){
  outside.classList.toggle("visible");
  inside.classList.toggle("visible2");
}

function Clickoutside(e){
  if (e.target==outside){
    outside.classList.toggle("visible");
    inside.classList.toggle("visible2");
  }
}

document.onclick = Clickoutside;
