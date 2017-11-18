<div class="col-lg-4 col-lg-offset-4 col-md-offset-1 col-md-10"><?=validation_errors()?></div>
<div class="fill col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10 col-xs-12">
  <div class="user-access bg-white col-lg-8 col-lg-offset-2">
    <h2 class="text-center"><?=$result['basic']['title']?></h2>

    <?=form_open(site_url('profile/editAnnouncment/'.$result['basic']['id']))?>

    <input type="hidden" name="basicId" value="<?=$result['basic']['id']?>">
    <input type="hidden" name="detailsId" value="<?=$result['details']['id']?>">
    <p>
      <label class="margin label label-default" for="description">Opis: </label>
      <textarea class="margin form-control input-sizer" name="description"><?=$result['basic']['description']?></textarea>
    </p>

    <p>
      <label class="margin label label-default" for="price">Cena: </label>
      <input class="margin form-control input-sizer" type="number" name="price" step="0.01" min="0" value="<?=$result['basic']['price']?>">
    </p>

    <?php
    foreach($result['details'] as $key=>$val) {
      if($key!='id' && $key!='announcmentId') {
        ?>
        <p>
          <label class="margin label label-default" for="<?=$key?>"><?=$key?>: </label>
          <input class="margin form-control input-sizer" type="text" name="<?=$key?>"value="<?=$val?>">
        </p>
        <?php
      }
    }
    ?>

    <p>
      <input class="margin btn btn-default" type="submit" value="Zapisz zmiany">
    </p>
    <p>
      <?=anchor(site_url('profile/myAnnouncments'),'Powrót', $arrayName = array('class' => 'btn btn-default' ))?>
    </p>
    </form>
  </div>
</div>
