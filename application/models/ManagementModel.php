<?php
class ManagementModel extends CI_Model {
  public function __construct() {
    $this->load->database();
  }

  public function getCategories() {
    return $this->db->get('categories')->result_array();
  }

  public function newCategory() {
    $arr=array();
    foreach($this->input->post() as $key=>$val) {
      if(count(explode('field',$key))>1) {
        $arr[]=$val;
      }
    }
    $categoryDetails=array();
    for($i=0;$i<count($arr);$i+=2) {
      if($arr[$i]!='')
      $categoryDetails[]=['name'=>$arr[$i],'type'=>$arr[$i+1]];
    }

    $category=array(
      'id'=>null,
      'ownerId'=>$this->input->post('owner'),
      'name'=>$this->input->post('name')
    );

    if($this->db->insert('categories',$category)) {
      if(count($categoryDetails)>0) {
        $sql="create table ".$category['name'].'Details (id int not null primary key auto_increment, announcmentId int not null, ';
        foreach($categoryDetails as $a) {
          $sql.=$a['name'].' '.$a['type'].' not null,';
        }
        $sql=substr($sql,0,-1);
        $sql.=')';
        $sql1='alter table '.$category['name'].'Details add index(announcmentId)';
        $sql2='alter table '.$category['name'].'Details add CONSTRAINT FOREIGN key (announcmentId) REFERENCES announcments(id) on delete RESTRICT on UPDATE CASCADE';
        $this->db->query($sql);
        $this->db->query($sql1);
        $this->db->query($sql2);
      }
    }
  }

  public function getOwners() {
    $this->db->where("ownerId='0' or ownerId='1'");
    return $this->db->get('categories')->result_array();
  }
}
