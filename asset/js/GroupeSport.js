function displayIcones2(){
  var listeicone= document.getElementById('listeicones');
  listeicone.classList.toggle('display');
}

function displayIcones(i){
  var listeicone= document.getElementById('listeicones');
  var image=document.getElementById('imageicone');

  var marginleft=38 - (Math.pow(i,2))*0.5 +"%";
  var margintop=28 - 6 * i + "%";
  console.log(image.value);
  listeicone.classList.toggle('display');
  image.style.marginLeft= marginleft;
  image.style.marginTop= margintop;
}
