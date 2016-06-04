/*Recherche générale :o*/
savestr = "";
var position = 0;
function getresults3(str, e) {
  if (str.length == 0) {
    document.getElementById("resultatsrechercheUser").innerHTML = '<div class="messagesearch">Veuillez compléter le champ de recherche.</div>';
    document.getElementById("resultatsrechercheUser").visible = "false";
    return;
  } else if (savestr != str){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("resultatsrechercheUser").innerHTML = xmlhttp.responseText;
        document.getElementById("resultatsrechercheUser").visible = "true";
        if (typeof(list[position]) != "undefined") {
          list[position].classList.add('selected');
        }
      }
    };
    xmlhttp.open("GET", "/fr/ajaxrechercheuser?resultat=" + str, true);
    xmlhttp.send();
    savestr = str;
  }
}

function get3(str) {
  document.getElementById("searchuser").value = str;
}

function showsearch3() {
  var search = document.getElementById('resultatsrechercheUser');
  search.classList.toggle('visible4');
}

function hidesearch3(e) {
  search = document.getElementById("searchuser");
  var results = document.getElementById('resultatsrechercheUser');
  if ( e.target != search && e.target != results ) {
    results.classList.add('visible4');
  }
}

function setSelected3(list) {
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


function out3(e) {
  list = document.getElementById('resultatsrechercheUser').getElementsByTagName('li');
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
    setSelected3(list);
  }
}
document.onclick = hidesearch3;
