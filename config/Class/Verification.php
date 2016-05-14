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
    }
  }

  function PhotoOk($name, $futurnomimage, $directory, $message="Veuillez remplir le champ photo.</br>"){
    $url=$directory.'/'.$futurnomimage;
    $fileURL= substr(image($url),1);
    $imageFileType=pathinfo($fileURL, PATHINFO_EXTENSION);

    if (empty($this->post[$name]['name'])) {
      $this->error.= $message.'</br>';
    }

    if($imageFileType!='svg'){
      $check = getimagesize($this->post[$name]["tmp_name"]);
      if ($check == false) {
        $this->error.= "Le fichier n'est pas du bon format.</br>";
      }
    }

    if (file_exists($fileURL)) {
      $this->error.= "L'image existe déjà. </br>";
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
