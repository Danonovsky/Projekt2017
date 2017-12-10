<div class="container">
  <ol class="breadcrumb">
    <li><?=anchor(site_url(),'Home')?></li>
    <li><?=anchor('profile','Profile')?></li>
    <li class="active">Data edit</li>
  </ol>
</div>

<div class="col-lg-4 col-lg-offset-4 col-md-offset-1 col-md-10"><?=validation_errors()?></div>
<div class="fill col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10 col-xs-12">
  <div class="user-access bg-white col-lg-8 col-lg-offset-2">
    <?=form_open('profile/edit')?>
      <p>
        <label class="margin label label-default"  for="name">Imię: </label>
        <input class="margin form-control input-sizer" type="text" name="name" value="<?=$this->session->userdata('name')?>">
      </p>

      <p>
        <label class="margin label label-default"  for="surname">Nazwisko: </label>
        <input class="margin form-control input-sizer" type="text" name="surname" value="<?=$this->session->userdata('surname')?>">
      </p>

      <p>
        <label class="margin label label-default"  for="phoneNr">Numer telefonu: </label>
        <input class="margin form-control input-sizer" type="text" name="phoneNr" value="<?=$this->session->userdata('phoneNr')?>">
      </p>

      <p>
        <label class="margin label label-default"  for="city">Miasto: </label>
        <input class="margin form-control input-sizer" type="text" name="city" value="<?=$this->session->userdata('city')?>">
      </p>

      <p>
        <input class="margin btn btn-default" type="submit" name="submit" value="Zapisz zmiany">
              <?=anchor(site_url('profile'),'Powrót', $arrayName = array('class' => 'btn btn-default' ));?>
      </p>
    </form>
  </div>
</div>
