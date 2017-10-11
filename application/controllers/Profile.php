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
    $this->userManager->checkLogged();
    $data['title']='Twój profil';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/navbar');
    $this->load->view('profile/index');
    $this->load->view('templates/footer');
  }

  public function view($id=false) {
    $data['user']=$this->profileManager->getUserData($id)->row_array();
    if($data['user']) {
      $data['title']='Profil użytkownika '.$data['user']['name'].' '.$data['user']['surname'];
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/navbar');
      $this->load->view('profile/view');
      $this->load->view('templates/footer');
    }
    else show_404();
  }

  public function edit() {
    $this->userManager->checkLogged();
    $this->load->library('form_validation');

    $this->form_validation->set_rules('name','Imię','trim|required|min_length[3]|alpha');
    $this->form_validation->set_rules('surname','Nazwisko','trim|required|min_length[3]|alpha');
    $this->form_validation->set_rules('phoneNr','Numer telefonu','trim|required|numeric|exact_length[9]');
    $this->form_validation->set_rules('city','Miasto','trim|required');

    $data['title']='Edycja danych';

    if($this->form_validation->run()===true) {
      if($this->profileManager->updateUserData()) {
        $this->userManager->updateSessionData();
      }
    }
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/navbar');
    $this->load->view('profile/edit');
    $this->load->view('templates/footer');
  }
}
