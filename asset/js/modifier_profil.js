function modifier_profil() {
  var id = "modifier_profil";
  var tab = ['','','id_photo','email','nom','prénom','sexe','adresse','numero_telephone','naissance','id_ville'];
  var divs = document.getElementsByTagName('span');

  for (var i = 0, c = divs.length ; i < c ; i++) {
    switch (divs[i].className) {
      case "modifier_profil":
      if(i==1) var commande = "<input type='text' name='"+tab[i]+"' value=' ' autofocus />";
      else var commande = "<input type='text' name='"+tab[i]+"' value=' ' />";
      break;

      case "modifier_profil_submit":
      var commande = "<input id='submit' name='Envoyer' type='submit' value='Enregistrer les modifications' />";
      break;

      case "modifier_photo":
      var commande = "Photo de profil (1Mo max):  <input type='file' name='photo_profil' /><input type='submit' name='submit' value='-'>";
      break;

      case "modifier_couverture":
      var commande = "Photo de couverture (5Mo max):  <input type='file' name='photo_converture' />";
      break;

      default:

    }

    divs[i].innerHTML = commande;
  }
}
