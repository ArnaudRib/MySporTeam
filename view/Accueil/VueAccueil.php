<?php
if(isset($_SESSION['user']['id'])):
  if(isset($_GET['connexion'])):
    if($_GET['connexion']):?>
      <div id="notification" class="notification">
        <p id="closenotification" style="color:red; font-size:35px; cursor:pointer; float:right;" class="closeButtonModal" onclick="displayNotification()">&#10006;</p>
        <div id="textnotification" class="textNotif">
          <span style="display:block; font-size:24px;  font-family:Arial">
            <?php echo lang("Bienvenue");?> <b> <?php echo $_SESSION['user']['pseudo']?></b>!
          </span>
          <div class="BlockNotifInvit">
            <?php if(!empty($notificationinvitation)):?>
              <div style="display:inline-block; width:90%; padding:10px; padding-bottom:5px; font-family:Arial; margin: 0 auto;">
                <?php echo lang('Vous avez')?> <b><?php echo count($notificationinvitation)?></b> invitation(s)!
              </div>
            <?php endif; ?>
            <?php foreach ($notificationinvitation as $key => $value): ?>
                <div class="notifInvitation">
                  <div style="display:inline-block; width:20%;">
                    <img src="<?php echo image('svg/invitation.svg')?>" style="width:65px; margin-bottom:15px;" alt="" />
                  </div>
                  <div style="display:inline-block; width:70%; font-family:Arial;">
                    <?php echo lang('Le groupe privé')?> <b><?php echo $value['nom']?></b> <?php echo lang('vous a invité à les rejoindre!')?> </br>
                    <u><b>Date</u></b> : <?php echo DiffDate($value['date'])?>.</br>
                    <u><b>Message</u></b> : <?php echo $value['message']?></br>
                  </div>
                  <a href="<?php echo goToPage('informationsgroupe', ['id'=>$value['id_groupe']])?>">
                    <div class="msgclick">
                        <i><?php echo lang('Vous pouvez consulter leur page en cliquant sur ce message')?>.</i>
                    </div>
                  </a>
                </div>
            <?php endforeach; ?>
          </div>

          <div class="BlockNotifMessage" style="margin-top:10px;">
              <?php if(!empty($notificationmessage)):?>
                <div style="display:inline-block; width:90%; padding:10px; padding-bottom:5px; font-family:Arial; margin: 0 auto;">
                  <?php echo lang('Vous avez')?>  <b><?php echo count($notificationmessage)?></b> message(s) <?php echo lang('non lu(s)')?> !
                </div>
              <?php endif; ?>
              <?php foreach ($notificationmessage as $key => $value): ?>
                <div class="notifMessage">
                  <div style="  align-content: center; display: flex;">
                    <div style="display:inline-flex; align-items:center;">
                      <img src="<?php echo image('svg/envelope.svg')?>" style="width:65px;" alt="" />
                    </div>
                    <div style="display:inline-block; width:70%;vertical-align: top; padding:15px; font-family:Arial;">
                      <u><b>De</u></b> : <?php echo $value['pseudo']?></br>
                      <u><b>À</u></b> : <?php echo DiffDate($value['date'])?>.</br>
                      <u><b>Objet</u></b> : <?php echo $value['objet']?>.</br>
                      <u><b>Message</u></b> : <?php echo $value['message']?>
                    </div>
                  </div>
                  <a href="<?php echo goToPage('messageprive')?>">
                    <div class="msgclick">
                        <i><?php echo lang('Cliquez ici pour lui envoyer un message')?>.</i>
                    </div>
                  </a>
                  <div style="display:block; width:90%; text-align:center; margin:0 auto">
                    <form class="" action="" method="post">
                      <input type="hidden" name="id_message" value="<?php echo $value['id_message']?>">
                      <input type="submit" class="deletenotif" name="deletenotif" value="Cliquer ici pour confirmer la lecture.">
                    </form>
                  </div>
                </div>

              <?php endforeach; ?>
              <?php if(empty($notificationinvitation) && empty($notificationmessage)): ?>
              <div style="display:inline-block; width:90%; padding:10px; padding-bottom:5px; font-family:Arial; margin: 0 auto;">
                <?php echo lang("Vous n'avez pas de nouvelles notifications!") ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
<?php
    endif;
  endif;
endif;?>
<!--Partie Popup-->
<div id="popup" class="popup">
  <p class="closeButtonPopup" onclick="closePopUp()" style="top:65px;">&#10006;</p>
  <div id="division1" class="division1" style="width:90%; height:90%;">
    <div class="Recherche">
      <h2 style="margin-left:10%; margin-right:10%; text-align:left; font-size:1.8em; display:inline-block;"><?php echo lang("Sports") ?></h2>
      <input id="search" type="text" name="search" class="barRecherche searchbar" style='margin-top:0px; width:300px; height:40px; padding:5px; padding-left:40px;!important; background-size: 19px 19px;' placeholder="Recherche..." onkeyup="getresults(this.value)"  autocomplete="off" spellcheck="false"/>
    </div>
    <div id="PhotoSport">
    </div>
  </div>
</div>

<!--Contenu de la page-->
<nav id="content">
  <!--Partie Photographie-->
  <section>
    <div onclick="popup()" class="ligne1">
      <div class="div1 usualbackground">
        <span class="Police1"><?php echo lang('Sports'); ?></span>
        <div class="img1 usualbackground" style="background-image:url('<?php echo image('sport.png')?>');"></div>
      </div>
    </div>
    <div class="ligne2">
      <a href='<?php goToPage('forum');?>'>
        <div class="div3 usualbackground">
          <span class="Police2"> <?php echo lang("Forums") ?></span>
          <div class="img2 usualbackground" style="background-image:url('<?php echo image('sport2.jpg')?>');"></div>
        </div></a><a href='<?php goToPage('aide');?>'><div class="div3 usualbackground">
          <span class="Police2"><?php echo lang("Aide") ?></span>
          <div class="img2 usualbackground" style="background-image:url('<?php echo image('sport4.jpg')?>');"></div>
        </div>
      </a>
    </div>
  </section>

  <!--Partie Texte-->
  <aside>
    <div class="div2 usualbackground">
      <div class="img3 usualbackground" style="background-image:url('/asset/images/chintoc.jpg');"></div>
      <div class="div2bis">
        <div class="Haut1" style="padding:20px; text-align:justify; font-size:20px; min-height:420px;">
          <p style="font-size:24px;"><strong><?php echo lang("MySporteam") ?></strong> <?php echo lang("vous permet d'intéragir avec des personnes ayant les mêmes passions que vous !") ?> </br></br>
            <?php echo lang("En vous inscrivant, vous pourrez participer à des cours, des entraînements, des compétitions proche de chez vous, et communiquer avec des passionnés du sport !") ?></p>
          </div><div class="Bas1">
          <div id="bouttoninscription">
            <a href="<?php goToPage('inscription')?>">
              <button class="button"><?php echo lang("Première visite?") ?></br><span style="font-size:15px;"><?php echo lang("Inscrivez vous!") ?></span></button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </aside>
</nav>
