<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model
{
    var $photo_path;
    
    public function __construct()
    {
        parent::__construct();

        $this->photo_path=realpath(APPPATH.'../store/images');

    }//end constract
    
    public function getList(){
        $this->db->select('user_sn,user_email, user_name');
        $this->db->from('tbl_user');
        $get=$this->db->get();
        
        return $get->result_array();
    }//end function
    
    public function insert($data){
        $this->db->set($data);
        $res=$this->db->insert('tbl_user');
        
        if($res==TRUE){
            return array('status'=>true,'new_id'=>$this->db->insert_id());
        }else{
            return array('status'=>false);
        }
        
    }//end fun
    
    
    public function delete($data){
        
        $res=$this->db->delete('tbl_user',array('user_sn'=>$data));        
        return $res;
        
    }//end function
    
    public function update($data,$sn){
                
        $this->db->where('user_sn',$sn);
        $res=$this->db->update('tbl_user',$data);
        return $res;
        
    }//end function
    
    public function checkpassword($email,$pass){
        
        $this->db->select('user_name,user_sn');
        $this->db->from('tbl_user');
        $this->db->where('user_email',$email);
        $this->db->where('user_pass',md5($pass));
        $res=$this->db->get();
        //echo $this->db->last_query().'<br>';
        //exit();
        return $res->result_array();
        
    }//end function
    
    public function update_pass($data,$sn){
        $this->db->where('user_sn',$sn);
        $res=$this->db->update('tbl_user',$data);
        return $res;
    }//end function
    
}//end user class