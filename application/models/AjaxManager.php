<?php
class AjaxManager extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function getCategoryData() {
    $id=$this->input->post('id');
    $r=$this->db->get_where('categories',array('id'=>$id))->row_array();
    $name=$r['name'];
    $table=strtolower($name.'Details');
    if($this->db->table_exists($table)) {
      $table=$this->db->escape_str($table);
      $sql="describe $table";
      return $this->db->query($sql)->result();
    }

    else return false;
  }
}
