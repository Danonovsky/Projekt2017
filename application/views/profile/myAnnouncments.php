<div class="fill col-lg-8 col-lg-offset-2 col-md-offset-1 col-md-10 col-xs-12">
  <div class="user-access bg-white col-lg-10 col-lg-offset-1">
    <?php
    if(count($list)>0) {
      for($i=0;$i<count($list['basic']);$i++) {
        ?>
        <div class="bg-darker-white col-lg-12 vol-md-12 col-sm-12 col-xs-12 margin-bottom text-center">
          <?php if(!empty($list['pics'][$i]))
          { ?>
            <span class="col-lg-2 col-md-2 col-sm-2 col-xs-6"><img src="<?=base_url($list['pics'][$i][0]['path'])?>" class="previewPicture img-responsive small-photo"></span>
            <?php }
            else { ?>
            <span class="col-lg-2 col-md-2 col-sm-2 col-xs-6"></span>
          <?php  } ?>
          <span class="col-lg-3 col-md-2 col-sm-2 col-xs-6 text-left"><?=$list['basic'][$i]['title']?></span>
          <span class="col-lg-1 col-md-2 col-sm-2 col-xs-2"><?=anchor(site_url('profile/editAnnouncment/'.$list['basic'][$i]['id']),'Edytuj ', $arrayName = array('class' => 'user-anchor' ))?></span>
          <span class="col-lg-2 col-md-2 col-sm-2 col-xs-3"><?=anchor(site_url('profile/highlightAnnouncment/'.$list['basic'][$i]['id']),'Wyróżnij ', $arrayName = array('class' => 'user-anchor' ))?></span>
          <span class="col-lg-1 col-md-2 col-sm-2 col-xs-2"><?=anchor(site_url('profile/deleteAnnouncment/'.$list['basic'][$i]['id']),'Usuń ', $arrayName = array('class' => 'user-anchor' ))?></span>
          <span class="col-lg-3 col-md-2 col-sm-2 col-xs-6">Do: <?=$list['basic'][$i]['untilDate']?></span>
        </div>
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
