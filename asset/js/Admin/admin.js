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
