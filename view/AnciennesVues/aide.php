<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="stylesheet.css"/>
  <title>MySporTeam</title>
  <meta charset="utf-8" />


</head>
<body>
  <?php include("header.php"); ?>

  <div class="faq">
    <h1> FAQ </h1>
  </div>
    <section>
      <div class="question">
        <div class="question1">
          <ul>
            <li> <strong> Groupes : </strong> </li> </br>

            <li> <button onclick="popupshow()"> - J'ai eu des problèmes avec un cours. Comment vous le signalez ? </button>
            <div id="popup" style="display:none;"> </br>
            <p> Vous pouvez nous contacter à l'adresse suivante : admin@mysporteam.com. </p>
            </div></li></br>

            <li> <button onclick="popupshow()">  - Puis-je créer un nouveau sport ? </button>
            <div id="popup" style="display:none;"> </br>
            <p> Oui. Cliquez « ici ». </p>
            </div></li></br>

            <li> - Je ne pourrais pas assister à un cours. Est-ce grave ? </li> </br>
          </ul>

          <ul>
            <li> <strong> Contact :</strong> </li> </br>
            <li> - Comment puis-je vous contacter? </li> </br>
            <li> - Comment vous contactez sur les réseaux sociaux ? </li> </br>
            <li> - J’ai rencontré un problème avec le site. Que faire ? </li> </br>
          </ul>
        </div>
        <div class="question2">
          <ul>
            <li> <strong> Compte : </strong></li> </br>
            <li> - J’ai oublié mon mot de passe, comment faire pour le récupérer ? </li> </br>
            <li> - Quels sont les avantages que je peux obtenir en créant un compte ? </li> </br>
            <li> - j'aimerai changer de Pseudo, est-ce possible ? </li> </br>
          </ul>

          <ul>
            <li> <strong> Paiement :</strong> </li> </br>
            <li> - Existe-t-il des frais quant à l’utilisation de ce site ? </li> </br>
            <li> - Faut-il payer pour la participation à certains cours ? </li> </br>
            <li> - Comment se passe le paiement de la réservation d'une salle ? </li> </br>
          </ul>
        </div>
      </div>

  </section>

    <script src="aide.js"> </script>

      <?php include("footer.php"); ?>

  </body>



</html>
