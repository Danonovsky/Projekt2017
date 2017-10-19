<h2>
  <?=str_replace('_',' ',$category['name'])?>
</h2>
<?php
foreach($fields as $a) {
  if($a!='id' && $a!='announcmentId') {
    ?>
    <p>
      Kolumna: <?=$a?>
    </p>
    <?php
  }
}
?>
