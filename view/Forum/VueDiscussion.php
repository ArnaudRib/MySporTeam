<div class="AllForum">
  <div class="forum">
    <h2 class="forums"><?php echo $topic['titre']?> > <?php echo $discussion['titre']?> </h2>
    <div class="container-barre">
      <div class="barre-recherche">
        <form class="forumrecherche">
          <i class="fa fa-search fa-1x"></i>
          <input type="text" name="recherche" placeholder="rechercher une question">
        </form>
      </div>
    </div>

    <div class="padding10 bleu">
      <div class="post-auteur">
        Auteur : <?php echo $discussion['creator'];?>
      </div>
      <div class="post-sujet">
        Sujet: <?php echo $discussion['titre']?>
      </div>
    </div>
    <hr class="HR1">
<?php $i=1; ?>
<?php foreach ($messages as $key => $value): ?>
  <article class="post">
    <div class="conv-pseudo">
      <a href="#" class="pseudo"><?php echo $value['creator']?></a>
      <img class="avatar" src="<?php echo image('Users/Profil/'.$value['id_utilisateur'].'.jpg')?>" />
      <p class="nombre-message">Messages: <?php echo $nbTotalMessageUsers[$value['id_utilisateur']]?>
    </div>
    <div class="conv-contenu">
      <h2 class="titre-post">Titre: <?php echo $value['titre']?></h2>
      <p class="date-post">« <span class="gras">Réponse #<?php echo $i?></span> <?php echo diffDate($value['date_creation'])?> »</p>
      <hr class="hr-post">
      <p class="contenu"><?php echo $value['texte']?></p>
      <p class="modification">« Modifié: vendredi 06 mai 2016, 20:01:45 par Pseudo »</p>
    </div>
  </article>
  <?php $i+=1; ?>
<?php endforeach; ?>

    <!-- <hr class="HR1"> -->

    <div class="repondre">
      <form id="form-reponse" action="" method="post">
        <div class="AnswerSpace">
          <div class="titreanswer">
            <label for="inputform">Titre</label>
            <input id='inputform' class="inputforum" type="text" name="titre" placeholder="Titre" value="<?php if(!empty($_POST)){ echo $_POST['titre'];} ?>">
          </div>
          <div class="textanswer">
            <label for="areaanswer">Corps du message</label>
            <textarea id='areaanswer' class="form-text" form="form-reponse" name="reponse" placeholder="Veuillez insérer votre réponse ici"> <?php if(!empty($_POST)){ echo $_POST['reponse'];} ?></textarea>
          </div>
          <input class="bouton-poster bleu" type="submit" value="Poster">
      </div>
      </form>
    </div>

  </div>
</div>
