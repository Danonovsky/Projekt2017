<div class="fill col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-8 col-xs-12">
  <div class="user-access bg-white col-lg-8 col-lg-offset-2 text-center padding-bottom">
    <?php
    if(count($conversations)>0) {
      foreach($conversations as $a) {
        ?>
        <p class="col-lg-12">
          <span>
            <?=anchor(site_url('profile/view/'.$a['id']),$a['name'].' '.$a['surname'],$arrayName = array('class' => 'col-lg-6 col-md-6 user-anchor' ))?>
          </span>
          <span>
            <?=anchor(site_url('messages/conversation/'.$a['id']),'Otwórz rozmowę',$arrayName = array('class' => 'col-lg-6 col-md-6 user-anchor' ))?>
          </span>
        </p>
        <?php
      }
    }
    ?>
  </div>
</div>
