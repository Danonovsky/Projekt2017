<?php
class Profile extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url_helper');
    $this->load->library('session');
    $this->load->model('userManager');
    $this->load->model('profileManager');
  }

  public function index() {
    if($this->userManager->isLogged()) {
      $data['title']='Twój profil';
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topbar');
      $this->load->view('profile/index');
      $this->load->view('templates/footer');
    }
    else {
      header('Location:'.base_url());
    }
  }

  public function view($id=false) {
    $data['user']=$this->profileManager->getUserData($id)->row_array();
    if($data['user']) {
      $data['title']='Profil użytkownika '.$data['user']['name'].' '.$data['user']['surname'];
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topbar');
      $this->load->view('profile/view');
      $this->load->view('templates/footer');
    }
    else show_404();
  }
}
