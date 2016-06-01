function replaceAt(str, index, item) {
  var a = str.split('');
  a[index] = item;
  i++;
  return a.join('');
}

/*date 1*/
var input=document.getElementById('date_debut');
input.onkeypress = valid;

i=0;
j=0;
function valid(e) {
  event = e;
  e = e.target;

  keyCode = event.key ? event.which : event.keyCode;
  touche = String.fromCharCode(keyCode);
  caracteres = '0123456789';

  d = input.value.split('/');

  if(caracteres.indexOf(touche) < 0) {
    event.preventDefault()
  } else {
    event.preventDefault()
    d[j] = replaceAt(d[j], i, touche);
  }

  if(d[j][i]!="d" && d[j][i]!="m" && d[j][i]!="y"){
    i=0;
    j++;
  }

  e.value = d.join('/');
}


/*date2*/

function replaceAt2(str, index, item) {
  var a = str.split('');
  a[index] = item;
  k++;
  return a.join('');
}

var input2=document.getElementById('date_fin');
input2.onkeypress = valid2;
k=0;
l=0;

function valid2(e) {
  event = e;
  h = e.target;

  keyCode = event.key ? event.which : event.keyCode;
  touche = String.fromCharCode(keyCode);
  caracteres = '00123456789';

  f= input2.value.split('/');

  if(caracteres.indexOf(touche) < 0) {
    event.preventDefault()
  } else {
    event.preventDefault()
    f[l] = replaceAt2(f[l], k, touche);
  }

  if(f[l][k]!="d" && f[l][k]!="m" && f[l][k]!="y"){
    k=0;
    l++;
  }

  h.value = f.join('/');
}



function isNumberInRange(number, i, j){
  if (i<= number && number <= j){
    return true;
  }
  return false;
}
