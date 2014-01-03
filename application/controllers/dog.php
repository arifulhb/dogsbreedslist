<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dog extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor

    
    
    public function details()
    {
        //$slug=$this->uri->segment(3);  
        $slug = str_replace("_", "-", $this->uri->segment(3) );
        
        $this->load->model('dog_model');
        
        $data=  site_data();
        
        $data['_top10']=$this->dog_model->getTop10();        
        //echo 'here<br>';
        $data['details']=$this->dog_model->getDetails($slug);             
        //echo 'here 2<br>';
        //echo '<pre>';
        //print_r($data['details']);
        //echo '</pre>';
        $data['_page_title']=($data['details'][0]['item_seo_title']!='' ? $data['details'][0]['item_seo_title']:$data['details'][0]['item_info_name']);
        
        $this->template->dog_details($data);
        
    }//end function

    public function getBreedListUnrankedByCategoryAjax()
    {
        $data['_table']= $this->input->post('_table',TRUE);
        $data['_sn']= $this->input->post('_sn',TRUE);
        $this->load->model('dog_model');
        
        $_res=$this->dog_model->getBreedListUnrankedByCategory($data);
        //$_res=$this->dog_model->getBreedListRanked();
        echo json_encode ($_res);
        
    }//end show_list
    
        public function getBreedListRankedByCategoryAjax()
    {
        $data['_table']= $this->input->post('_table',TRUE);
        $data['_sn']= $this->input->post('_sn',TRUE);
        $this->load->model('dog_model');
        $_res=$this->dog_model->getBreedListRankedByCategory($data);
        echo json_encode ($_res);
        
    }//end show_list
    
    public function getRankedBreedListAjax(){
        
        
        
    }//end function getRankedBreedListAjax
    
    public function addBreedCategoryRankAjax(){
                
        $data['_table']= $this->input->post('_table',TRUE);        
        $data['_cat_sn']= $this->input->post('_sub_cat',TRUE);      
        $data['_breed_sn']= $this->input->post('_breed',TRUE);      
        $data['_rank']= $this->input->post('_rank',TRUE);      
        $this->load->model('dog_model');
        
        $_res=$this->dog_model->addBreedCategoryRank($data);
        
        if($_res==1){
             echo $this->db->insert_id();
        }else{
              echo $_res;   
        }
        //echo json_encode ($_res);
        
    }//end function addBreedCategoryRankAjax

    public function removeRankValidation(){
        
        $this->load->model('dog_model');
        $data['rsn']= $this->input->post('_rsn',TRUE);
                
        $res    =$this->dog_model->removeRanking($data);
        
        echo $res;
        
    }//end function removeCategoryRankValidation

    public function deletItem(){
        
        $data['item_sn'] = $this->input->post('sn',TRUE);
                        
        $this->load->model('dog_model');
        $res = $this->dog_model->deleteItem($data);
        
        echo $res;
        
    }//end deleteItem

}//end class
?>