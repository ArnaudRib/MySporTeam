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
<div style="background-color:rgb(103, 255, 118); background-size:cover; padding:20px; margin: 20px auto; text-align:center; border:1px black solid; border-radius:10px;">
  <p>Bonjour <b><?php echo strtoupper($info['nom']).' '. $info['prenom'];?></b>,
  </br>
  Vous avez été unban du site <a href="http://mysporteam.com/fr/">MYSPORTEAM.</a></p>

  Si cela n'était pas une erreur de manipulation, nous vous invitons à vous comporter de manière irréprochable à l'avenir.</br>

  <i><u>NB</u> : Les bannissements sont effectués manuellement, et sont donc légitimes.</i>
</div>
