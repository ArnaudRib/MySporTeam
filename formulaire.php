<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>test</title>
  </head>
  <body>
    Utilisateur : <?php echo $_POST["pseudo"];?></br>
    Sexe : <?php echo $_POST["sexe"];?></br>
    Email : <?php echo $_POST['email'];?></br>
    Motdepasse : <?php echo $_POST['mot_de_passe'];?></br>
    Date de naissance: <?php echo $_POST['jour'];?> - <?php echo $_POST['mois'];?> - <?php echo $_POST['annee'];?></br>
  </body>
</html>
