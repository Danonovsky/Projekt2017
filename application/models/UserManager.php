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
}
