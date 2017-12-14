<?php
$user=$this->session->userdata('name').' '.$this->session->userdata('surname');
$user1=$this->session->userdata('name').' '.$this->session->userdata('surname');
 ?>

<div class="container">
  <ol class="breadcrumb">
    <li><?=anchor(site_url(),'Home')?></li>
    <li><?=anchor('messages','Conversations')?></li>
    <li class="active">Messages</li>
  </ol>
</div>

<input type="hidden" id="hisName" name="" value="<?=$userData['name'].' '.$userData['surname']?>">
<input type="hidden" id="myName" name="" value="<?=$user?>">

<div class="container">
  <div class="user-access bg-white">
    <span class="text-center"> <h3>Rozmowa z: <?=$userData['name'].' '.$userData['surname']?></h3> </span>
    <div id="messageList">
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
            <span><?=$user?></span>
            <span><sup><?=$a['date']?></sup></span>
            <p style="word-wrap: break-word;overflow-wrap:break-word">
              <?=$a['content']?>
            </p>
          </div>
          <?php
        }
      }
      ?>
    </div>
    <p>
      <?=validation_errors()?>

      <?=form_open('',array('id'=>'sendMessage'))?>
        <label class="margin label label-default" for="message">Wiadomość: </label>
        <input type="hidden" id="receiverId" value="<?=$userData['id']?>">
        <textarea id="messageContent" class="margin form-control input-sizer" style="resize: none;" name="message" placeholder="Wpisz wiadomość"></textarea>
        <input class="margin btn btn-default" type="submit" value="Wyślij!">
      </form>
    </p>
  </div>
</div>
