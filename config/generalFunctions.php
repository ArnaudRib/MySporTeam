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

  public function isDate($name, $message){
    if(!strtotime($this->post[$name])){
      $this->error.=$message.'</br>';
      return false;
    }
  }

  public function isPreviousDate($name, $message){ /*pas testé xD.. */
    if(!preg_match($this->post[$name],'/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/'))
    {
      $this->error.=$message.'</br>';
      return false;
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
  $chemin='/asset/images/'.$root;
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
    if(!move_uploaded_file($_FILES[$input]["tmp_name"], $fileURL)){
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

function diffDate($date){
  date_default_timezone_set("Europe/Paris");
  if(!ctype_digit($date))
    $date = strtotime($date);
  if(date('Ymd', $date) == date('Ymd')){
    $diff = time()-$date;
  if($diff < 60) /* moins de 60 secondes */
   return 'Il y a '.$diff.' sec';
  else if($diff < 3600) /* moins d'une heure */
   return 'Il y a '.round($diff/60, 0).' min';
  else if($diff < 10800) /* moins de 3 heures */
   return 'Il y a '.round($diff/3600, 0).' heures';
  else /*  plus de 3 heures ont affiche ajourd'hui à HH:MM:SS */
   return 'Aujourd\'hui à '.date('H:i:s', $date);
  }
  else if(date('Ymd', $date) == date('Ymd', strtotime('- 1 DAY')))
  return 'Hier à '.date('H:i:s', $date);
  else if(date('Ymd', $date) == date('Ymd', strtotime('- 2 DAY')))
  return 'Il y a 2 jours à '.date('H:i:s', $date);
  else
  return 'Le '.date('d/m/Y à H:i:s', $date);
}

function test($iTime, $expression) {
        $iTimeDifference = time() - $iTime ;
        if( $iTimeDifference<0 ) { return; }
        $iSeconds       = $iTimeDifference ;
        $iMinutes       = round( $iTimeDifference/60 );
        $iHours         = round( $iTimeDifference/3600 );
        $iDays          = round( $iTimeDifference/86400 );
        $iWeeks         = round( $iTimeDifference/604800 );
        $iMonths        = round( $iTimeDifference/2419200 );
        $iYears         = round( $iTimeDifference/29030400 );
        if( $iSeconds<60 )
                return "less than a minute";
        elseif( $iMinutes<60 )
                return sprintf($expression, $iMinutes . ' minute' . ( $iMinutes>1 ? 's' : '' ));
        elseif( $iHours<24 )
                return sprintf($expression, $iHours . ' hour' . ( $iHours>1 ? 's' : '' ));
        elseif( $iDays<7 )
                return sprintf($expression, $iDays . ' day' . ( $iDays>1 ? 's' : '' ));
        elseif( $iWeeks <4 )
                return sprintf($expression, $iWeeks . ' week' . ( $iWeeks>1 ? 's' : '' ));
        elseif( $iMonths<12 )
                return sprintf($expression, $iMonths . ' month' . ( $iMonths>1 ? 's' : '' ));
        else
                return sprintf($expression, $iYears . ' year' . ( $iYears>1 ? 's' : '' ));
}
