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
  echo $chemin;
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

/*foreach ($_POST as $key => $value) {
if($key!='nom_responsable2' && $key!='nom_responsable3'
&& $key!='fonction_responsable3' && $key!='fonction_responsable2'
&& $key!='nom_personnel' && $key!='nom_personnel2' && $key!='nom_personnel3'
&& $key!='valideprofil'
&& $key!='etablissements'){
if ($value=="") {
return false;
}
}
}
return true;*/
?>
