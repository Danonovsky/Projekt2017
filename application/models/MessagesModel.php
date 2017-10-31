<?php

class MessagesModel extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function getAllConversations($id) {
    $arr=$this->db->query("select * from messages where ownerId='$id' group by toId")->result_array();
    $arr2=$this->db->query("select * from messages where toId='$id' group by ownerId")->result_array();
    $users=array();
    $conversations=array_merge($arr,$arr2);
    foreach($conversations as $a) {
      if($a['ownerId']==$this->session->userdata('id')) $users[]=$a['toId'];
      else $users[]=$a['ownerId'];
    }
    $users=array_unique($users, SORT_REGULAR);
    $this->db->where_in('id',$users);
    return $this->db->get('users')->result_array();
  }
}
