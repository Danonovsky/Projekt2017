<?php
class Messages extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->library('session');
    $this->load->library('form_validation');
    $this->load->helper('url');
    $this->load->model('messagesModel');
    $this->load->model('userManager');
    $this->load->model('profileManager');
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

    if($id===false || $id==$this->session->userdata('id')) {
      redirect(site_url('messages'));
    }

    $data['userData']=$this->profileManager->getUserData($id);
    if(count($data['userData'])==0) {
      redirect(site_url('messages'));
    }

    $this->load->library('form_validation');

    $this->form_validation->set_rules('message','"Wiadomość"','trim|required');

    if($this->form_validation->run()===true) {
      $this->messagesModel->sendMessage($id);
    }

    $data['messages']=$this->messagesModel->getAllMessages($id);


    $data['title']='Rozmowa z '.$data['userData']['name'].' '.$data['userData']['surname'];

    $this->load->view('templates/header',$data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/navbar');
    $this->load->view('messages/conversation',$data);
    $this->load->view('templates/footer');
    $this->load->view('templates/end');
  }
}
