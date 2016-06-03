var input=document.getElementById('date_debut');
var input2=document.getElementById('date_fin');

valid = new DateValid(input)
valid2 = new DateValid(input2)
input.onkeypress = valid.validation
input2.onkeypress = valid2.validation

function DateValid(input) {
  this.i = 0
  this.j = 0
  this.input = input
  var v = this
  this.validation = function (e) {
    event = e;
    e = e.target;

    keyCode = event.key ? event.which : event.keyCode;
    touche = String.fromCharCode(keyCode);
    caracteres = '0123456789';
    d = v.input.value.split('/');

    if(caracteres.indexOf(touche) < 0) {
      event.preventDefault()
    } else {
      event.preventDefault()
      d[v.j] = v.replaceAt(d[v.j], v.i, touche);
    }

    if(d[v.j][v.i]!="d" && d[v.j][v.i]!="m" && d[v.j][v.i]!="y"){
      v.i=0;
      v.j++;
    }
    e.value = d.join('/');
  }

  this.replaceAt = function(str, index, item) {
    var a = str.split('');
    a[index] = item;
    v.i++;
    return a.join('');
  }
}
