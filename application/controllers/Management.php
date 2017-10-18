<?php
class Management extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->library('session');
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('admin');
    $this->load->model('managementModel');
  }

  public function index() {
    $data['title']='Zarządzanie - strona główna';

    if($this->admin->adminLogged()) {
      $this->load->view('templates/header',$data);
      $this->load->view('templates/managementTopbar');
      $this->load->view('management/management');
      $this->load->view('templates/footer');
      $this->load->view('templates/end');
    }
    else {
      $this->form_validation->set_rules('login','"Login"','trim|required|min_length[3]|alpha');
      $this->form_validation->set_rules('password','"Hasło"','trim|required|min_length[3]|alpha');

      if($this->form_validation->run()===false) {
        $this->load->view('templates/header',$data);
        $this->load->view('templates/managementTopbar');
        $this->load->view('templates/navbar');
        $this->load->view('management/login');
        $this->load->view('templates/footer');
        $this->load->view('templates/end');
      }
      else {
        if($this->admin->login()) {
          $this->load->view('templates/header',$data);
          $this->load->view('templates/managementTopbar');
          $this->load->view('templates/navbar');
          $this->load->view('management/management');
          $this->load->view('templates/footer');
          $this->load->view('templates/end');
        }
      }
    }


  }

  public function newCategory() {
    $this->admin->checkAdmin();

    $data['title']='Zarządzanie - nowa kategoria';
    $data['categories']=$this->managementModel->getOwners();

    $this->form_validation->set_rules('name','"Nazwa"','trim|required|alpha|is_unique[categories.name]');

    if($this->form_validation->run()===false) {
      $this->load->view('templates/header',$data);
      $this->load->view('templates/managementTopbar');
      $this->load->view('templates/navbar');
      $this->load->view('management/newCategory',$data);
      $this->load->view('templates/footer');
      $this->load->view('templates/end');
    }
    else {
      $this->managementModel->newCategory();
      redirect(site_url('management/newCategory'));
    }
  }

  public function deleteCategory($id=false) {
    $this->admin->checkAdmin();
    if($id===false) {
      redirect(site_url('management'));
    }
    else {

    }
  }

  public function updateCategory($id=false) {
    $this->admin->checkAdmin();
    if($id===false) {
      redirect(site_url('management'));
    }
    else {

    }
  }

  public function logout() {
    $this->admin->checkAdmin();
    $this->admin->logout();
    redirect(site_url('management'));
  }
}
