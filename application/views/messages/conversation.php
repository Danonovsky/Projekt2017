<div class="fill col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10 col-xs-12">
  <div class="user-access bg-white col-lg-8 col-lg-offset-2">
    <span class="text-center"> <h3>Rozmowa z: <?=$userData['name'].' '.$userData['surname']?></h3> </span>
    <?php
    if(count($messages)>0) {
      foreach($messages as $a) {
        if($a['ownerId']==$this->session->userdata('id')) {
          $class='messageOwner';
          $user=$this->session->userdata('name').' '.$this->session->userdata('surname');
        }
        else {
          $class='messageGetter';
          $user=$userData['name'].' '.$userData['surname'];
        }
        ?>
        <div class="<?=$class?>">
          <span><?=$a['date']?></span>
          <span><?=$user?></span>
          <p>
            <?=$a['content']?>
          </p>
        </div>
        <?php
      }
    }
    ?>
    <p>
      <?=validation_errors()?>

      <?=form_open('messages/conversation/'.$userData['id'])?>
        <label class="margin label label-default" for="message">Wiadomość: </label>
        <textarea class="margin form-control input-sizer" name="message" placeholder="Wpisz wiadomość"></textarea>
        <input class="margin btn btn-default" type="submit" value="Wyślij!">
      </form>
    </p>
  </div>
</div>
