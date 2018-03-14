<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        // $this->mssql = $CI->load->database('dbsqlsrv',TRUE);
        $this->access= $CI->load->database('access', TRUE);
    }

    public function verification($data){
      //cek username
      $this->access->select('*');
      $this->access->from('user u');
      $this->access->where('username',$data['username']);
      $query=$this->access->get();
      $result=$query->result_array();
      if(count($result)>0){
        if (password_verify($data['password'], $result[0]['password'])) {
            $sessiondata=array(
              'id_user'=>$result[0]['user_id'],
              'username'=>$result[0]['username'],
              'nik'=>$result[0]['nik'],
              'level'=>$result[0]['level'],
              'division'=>$result[0]['division']
            );
            $this->session->set_userdata($sessiondata);
            return 2; //password benar
        } else {
            return 1; //password salah
        }
      }
      else{
        return 0; //email salah
      }
    }

    private function getname($nik){
      $this->access->select('first_name,last_name');
      $this->access->where('nik',$nik);
      $this->access->from('employee');
      $query=$this->access->get();
      $data=$query->result_array();
      return $data[0]['first_name']." ".$data[0]['last_name'];
    }

    public function update_password($where, $data){
      $this->access->update('user',$data, $where);
      return $this->access->affected_rows();

    }

}
