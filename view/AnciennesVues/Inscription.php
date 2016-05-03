<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="stylesheet.css"/>
        <title>MySporTeam</title>
        <meta charset="utf-8" />
    </head>


    <body>
      <!--Menu en haut de la page-->
      <?php include("header.php"); ?>

      <!--Contenu de la page-->
      <nav>
        <form style="margin:10px;" action="formulaire.php" method="post">
          <fieldset class="encadrement">
            <legend style="margin-left:7%;"> Inscription </legend>

            Sexe :
            <input type="radio" name="sexe" value="H" checked> M.
            <input type="radio" name="sexe" value="F"> Mme.</span>
            </br>

            <!--PARTIE DATE DE NAISSANCE-->
            Date de naissance :

            <!--Demande le jour-->
            <select style="border:1px solid black; padding-right:5px;" name="jour">
              <?php
              for ($i=1; $i<=31; $i++){
                $jour=$i;
                ?>
                <option value="<?php echo $jour?>"><?php echo $jour;?></option>
                <?php //permet de fermer la boucle
              }
              ?>
            </select>

            <!-- Demande le mois-->
            <select style="border:1px solid black; padding-right:5px;" name="mois">
              <?php
              $months_list = array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
              for ($i=0;$i<12;$i++){
                ?>
                <option value="<?php echo $i?>"><?php echo $months_list[$i];?></option>
                <?php
              }
              ?>
            </select>

            <!--Demande l'année-->
            <select style="border:1px solid black; padding-right:5px;" name="annee">
              <?php
              for ($i=0; $i<100; $i++){
                $annee=intval(date('Y'))-$i; //Donne à la variable date le int transformé en string - la valeur de i.
                ?>
                <option value="<?php echo $annee?>"><?php echo $annee;?></option>
                <?php //permet de fermer la boucle
              }
              ?>
            </select>
            <!--FIN PARTIE DATE DE NAISSANCE-->
            </br>
            Pseudonyme :
            <input type="text" name="pseudo" placeholder="Identifiant" required> </br>

            Adresse email :
            <input type="text" name="email" placeholder="Email" required> </br>

            Mot de passe :
            <input id="mdp" type="password" name="mot_de_passe" placeholder="Mot de passe" oninput="Verification()" required> </br>

            Confirmation mot de passe :
            <input id="mdp_verification" type="password" name="mot_de_passe_confirmation" placeholder="•••••••" oninput="Verification()" required> </br></br>

            <input id="submit" type="submit" name="Envoyer"> <br>
          </fieldset>
        </form>
      </nav>


      <!--Footer de la page-->
      <?php include("footer.php"); ?>
      <script src="Verification.js"></script>
  </body>

</html>
