<?php
print_r($announcments);
 ?>
<div class="fill">
  <div class="col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10">
  <?php
  if(!empty($highlighted)) {
    for($i=0;$i<count($highlighted);$i++) {
      if(count($highlighted[$i]['pics'])>0) $path=$highlighted[$i]['pics'][0]['path'];
      else $path='img/nofile.jpg';
      ?>
      <a href="<?=site_url('announcments/view/'.$highlighted[$i]['basic']['id'].'/'.$highlighted[$i]['basic']['slug'])?>">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 margin-bottom">
          <div class="highlighted margined">
              <img class="previewPicture img-responsive center-block" src="<?=base_url($path)?>" alt="zdjecie">
              <div><?=$highlighted[$i]['basic']['title']?></div>
              <div>Price: <?=$announcments['basic'][$i]['price'].' PLN'?></div>
          </div>
        </div>
      </a>
      <?php
    }
  }
  ?>
  </div>
</div>
