<div class="AllForum">
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

    <div class="padding10 bleu" style="text-align:right;">
      <div class="titreforum">
        Titre/Démarré par
      </div>
      <div class="nombre-reponses">
        Réponses/Vues
      </div>
      <div class="dernier-message">
        Dernier message
      </div>
    </div>

    <hr class="HR1"/>
    <?php foreach ($discussions as $key => $value): ?>
      <hr class="HR1"/>
      <a href="<?php goToPage('discussionforum', ['id_topic'=> $topic['id'], 'id_discussion'=>$value['id']])?>">
        <div class="padding10 blockdiscussion">
          <div class="fleche">
            <i class="fa fa-arrow-circle-o-right fa-3x rouge"></i>
          </div>
          <div class="lien-forum sous-topic">
            <h3><?php echo $value['titre'] ?></h3>
            <p>Démarré par <span style="color:red;"><?php echo $creator[$value['id']] ?></span> - <?php echo diffDate($value['creation_date'])?>.</p>
          </div>
          <div class="nombre-reponses">
            <?php echo $nbreponses[$value['id']]?> Réponse(s)<br><?php echo $nbvues[$value['id']]?> Vue(s)
          </div>
          <div class="dernier-message">
            <br><?php echo diffDate($lastMessage[$value['id']]['date_creation']) ?><br>par <span style="color:blue;"><?php echo $lastMessage[$value['id']]['pseudo'] ?></span>
          </div>
        </div>
      </a>

    <?php endforeach; ?>
  </div>
</div>
