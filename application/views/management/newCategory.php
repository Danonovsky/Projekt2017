<div class="container">
  <ol class="breadcrumb">
    <li><?=anchor(site_url(),'Home')?></li>
    <li><?=anchor('management','Management')?></li>
    <li class="active">New Category</li>
  </ol>
</div>

<div class="col-lg-4 col-lg-offset-4 col-md-offset-1 col-md-10"><?php echo validation_errors(); ?></div>

<?php echo form_open('management/newCategory'); ?>
<div class="fill col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10">
  <div class="user-access bg-white col-lg-8 col-lg-offset-2">
    <div class="row">
      <p>
        <label class="margin label label-default"  for="name">Nazwa kategorii: </label>
        <input class="margin form-control input-sizer" type="text" name="name">
      </p>
      <p>
        <label class="margin label label-default"  for="owner">Nadrzędna kategoria</label>
        <select class="margin form-control input-sizer" name="owner">
          <?php
          foreach($categories as $a) {
            ?>
            <option value="<?=$a['id']?>"><?=$a['name']?></option>
            <?php
          }
          ?>
        </select>
      </p>
      <div class="col-lg-12" id="fields">
        <p class="text-center font-sizer-bigger">
          Dodatkowe pola (np. pojemność silnika, rocznik domu, itp.). Jeśli pole będzie puste, nie zostanie dodane.
        </p>
        <?php
        for($i=0;$i<10;$i++) {
          ?>
          <p class="newField bg-darker-white" id="field<?=$i?>">
            <label class="margin label label-default"  for="field'+n+'">Pole nr <?=$i+1?>: </label>
            <input class="margin form-control input-sizer" type="text" name="field<?=$i?>">
            <label class="margin label label-default"  for="fieldtype<?=$i?>"> Typ:</label>
            <select class="margin form-control input-sizer" class="margin label label-default"  name="fieldtype<?=$i?>">
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
        <input class="margin btn btn-default" type="submit" name="submit" value="Zapisz">
      </p>

    </form>
    </div>
  </div>
</div>
