<style>
  a{
    text-decoration: none;
    font-weight:bold;
    color:black;
  }
  .boutton{
    text-align:center;
    margin:0 auto;
    padding:20px;
    border:1px black solid;
    background-color:rgb(105, 92, 255);
    border-radius:5px;
    font-size:20px;
    width:50%;
  }
</style>
<div style="background-color:rgb(103, 173, 255); background-size:cover; padding:20px; margin: 20px auto; text-align:center; border:1px black solid; border-radius:10px;">
  <p>Bonjour <b><?php echo strtoupper($info['nom']).' '. $info['prenom'];?></b>,
  </br>
  Une demande de réinitialisation de mot de passe a été effectuée depuis votre compte sur le site
  <a href="http://mysporteam.com/fr/">MYSPORTEAM.</a></p>

  <a href="http://mysporteam.com/fr/reset-password?token=<?php echo $token ?>">
    <p class="boutton">Cliquez ici pour le réinitialiser</p>
  </a>
  <p style="margin-top:20px;color:black; font-style:italic;">Si vous n'êtes pas à l'origine de cette demande, veuillez ignorer ce mail.</p>
</div>
