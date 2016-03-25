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

window.addEventListener("scroll",toggleMenu);
