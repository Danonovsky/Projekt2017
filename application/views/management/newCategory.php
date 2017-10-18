<?php echo validation_errors(); ?>

<?php echo form_open('management/newCategory'); ?>

  <p>
    <label for="name">Nazwa: </label>
    <input type="text" name="name">
  </p>

  <p>
    <label for="field1">Pole nr 1: </label>
    <input type="text" name="field1">
    <label for="field1type"> Typ:</label>
    <select name="field1type">
      <option value="int" selected>Liczba całkowita</option>
      <option value="float">Liczba rzeczywista</option>
      <option value="date">Data</option>
      <option value="tinytext">Tekst</option>
    </select>
  </p>

</form>

<?php
if($this->session->flashdata('adminLoginMessage')) {
  echo $this->session->flashdata('adminLoginMessage');
}
?>
