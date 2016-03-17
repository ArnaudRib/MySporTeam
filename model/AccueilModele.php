<!--MODEL-->
<?php
require_once('config/connectBDD.php');

class AccueilModele extends BaseDeDonnes
{
  function LoadSports()
  {
    $sql = "SELECT id, nom, photo FROM Sports WHERE nom LIKE '%$text%' LIMIT 10";
    $resultat=$this->requeteSQL($sql);
    if (!$resultats){
      $this->showNoPhoto();
    }
    $this->showPhoto();
    return $resultat;
  }

  function showNoPhoto(){
    ?><p style="color:red;"> <?php echo "Désolé :( </br> YA PAS DE SPORT QUI S'APPELLE $text !!!";?> </p><?php
  }

  function ShowPhoto(){
    foreach ($resultat as $resultats) { //row choisit une seule ligne.
      ?>
        <div title="<?php echo $result['nom']?>" class="boxes" style="background-image: url('<?php echo $result['photo']?>')";></div>
      <?php
    }
  }
}

/* Ancien recherchesport.php*/
/*if(isset($_GET['resultat'])){
  $text = $_GET['resultat'];
}else{
  $text= '';
}

$sql = "SELECT id, nom, photo FROM Sports WHERE nom LIKE '%$text%' LIMIT 10";


if (!$results) { //Si la recherche ne donne rien?>
  <p style="color:red;"> <?php echo "Désolé :( </br> YA PAS DE SPORT QUI S'APPELLE $text !!!";?> </p>
<?php
}

foreach ($results as $result) { //row choisit une seule ligne.
  ?>
    <div title="<?php echo $result['nom']?>" class="boxes" style="background-image: url('<?php echo $result['photo']?>')";></div>
  <?php
}
?>*/
