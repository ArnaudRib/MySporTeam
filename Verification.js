// Permet de vérifier les entrées de mdp et confirmation mdp.

function Verification(){
  var mdp1=document.getElementById('mdp');
  var mdp2=document.getElementById('mdp_verification');
  if (mdp1.value!=mdp2.value && mdp2.value!=""){
    mdp1.style.border="red solid 2px";
    mdp2.style.border="red solid 2px";
    document.getElementById('submit').disabled=true;
  }else{
    mdp1.style.border="green solid 2px";
    mdp2.style.border="green solid 2px";
    document.getElementById('submit').disabled=false;
  }
}
