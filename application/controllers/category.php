<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');            

    }//end constractor
    
    public function index()
    {
        
    }//end function index
   
     public function all(){
        
         $this->load->model('taxonomy_model');
        $this->load->model('dog_model');
                                   
        $this->load->library('pagination');

        $config=  getPaginationConfig();
        $config['base_url'] = base_url().'category/all/';
        $config['total_rows'] = $this->taxonomy_model->getAllNum();        
        $config['per_page'] = 10;
        $config['num_links'] = 5;        
        $config['uri_segment'] = 3;        
        $this->pagination->initialize($config);
                      
        $data=  site_data();        
        $data['_page_title']="Complete List of Dog Breeds";                     
        $data['_header_title']="Complete List of Dog Breeds";      
        $data['_top30']=$this->dog_model->getTop30List();
        $data['_list']=$this->taxonomy_model->getAllList($config['per_page'],$this->uri->segment(3));
        $data['_page_url']=base_url().'category/all/'.$this->uri->segment(3);
        //echo 'page url: '.$data['_page_url'].'<br>';
        $this->template->cat_all($data);
        
    }//end function
    
    public function popular(){
        
         $this->load->model('taxonomy_model');
        $this->load->model('dog_model');
                           
        //$slug = $this->uri->segment(2);
       // echo 'slug: '.$slug.'<br>';
        //Pagination
        $this->load->library('pagination');

        $config=  getPaginationConfig();
        $config['base_url'] = base_url().'category/popular/';
        $config['total_rows'] = $this->taxonomy_model->getPopularNum();        
        $config['per_page'] = 10;
        $config['num_links'] = 5;        
        $config['uri_segment'] = 3;        
        $this->pagination->initialize($config);
                      
        $data=  site_data();        
        $data['_page_title']="Most Popular Breeds";                     
        $data['_header_title']="Most Popular Breeds";      
        $data['_top30']=$this->dog_model->getTop30List();
        $data['_list']=$this->taxonomy_model->getPopularList($config['per_page'],$this->uri->segment(3));
        $data['_page_url']=base_url().'category/popular/'.$this->uri->segment(3);
        //echo 'page url: '.$data['_page_url'].'<br>';
        $this->template->cat_index($data);
        
    }//end function

    public function size()
    {
     
        $this->load->model('taxonomy_model');
        $this->load->model('dog_model');
                           
        $slug = str_replace("_", "-", $this->uri->segment(3) );
        //$slug = $this->uri->segment(3);
        
        //Pagination
        $this->load->library('pagination');

        $config=  getPaginationConfig();
        
        $config['base_url'] = base_url().'category/size/'.$slug;
        $config['total_rows'] = $this->taxonomy_model->getTaxListNum('size',$slug);        
        
        $config['per_page'] = 5;
        $config['num_links'] = 5;        
        $config['uri_segment'] = 4;        

        $this->pagination->initialize($config);
              
        
        $data=  site_data();
        
        $name=$this->taxonomy_model->getTermName('size',$slug);
        //print_r($name);
        //exit();
        
        $data['_page_title']=$name[0]['seo_name'];      
        $data['_header_title']=$name[0]['name'];      
        $data['_blurb']=$name[0]['desc'];
        $data['_desc_bottom']=$name[0]['desc_bottom'];
        
        $data['_top30']=$this->dog_model->getTop30List();
        $data['_list']=$this->taxonomy_model->getTaxList('size',$slug,$config['per_page'],$this->uri->segment(4));
        $data['_page_url']=base_url().'category/size/'.$this->uri->segment(3);
        $this->template->cat_index($data);
               
         
    }//end function size_type
    
    
    public function getTableAJAX(){
        
        $data['_table']= $this->input->post('_table',TRUE);;
        $this->load->model('taxonomy_model');
        $_res=$this->taxonomy_model->getItemTaxonomyList($data['_table']);
        
        echo json_encode ($_res);
        
    }//END FUNCTION
    
    public function breed_group()
    {
     
        $this->load->model('taxonomy_model');
        $this->load->model('dog_model');
         
        $slug = str_replace("_", "-", $this->uri->segment(3) );
        
        //Pagination
        $this->load->library('pagination');

        $config=  getPaginationConfig();
        $config['base_url'] = base_url().'category/breed-group/'.$slug;
        $config['total_rows'] = $this->taxonomy_model->getTaxListNum('breed',$slug);
        $config['per_page'] = 10;
        $config['num_links'] = 5;        
        $config['uri_segment'] = 4;                
        
        $this->pagination->initialize($config);       
        
        $name=$this->taxonomy_model->getTermName('breed',$slug);
        $data=  site_data();
        
        $data['_page_title']=$name[0]['seo_name'];      
        $data['_header_title']=$name[0]['name'];      
        
        $data['_blurb']=$name[0]['desc'];
        $data['_desc_bottom']=$name[0]['desc_bottom'];
         $_page=$this->uri->segment(4);
         
         if($_page!=''){
             //$data['_page_title']=$name[0]['name'].' Page - '.$_page;
         }                
        
        $data['_top30']=$this->dog_model->getTop30List();
        $data['_list']=$this->taxonomy_model->getTaxList('breed',$slug,$config['per_page'],$this->uri->segment(4));
        $data['_page_url']=base_url().'category/breed-group/'.$this->uri->segment(3);
        
         $this->template->cat_index($data);
               
    }//end function breed_group
    
    public function characteristics()
    {
     
        $this->load->model('taxonomy_model');
        $this->load->model('dog_model');
         
        $slug = str_replace("_", "-", $this->uri->segment(3) );
        
        //Pagination
        $this->load->library('pagination');

        $config=  getPaginationConfig();
        $config['base_url'] = base_url().'category/characteristics/'.$slug;
        $config['total_rows'] = $this->taxonomy_model->getTaxListNum('char',$slug);
        $config['per_page'] = 10;
        $config['num_links'] = 5;        
        $config['uri_segment'] = 4;                
        
        $this->pagination->initialize($config);       
        
        $name=$this->taxonomy_model->getTermName('char',$slug);
        $data=  site_data();
        
        $data['_page_title']=$name[0]['seo_name'];      
        $data['_header_title']=$name[0]['name'];      
        
        $data['_blurb']=$name[0]['desc'];
        $data['_desc_bottom']=$name[0]['desc_bottom'];
         $_page=$this->uri->segment(4);
         
         if($_page!=''){
             //$data['_page_title']=$name[0]['name'].' Page - '.$_page;
         }                
        
        $data['_top30']=$this->dog_model->getTop30List();
        $data['_list']=$this->taxonomy_model->getTaxList('char',$slug,$config['per_page'],$this->uri->segment(4));
        $data['_page_url']=base_url().'category/characteristics/'.$this->uri->segment(3);
        
         $this->template->cat_index($data);
               
    }//end function characteristics
    
    public function color()
    {
     
        $this->load->model('taxonomy_model');
        $this->load->model('dog_model');
         
        //$slug = str_replace("_", "-", $this->uri->segment(3) );
        $slug = $this->uri->segment(3) ;
        
        //Pagination
        $this->load->library('pagination');

        $config=  getPaginationConfig();
        $config['base_url'] = base_url().'category/color/'.$slug;
        $config['total_rows'] = $this->taxonomy_model->getTaxListNum('color',$slug);
        //exit();
        $config['per_page'] = 10;
        $config['num_links'] = 5;        
        $config['uri_segment'] = 4;                
        
        $this->pagination->initialize($config);       
        
        $name=$this->taxonomy_model->getTermName('color',$slug);
        $data=  site_data();
        
        $data['_page_title']=$name[0]['seo_name'];      
        $data['_header_title']=$name[0]['name'];      
        
        $data['_blurb']=$name[0]['desc'];
        $data['_desc_bottom']=$name[0]['desc_bottom'];
         $_page=$this->uri->segment(4);
         
         if($_page!=''){
             //$data['_page_title']=$name[0]['name'].' Page - '.$_page;
         }                
        
        $data['_top30']=$this->dog_model->getTop30List();
        $data['_list']=$this->taxonomy_model->getTaxList('color',$slug,$config['per_page'],$this->uri->segment(4));
        $data['_page_url']=base_url().'category/color/'.$this->uri->segment(3);
        
         $this->template->cat_index($data);
               
    }//end function color-type
    
}//end class