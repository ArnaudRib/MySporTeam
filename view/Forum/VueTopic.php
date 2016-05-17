<a href="<?php goToPage('discussionforum', ['id_topic'=>'1', 'id_discussion'=>'1'])?>">click</a>

<div class="forum">
  <h2 class="forums"><?php echo $topic['titre'] ?></h2>
  <div class="container-barre">
    <div class="barre-recherche">
      <form class="forumrecherche">
        <i class="fa fa-search fa-1x"></i>
        <input type="text" name="recherche" placeholder="rechercher une question">
      </form>
    </div>
  </div>

  <div class="pages">
    Pages: [1] 2 3 4
  </div>
  <div class="padding10 bleu">
    <div class="vide">
    </div>
    <div class="titre">
      Titre/Démarré par
    </div>
    <div class="nombre-reponses">
      Réponses/Vues
    </div>
    <div class="dernier-message">
      Dernier message
    </div>
  </div>
  <hr class="HR1">

  <?php foreach ($discussions as $key => $value): ?>
    <hr class="HR1">
    <div class="padding10 dark">
      <div class="fleche">
        <i class="fa fa-arrow-circle-o-right fa-3x rouge"></i>
      </div>
      <div class="lien-forum sous-topic">
        <h3><a href=""><?php echo $value['titre'] ?></a></h3>

        <p>Démarré par ####### << 1 2 3 4 >></p>
      </div>
      <div class="nombre-reponses">
        0 Réponse<br>2322 Vues
      </div>
      <div class="dernier-message">
        <?php echo $value['creation_date']?>,<br>13:40:23<br>par #######
      </div>
    </div>


  <?php endforeach; ?>
  <!--

<div class="padding10 dark">
  <div class="fleche">
    <i class="fa fa-arrow-circle-o-right fa-3x rouge"></i>
  </div>
  <div class="lien-forum sous-topic">
    <h3><a href="">Réglement des compétitions</a></h3>
    <p>Démarré par ####### << 1 2 3 4 >></p>
  </div>
  <div class="nombre-reponses">
    0 Réponse<br>2322 Vues
  </div>
  <div class="dernier-message">
    jeudi 28 avril 2016,<br>13:40:23<br>par #######
  </div>
</div>

<hr class="HR1">

  <div class="padding10">
    <div class="fleche">
      <i class="fa fa-arrow-circle-o-right fa-3x"></i>
    </div>
    <div class="lien-forum sous-topic">
      <h3><a href="">Idée de compétion 1</a></h3>
      <p>Démarré par ####### << 1 2 3 4 >></p>
    </div>
    <div class="nombre-reponses">
      700 Réponses<br>2322 Vues
    </div>
    <div class="dernier-message">
      jeudi 28 avril 2016,<br>13:40:23<br>par #######
    </div>
  </div>

  <hr class="HR1">

  <div class="padding10">
    <div class="fleche">
      <i class="fa fa-arrow-circle-o-right fa-3x"></i>
    </div>
    <div class="lien-forum sous-topic">
      <h3><a href="">Idée de compétion 2</a></h3>
      <p>Démarré par ####### << 1 2 3 4 >></p>
    </div>
    <div class="nombre-reponses">
      700 Réponses<br>2322 Vues
    </div>
    <div class="dernier-message">
      jeudi 28 avril 2016,<br>13:40:23<br>par #######
    </div>
  </div>

  <hr class="HR1">
  <div class="padding10">
    <div class="fleche">
      <i class="fa fa-arrow-circle-o-right fa-3x"></i>
    </div>
    <div class="lien-forum sous-topic">
      <h3><a href="">Idée de compétion 3</a></h3>
      <p>Démarré par ####### << 1 2 3 4 >></p>
    </div>
    <div class="nombre-reponses">
      700 Réponses<br>2322 Vues
    </div>
    <div class="dernier-message">
      jeudi 28 avril 2016,<br>13:40:23<br>par #######
    </div>
  </div> -->

</div>
