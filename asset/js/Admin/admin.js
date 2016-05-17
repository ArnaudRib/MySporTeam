function displayAdd(){
  var AddBlock=document.getElementById('Add'); //lel
  var boutonADD=document.getElementById('boutonADD');
  var boutonRemove=document.getElementById('boutonREMOVE');
  boutonADD.classList.toggle('hidden');
  boutonRemove.classList.toggle('hidden');
  AddBlock.classList.toggle('hiddensize');
}

/* pour les sports */
var file=document.querySelectorAll(".files");
for (var i = 0; i < file.length; i++) {
  var img=document.querySelectorAll(".UploadedImage")[i];
  (function (img){ //WTF ?!?!
    file[i].onchange = function () {
      var reader = new FileReader();
      reader.onload = function (e) {
        img.src = e.target.result;
      };
      reader.readAsDataURL(this.files[0]);
    };
  })(img);
}


function modalinfo(e){
  var i=e.id;
  var modal=document.querySelector('#modalinfo'+i);
  var insidemodal=document.querySelector('#insideModalInfo'+i);

  modal.classList.toggle("visiblegrey");
  insidemodal.classList.toggle("visible");
}


function closeModal(e){
  var i=e.id;
  var modal=document.querySelector('#modalinfo'+i);
  var insidemodal=document.querySelector('#insideModalInfo'+i);
  modal.classList.toggle("visiblegrey");
  insidemodal.classList.toggle("visible");
}


function ClickOutside(e){
  var modal=document.querySelector('#modalinfo'+i);
  var insidemodal=document.querySelector('#insideModalInfo'+i);
  if (e.target==modal){
    modal.classList.toggle("visiblegrey");
    insidemodal.classList.toggle("visible");
  }
}

document.onclick = ClickOutside;

function modaldelete(e){

}
