<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class modelacc extends CI_Model
{
  public function checklogin()
  {
    $username=set_value('username');
    $pass=set_value('pass');
    $res=$this->db->where('username',$username)->where('pass',$pass)->limit(1)->get('user');
    if($res->num_rows()>0){
      return $res->row();
    }
    else{
      return array();
    }
  }
}
