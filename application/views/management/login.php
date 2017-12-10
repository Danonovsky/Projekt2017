<div class="col-lg-4 col-lg-offset-4 col-md-offset-1 col-md-10"><?php echo validation_errors(); ?></div>
<div class="container">
  <ol class="breadcrumb">
    <li><?=anchor(site_url(),'Home')?></li>
    <li class="active">Management</li>
  </ol>
</div>

<?php echo form_open('management'); ?>
<div class="fill col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10">
  <div class="user-access bg-white col-lg-8 col-lg-offset-2">
      <label class="margin label label-default" for='login'>Login:</label>
      <input class="margin form-control input-sizer" type="text" name="login">
      <br>

      <label class="margin label label-default" for='password'>Hasło:</label>
      <input class="margin form-control input-sizer" type="password" name="password">
      <br>

      <input class="margin btn btn-default" type="submit" name="submit" value="Zaloguj się">

    </form>
  </div>
</div>
