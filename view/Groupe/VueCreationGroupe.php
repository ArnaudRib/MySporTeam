<nav id="creationgroupe">
  <form method="post">
    <div class="haut_creer_groupe">
        <h1> Créer votre Groupe </h1>
    </div>
  <fieldset>
    <input type="text" name="nomdugroupe" placeholder="Nom du Groupe">

    <input type="file" name="imagegroupe">

    <select>
        <option disabled selected> --- Catégorie --- </option>
        <option> Compétition </option>
        <option> Cours </option>
        <option> Entrainement </option>
    </select>

    <input type="number" placeholder="Nombre de membres : 45max" name="nbr_max">
    <?php if(isset($_POST['nbr_max'])){
          if ($_POST ['nbr_max'] >= 45 or $_POST ['nbr_max'] < 0){
          echo "Perdu";}
          else {echo "Gagné";}} ?>

    <select>
        <option disabled selected> --- Sport --- </option>
        <option> Football </option>
        <option> Rugby </option>
        <option> Basketball </option>
    </select>


    <select>
        <option disabled selected> --- Département --- </option>
    <?php for ($i=0; $i <100 ; $i++) :?>
      <option><?php echo $i ?> </option>
    <?php endfor;  ?>
    </select>

    <input type="text" name="ville" placeholder="Ville"></br>

    <label style="display: inline-block; width: 60px; float: none;">Public</label> <input style="display: inline-block; width: 30px; padding: 0; margin: 0; height:15px" type="radio" name="visibilite" value="public">
    <label style="display: inline-block; width: 60px; float: none;">Privé</label> <input type="radio" name="visibilite" value="prive" style="display: inline-block; width: 30px; height: 15px">
    <textarea name="description" rows="10" cols="50" placeholder="Description"></textarea>
    <input id="submit" type="submit" name="Envoyer" value="Valider">
  </fieldset>
  </form>
</nav>
