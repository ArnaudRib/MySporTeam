<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>test</title>
  </head>
  <?php include('connectBDD.php');?>
  <body> <!--FUTURE UILISATION DE LA BDD PR RECUPERER CE BORDEL-->
    <?php
    $password=sha1($_POST['mot_de_passe']);
    $date_de_naissance=$_POST['annee']."-".$_POST['mois']."-".$_POST['jour'];
    $sql="INSERT INTO utilisateurs (pseudo,sexe,mot_de_passe,email,naissance) VALUES (?,?,?,?,?);";
    $query=$db->prepare($sql); //a mettre dans model
    $query->execute([$_POST['pseudo'],$_POST['sexe'],$password,$_POST['email'],$date_de_naissance]);
    header('Location: index.php');
    ?>
  </body>
</html>
