<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');
    }//end constractor
    
    public function changepassword(){
        
         $data= site_data();
        $data['_page_title']='Change Password';
        //$data['_operation']='success';
        $this->template->admin_cp($data);
        
    }//end function
    
    public function updatepass(){
          
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('txtnewpass', 'Password', 'trim|required|max_length[50]|matches[txtrepass]|xss_clean');
        $this->form_validation->set_rules('txtrepass', 'Re Password', 'trim||required|max_length[50]|xss_clean');
                
        if ($this->form_validation->run() == TRUE)
        {  
            $sn=$this->session->userdata('user_sn');
            $data['user_pass']=md5($this->input->post('txtnewpass'));
            
            $this->load->model('user_model');

            $res=$this->user_model->update_pass($data,$sn);            
            if($res==true){
                $data= site_data();
                $data['_page_title']='Change Password';
                $data['_operation']='success';
                $this->template->admin_cp($data);
            }else{
                 $data= site_data();
            $data['_page_title']='Change Password';
            $data['_operation']='fail';
            $data['_message']='Database Operation fail';
            $this->template->admin_cp($data);  
            }
        }else{
           // echo 'validation';
            $data= site_data();
            $data['_page_title']='Change Password';
            $data['_operation']='fail';
            $data['_message']=validation_errors();
            $this->template->admin_cp($data);            
        }
        
        
    }//end function

    public function adduser(){
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('_name', 'Name', 'trim|required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('_email', 'Email Name', 'trim|valid_email|is_unique[tbl_user.user_email]|required|max_length[250]|xss_clean');
        
        if ($this->form_validation->run() == TRUE)
        {                        
            $data['user_name']=$this->input->post('_name');
            $data['user_email']=$this->input->post('_email');
            $data['user_pass']=md5($this->input->post('_email'));

            $this->load->model('user_model');

            $res=$this->user_model->insert($data);

            if($res['status']==true){
                echo $res['new_id'];
            }else{
                echo 'fail';
            }
        }else{
            //echo 'validatoin fail';
            echo validation_errors();
        }
        
    }//end function
    
    public function deleteuser(){
        
        $data=$this->input->post('_id');
        $this->load->model('user_model');

        $res=$this->user_model->delete($data);
        
        if($res==true){
            echo $res;
        }else{
            echo 'fail';
        }
        
        
    }//end function
    
    public function updateuser(){
            
         $this->load->library('form_validation');
        
        $this->form_validation->set_rules('_name', 'Name', 'trim|required|max_length[50]|xss_clean');
       // $this->form_validation->set_rules('_email', 'Email Name', 'trim|valid_email|is_unique[tbl_user.user_email]|required|max_length[250]|xss_clean');
        
        if ($this->form_validation->run() == TRUE)
        {    
            $sn=$this->input->post('_sn');
            $data['user_email']=$this->input->post('_email');
            $data['user_name']=$this->input->post('_name');
            $this->load->model('user_model');

            $res=$this->user_model->update($data,$sn);
            //$res=true;
            if($res==true){
                echo 'update';
            }else{
                echo 'fail';
            }
            
        }else{
            echo validation_errors();
        }
    }//end function
    
}///end