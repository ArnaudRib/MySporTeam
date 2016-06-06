<div class="bodymsg">
	<div style="font-size:30px; background-color:rgb(89, 126, 255); box-shadow:0px 0px 5px black; text-align:center; margin:20px auto; margin-top:-10px; padding:10px; width:60%;">
		R&eacute;initialisation mot de passe
	</div>

  <?php if($error!=''):?>
    <div class="errorbox blackborder radius" style="font-size:15px; margin: 20px auto; ">
      <?php echo $error;?>
    </div>
  <?php endif; ?>
  <?php if($succes!=''): ?>
    <div class="successbox blackborder radius" style='margin:20px auto;padding:20px;'>
      <?php echo $succes;?>
    </div>
  <?php endif; ?>

	<form name="nouveau-message" class="messageform" method="post" action="">
		<div style="text-align:center; padding:10px;">
			<h2 class="h2-message">R&eacute;initialisation mot de passe :</h2>
		</div>

		<div>
			<label class="labelnouveaumdp"for="mot_de_passe">Nouveau mot de passe :</label>
			<input id="mdp" class="txtnouveaumdp" type="password" name="mot_de_passe"  maxlength="100" placeholder="Nouveau mot de passe" oninput="Verification(), showmessage(this)"/>
		</div>
		<div>
			<label class="labelnouveaumdp" for="mot_de_passe_confirmation">R&eacute;p&eacute;tition nouveau mot de passe:</label>
			<input id="mdp_verification" class="txtnouveaumdp" type="password" name="mot_de_passe_confirmation" maxlength="100" placeholder="Nouveau mot de passe" oninput="Verification()"/>
		</div>

		<div class="submitmessageprive">
			<input id="submit" class="bouttonmsgprive sendmessageboutton" type="submit" name="resetpw" value="Envoyer">
			<input class="bouttonmsgprive cancelboutton" type="submit" value="Annuler">
		</div>

    <div id="messageMDP" class=""></div>

	</form>
</div>
