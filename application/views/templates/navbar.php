<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="col-lg-6 col-lg-offset-3 col-md-offset-1 col-md-10">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=site_url()?>">Sell.it</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <?php
          $cats=$this->db->get_where('categories',array('ownerId'=>1))->result_array();
          foreach($cats as $a) {
            ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown"><?=$a['name']?>
                <span class="caret"></span>
              </a>
              <?php
              $subs=$this->db->get_where('categories',array('ownerId'=>$a['id']))->result_array();
              if($subs) {
                ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                  <?php
                  foreach($subs as $b) {
                    ?>
                    <li><?=anchor(site_url('announcments/category/'.$b['id'].'/'.strtolower(str_replace('_','-',$b['name']))),str_replace('_',' ',$b['name']))?></li>
                    <?php
                  }
                  ?>
                </ul>
            </li>
                <?php
              }
            }
            ?>
        </ul>
      </div>
    </div>
  </div>
</nav>
