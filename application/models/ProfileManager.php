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

  public function updateUserPassword() {
    $data=array(
      'password'=>md5($this->input->post('password'))
    );

    $where=array(
      'id'=>$this->session->userdata('id')
    );

    $actual=md5($this->input->post('actualPassword'));
    $result=$this->db->get_where('users',array('password'=>$actual))->row_array();
    $password=$result['password'];

    if(md5($this->input->post('actualPassword'))==$password) {
      $result=$this->db->update('users',$data,$where);
      if($result) {
        $this->session->set_flashdata(array('passwordMessage'=>'Hasło zostało zmienione.'));
      }
      else {
        $this->session->set_flashdata(array('passwordMessage'=>'Nie udało się zmienić hasła.'));
      }
    }
    else {
      $this->session->set_flashdata(array('passwordMessage'=>'Podane hasło jest nieprawidłowe.'));
    }
  }

  public function countActiveAnnouncments() {
    $id=$this->session->userdata('id');
    $date=date('Y-m-d');
    $sql="select * from announcments where userId='$id' and untilDate>'$date'";
    $query=$this->db->query($sql);
    return $query->num_rows();
  }

  public function countUnactiveAnnouncments() {
    $id=$this->session->userdata('id');
    $date=date('Y-m-d');
    $sql="select * from announcments where userId='$id' and untilDate<'$date'";
    $query=$this->db->query($sql);
    return $query->num_rows();
  }

  public function addAnnouncment($data=false) {
    $slug=url_title(md5($this->input->post('title')).' '.$this->session->userdata('id'),'dash',true);
    $date = strtotime(date('Y-m-d'));
    $newDate = date("Y-m-d", strtotime("+1 month", $date));

    //BASIC DATA IMPORT

    $data=array(
      'id'=>null,
      'userId'=>$this->session->userdata('id'),
      'categoryId'=>$this->input->post('category'),
      'description'=>$this->input->post('description'),
      'price'=>$this->input->post('price'),
      'untilDate'=>$newDate,
      'title'=>$this->input->post('title'),
      'slug'=>$slug
    );
    $basicFields=array('title','category','price','description','submit','0');
    $this->db->insert('announcments',$data);
    $id=$this->db->insert_id();

    //ADDITIONAL DATA IMPORT

    $category=$this->db->get_where('categories',array('id'=>$this->input->post('category')))->row_array();
    $subCatname=strtolower($category['name'].'Details');

    $data1=array(
      'id'=>null,
      'announcmentId'=>$id
    );
    foreach($this->input->post() as $key=>$val) {
      if(!in_array($key,$basicFields)) {
        $data1[$key]=$val;
      }
    }
    $this->db->insert($subCatname,$data1);

    //IMAGES IMPORT

    $dir='img\\';
    $files=$_FILES['pictures'];
    $file=$dir.date('YmdHis').$this->session->userdata('id');
    $photos=array();
    for($i=0;$i<count($files['name']);$i++) {
      $tmp=$files['tmp_name'][$i];
      $name=$files['name'][$i];
      $end = pathinfo($name,PATHINFO_EXTENSION);
      if(is_uploaded_file($tmp)) {
        $pathArr=explode('\\',__DIR__);
        $path='';
        foreach($pathArr as $a) {
          if($a!='application' && $a!='models') $path.=$a.'\\';
        }
        $path.=$file.$i.'.'.$end;
        move_uploaded_file($tmp,$path);
        $photos[]=array('id'=>null,'announcmentId'=>$id,'path'=>$path);
      }
    }
    print_r($photos);
    $this->db->insert_batch('pictures',$photos);
  }
}
