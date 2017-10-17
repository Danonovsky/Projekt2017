<?php echo validation_errors(); ?>

<?php echo form_open('management'); ?>

  <label for='login'>Login:</label>
  <input type="text" name="login">
  <br>

  <label for='password'>Hasło:</label>
  <input type="password" name="password">
  <br>

  <input type="submit" name="submit" value="Zaloguj się">

</form>

<?php
if($this->session->flashdata('adminLoginMessage')) {
  echo $this->session->flashdata('adminLoginMessage');
}
?>
