<?php
class Admin extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function login() {
    $data=array(
      'login'=>$this->input->post('login'),
      'password'=>md5($this->input->post('password'))
    );
    $r=$this->db->get_where('admin',$data)->row_array();
    if($r) {
      $this->session->set_userdata(array('adminLogged'=>true,'adminId'=>$r['id'],'adminNick'=>$r['nick']));
      return true;
    }
    else {
      return false;
    }
  }

  public function logout() {
    $data=array('adminLogged','adminId','adminNick');
    $this->session->unset_userdata($data);
  }

  public function checkAdmin() {
    if(!$this->session->userdata('adminLogged')) {
      $this->session->set_flashdata('alert','Only logged admin can access here.');
      redirect('management');
    }
  }

  public function adminLogged() {
    if($this->session->userdata('adminLogged')) return true;
    else return false;
  }
}
