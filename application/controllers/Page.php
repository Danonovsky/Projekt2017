<?php

class Page extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->library('session');
    $this->load->helper('url');
    $this->load->model('userManager');
  }

  public function index() {
    $data['title']=' Strona Główna';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/navbar');
    $this->load->view('page/home');
    $this->load->view('templates/footer');
    $this->load->view('templates/end');
  }

  public function register() {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title']=' Rejestracja';

    $this->form_validation->set_rules('name','"Imię"','trim|required|min_length[3]|alpha');
    $this->form_validation->set_rules('surname','"Nazwisko"','trim|required|min_length[3]|alpha');
    $this->form_validation->set_rules('email','"E-mail"','trim|required|valid_email|is_unique[users.email]');
    $this->form_validation->set_rules('password','"Hasło"','trim|required');
    $this->form_validation->set_rules('password1','"Powtórz hasło"','trim|required|matches[password]');
    $this->form_validation->set_rules('phoneNr','"Numer telefonu"','trim|required|numeric|exact_length[9]');
    $this->form_validation->set_rules('city','"Miasto"','trim|required');

    if($this->form_validation->run()===false) {
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/navbar');
      $this->load->view('page/register');
      $this->load->view('templates/footer');
      $this->load->view('templates/end');
    }
    else {
      if($this->userManager->addUser()) {
        $data['title']='Witamy';
        $this->load->view('templates/header',$data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/navbar');
        $this->load->view('page/welcome');
        $this->load->view('templates/footer');
        $this->load->view('templates/end');
      }
    }

  }

  public function login() {
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title']=' Logowanie';
    $this->form_validation->set_rules('email','"E-mail"','trim|required|valid_email');
    $this->form_validation->set_rules('password','"Hasło"','trim|required');

    if($this->form_validation->run()===false) {
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/navbar');
      $this->load->view('page/login');
      $this->load->view('templates/footer');
      $this->load->view('templates/end');
    }
    else {
      if($this->userManager->login()) {
        redirect(site_url());
      }
      else {
        $this->load->view('templates/header',$data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/navbar');
        $this->load->view('page/login');
        $this->load->view('templates/footer');
        $this->load->view('templates/end');
      }
    }
  }

  public function logout() {
    $this->userManager->logout();
    redirect(site_url());
  }

}
