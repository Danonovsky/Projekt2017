<div class="col-lg-4 col-lg-offset-4 col-md-offset-1 col-md-10"><?php echo validation_errors(); ?></div>

<?php echo form_open('page/register'); ?>
<div class="fill col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10 col-xs-12">
  <ol class="breadcrumb">
    <li><?=anchor(site_url(),'Home')?></li>
    <li class="active">Register</li>
  </ol>
  <div class="user-access bg-white col-lg-8 col-lg-offset-2">
    <div id="name">
      <label class="margin label label-default" for='name'>Imię:</label>
      <input class="margin form-control input-sizer" type="text" name="name">
      <br>
    </div>

    <div id="surname">
      <label class="margin label label-default" for='surname'>Nazwisko:</label>
      <input class="margin form-control input-sizer" type="text" name="surname">
      <br>
    </div>

    <div id="email">
      <label class="margin label label-default" for='email'>E-mail:</label>
      <input class="margin form-control input-sizer" type="email" name="email">
      <br>
    </div>

    <div id="password">
      <label class="margin label label-default" for='password'>Hasło:</label>
      <input class="margin form-control input-sizer" type="password" name="password">
      <br>
    </div>

    <div id="password1">
      <label class="margin label label-default" for='password1'>Powtórz hasło:</label>
      <input class="margin form-control input-sizer" type="password" name="password1">
      <br>
    </div>

    <div id="phoneNr">
      <label class="margin label label-default" for='phoneNr'>Numer telefonu:</label>
      <input class="margin form-control input-sizer" type="text" name="phoneNr">
      <br>
    </div>

    <div id="city">
      <label class="margin label label-default" for='city'>Miasto:</label>
      <input class="margin form-control input-sizer" type="text" name="city">
      <br>
    </div>

    <input class="margin btn btn-default" type="submit" name="submit" value="Zarejestruj się">
    <?php echo anchor('page/login','Posiadasz już konto? Zaloguj się!',$arrayName = array('class' => 'advertAnchor' )); ?>

  </form>
</div>

</div>
