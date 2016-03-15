<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>test</title>
  </head>
  <body> <!--FUTURE UILISATION DE LA BDD PR RECUPERER CE BORDEL-->
    <?php $pseudo=$_POST["pseudo"];?>
    <?php $sexe=$_POST["sexe"];?>
    <?php $email=$_POST["email"];?>
    <?php $mot_de_passe=$_POST["mot_de_passe"];?>

    Utilisateur : <?php echo $pseudo;?></br>
    Sexe : <?php echo $sexe?></br>
    Email : <?php echo $email?></br>
    Motdepasse : <?php echo $mot_de_passe?></br>
    Date de naissance: <?php echo $_POST['jour'];?> - <?php echo $_POST['mois'];?> - <?php echo $_POST['annee'];?></br>

  </body>
</html>
