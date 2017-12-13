<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title><?='Sell.it | '.$title?></title>

  <link href="https://fonts.googleapis.com/css?family=Istok+Web" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url().'assets/css/bootstrap.min.css'?>">
  <link rel="stylesheet" href="<?=base_url().'assets/css/style.css'?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <input type="hidden" id="senderId" value="<?=$this->session->userdata('id')?>">
  <input type="hidden" id="site_url" data-base-url="<?=base_url()?>">
  <?php
  if($this->session->flashdata('alert')) {
    ?>
    <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 alert alert-info alert-dismissable fade in alert-fixed">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <?=$this->session->flashdata('alert')?>
    </div>
    <?php
  }
  ?>
