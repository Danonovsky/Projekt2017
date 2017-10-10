<?php echo validation_errors(); ?>

<?php echo form_open('page/register'); ?>

  <label for='name'>Imię:</label>
  <input type="text" name="name">
  <br>

  <label for='surname'>Nazwisko:</label>
  <input type="text" name="surname">
  <br>

  <label for='email'>E-mail:</label>
  <input type="email" name="email">
  <br>

  <label for='password'>Hasło:</label>
  <input type="password" name="password">
  <br>

  <label for='password1'>Powtórz hasło:</label>
  <input type="password" name="password1">
  <br>

  <label for='phoneNr'>Numer telefonu:</label>
  <input type="text" name="phoneNr">
  <br>

  <label for='city'>Miasto:</label>
  <input type="text" name="city">
  <br>

  <input type="submit" name="submit" value="Zarejestruj się">
  <?php echo anchor('page/login','Posiadasz już konto? Zaloguj się'); ?>

</form>
