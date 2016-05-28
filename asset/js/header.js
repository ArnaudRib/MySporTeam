function toggleMenu() {
  var hauteur=window.pageYOffset;
  var header= document.getElementsByClassName("menushort")[0];

  if (hauteur>=150){
    header.classList.add('apparition');
    header.classList.remove('dissolution');
  }else{
    header.classList.remove('apparition');
    header.classList.add('dissolution');
  }
}

function showmenu(){
 document.querySelector('.menuderoulant').classList.toggle("visible3");
}

window.addEventListener("scroll",toggleMenu);

/* Modal search */
function ShowSearchModal()
{
  MakeVisible2()
}

function MakeVisible2() {
  var d = document.getElementById("GeneralPopUp");
  var interieur = document.getElementById("FirstdivPopUp");
  d.classList.toggle("visible");
  interieur.classList.toggle("visible2");
}

var outside2 = document.getElementById('GeneralPopUp');
var inside2 = document.getElementById('FirstdivPopUp');

function closePopUp2(){
  outside2.classList.toggle("visible");
  inside2.classList.toggle("visible2");
}

/*Recherche générale :o*/
savestr = "";
var position = 0;
function getresults2(str, e) {
  if (str.length == 0) {
    document.getElementById("resultatsrecherche").innerHTML = '<span style="font-size:20px; padding:5px; margin-top:30px;">Veuillez compléter le champ de recherche.</span>'
;
    document.getElementById("resultatsrecherche").visible = "false";
    return;
  } else if (savestr != str){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("resultatsrecherche").innerHTML = xmlhttp.responseText;
        document.getElementById("resultatsrecherche").visible = "true";
        if (typeof(list[position]) != "undefined") {
          list[position].classList.add('selected');
        }
      }
    };
    xmlhttp.open("GET", "ajaxrecherchegenerale?resultat=" + str, true);
    xmlhttp.send();
    savestr = str;
  }
}

function get(str) {
  document.getElementById("searchgeneral").value = str;
}

function showsearch() {
  var search = document.getElementById('resultatsrecherche');
  search.classList.add('visible');
}

function hidesearch(e) {
  search = document.getElementById("searchgeneral");
  var results = document.getElementById('resultatsrecherche');
  if ( e.target != search && e.target != results ) {
    results.classList.remove('visible');
  }
}

function setSelected(list) {
  for (var i = 0; i < list.length; i++) {
    list[i].classList.remove('selected');
  }
  list[position].classList.add('selected');
}

function updatePos(list, sens) {
  if (sens == -1 && position > 0) {
    position--;
  }
  if (sens == 1 && position < list.length-1) {
    position++;
  }
}


function out(e) {
  list = document.getElementById('resultatsrecherche').getElementsByTagName('li');
  var key = e.keyCode;
  if (list.length != 0) {
    if (key == 38 || key == 40 || key == 13) {
      if (key == 38) {
        updatePos(list, -1);
      }
      if (key == 40) {
        updatePos(list, 1);
      }
      if (key == 13) {
        search.value = list[position].innerHTML;
      }
    }
    setSelected(list);
  }
}
document.onclick = hidesearch;
