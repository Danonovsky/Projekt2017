<?php
class Messages extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->library('session');
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('messagesModel');
    $this->load->model('userManager');
  }

  public function index() {
    $this->userManager->checkLogged();

    $data['conversations']=$this->messagesModel->getAllConversations($this->session->userdata('id'));

    $data['title']='Wiadomości';

    $this->load->view('templates/header',$data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/navbar');
    $this->load->view('messages/index',$data);
    $this->load->view('templates/footer');
    $this->load->view('templates/end');
  }

  public function conversation($id=false) {
    $this->userManager->checkLogged();

    if($id===false) {
      redirect(site_url('messages/conversation'));
    }
  }
}
