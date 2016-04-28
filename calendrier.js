var ladate = new Date();
var mois = ladate.getMonth()+1;

function displayMonth(mois) {
  var elmt = document.getElementById(mois);
  if(elmt.style.display=='none') {
    elmt.style.display='inline';
  }
  else {
    elmt.style.display='none';
  }
}


function changeMois(sens) {
  displayMonth(mois);

  if(sens==1) {
    mois++;
  }
  else {
    mois--;
  }
  if(mois==0) mois=12;
  if(mois==13) mois=1;
  displayMonth(mois);
}
