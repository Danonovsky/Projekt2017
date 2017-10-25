<?php
class Ajax extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('ajaxManager');
  }

  public function categoryData() {
    $r['response']=$this->ajaxManager->getCategoryData();
    echo json_encode($r);
  }
}
