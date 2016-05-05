<nav id="creationgroupe">
  <form action=" <?php goTopage('creationgroupe')?>" method="post" >


        <div class= "titre_creation_groupe"><h1> Créer votre Groupe </h1></div>

  <fieldset>
    <input type="text" name="nom" placeholder="Nom du Groupe">

    <input type="file" name="imagegroupe">

    <select name="categorie">
        <option disabled selected> --- Catégorie --- </option>
        <option value="competition"> Compétition </option>
        <option value="cours"> Cours </option>
        <option value="entrainement"> Entrainement </option>
    </select>

    <input type="number" placeholder="Nombre de membres : 45max" name="nombre">
    <?php if(isset($_POST['nbr_max'])){
          if ($_POST ['nbr_max'] >= 45 or $_POST ['nbr_max'] < 0){
          echo "Perdu";}
          else {echo "Gagné";}} ?>

    <select name="sport">
        <option disabled selected> --- Sport --- </option>
        <option value="football"> Football </option>
        <option value="rugby"> Rugby </option>
        <option value="basketball"> Basketball </option>
    </select>


    <select name="departement">
        <option disabled selected> --- Département --- </option>
    <?php for ($i=0; $i <100 ; $i++) :?>
      <option value = <?php echo $i ?> > <?php echo $i ?> </option>
    <?php endfor;  ?>

    </select>

    <input type="text" name="ville" placeholder="Ville"></br>

    <label style="display: inline-block; width: 60px; float: none;">Public</label> <input style="display: inline-block; width: 30px; padding: 0; margin: 0; height:15px" type="radio" name="visibilite" value="public">
    <label style="display: inline-block; width: 60px; float: none;">Privé</label> <input type="radio" name="visibilite" value="prive" style="display: inline-block; width: 30px; height: 15px">

    <textarea name="description" rows="10" cols="50" placeholder="Description"></textarea>

    <input id="submit" type="submit" name="Envoyer" value="Valider">
    <?php dump ($_POST);?>
  </fieldset>
  </form>

</nav>
