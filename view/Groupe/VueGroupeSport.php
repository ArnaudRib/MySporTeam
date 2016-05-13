<div class="backgroundimage usualbackground">
  <span>
    <?php $i=1; ?>
    <div id="listeicones">
       <div id="displayicones" class="display">
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
      <img class="iconesport fixedicone" src="<?php echo image("svg/{$sport['nom']}.svg")?>" alt="" title="<?php echo $sport['nom']?>" onclick="displayIcones2()" />
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
  <div class="backgroundimage image usualbackground" style="background-image:url(<?php echo image($photo['photo'])?>);"></div>
</div>
