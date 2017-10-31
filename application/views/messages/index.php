<?php
if(count($conversations)>0) {
  foreach($conversations as $a) {
    ?>
    <p>
      <span>
        <?=anchor(site_url('profile/view/'.$a['id']),$a['name'].' '.$a['surname'])?>
      </span>
      <span>
        <?=anchor(site_url('messages/conversation/'.$a['id']),'Otwórz rozmowę')?>
      </span>
    </p>
    <?php
  }
}
