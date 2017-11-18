<div class="fill col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10 col-xs-12">
  <div class="user-access bg-white col-lg-8 col-lg-offset-2">
    <?php
    if($this->session->flashdata('highlightMessage')) {
      ?>
      <p class="text-center font-sizer-bigger">
        <?=$this->session->flashdata('highlightMessage')?>
      </p>
      <?php
    }
    ?>

    <p>
      <?=anchor(site_url('profile/myAnnouncments'),'Powrót', $arrayName = array('class' => 'user-anchor' ))?>
    </p>
  </div>
</div>
