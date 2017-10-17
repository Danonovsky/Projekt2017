<?php
class Management extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->library('session');
    $this->load->helper('url_helper');
    $this->load->model('admin');
    $this->load->model('managementModel');
  }

  public function index() {
    $this->load->library('form_validation');

    $data['title']='Zarządzanie';

    if($this->admin->adminLogged()) {
      $this->load->view('templates/header',$data);
      $this->load->view('templates/navbar');
      $this->load->view('management/management');
      $this->load->view('templates/footer');
    }
    else {
      $this->form_validation->set_rules('login','"Login"','trim|required|min_length[3]|alpha');
      $this->form_validation->set_rules('password','"Hasło"','trim|required|min_length[3]|alpha');

      if($this->form_validation->run()===false) {
        $this->load->view('templates/header',$data);
        $this->load->view('templates/navbar');
        $this->load->view('management/login');
        $this->load->view('templates/footer');
      }
      else {
        if($this->admin->login()) {
          $this->load->view('templates/header',$data);
          $this->load->view('templates/navbar');
          $this->load->view('management/management');
          $this->load->view('templates/footer');
        }
      }
    }


  }

  public function newCategory() {

  }

  public function deleteCategory() {

  }

  public function updateCategory() {

  }
}
