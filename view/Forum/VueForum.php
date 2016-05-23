<div class="bodybackground">
  <div class="blockforum">
    <div class="sectionForum">
      <div class="forums">
        <h1 style="text-align: right; font-size: 50px;">Forums</h1>
      </div>
      <div class="container-barre">
        <div class="barre-recherche">
          <form>
            <i class="fa fa-search fa-1x"></i>
            <input type="text" name="recherche" placeholder="rechercher une question">
          </form>
        </div>
      </div>

      <?php foreach ($topic as $key => $value) :?>
        <hr class="premierHR" />
        <a href="<?php goToPage('topicforum', ['id_topic'=> $value['id']])?>">
          <div class="containerforum">
            <div class="fleche">
              <i class="fa fa-arrow-circle-o-right fa-3x"></i>
            </div>
            <div class="lien-forum">
              <h3> <?php echo $value['titre']?></h3>
              <p style="font-style: italic; color: black;"><?php echo $value['description']?></p>
            </div>
          </div>
        </a>
      <?php endforeach;?>
    </div>
  </div>
</div>
