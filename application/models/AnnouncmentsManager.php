<?php
class AnnouncmentsManager extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function getAnnouncments($id, $slug, $offset) {
    if($id==1) {
      redirect(site_url('announcments'));
    }
    $almostMain=$this->db->get_where('categories',array('id'=>$id,'ownerId'=>'1'))->result_array();
    if(count($almostMain)>0) {
      $this->db->where('categoryId in(select id from categories where ownerId='.$id.')');
    }
    else {
      $this->db->where('categoryId=',$id);
    }
    $this->db->where('untilDate>=',date('Y-m-d'));

    $res=$this->db->get_where('announcments',array(),30,$offset*30-30)->result_array();
    foreach($res as $a) {
      $category=$this->db->get_where('categories',array('id'=>$a['categoryId']))->row_array();
      $pics[]=$this->db->get_where('pictures',array('announcmentId'=>$a['id']))->result_array();
    }
    if(count($res)>0) {
      $arr=array('basic'=>$res,'pics'=>$pics);
    }
    else $arr=array();
    return $arr;
  }

  public function countAnnouncments($id, $slug, $offset) {
    $almostMain=$this->db->get_where('categories',array('id'=>$id,'ownerId'=>'1'))->result_array();
    if(count($almostMain)>0) {
      $this->db->where('categoryId in(select id from categories where ownerId='.$id.')');
      $amount=count($this->db->get_where('announcments')->result_array());
    }
    else {
      $this->db->where('categoryId=',$id);
      $amount=count($this->db->get_where('announcments')->result_array());
    }
    return ceil($amount/30);
  }
}
