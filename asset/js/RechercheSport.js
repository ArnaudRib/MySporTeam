function getresults(str='') {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("PhotoSport").innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET", "/fr/ajaxloadphoto?resultat=" + str, true);
  xmlhttp.send();
}

getresults();
