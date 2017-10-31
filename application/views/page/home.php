<ul class="categories">
<?php
$cats=$this->db->get_where('categories',array('ownerId'=>1))->result_array();
foreach($cats as $a) {
  ?>
  <li><?=anchor(site_url('announcments/category/'.$a['id'].'/'.strtolower(str_replace('_','-',$a['name']))),str_replace('_',' ',$a['name']))?></li>
  <?php
  $subs=$this->db->get_where('categories',array('ownerId'=>$a['id']))->result_array();
  if($subs) {
    ?>
    <ul>
      <?php
      foreach($subs as $b) {
        ?>
        <li><?=anchor(site_url('announcments/category/'.$b['id'].'/'.strtolower(str_replace('_','-',$b['name']))),str_replace('_',' ',$b['name']))?></li>
        <?php
      }
      ?>
    </ul>
    <?php
  }
}
?>
</ul>
