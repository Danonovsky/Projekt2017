<?php
class CategoryManager extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function getCategories() {
    $sql="select * from categories where ownerId!='0' and ownerId!='1'";
    $r=$this->db->query($sql)->result_array();
    if($r) return $r;
    else return false;
  }
}
