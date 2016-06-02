function modifier_profil() {
  var id = "modifier_profil";
  var tab = ['email','nom','prenom','sexe','adresse','numero_telephone','naissance', 'ville'];
  var divs = document.querySelectorAll('#modifprofil');

  for (var i = 0, c = divs.length ; i < c ; i++) {
    console.log(tab[i]);
    if(divs[i].className=="modifier_profil") {
      var commande = "<input type='text' class='bouttoninputprofil' name='"+tab[i]+"' value='"+divs[i].title+"' />";
    }
    if(divs[i].className=="modifier_profil_ville") {
      var commande = "<div class='search'><input id='search' class='bouttoninputprofil' type='text' class='form-control' name='"+tab[i]+"' value='"+divs[i].title+"' placeholder='Ville'  onkeyup='getresults(this.value, event); out(event)' autocomplete='off' onfocus='showsearch()' spellcheck='false'/> <p id='results' style='width:140%; margin-top:5px;height:130px;'> <span style='font-size:15px; padding-top:30px;'>Veuillez rentrer un nom de ville.</span> </p> </div>";
    }
    if(divs[i].className=="modifier_profil_submit") {
      var commande = "<input id='submit' class='bouttoninputprofil submitmodifprofil' name='modifyProfil' type='submit' value='Enregistrer les modifications' /><b style='margin-top:20px; display:block;'>NB : Les champs marqués de <span style='color:red;'>*</span> sont obligatoires.</b>";
    }

    divs[i].innerHTML = commande;
  }
}
