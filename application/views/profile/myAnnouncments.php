<?php
if(count($list)>0) {
  for($i=0;$i<count($list['basic']);$i++) {
    ?>
    <p>
      <?php if(!empty($list['pics'][$i]))
      { ?>
        <span><img src="<?=base_url($list['pics'][$i][0]['path'])?>" class="previewPicture"></span>
        <?php } ?>
      <span><?=$list['basic'][$i]['title']?></span>
      <span><?=anchor(site_url('profile/editAnnouncment/'.$list['basic'][$i]['id']),'Edytuj ogłoszenie')?></span>
      <span><?=anchor(site_url('profile/deleteAnnouncment/'.$list['basic'][$i]['id']),'Usuń ogłoszenie')?></span>
    </p>
    <?php
  }
}
