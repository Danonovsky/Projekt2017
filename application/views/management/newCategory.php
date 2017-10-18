<?php echo validation_errors(); ?>

<?php echo form_open('management/newCategory'); ?>

  <p>
    <label for="name">Nazwa kategorii: </label>
    <input type="text" name="name">
  </p>
  <p>
    <label for="owner">Nadrzędna kategoria</label>
    <select name="owner">
      <?php
      foreach($categories as $a) {
        ?>
        <option value="<?=$a['id']?>"><?=$a['name']?></option>
        <?php
      }
      ?>
    </select>
  </p>
  <div id="fields">
    <p>
      Dodatkowe pola (np. pojemność silnika, rocznik domu, itp.). Jeśli pole będzie puste, nie zostanie dodane.
    </p>
    <?php
    for($i=0;$i<10;$i++) {
      ?>
      <p class="newField" id="field<?=$i?>">
        <label for="field'+n+'">Pole nr <?=$i+1?>: </label>
        <input type="text" name="field<?=$i?>">
        <label for="fieldtype<?=$i?>"> Typ:</label>
        <select name="fieldtype<?=$i?>">
          <option value="int" selected>Liczba całkowita</option>
          <option value="float">Liczba rzeczywista</option>
          <option value="date">Data</option>
          <option value="tinytext">Tekst</option>
        </select>
      </p>
      <?php
    }
    ?>
  </div>
  <p>
    <input type="submit" name="submit" value="Zapisz">
  </p>

</form>

<?php
if($this->session->flashdata('adminLoginMessage')) {
  echo $this->session->flashdata('adminLoginMessage');
}
?>
