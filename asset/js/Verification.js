// Permet de vérifier les entrées de mdp et confirmation mdp.
function Verification(){
  var mdp1=document.getElementById('mdp');
  var mdp2=document.getElementById('mdp_verification');
  if (mdp1.value!=mdp2.value && mdp2.value!=""){
    mdp1.style.backgroundColor="red";
    mdp2.style.backgroundColor="red";
    document.getElementById('submit').disabled=true;
    document.getElementById('submit').style.cursor="not-allowed";
  }else{
    mdp1.style.backgroundColor="";
    mdp2.style.backgroundColor="";
    document.getElementById('submit').disabled=false;
    document.getElementById('submit').style.cursor="pointer";
  }
  if(mdp1.value==mdp2.value && mdp2.value!=""){
    mdp1.style.backgroundColor="green";
    mdp2.style.backgroundColor="green";
    document.getElementById('submit').disabled=false;
    document.getElementById('submit').style.cursor="pointer";
  }
}

function showmessage(element){
  console.log(element.value);
  var mdp1=document.getElementById('mdp');
  var message=document.getElementById('messageMDP');
  if(!element.value.match(/(?=.*[A-Z])(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{6,}/)){
    message.innerHTML='<div class="infobox">Le mot de passe doit contenir <b>6 caractères</b>, dont <b>un symbole</b>, <b>1</b> lettre <b>minuscule</b> et <b>1 majuscule.</b></div>'
    mdp1.style.backgroundColor="red";
    document.getElementById('submit').disabled=true;
    document.getElementById('submit').style.cursor="not-allowed";
  }else{
    element.style.backgroundColor="green";
    message.innerHTML='';
    document.getElementById('submit').disabled=false;
    document.getElementById('submit').style.cursor="pointer";
  }
  if(element.value==''){
    message.innerHTML='';
    mdp1.style.backgroundColor="";
    document.getElementById('submit').disabled=true;
    document.getElementById('submit').style.cursor="not-allowed";
  }
}

function checkthebox(){
  var checkbox=document.getElementById('charte');
  if(checkbox.checked){
    checkbox.checked=false;
  }else{
    checkbox.checked=true;
  }
}


function modalinfo(e){
  var i=e.id;
  var modal=document.querySelector('#modalinfo'+i);
  var insidemodal=document.querySelector('#insideModalInfo'+i);

  modal.classList.toggle("visiblegrey");
  insidemodal.classList.toggle("visible5");
}


function closeModalInfo(e){
  var i=e.id;
  var modal=document.querySelector('#modalinfo'+i);
  var insidemodal=document.querySelector('#insideModalInfo'+i);
  modal.classList.toggle("visiblegrey");
  insidemodal.classList.toggle("visible5");
}

function modalSuppr(e){
  var i=e.id;
  var modal=document.querySelector('#modalsuppr'+i);
  var insidemodal=document.querySelector('#insideModalSuppr'+i);

  modal.classList.toggle("visiblegrey");
  insidemodal.classList.toggle("visible5");
}


function closeModalSuppr(e){
  var i=e.id;
  var modal=document.querySelector('#modalsuppr'+i);
  var insidemodal=document.querySelector('#insideModalSuppr'+i);
  modal.classList.toggle("visiblegrey");
  insidemodal.classList.toggle("visible5");
}
