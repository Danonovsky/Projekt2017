<div class="fill col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10 col-xs-12">
  <div class="user-access bg-white col-lg-8 col-lg-offset-2">
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
          <span><?=anchor(site_url('profile/editAnnouncment/'.$list['basic'][$i]['id']),'Edytuj ogłoszenie', $arrayName = array('class' => 'user-anchor' ))?></span>
          <span><?=anchor(site_url('profile/highlightAnnouncment/'.$list['basic'][$i]['id']),'Wyróżnij ogłoszenie', $arrayName = array('class' => 'user-anchor' ))?></span>
          <span><?=anchor(site_url('profile/deleteAnnouncment/'.$list['basic'][$i]['id']),'Usuń ogłoszenie', $arrayName = array('class' => 'user-anchor' ))?></span>
          <span>Do: <?=$list['basic'][$i]['untilDate']?></span>
        </p>
        <?php
      }
    }
    else {
      ?>
      <p>Obecnie nie posiadasz żadnych aktywnych ogłoszeń. Możesz dodać nowe ogłoszenie <?=anchor('profile/newAnnouncment','tutaj', $arrayName = array('class' => 'user-anchor' ))?>.</p>
      <?php
    }
    ?>
    <p>
      <?=anchor(site_url('profile'),'Powrót', $arrayName = array('class' => 'btn btn-default' ))?>
    </p>
  </div>
</div>
