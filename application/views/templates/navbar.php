<nav class="navbar navbar-default">
  <div class="col-lg-12">
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
        <div class="nav navbar-nav">
          <?php
          $cats=$this->db->get_where('categories',array('ownerId'=>1))->result_array();
          foreach($cats as $a) {
            ?>
            <div class="dropdown pull-left dropdowns btn-xs-block">
              <button class="btn btn-default btn-xs-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"><?=anchor(site_url('announcments/category/'.$a['id'].'/'.strtolower(str_replace('_','-',$a['name']))),str_replace('_',' ',$a['name']),$arrayName = array('class' =>'menuAnchor'))?>
                <span class="caret"></span>
              </button>
              <?php
              $subs=$this->db->get_where('categories',array('ownerId'=>$a['id']))->result_array();
              if($subs) {
                ?>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <?php
                  foreach($subs as $b) {
                    ?>
                    <li><?=anchor(site_url('announcments/category/'.$b['id'].'/'.strtolower(str_replace('_','-',$b['name']))),str_replace('_',' ',$b['name']))?></li>
                    <?php
                  }
                  ?>
                </ul>
            </div>
                <?php
              }
            }
            ?>
        </div>
      </div>
    </div>
  </div>
</nav>
