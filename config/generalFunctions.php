<?php
Class Verification
{
  private $post;
  public $error;

  function __construct($post)
  {
    $this->post=$post;
  }

  function notEmpty($name, $message){
    if(empty($this->post[$name])){
      $this->error.=$message.'</br>';
      return false;// a verifier
    }
  }

  function PhotoOk($name, $futurnomimage, $directory, $skipAlreadyUploaded=true){
    $url=$directory.'/'.$futurnomimage;
    $fileURL= substr(image($url),1);
    $imageFileType=pathinfo($fileURL, PATHINFO_EXTENSION);

      if($imageFileType!='svg'){
        $check = getimagesize($this->post[$name]["tmp_name"]);
        if ($check == false) {
          $this->error.= "Le fichier {$name} n'est pas du bon format.</br>";
        }
      }

    if($skipAlreadyUploaded){
      if (file_exists($fileURL)) {
        $this->error.= "L'image existe déjà. </br>";
      }
    }

    if ($this->post[$name]["size"] > 5000000) {
      $this->error.= "Désolé, le fichier importé est trop lourd.</br>";
    }
  }

  public function isValid()
  {
    return empty($this->error);
  }
}

/* Utilitaire */
function dump($var){ //Sous forme de tableau!
  echo '<pre>';
  var_dump($var);
  echo '</pre>';
}

function image($root){
  $chemin='/mysporteam/asset/images/'.$root;
  return $chemin;
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

/* Remise en forme */
function minNoSpace($root){
  return htmlspecialchars(strtolower(str_replace(" ","-", $root)));
}

/* Exceptions*/
/*
Inutiles maintenant vu que class Verification existe.

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
}*/

/* Sliders */
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


/* Photo */
function uploadPhoto($name, $directory, $input){
  $error="";
  $url=$directory.'/'.$name;
  $fileURL= substr(image($url),1);

  if(!empty($_FILES[$input]['name'])){
    if(!move_uploaded_file($_FILES[$input]["tmp_name"], $fileURL) && $uploadOk!=1){
      $error= "Une erreur s'est produite pour le champ {$input}. Veuillez réessayer plus tard, ou contacter l'administrateur.</br>";
    }
  }

  return $error;
}

function deletePhoto($name, $directory, $message){
  $error="";
  $url=$directory.'/'.$name;
  $fileURL= substr(image($url),1);

  if(file_exists($fileURL)){
    if(!unlink($fileURL)){
      $error.= $message.'</br>';
    }
  }
  return $error;
}
