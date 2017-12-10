<div class="container">
  <ol class="breadcrumb">
    <li><?=anchor(site_url(),'Home')?></li>
    <li><?=anchor('profile','Profile')?></li>
    <li class="active">New Announcment</li>
  </ol>
</div>

<div class="col-lg-4 col-lg-offset-4 col-md-offset-1 col-md-10"><?=validation_errors()?></div>
  <div class="fill col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10 col-xs-12">
    <div class="user-access bg-white col-lg-8 col-lg-offset-2">
      <?=form_open_multipart('profile/newAnnouncment')?>
      <p>
        <label class="margin label label-default" for="title">Tytuł ogłoszenia: </label>
        <input class="margin form-control input-sizer" type="text" name="title">
      </p>

      <p>
        <label class="margin label label-default" for="category">Kategoria: </label>
        <select class="margin form-control input-sizer" name="category" id="category">
          <option value="-1">Kategoria</option>
          <?php
          foreach($categories as $a) {
            ?>
            <option value="<?=$a['id']?>"><?=str_replace('_',' ',$a['name'])?></option>
            <?php
          }
          ?>
        </select>
      </p>

      <span id="subData">
      </span>

      <p>
        <label class="margin label label-default" for="price">Cena: </label>
        <input class="margin form-control input-sizer" type="number" name="price" step="0.01" min="0">
      </p>

      <p>
        <label class="margin label label-default" for="description">Opis: </label>
        <textarea class="margin form-control input-sizer" name="description" placeholder="Opis..."></textarea>
      </p>

      <p>
        <label class="margin label label-default" for="pictures">Zdjęcia (1-sze jest główne): </label>
        <input class="margin form-control input-sizer" id="pictures" type="file" name="pictures[]" accept="image/*" multiple>
        <div class="previewPictures">
        </div>
      </p>

      <p>
        <input class="margin btn btn-default" type="submit" name="submit" value="Zapisz zmiany">
        <?=anchor(site_url('profile'),'Powrót', $arrayName = array('class' => 'btn btn-default' ))?>
      </p>
    </form>

    <p>
    </p>
  </div>
</div>
