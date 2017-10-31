<p>
  <h2><?=$announcment['basic']['title']?></h2>
</p>

<p>
  <?php
  if(count($announcment['pictures'])>0) {
    ?>
    <img class="main previewPicture" src="<?=base_url($announcment['pictures'][0]['path'])?>" alt="Zdjęcie">
    <?php
    foreach($announcment['pictures'] as $a) {
      ?>
      <img class="previewPicture" src="<?=base_url($a['path'])?>" alt="Zdjęcie">
      <?php
    }
  }
  else {
    ?>
    <img class="previewPicture" src="<?=base_url('img/nofile.jpg')?>" alt="Brak zdjęcia">
    <?php
  }

  ?>
</p>

<p>
  <h3>Szczegółowe dane: </h3>
  <?php
  foreach($announcment['details'] as $key=>$val) {
    if($key!='id' && $key!='announcmentId') {
      ?>
      <p><?=$key?>: <?=$val?></p>
      <?php
    }

  }
  ?>
</p>

<p>
  Cena: <?=number_format($announcment['basic']['price'],2,'.',' ')?> zł
</p>

<p>
  <h3>Opis</h3>
  <?=$announcment['basic']['description']?>
</p>

<h3>Kontakt</h3>

<p>Dane: <?=$announcment['user']['name'].' '.$announcment['user']['surname']?></p>
<p>Lokalizacja: <?=$announcment['user']['city']?></p>
<p>Nr telefonu: <a href="tel:<?=$announcment['user']['phoneNr']?>"><?=$announcment['user']['phoneNr']?></a></p>
<?php
if($this->session->userdata('id')!=$announcment['user']['id']) {
  ?>
  <p><a href="<?=site_url('messages/conversation/'.$announcment['user']['id'])?>">Napisz wiadomość do sprzedawcy</a></p>
  <?php
}
?>
