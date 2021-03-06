<?php
class UserManager extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function addUser() {
    $data= array(
      'email'=>$this->input->post('email'),
      'password'=>md5($this->input->post('password')),
      'name'=>$this->input->post('name'),
      'surname'=>$this->input->post('surname'),
      'phoneNr'=>$this->input->post('phoneNr'),
      'city'=>$this->input->post('city')
    );

    return $this->db->insert('users',$data);
  }

  public function login() {
    $data=array(
      'email'=>$this->input->post('email'),
      'password'=>md5($this->input->post('password'))
    );

    if(($result=$this->db->get_where('users',$data)->row_array())) {
      $data=array(
        'logged'=>true,
        'id'=>$result['id'],
        'email'=>$result['email'],
        'name'=>$result['name'],
        'surname'=>$result['surname'],
        'phoneNr'=>$result['phoneNr'],
        'city'=>$result['city']
      );
      $this->session->set_userdata($data);
      $this->session->set_flashdata('alert','Logged in.');
      return true;
    }
    else {
      $this->session->set_flashdata('alert','Błędny email i/lub hasło.');
      return false;
    }
  }

  public function updateSessionData() {
    $result=$this->db->get_where('users',array('id'=>$this->session->userdata('id')))->row_array();
    $data=array(
      'name'=>$result['name'],
      'surname'=>$result['surname'],
      'phoneNr'=>$result['phoneNr'],
      'city'=>$result['city']
    );
    $this->session->set_userdata($data);
  }

  public function logout() {
    $this->session->sess_destroy();
  }

  public function checkLogged() {
    if(!$this->session->has_userdata('logged')) {
      $this->session->set_flashdata('alert','Only logged user can access here.');
      redirect(site_url());
    }
  }

  public function checkAnnouncmentOwnership($id) {
    $r=$this->db->get_where('announcments',array('id'=>$id,'userId'=>$this->session->userdata('id')))->row_array();
    if(!$r) {
      redirect(site_url('profile'));
    }
  }

  public function isLogged() {
    if($this->session->has_userdata('logged')) return true;
    else return false;
  }
}
