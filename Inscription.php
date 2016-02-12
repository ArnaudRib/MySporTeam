<!DOCTYPE html>
<html>
	<?php include("Header.php"); ?>

			<section>

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
				</form>
			</section>

			<?php include("Footer.php"); ?>
		<div>
	</body>
</html>
