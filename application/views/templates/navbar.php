<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=site_url()?>">Ogłoszenia pe el</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
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

    </div>
  </div>
</nav>
