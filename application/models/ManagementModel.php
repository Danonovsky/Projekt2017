<?php
class ManagementModel extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function getCategories() {
    return $this->db->get('categories')->result_array();
  }
}
