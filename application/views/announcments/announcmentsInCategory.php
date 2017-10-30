<?php
if(!empty($announcments)) {
  for($i=0;$i<count($announcments['basic']);$i++) {
    if(count($announcments['pics'][$i])>0) $path=$announcments['pics'][$i][0]['path'];
    else $path='img/nofile.jpg';
    ?>
    <article>
      <p>
        <img class="previewPicture" src="<?=base_url($path)?>" alt="zdjecie">
        <span><?=anchor(site_url('ogloszenie/'.$announcments['basic'][$i]['id'].'/'.$announcments['basic'][$i]['slug']),$announcments['basic'][$i]['title'])?></span>
      </p>
    </article>
    <?php
  }
}
