<div class="container">
  <ol class="breadcrumb">
    <li><?=anchor(site_url(),'Home')?></li>
    <li><?=anchor('management','Management')?></li>
    <li class="active">Preview Category</li>
  </ol>
</div>

<div class="fill col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10">
  <div class="user-access bg-white col-lg-8 col-lg-offset-2 text-center">
    <h2>
      <?=str_replace('_',' ',$category['name'])?>
    </h2>
    <?php
    foreach($fields as $a) {
      if($a!='id' && $a!='announcmentId') {
        ?>
        <p class="text-left">
          <span class="label label-default font-sizer"><span class="glyphicon glyphicon-book"> </span> Kolumna:</span><span class="font-sizer-bigger"> <?=$a?>
        </p>
        <?php
      }
    }
    ?>
  </div>
</div>
