<div class="bodybackground">
  <div class="blockinscription">
  <?php if($error!=''):?>
    <div class="errorbox blackborder radius">
      <?php echo $error;?>
    </div>
  <?php endif; ?>

    <nav id="inscription"> <!-- remettre <nav id="creationgroupe"> si tu veux pas noir-->
      <form action="<?php goTopage('creationgroupe')?>" method="post" >
        <h1 class=""> Créer votre Groupe </h1>
        <?php if($succes!=''): ?>
          <div class="successbox blackborder radius" style='margin:20px auto; margin-bottom:0px'>
            <?php echo $succes;?>
          </div>
        <?php endif; ?>
        <fieldset>
          <div>
            <label for="nom"><img src="asset/images/Users/icone_utilisateur.png" /></label>
            <input type="text" name="nom" placeholder="Nom du Groupe">
          </div>
          <input type="file" name="imagegroupe">

          <select name="categorie" require>
            <option selected value=""> --- Catégorie --- </option>
            <option value="Compétition"> Compétition </option>
            <option value="Cours"> Cours </option>
            <option value="Entrainement"> Entrainement </option>
          </select>

          <input type="number" placeholder="Nombre de membres : 45max" name="nombre" min="0" max="45"/>
          <?php /*if(isset($_POST['nbr_max'])){
            if ($_POST ['nbr_max'] >= 45 or $_POST ['nbr_max'] < 0){
            echo "Perdu";}
            else {
            echo "Gagné";
          }
        } A METTRE DANS LE CONTROLLER SI VRAIMENT NECESSAIRE*/?>

        <select name="sport">
          <option value="" selected> --- Sport --- </option>
          <option value="1"> Football </option>
          <option value="2"> Rugby </option>
        </select>
        <input type="text" name="ville" placeholder="Ville"></br>

        <label style="display: inline-block; width: 60px; float: none;">Public</label> <input style="display: inline-block; width: 30px; padding: 0; margin: 0; height:15px" type="radio" name="visibilite" value="public">
        <label style="display: inline-block; width: 60px; float: none;">Privé</label> <input type="radio" name="visibilite" value="prive" style="display: inline-block; width: 30px; height: 15px">

        <textarea name="description" rows="10" cols="50" placeholder="Description"></textarea>

        <input id="submit" type="submit" name="Envoyer" value="Valider">
      </fieldset>
    </form>

    </nav>
  </div>
</div>
