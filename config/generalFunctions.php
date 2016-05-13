<?php

function dump($var){ //Sous forme de tableau!
  echo '<pre>';
  var_dump($var);
  echo '</pre>';
}

function isLogged(){
  if(isset($_SESSION['user']))
  return true;
  return false;
}

function isAdmin(){
  if($_SESSION['user']['admin_util']==1)
  return true;
  return false;
}

function image($root){
  $chemin='/asset/images/'.$root;
  return $chemin;
}

function exceptName($names=[]){ // renvoie true si tous les posts dont les names ne sont pas présents en parametre sont remplis
  $end=true;
  if(!empty($names)){
    foreach ($names as $nom) {
      foreach ($_POST as $key => $value) {
        if($key!=$nom){
          if($value==""){
            $end=false;
          }
        }
      }
    }
  }else {
    foreach ($_POST as $key => $value) {
      if($value==""){
        $end=false;
      }
    }
  }
  return $end;
}

function errorExceptInput($names=[]){ // renvoie un string des erreurs des posts non remplis si non présents en parametres.
  if(!empty($names)){
    foreach ($names as $nom) {
      foreach ($_POST as $key => $value) {
        if($key!=$nom){
          if($value==""){
            $error.='Veuillez remplir le champ '.$key.'.</br>';
          }
        }
      }
    }
  }else{
    foreach ($_POST as $key => $value) {
      if($value==""){
        $error.='Veuillez remplir le champ '.$key.'.</br>';
      }
    }
  }
  return $error;
}

function CreateSlider($ListImg, $type, $width='100%', $height='400px')
{
  $tab=serialize($ListImg);?>
  <iframe src="/view/Sliders/Slider.php?tab=<?php echo htmlspecialchars($tab) ?>&type=<?php echo $type ?>" width="<?php echo $width ?>" height="<?php echo $height?>"></iframe>
<?php
}

function GenerateSlider($ListImg)
{?>
  <div class="slider">
  <div class="navigation">
    <div class="flechenext" onclick="Next()"></div>
      <div class="flecheback rotate" onclick="Back()"></div>
    </div>
    <div class="notnavigation">
    <?php for ($i=0; $i < count($ListImg); $i++) {?>
    <div id="<?php echo $i+1 ?>" style="background-image:url('<?php echo '/asset/images/Sliders/'.$ListImg[$i] ?>');" class="<?php if ($i==0){echo "visible";}?>"></div>
    <?php  }?>
    </div>
  </div>
  </br>
  <?php
}

function uploadPhoto($name, $directory, $input){
  $error="";
  $name=str_replace(" ","-", $name);
  $url=$directory.'/'.$name;
  $fileURL= substr(image($url),1);
  $uploadOk = 1;
  $imageFileType=pathinfo($fileURL, PATHINFO_EXTENSION);

  if($imageFileType!='svg'){
    $check = getimagesize($_FILES[$input]["tmp_name"]);
    if ($check !== false || $check=='svg') {
      $uploadOk = 1;
    } else {
      $error.= "Le fichier importé pour le champ {$input} n'est pas une image.</br>";
      $uploadOk = 0;
    }
  }
  // Vérifie si le fichier n'existe pas déjà.
  if (file_exists($fileURL)) {
    $error.= "Désolé, le fichier pour le champ {$input} existe déjà.</br>";
    $uploadOk = 0;
  }

  // Check file size octets
  if ($_FILES[$input]["size"] > 5000000) {
    $error.= "Désolé, le fichier pour le champ {$input} est trop lourd.</br>";
    $uploadOk = 0;
  }

  if(!move_uploaded_file($_FILES[$input]["tmp_name"], $fileURL) && $uploadOk!=1){
    $error.= "Une erreur s'est produite pour le champ {$input}. Veuillez réessayer plus tard, ou contacter l'administrateur.</br>";
  }
  return $error;
}
