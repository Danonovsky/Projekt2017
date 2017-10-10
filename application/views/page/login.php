<?php echo validation_errors(); ?>

<?php echo form_open('page/login'); ?>

  <label for='email'>E-mail:</label>
  <input type="email" name="email">
  <br>

  <label for='password'>Hasło:</label>
  <input type="password" name="password">
  <br>

  <input type="submit" name="submit" value="Zaloguj się">
  <?php echo anchor('page/register','Nie posiadasz jeszcze konta? Zarejestruj się już teraz'); ?>

</form>
