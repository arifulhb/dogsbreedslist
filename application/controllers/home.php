<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor

    public function index()
    {
      
        $this->load->model('dog_model');

        $data=site_data();

        $data['_top10']=$this->dog_model->getTop10();
        //$data['_latest']=$this->dog_model->getList('latest');
        
        
        //Size
        $rowdata=array();
        $sub=$this->dog_model->getSubList('tbl_size_type');        
        foreach($sub as $item):
            $tmp=$this->dog_model->getSubRows($item['sn'],'tbl_size_type');        
            if(!empty($tmp)){                
                array_push($rowdata,array('name'=>$item['name'],
                    'count'=>count($tmp),'slug'=>'color','slug_cat'=>$item['slug'],
                    'catdata'=>$tmp));                
            }
            unset($tmp);
        endforeach; 
        //print_r($rowdata);
        //exit();
        $data['_size']=$rowdata;
        unset($sub);unset($rowdata);
        
        
        //Breed Group        
        $rowdata=array();
        $sub=$this->dog_model->getSubList('tbl_breed');        
        foreach($sub as $item):
            $tmp=$this->dog_model->getSubRows($item['sn'],'tbl_breed');
            if(!empty($tmp)){
                 array_push($rowdata,array('name'=>$item['name'],
                    'count'=>count($tmp),'slug'=>'color','slug_cat'=>$item['slug'],
                    'catdata'=>$tmp)); 
            }
            unset($tmp);
        endforeach;        
        $data['_breed']=$rowdata;
        unset($sub);unset($rowdata);
        
        //Char
        $rowdata=array();
        $sub=$this->dog_model->getSubList('tbl_char');        
        foreach($sub as $item):            
            $tmp=$this->dog_model->getSubRows($item['sn'],'tbl_char');
            if(!empty($tmp)){
               array_push($rowdata,array('name'=>$item['name'],
                    'count'=>count($tmp),'slug'=>'color','slug_cat'=>$item['slug'],
                    'catdata'=>$tmp)); 
            }
            
        endforeach;        
        $data['_char']=$rowdata;
        unset($sub);unset($rowdata);
        
        //Color
        $rowdata=array();
        $sub=$this->dog_model->getSubList('tbl_color');        
        foreach($sub as $item):            
            $tmp=$this->dog_model->getSubRows($item['sn'],'tbl_color');
            if(!empty($tmp)){
                       array_push($rowdata,array('name'=>$item['name'],
                    'count'=>count($tmp),'slug'=>'color','slug_cat'=>$item['slug'],
                    'catdata'=>$tmp)); 
            }
        endforeach;        
        $data['_color']=$rowdata;
        unset($sub);unset($rowdata);
        //exit();
        //print_r($data['_color']);
        $this->template->home($data);


    }//end index
    
}//end class
?>