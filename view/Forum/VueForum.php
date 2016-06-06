<div class="AllForum bodybackground">
  <div class="blockforum">
    <div class="sectionForum">
      <div class="forums">
        <h1 style="font-size: 50px; text-align:center;">Forum</h1>
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
