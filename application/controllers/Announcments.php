<?php

class Announcments extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper(array('url','text'));
    $this->load->library('session');
    $this->load->library('pagination');
    $this->load->model('userManager');
    $this->load->model('profileManager');
    $this->load->model('announcmentsManager');
  }

  public function index() {
    $data['title']='Wszystkie ogłoszenia';
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/navbar');
    $this->load->view('announcments/index');
    $this->load->view('templates/footer');
    $this->load->view('templates/end');
  }

  public function category($id=false, $slug=false,$offset=1) {
    if($id===false || $slug===false) {
      show_404();
    }

    $data['announcments']=$this->announcmentsManager->getAnnouncments($id,$slug,$offset);
    if($data['announcments']===false) {
      show_404();
    }
    $config['base_url'] = site_url('announcments/category/'.$id.'/'.$slug);
    $config['total_rows'] = $this->announcmentsManager->countAnnouncments($id,$slug);
    $config['per_page'] = 30;
    $config['use_page_numbers']=TRUE;

    $this->pagination->initialize($config);

    $data['title']='Ogłoszenia - '.ucfirst(str_replace('-',' ',$slug));

    $this->load->view('templates/header',$data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/navbar');
    $this->load->view('announcments/announcmentsInCategory',$data);
    $this->load->view('templates/paginator');
    $this->load->view('templates/footer');
    $this->load->view('templates/end');
  }

  public function view($id=false, $slug=false) {
    if($id===false || $slug===false) {
      show_404();
    }
    $data['announcment']=$this->announcmentsManager->getAnnouncment($id,$slug);
    if($data['announcment']===false) {
      show_404();
    }
    $data['title']='Ogłoszenie - '.$data['announcment']['basic']['title'];
    $this->load->view('templates/header',$data);
    $this->load->view('templates/topbar');
    $this->load->view('templates/navbar');
    $this->load->view('announcments/view');
    $this->load->view('templates/footer');
    $this->load->view('templates/end');
  }
}
