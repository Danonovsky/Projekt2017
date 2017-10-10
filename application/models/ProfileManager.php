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
}
