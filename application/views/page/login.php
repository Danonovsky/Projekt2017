<div class="col-lg-4 col-lg-offset-4 col-md-offset-1 col-md-10"><?php echo validation_errors(); ?></div>

<?php echo form_open('page/login'); ?>
<div class="fill col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10">
  <ol class="breadcrumb">
    <li><?=anchor(site_url(),'Home')?></li>
    <li class="active">Login</li>
  </ol>
  <div class="user-access bg-white col-lg-8 col-lg-offset-2">
      <label class="margin label label-default" for='email'>E-mail:</label>
      <input class="margin form-control input-sizer" type="email" name="email">
      <br>

      <label class="margin label label-default" for='password'>Hasło:</label>
      <input class="margin form-control input-sizer" type="password" name="password">
      <br>

      <input class="margin btn btn-default" type="submit" name="submit" value="Zaloguj się">
      <?php echo anchor('page/register','Nie posiadasz jeszcze konta? Zarejestruj się już teraz!',$arrayName = array('class' => 'advertAnchor' )); ?>

    </form>
  </div>
</div>
