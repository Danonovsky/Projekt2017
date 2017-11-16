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
    if($users) {
      $this->db->where_in('id',$users);
      return $this->db->get('users')->result_array();
    }
    else return array();

  }

  public function getAllMessages($id) {
    $userId=$this->session->userdata('id');
    $this->db->order_by('date','asc');
    $this->db->where("(ownerId='$id' and toId='$userId') or (ownerId='$userId' and toId='$id')");
    $messages=$this->db->get('messages')->result_array();
    return $messages;
  }

  public function sendMessage($id) {
    $data=array(
      'id'=>null,
      'ownerId'=>$this->session->userdata('id'),
      'toId'=>$id,
      'date'=>date('Y-m-d H:i:s'),
      'content'=>$this->input->post('message')
    );

    $this->db->insert('messages',$data);
  }
}
