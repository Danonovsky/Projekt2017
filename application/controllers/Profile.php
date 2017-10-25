<?php
class Profile extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper(array('url','text'));
    $this->load->library('session');
    $this->load->model('userManager');
    $this->load->model('profileManager');
  }

  public function index() {
    $this->userManager->checkLogged();
    $data['title']='Mój profil';
    $data['active']=$this->profileManager->countActiveAnnouncments();
    $data['unactive']=$this->profileManager->countUnactiveAnnouncments();
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/navbar');
    $this->load->view('profile/index',$data);
    $this->load->view('templates/footer');
    $this->load->view('templates/end');
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
      $this->load->view('templates/end');
    }
    else show_404();
  }

  public function myAnnouncments($offset=1) {
    $this->userManager->checkLogged();

    $data['title']='Moje ogłoszenia';

    $this->load->view('templates/header',$data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/navbar');
    $this->load->view('templates/footer');
    $this->load->view('templates/end');
  }

  public function edit() {
    $this->userManager->checkLogged();
    $this->load->library('form_validation');

    $this->form_validation->set_rules('name','"Imię"','trim|required|min_length[3]|alpha');
    $this->form_validation->set_rules('surname','"Nazwisko"','trim|required|min_length[3]|alpha');
    $this->form_validation->set_rules('phoneNr','"Numer telefonu"','trim|required|numeric|exact_length[9]');
    $this->form_validation->set_rules('city','"Miasto"','trim|required');

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
    $this->load->view('templates/end');
  }

  public function changePassword() {
    $this->userManager->checkLogged();
    $this->load->library('form_validation');

    $this->form_validation->set_rules('actualPassword','"Aktualne hasło"','trim|required');
    $this->form_validation->set_rules('password','"Nowe hasło"','trim|required');
    $this->form_validation->set_rules('password1','"Powtórz nowe hasło"','trim|required|matches[password]');

    $data['title']='Zmiana hasła';

    if($this->form_validation->run()===true) {
      $this->profileManager->updateUserPassword();
    }
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/navbar');
    $this->load->view('profile/changePassword');
    $this->load->view('templates/footer');
    $this->load->view('templates/end');
  }

  public function newAnnouncment() {
    $this->userManager->checkLogged();
    $this->load->library('form_validation');
    $this->load->model('categoryManager');

    $config['upload_path']='./img/';
    $config['allowed_types']= 'gif|jpg|png';
    $config['file_name']=date('YmdHis').'_'.$this->session->userdata('id');
    $this->load->library('upload',$config);

    $this->form_validation->set_rules('title','"Tytuł"','trim|required');
    $this->form_validation->set_rules('price','"Cena"','trim|required|greater_than_equal_to[0]');
    $this->form_validation->set_rules('description','"Opis"','trim|required');
    $this->form_validation->set_rules('category','"Kategoria"','greater_than[-1]');//todo ładny message

    if($this->form_validation->run()===true) {
      /*if($this->upload->do_upload('pictures[]')) {
        $data=array('uploadData'=>$this->upload->data());
        $this->profileManager->addAnnouncment($data);
      }
      else {
        echo $this->upload->display_errors();
      }*/
      $this->profileManager->addAnnouncment();
    }
    else {
      $data['categories']=$this->categoryManager->getCategories();
      if(!$data['categories']) {
        exit();
      }
      $data['title']='Nowe ogłoszenie';
      $data['js']='newAnnouncment.js';
      $this->load->view('templates/header',$data);
      $this->load->view('templates/topbar');
      $this->load->view('templates/navbar');
      $this->load->view('profile/newAnnouncment',$data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script',$data);
      $this->load->view('templates/end');
    }
  }
}
