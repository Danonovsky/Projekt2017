<div class="container">
  <ol class="breadcrumb">
    <li><?=anchor(site_url(),'Home')?></li>
    <li><?=anchor('profile','Profile')?></li>
    <li class="active">Change Password</li>
  </ol>
</div>

<div class="col-lg-4 col-lg-offset-4 col-md-offset-1 col-md-10"><?=validation_errors()?></div>
  <div class="fill col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10 col-xs-12">
    <div class="user-access bg-white col-lg-8 col-lg-offset-2">
      <?=form_open('profile/changePassword')?>
      <p>
        <label class="margin label label-default" for="actualPassword">Aktualne hasło: </label>
        <input class="margin form-control input-sizer" type="password" name="actualPassword">
      </p>

      <p>
        <label class="margin label label-default" for="password">Nowe hasło: </label>
        <input class="margin form-control input-sizer" type="password" name="password">
      </p>

      <p>
        <label class="margin label label-default" for="password1">Powtórz nowe hasło: </label>
        <input class="margin form-control input-sizer" type="password" name="password1">
      </p>

      <p>
        <input class="margin btn btn-default" type="submit" name="submit" value="Zapisz zmiany">
        <?=anchor(site_url('profile'),'Powrót', $arrayName = array('class' => 'btn btn-default' ))?>
      </p>
    </form>

  </div>
</div>
