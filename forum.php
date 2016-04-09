<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>mySporteam | Forums</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<body class="AllForum">
  <header>
    <?php include('header.php'); ?>
  </header>

  <div class="forum">
    <h1 class="PoliceForum forums">Forums</h1>
    <div class="container-barre">
      <div class="barre-recherche">
        <form class="forumrecherche">
          <i class="fa fa-search fa-1x"></i>
          <input type="text" name="recherche" placeholder="rechercher une question">
        </form>
      </div>
    </div>
    <hr class="HR1">


    <div class="container">
      <div class="fleche">
        <i class="fa fa-arrow-circle-o-right fa-3x"></i>
      </div>
      <div class="lien-forum">
        <h3><a href="">À propos de mySporteam</a></h3>
        <p>Des problèmes ou des remarques sur le site de mySporteam ?</p>
      </div>
    </div>

    <hr class="HR1">

    <div class="container">
      <div class="fleche">
        <i class="fa fa-arrow-circle-o-right fa-3x"></i>
      </div>
      <div class="lien-forum">
        <h3><a href="">Forum de Discussion</a></h3>
        <p>Des envies particulières à partager ?</p>
      </div>
    </div>

    <hr class="HR1">

    <div class="container">
      <div class="fleche">
        <i class="fa fa-arrow-circle-o-right fa-3x"></i>
      </div>
      <div class="lien-forum">
        <h3><a href="">Forum des Compétitions</a></h3>
        <p>Des compétitions à soumettre ou des recherches de compétitions ?</p>
      </div>
    </div>

    <hr class="HR1">

    <div class="container">
      <div class="fleche">
        <i class="fa fa-arrow-circle-o-right fa-3x"></i>
      </div>
      <div class="lien-forum">
        <h3><a href="">Forum des Cours</a></h3>
        <p>Des propositions ou des recherches de cours ?</p>
      </div>
    </div>

    <hr class="HR1">

    <div class="container">
      <div class="fleche">
        <i class="fa fa-arrow-circle-o-right fa-3x"></i>
      </div>
      <div class="lien-forum">
        <h3><a href="">Forum des Entraînements</a></h3>
        <p>Des propositions ou des recherches d'entraînements ?</p>
      </div>
    </div>

  </div>

  <footer>
    <?php include('footer.php'); ?>
  </footer>

</body>
</html>
