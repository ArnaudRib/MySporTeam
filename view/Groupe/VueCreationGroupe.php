<?php if(isset($error)):?>

  <div class="errorbox blackborder radius">
    <?php echo $error;?>
  </div>
<?php endif; ?>

<nav id="inscription"> <!-- remettre <nav id="creationgroupe"> si tu veux pas noir-->
  <form action="<?php goTopage('creationgroupe')?>" method="post" enctype="multipart/form-data">
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
      <input type="file" name="imagegroupe" style="margin-right:12%">

      <select name="categorie" require>
        <option selected value=""> --- Catégorie --- </option>
        <option value="Compétition"> Compétition </option>
        <option value="Cours"> Cours </option>
        <option value="Entrainement"> Entrainement </option>
      </select>

      <input type="number" placeholder="Nombre de membres : 45max" name="nbmax_sportifs" min="0" max="45"/>
      <?php /*if(isset($_POST['nbr_max'])){
        if ($_POST ['nbr_max'] >= 45 or $_POST ['nbr_max'] < 0){
        echo "Perdu";}
        else {
        echo "Gagné";
      }
    } A METTRE DANS LE CONTROLLER SI VRAIMENT NECESSAIRE*/?>

    <select name="id_sport">
      <option value="" selected> --- Sport --- </option>
      <option value="1"> Football </option>
      <option value="2"> Rugby </option>
    </select>


    <input type="number" name="id_ville" placeholder="Ville"></br>

    <label style="display: inline-block; width: 60px; float: none;">Public</label> <input style="display: inline-block; width: 30px; padding: 0; margin: 0; height:15px" type="radio" name="public" value="public">
    <label style="display: inline-block; width: 60px; float: none;">Privé</label> <input type="radio" name="public" value="prive" style="display: inline-block; width: 30px; height: 15px">


      <h2 class="titre_niveau"> Niveau </h3>

    <label style="display: inline-block; width: 80px; float: none;">Débutant</label> <input style="display: inline-block; width: 20px; padding: 0; margin: 0; height:15px" type="radio" name="niveau" value="debutant">
    <label style="display: inline-block; width: 114px; float: none;">Intermediaire</label> <input type="radio" name="niveau" value="intermediaire" style="display: inline-block; width: 20px; height: 15px">
    <label style="display: inline-block; width: 80px; float: none;">Avancé</label> <input style="display: inline-block; width: 20px; padding: 0; margin: 0; height:15px" type="radio" name="niveau" value="avance">
    <label style="display: inline-block; width: 114px; float: none;">Professionnel</label> <input type="radio" name="niveau" value="professionnel" style="display: inline-block; width: 20px; height: 15px">

    <textarea name="description" rows="10" cols="50" placeholder="Description"></textarea>

    <input id="submit" type="submit" name="Envoyer" value="Valider">
  </fieldset>
  </form>


</nav>
