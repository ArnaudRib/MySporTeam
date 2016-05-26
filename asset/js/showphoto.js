var file=document.querySelectorAll(".files");
for (var i = 0; i < file.length; i++) {
  var img=document.querySelectorAll(".classImage")[i];
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
