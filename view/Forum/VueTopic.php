<div class="AllForum bodybackground">
  <div class="forum">
    <h2 class="forums" style="text-align:center;"><?php echo $topic['titre'] ?></h2>

    <?php if($error!=''):?>
      <div class="errorbox blackborder radius" style="text-align:center; margin:20px auto;">
        <?php echo $error;?>
      </div>
    <?php endif; ?>
    <?php if($succes!=''): ?>
      <div class="successbox blackborder radius" style='margin:20px auto; margin-bottom:0px'>
        <?php echo $succes;?>
      </div>
    <?php endif; ?>

    <div class="padding10 bleu" style="text-align:right;">
      <div class="titreforum">
        <?php echo lang('Titre/Démarré par')?>
      </div>
      <div class="nombre-reponses">
        <?php echo lang('Réponses/Vues')?>
      </div>
      <div class="dernier-message">
        <?php echo lang('Dernier message')?>
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
            <p><?php echo lang('Démarré par')?> <span style="color:red;"><?php echo $creator[$value['id']] ?></span> - <?php echo diffDate($value['creation_date'])?>.</p>
          </div>
            <div class="nombre-reponses">
              <?php echo $nbreponses[$value['id']]?> Réponse(s)<br> <?php echo !empty($nbvues[$value['id']]) ? $nbvues[$value['id']].' Vue(s)' : 'Aucune Vue'?>
            </div>
          <?php if($nbreponses[$value['id']]!=0): ?>
            <div class="dernier-message">
              <br><?php echo diffDate($lastMessage[$value['id']]['date_creation']) ?><br>par <span style="color:blue;"><?php echo $lastMessage[$value['id']]['pseudo'] ?></span>
            </div>
          <?php else: ?>
            <div class="dernier-message">
              <?php echo lang('Aucune réponse encore postée')?>.
            </div>
          <?php endif; ?>
        </div>
      </a>
    <?php endforeach; ?>

    <div style="text-align:center; margin:30px;">
      <button id="Add" class="buttonmodif" onclick="DisplayBlock()" style="width:50%; margin:0 auto; text-align:center; background-color:rgb(174, 255, 150);"><?php echo lang('Ajouter une discussion')?> <span style="float:right; font-size:15px;margin-right:20px;">+</span></button>
    </div>
      <?php if(isLogged()): ?>
        <div id="adddiscussion" class="repondre displaynone">
          <form id="form-reponse" action="" method="post">
            <input type="hidden" name="id_topic" value="<?php echo $id_topic?>">
            <div class="AnswerSpace">
              <div class="titreanswer">
                <label for="inputform"><?php echo lang('Titre de la discussion') ?></label>
                <input id='inputform' class="inputforum" type="text" name="titre" placeholder="Titre" value="<?php if(isset($error)){if(!empty($_POST)){ echo $_POST['titre'];}} ?>">
                <input type="submit" class="buttonmodif" style="width:30%; margin:0 auto; text-align:center; background-color:rgb(174, 255, 150); margin:10px;" name="addDiscussion" value="Valider l'ajout">
              </div>
            </div>
          </form>
        </div>
      <?php endif; ?>
     </div>
  </div>
</div>
