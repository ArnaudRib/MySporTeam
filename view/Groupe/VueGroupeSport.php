<div class="backgroundimage usualbackground">
  <span>
    <?php $i=1; ?>
    <img class="iconesport fixedicone" src="/asset/svg/<?php echo $sport['nom']?>.svg" alt="" title="<?php echo $sport['nom']?>" onclick="displayIcones2()" />
    <div id="listeicones" class="display">
      <?php foreach ($sports as $key => $value): ?>
        <?php $marginleft=40 - (pow($i,2))*0.15 ."%";?>
        <?php $margintop=28 - 5 * $i ."%";?>
        <div>
          <?php if($sport['id']!=$value['id']): ?>
          <a href="<?php goToPage('sportgroupe', ['id_sport'=>$value['id']])?>">
            <img id="imageicone" class="iconesport fixedicone" value="<?php echo $value['id']?>" src="/asset/svg/<?php echo $value['nom']?>.svg" alt="" title="<?php echo $value['nom']?>" style="margin-left:<?php echo $marginleft?>; margin-top:<?php echo $margintop?>;"/>
          </a>
          <?php $i+=1; ?>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="container centre" style="margin:30px auto;">
      <div class="backgroundcontainer block30 OmbreContainer">
        <h1><?php echo ucfirst($sport['nom']) ?></h1>
        <h3><i><?php echo ucfirst($sport['description']) ?></i></h3>
      </div>
    </div>
    <div class="centre">
      <a href="<?php goToPage('recherchegroupe')?>">
        <h1 style="color:red;">Accéder à la recherche avancée de groupes.</h1>
      </a>
    </div>
  </span>
  <div class="backgroundimage image usualbackground" style="background-image:url(<?php echo $photo['photo']?>);"></div>
</div>
