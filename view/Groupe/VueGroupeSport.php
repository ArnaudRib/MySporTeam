<!--Partie Popup-->
<div id="GeneralPopUp" class="GeneralPopUp">
  <p class="closeButtonPopup" onclick="closePopUp()">&#10006;</p>
  <div id="FirstdivPopUp" class="FirstdivPopUp" style="width:100%; height:100%;">
    <div class="iconeblock" style="margin:0 auto; width:90%;">
      <?php foreach ($Allsports as $key => $value): ?>
        <div class="iconeblockeachsport">
          <a href="<?php goToPage('sportgroupe', ['id_sport'=>$value['id']])?>">
            <img class="" value="<?php echo $value['id']?>" src="<?php echo image("svg/{$value['nom']}.svg")?>" alt="" title="<?php echo $value['nom']?>"/>
          </a></br>
          <span class="NameUnderIcon"><?php echo ucfirst($value['nom']) ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div class="backgroundimage usualbackground">
  <div class="content-groupesport">
    <!--Partie Icones-->
    <?php $i=1; ?>
    <div id="listeicones">
      <div id="displayicones" class="display">
        <img id="imageicone" class="plusicone" src="<?php echo image("svg/plus.svg")?>" style="right: 19px;" alt="" onclick="displayPopUp()" />
        <?php foreach ($sports as $key => $value): ?>
          <?php $right= 15-(log($i)*10)."px";?>
          <div>
            <?php if($sport['id']!=$value['id']): ?>
              <a href="<?php goToPage('sportgroupe', ['id_sport'=>$value['id']])?>">
                <img id="imageicone" class="" value="<?php echo $value['id']?>" src="<?php echo image("svg/{$value['nom']}.svg")?>" alt="" title="<?php echo $value['nom']?>" style="right:<?php echo $right?>"/>
              </a>
              <?php $i+=1; ?>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
      <img src="<?php echo image("svg/{$sport['nom']}.svg")?>" alt="" title="<?php echo $sport['nom']?>" onclick="displayIcones()" />
    </div>

    <!--Partie Contenu-->

    <div class="container centre" style="margin:30px auto;">
      <div class="backgroundcontainer block30 OmbreContainer">
        <h1><?php echo ucfirst(str_replace("-"," ", $sport['nom'])) ?></h1>
        <h3><i><?php echo ucfirst($sport['description']) ?></i></h3>
      </div>
    </div>
    <div class="centre">
      <a href="<?php goToPage('recherchegroupe')?>">
        <h1 style="color:red;">Accéder à la recherche avancée de groupes.</h1>
      </a>
    </div>

  </div>
  <div class="backgroundimage image usualbackground" style="background-image:url(<?php echo image($photo['photo'])?>);"></div>
</div>
