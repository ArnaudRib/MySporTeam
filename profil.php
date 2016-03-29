<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="stylesheet.css"/>
  <title>Page Groupe</title>
  <meta charset="utf-8" />
</head>


<body>
  <!--Menu en haut de la page-->
  <?php include("header.php"); ?>
  <div class="haut_mongroupe">
    <div class="hautdugroupe">
      <img id="image_mongroupe" src="Images/sport3.jpg"/>
      <h1>Mon profil</h1>
      <div class="menu_mongroupe">
        <nav>
          <ul>
            <a href="" ><li>Informations</li></a>
            <a href="" ><li>Groupes</li></a>
            <a href="" ><li>Planning</li></a>
            <a href="deconnexion.php"><li><img id="bouton_on-off" src="Images/bouton_on-off.png" /></li></a>
          </ul>
        </nav>
      </div>
    </div>
  </div>



  </body>
