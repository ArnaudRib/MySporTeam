<div class="bodymsg">
	<div style="font-size:30px; background-color:rgb(89, 126, 255); box-shadow:0px 0px 5px black; text-align:center; margin:20px auto; margin-top:-10px; padding:10px; width:60%;">
		Message privé
	</div>
	<form name="nouveau-message" class="messageform" method="post" action="">
		<div style="text-align:center; padding:10px;">
			<h2 class="h2-message">Nouveau message :</h2>
		</div>
		<div>

			<div class="searchuser" style='margin:0 auto;'>
				<label class="labelmessage messagedestinataire" for="destinataire">Destinataire :</label>
	      <input id="searchuser" class="barRechercheUser txtmessage" type="text" placeholder="Entrez votre recherche" style="padding:10px;  margin: 0 auto; font-size:15px;;width:60%;" name="name" value="" onkeyup="getresults3(this.value, event); out3(event)" autocomplete="off" onfocus="showsearch3()" spellcheck="false">
	      <div id="resultatsrechercheUser" class="blockresultsuser visible4" style="margin-left: 25%;">
	        <div class="messagesearch">Veuillez compléter le champ recherche...</div>
	      </div>
	    </div>

			<label class="labelmessage messagedestinataire" for="destinataire">Destinataire :</label>
			<input class="txtmessage" type="text" name="destinataire" id="destinataire" maxlength="100" placeholder="To.."/>
		</div>
		<div>
			<label class="labelmessage"for="objet">Objet :</label>
			<input class="txtmessage" type="text" name="objet" id="objet" maxlength="100" placeholder="Objet" />
		</div>
		<div><label class="labelmessage" for="message" style="vertical-align:top; padding-top:15px;">Message :</label>
			<textarea form="nouveau-message" class="textareamessageprive" name="message" id="message" placeholder="Veuillez insérer votre nouveau message"></textarea>
		</div>

		<div class="submitmessageprive">
			<input class="bouttonmsgprive sendmessageboutton" type="submit" value="Envoyer">
			<input class="bouttonmsgprive cancelboutton" type="submit" value="Annuler">
		</div>
	</form>
</div>
