function modifier_profil() {
  var id = "modifier_profil";
  var tab = ['','id_photo','email','nom','prénom','sexe','adresse','numero_telephone','naissance','id_ville'];
  var divs = document.getElementsByTagName('span');

  for (var i = 0, c = divs.length ; i < c ; i++) {
    if(divs[i].className=="modifier_profil" && i==1) {
      var commande = "<input type='text' name='"+tab[i]+"' value=' ' autofocus />";
    }
    if(divs[i].className=="modifier_profil") {
      var commande = "<input type='text' name='"+tab[i]+"' value=' ' />";
    }
    if(divs[i].className=="modifier_profil_submit") {
      var commande = "<input id='submit' name='Envoyer' type='submit' value='Enregistrer les modifications' />";
    }
    divs[i].innerHTML = commande;
  }
}
