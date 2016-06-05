<div class="bodymsg">
	<div style="font-size:30px; background-color:rgb(89, 126, 255); box-shadow:0px 0px 5px black; text-align:center; margin:20px auto; margin-top:-10px; padding:10px; width:60%;">
		Mot de passe oubli&eacute;
	</div>
	<?php if($error!=''):?>
		<div class="errorbox blackborder radius" style="font-size:15px; margin: 20px auto;width:60%;">
			<?php echo $error;?>
		</div>
	<?php endif; ?>
	<?php if($succes!=''): ?>
		<div class="successbox blackborder radius" style='margin:20px auto;padding:20px;width:60%;'>
			<?php echo $succes;?>
		</div>
	<?php endif; ?>
	<form name="nouveau-message" class="messageform" method="post" action="">
		<div style="text-align:center; padding:10px;">
			<h2 class="h2-message">Mot de passe oubli&eacute; :</h2>
		</div>
		<div>
			<label class="labelmessage messagedestinataire" for="email">Adresse email :</label>
			<input class="txtmessage" type="email" name="email" id="email" maxlength="100" placeholder="user@email.com"/>
		</div>
		<div>
			<label class="labelmessage"for="pseudo">Pseudo :</label>
			<input class="txtmessage" type="text" name="pseudo" id="pseudo" maxlength="100" placeholder="Pseudo" />
		</div>

		<div class="submitmessageprive">
			<input class="bouttonmsgprive sendmessageboutton" type="submit" name="sendmail" value="Envoyer">
			<input class="bouttonmsgprive cancelboutton" type="submit" value="Annuler">
		</div>
	</form>
</div>
