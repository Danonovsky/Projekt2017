<h3>Rozmowa z: <?=$userData['name'].' '.$userData['surname']?></h3>
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
    <p class="<?=$class?>">
      <span><?=$a['date']?></span>
      <span><?=$user?></span>
      <p>
        <?=$a['content']?>
      </p>
    </p>
    <?php
  }
}
?>
<p>
  <?=validation_errors()?>

  <?=form_open('messages/conversation/'.$userData['id'])?>
    <label for="message">Wiadomość: </label>
    <textarea name="message" placeholder="Wpisz wiadomość"></textarea>
    <input type="submit" value="Wyślij!">
  </form>
</p>
