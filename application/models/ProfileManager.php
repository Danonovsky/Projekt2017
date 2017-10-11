<?php
class ProfileManager extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function getUserData($id=false) {
    if($id==true) {
      return $this->db->get_where('users',array('id'=>$id));
    }
    else return false;
  }

  public function updateUserData() {
    $data=array(
      'name'=>$this->input->post('name'),
      'surname'=>$this->input->post('surname'),
      'phoneNr'=>$this->input->post('phoneNr'),
      'city'=>$this->input->post('city')
    );
    $where=array(
      'id'=>$this->session->userdata('id')
    );
    $result=$this->db->update('users',$data,$where);
    if($result) {
      $this->session->set_flashdata(array('updateMessage'=>'Zapisano zmiany.'));
      return true;
    }
    else {
      $this->session->set_flashdata(array('updateMessage'=>'Nie udało się zapisać zmian.'));
      return false;
    }
  }
}
