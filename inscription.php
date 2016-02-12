<?php?>

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
      <nav id="content">
        <h1> Inscription </h1>

				<form method="post" action="" class="id">
					<table>
						<tr>
							<td> Pseudo </td>
							<td><input type="text" placeholder="Identifiant" class="identifiant"><td>
						</tr>
						<tr>
							<td> Adresse E-mail</td>
							<td><input type="text" placeholder="Adresse E-mail" classe="identifiant"></td>
						</tr>
						<tr>
							<td> Mot de Passe</td>
							<td><input type="password" placeholder="Mot de Passe" classe="identifiant"></td>
						</tr>

						<tr>
							<td>Confirmation de Mot de Passe</td>
							<td><input type="password" placeholder="Confirmation Mot de Passe" classe="identifiant"></td>
						</tr>
						<tr>
							<td> </td>
							<td><input type="submit" value="Confirmer" class="idconfirm"></td>
						</tr>
          </table>
				</form>
      </nav>

      <!--Footer de la page-->
      <?php include("footer.php"); ?>

  </body>

</html>
