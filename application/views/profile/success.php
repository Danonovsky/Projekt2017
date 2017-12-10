<div class="container">
  <ol class="breadcrumb">
    <li><?=anchor(site_url(),'Home')?></li>
    <li><?=anchor('profile','Profile')?></li>
    <li class="active">Success</li>
  </ol>
</div>

<div class="fill">
  <div class="col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10 user-access bg-white">
      <p>Ogłoszenie zostało dodane! <?=anchor(site_url('announcments/view/'.$this->session->flashdata('addAnnouncmentSuccess')),'Kliknij tutaj', $arrayName = array('class' => 'user-anchor' ))?>, aby je obejrzeć</p>
    </div>
</div>
