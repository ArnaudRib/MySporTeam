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
<div style="background-color:rgb(255, 103, 103); background-size:cover; padding:20px; margin: 20px auto; text-align:center; border:1px black solid; border-radius:10px;">
  <p>Bonjour <b><?php echo strtoupper($info['nom']).' '. $info['prenom'];?></b>,
  </br>
  Vous avez été banni du site <a href="http://mysporteam.com/fr/">MYSPORTEAM.</a></p>

  Si vous souhaitez être informé des raisons, veuillez nous contacter directement par mail.</br>

  <i><u>NB</u> : Les bannissements sont effectués manuellement, et sont donc légitimes.</i>
</div>
