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
      $data['categories']=$this->managementModel->getCategories(1);
      $this->load->view('templates/header',$data);
      $this->load->view('templates/managementTopbar');
      $this->load->view('templates/navbar');
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
          redirect(site_url('management'));
        }
      }
    }
  }

  public function newCategory() {
    $this->admin->checkAdmin();

    $data['title']='Zarządzanie - nowa kategoria';
    $data['categories']=$this->managementModel->getOwners();

    $this->form_validation->set_rules('name','"Nazwa"','trim|required|alpha_numeric_spaces|is_unique[categories.name]');

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
      redirect(site_url('management'));
    }
  }

  public function deleteCategory($id=false) {
    $this->admin->checkAdmin();
    if($id===false) {
      redirect(site_url('management'));
    }
    else {
      $this->managementModel->deleteCategory($id);
      redirect(site_url('management'));
    }
  }

  public function previewCategory($id=false) {
    $this->admin->checkAdmin();
    if($id===false) {
      redirect(site_url('management'));
    }
    else {
      $data['title']='Zarządzanie - podgląd';
      if(($r=$this->managementModel->getFields($id))===false) {
        redirect(site_url('management'));
      }
      else {
        $data['fields']=$r;
        $data['category']=$this->managementModel->getCategory($id);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/managementTopbar');
        $this->load->view('templates/navbar');
        $this->load->view('management/previewCategory',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/end');
      }
    }
  }

  public function logout() {
    $this->admin->checkAdmin();
    $this->admin->logout();
    redirect(site_url('management'));
  }
}
