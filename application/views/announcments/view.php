<div>
<div class="fill">
  <div class="bg-white margin-bottom container">

      <h2><?=$announcment['basic']['title']?></h2>

      <?php
      if(count($announcment['pictures'])>0) {
        ?>
        <div class="row bg-darker-white">
          <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="col-lg-6 col-lg-offset-3">
              <img class="img-responsive" src="<?=base_url($announcment['pictures'][0]['path'])?>" alt="Zdjęcie">
            </div>
          </div>
        </div>
        <div class="row smallPictures bg-darker-white">
          <?php
          foreach($announcment['pictures'] as $a) {
            ?>
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                <img class="slider previewPicture pictureBorder img-responsive" src="<?=base_url($a['path'])?>" alt="Zdjęcie">
              </div>
            <?php
          }
          ?></div><?php
        }
        else {
          ?>
          <img class="img-responsive main" src="<?=base_url('img/nofile.jpg')?>" alt="Zdjęcie">
          <?php
        }

        ?>
        <div class="col-sm-10 col-sm-offset-2">
          <h3>Szczegółowe dane: </h3>
          <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
            <?php
            foreach($announcment['details'] as $key=>$val) {
              if($key!='id' && $key!='announcmentId') {
                ?>
                <p><span class="keyword"><?=$key?>:</span></p>
                <?php
              }

            }
            ?>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
          <?php
          foreach($announcment['details'] as $key=>$val) {
            if($key!='id' && $key!='announcmentId') {
              ?>
              <p><span class="keyword"><?=$val?></span></p>
              <?php
            }

          }
          ?>
        </div>
      </div>
        </div>
      <div class="col-sm-10 col-sm-offset-2">
        <p>
          <h3>Cena: <?=number_format($announcment['basic']['price'],2,'.',' ')?> zł</h3>
        </p>

        <p>
          <h3>Opis</h3>
          <?=$announcment['basic']['description']?>
        </p>

        <h3>Kontakt</h3>

        <p>Dane <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>: <?=$announcment['user']['name'].' '.$announcment['user']['surname']?></p>
        <p>Lokalizacja <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>: <?=$announcment['user']['city']?></p>
        <p>Nr telefonu <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>: <a href="tel:<?=$announcment['user']['phoneNr']?>"><?=$announcment['user']['phoneNr']?></a></p>
        <?php
        if($this->session->userdata('logged') && $this->session->userdata('id')!=$announcment['user']['id']) {
          ?>
          <p><a class="advertAnchor" href="<?=site_url('messages/conversation/'.$announcment['user']['id'])?>">Napisz wiadomość do sprzedawcy <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a> </p>
          <?php
        }
        ?>
      </div>
  </div>
</div>
</div>
