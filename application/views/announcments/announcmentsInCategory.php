<div class="fill">
  <div class="container">
    <ol class="breadcrumb">
      <li><?=anchor(site_url(),'Home')?></li>
      <li class="active"><?=ucfirst(str_replace('_',' ',$category['name']))?></li>
    </ol>
  <?php
  if(!empty($highlighted)) {
    for($i=0;$i<count($highlighted);$i++) {
      if(count($highlighted[$i]['pics'])>0) $path=$highlighted[$i]['pics'][0]['path'];
      else $path='img/nofile.jpg';
      ?>
      <a class="user-anchor" href="<?=site_url('announcments/view/'.$highlighted[$i]['basic']['id'].'/'.$highlighted[$i]['basic']['slug'])?>">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 margin-bottom box-sizer">
          <div class="panel panel-default singleAnnouncment">
              <div class="panel-heading highlighted"><?=$highlighted[$i]['basic']['title']?><span class="glyphicon glyphicon-star-empty padding-left"></span></div>
              <div class="panel-body no-padding">
                <img class="previewPicture img-responsive center-block" src="<?=base_url($path)?>" alt="zdjecie">
                <div class="price">Price: <?=$announcments['basic'][$i]['price'].' PLN'?></div>
              </div>
          </div>
        </div>
      </a>
      <?php
    }
  }
  if(!empty($announcments)) {
    for($i=0;$i<count($announcments['basic']);$i++) {
      if(count($announcments['pics'][$i])>0) $path=$announcments['pics'][$i][0]['path'];
      else $path='img/nofile.jpg';
      ?>
      <a class="user-anchor" href="<?=site_url('announcments/view/'.$announcments['basic'][$i]['id'].'/'.$announcments['basic'][$i]['slug'])?>">
        <div class="col-lg-3 col-sm-6 col-md-3 col-xs-6 margin-bottom box-sizer">
          <div class="panel panel-default singleAnnouncment">
              <div class="panel-heading"><?=$announcments['basic'][$i]['title']?></div>
              <div class="panel-body no-padding">
                <img class="previewPicture img-responsive center-block" src="<?=base_url($path)?>" alt="zdjecie">
                <div class="price">Price: <?=$announcments['basic'][$i]['price'].' PLN'?></div>
              </div>
          </div>
        </div>
      </a>
      <?php
    }
  }
  ?>
  </div>
</div>
