function displayFiltre(){
  var boutton=document.getElementById('bouttonfiltre');
  var filtre=document.getElementById('FiltreRechercheSport');
  boutton.classList.toggle('plusboutton');
  boutton.classList.toggle('croixboutton');
  filtre.classList.toggle('maximize');
  filtre.classList.toggle('extend');
}


savestr = "";
var position = 0;
function getresults(str, e) {
  if (str.length == 0) {
    document.getElementById("results").innerHTML = '<span style="font-size:20px; margin-top:30px;">Veuillez rentrer un nom de ville.</span>'
;
    document.getElementById("results").visible = "false";
    return;
  } else if (savestr != str){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("results").innerHTML = xmlhttp.responseText;
        document.getElementById("results").visible = "true";
        if (typeof(list[position]) != "undefined") {
          list[position].classList.add('selected');
        }
      }
    };
    xmlhttp.open("GET", "/fr/ajaxrecherchegroupe?resultat=" + str, true);
    xmlhttp.send();
    savestr = str;
  }
}

function get(str) {
  document.getElementById('search').value = str;
}
function showsearch() {
  var search = document.getElementById('results');
  search.classList.add('visible');
}

function hidesearch(e) {
  search = document.getElementById('search');
  var results = document.getElementById('results');
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
  list = document.getElementById('results').getElementsByTagName('li');
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
