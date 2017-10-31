<?php
class AnnouncmentsManager extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function getAnnouncments($id, $slug, $offset) {
    if($id==1) {
      redirect(site_url('announcments'));
    }
    $exists=$this->db->get_where('categories',array('id'=>$id,'name'=>str_replace('-','_',$slug)))->result_array();
    if(count($exists)<1) {
      return false;
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

  public function countAnnouncments($id, $slug) {
    $almostMain=$this->db->get_where('categories',array('id'=>$id,'ownerId'=>'1'))->result_array();
    if(count($almostMain)>0) {
      $this->db->where('categoryId in(select id from categories where ownerId='.$id.')');
      $amount=count($this->db->get_where('announcments')->result_array());
    }
    else {
      $this->db->where('categoryId=',$id);
      $amount=count($this->db->get_where('announcments')->result_array());
    }
    return $amount;
  }

  public function getAnnouncment($id,$slug) {
    $exists=$this->db->get_where('announcments',array('id'=>$id,'slug'=>$slug))->result_array();
    if(count($exists)<1) {
      return false;
    }
    $data['basic']=$exists[0];
    $data['pictures']=$this->db->get_where('pictures',array('announcmentId'=>$data['basic']['id']))->result_array();
    $category=$this->db->get_where('categories',array('id'=>$data['basic']['categoryId']))->row_array();
    $data['details']=$this->db->get_where(strtolower($category['name'].'Details'),array('announcmentId'=>$data['basic']['id']))->row_array();
    $data['user']=$this->db->get_where('users',array('id'=>$data['basic']['userId']))->row_array();
    return $data;
  }
}
