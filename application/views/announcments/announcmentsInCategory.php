<div class="fill">
  <div class="col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10">
  <?php
  if(!empty($highlighted)) {
    for($i=0;$i<count($highlighted);$i++) {
      if(count($highlighted[$i]['pics'])>0) $path=$highlighted[$i]['pics'][0]['path'];
      else $path='img/nofile.jpg';
      ?>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
        <div class="highlighted margined">
            <img class="previewPicture img-responsive center-block" src="<?=base_url($path)?>" alt="zdjecie">
            <div><?=anchor(site_url('announcments/view/'.$highlighted[$i]['basic']['id'].'/'.$highlighted[$i]['basic']['slug']),$highlighted[$i]['basic']['title'],$arrayName = array('class' =>'advertAnchor'))?></div>
            <div>Price: <?=$announcments['basic'][$i]['price'].' PLN'?></div>
        </div>
      </div>
      <?php
    }
  }
  if(!empty($announcments)) {
    for($i=0;$i<count($announcments['basic']);$i++) {
      if(count($announcments['pics'][$i])>0) $path=$announcments['pics'][$i][0]['path'];
      else $path='img/nofile.jpg';
      ?>
      <div class="col-lg-3 col-sm-6 col-md-3 col-xs-6">
        <div class="announcments margined">
            <img class="previewPicture img-responsive center-block" src="<?=base_url($path)?>" alt="zdjecie">
            <div><?=anchor(site_url('announcments/view/'.$announcments['basic'][$i]['id'].'/'.$announcments['basic'][$i]['slug']),$announcments['basic'][$i]['title'],$arrayName = array('class' =>'advertAnchor'))?></div>
            <div>Price: <?=$announcments['basic'][$i]['price'].' PLN'?></div>
        </div>
    </div>
      <?php
    }
  }
  ?>
  </div>
</div>
