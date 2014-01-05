<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor

    public function index()
    {

        //$this->load->model('taxonomy_model');
        if($this->session->userdata('is_logged_in')==TRUE){
            
            
            $data=site_data();            
            $this->load->model('dog_model');
            
            $data['dogs_list']=$this->dog_model->getDogsList();
            $this->template->admin_home($data);
            
        }else{
            redirect('admin/login');
        }

    }//end index
    
    public function user(){
        
        if($this->session->userdata('is_logged_in')==TRUE){
            
            
            $data=site_data();     
            $data['_page_title']='User Management';
            $this->load->model('user_model');
            
            $data['user_list']=$this->user_model->getList();
            $this->template->admin_user($data);
            
        }else{
            redirect('admin/login');
        }
        
    }//end function

    public function addNewDog(){
        if($this->session->userdata('is_logged_in')==TRUE){
             $data=site_data();
            $this->load->model('taxonomy_model');
            $data['_tax_size']=$this->taxonomy_model->getItemTaxonomyList('tbl_size_type');
            $data['_tax_breed']=$this->taxonomy_model->getItemTaxonomyList('tbl_breed');
            $data['_tax_char']=$this->taxonomy_model->getItemTaxonomyList('tbl_char');
            $data['_tax_color']=$this->taxonomy_model->getItemTaxonomyList('tbl_color');

            $data['_page_title']='Add New Item';
            $this->template->admin_add_dog($data);
        }else{
            redirect('admin/login');
        }
       
    }//end add new dog
    
    public function update_dog($sn){
        if($this->session->userdata('is_logged_in')==TRUE){
            $data=site_data();
           $this->load->model('taxonomy_model');        
           $data['_tax_size']=$this->taxonomy_model->getItemTaxonomyList('tbl_size_type');
           $data['_tax_breed']=$this->taxonomy_model->getItemTaxonomyList('tbl_breed');
           $data['_tax_char']=$this->taxonomy_model->getItemTaxonomyList('tbl_char');
           $data['_tax_color']=$this->taxonomy_model->getItemTaxonomyList('tbl_color');

           $this->load->model('dog_model');

           $dog=$this->dog_model->getDog($sn);
           $data['_dog_info']=$dog[0];
           $data['_page_title']='Update Item';
           $this->template->admin_edit_dog($data);   
        }        
        else{
            redirect('admin/login');
        }
    }//end function

    public function ranking(){
           
        //$this->load->model('taxonomy_model');
        if($this->session->userdata('is_logged_in')==TRUE){
        
            $data=site_data();
            $data['_page_title']='Ranking Management';
            $this->load->model('dog_model');
            $data['_not_ranked_breed_list']=$this->dog_model->getBreedListUnranked();
            $data['_rankedBreedList']=$this->dog_model->getBreedListRanked();

            $data['_page_title']="Breed Rank Management";
            $this->template->admin_ranking($data);
        }else{
            redirect('admin/login');
        }
    }//
    
    public function addRankValidation(){
        if($this->session->userdata('is_logged_in')==TRUE){
            $this->load->model('dog_model');
           $data['item_sn']= $this->input->post('breed_sn',TRUE);;
           $data['rank']= $this->input->post('rank',TRUE);;
           $res    =$this->dog_model->addRanking($data);

           if($res==1){
                 echo $this->db->insert_id();
             }else{
                 echo $res;   
             }   
        }else{
            redirect('admin/login');
        }                
        
    }//end function
    
    public function ranking_category(){
               
        //$this->load->model('taxonomy_model');
        if($this->session->userdata('is_logged_in')==TRUE){
        
            $data=site_data();
            $this->load->model('dog_model');
            $data['_not_ranked_breed_list']=$this->dog_model->getBreedListUnranked();//for select
            //$data['_rankedBreedList']=$this->dog_model->getBreedListRanked(); //for table

            $data['_page_title']="Breed Category Rank Management";
            $this->template->admin_ranking_category($data);
        }else{
            redirect('admin/login');
        }
        
    }//end function
    
    
    public function addBreedCategoryRankAjax(){
        if($this->session->userdata('is_logged_in')==TRUE){
            $data['rsn']= $this->input->post('sn',TRUE);;        
            $res    =$this->dog_model->removeRanking($data);
            echo $res;    
        }else{
            redirect('admin/login');
        }
                
        
    }//end function addBreedCategoryRankAjax
    
    
    public function update_category()
    {
                
        //$this->load->model('taxonomy_model');
        if($this->session->userdata('is_logged_in')==TRUE){
                                            
            $data=site_data();
            $this->load->model('taxonomy_model');
            $data['_tax_size']=$this->taxonomy_model->getItemTaxonomyList('tbl_size_type');
            $data['_tax_breed']=$this->taxonomy_model->getItemTaxonomyList('tbl_breed');
            $data['_tax_char']=$this->taxonomy_model->getItemTaxonomyList('tbl_char');
            $data['_tax_color']=$this->taxonomy_model->getItemTaxonomyList('tbl_color');

            $data['_page_title']="Update Category";
            $this->template->admin_update_category($data);

        }else{
            redirect('admin/login');
        }
        
    }//end function
    
    public function add_category_validation(){
        if($this->session->userdata('is_logged_in')==TRUE){
         
            $data['table'] = $this->input->post('table',TRUE);        
        
            $this->load->library('form_validation');

            $this->form_validation->set_rules('_name', 'Name', 'trim|required|max_length[250]|xss_clean');
            $this->form_validation->set_rules('_sname', 'Sidebar Name', 'trim|required|max_length[250]|xss_clean');
            $this->form_validation->set_rules('_seo', 'SEO Title', 'trim|required|max_length[250]|xss_clean');
            $this->form_validation->set_rules('_slug', 'Slug', 'trim|required|max_length[250]|xss_clean|is_unique['.$data['table'].'.slug]');        

            $data['name'] = $this->input->post('_name',TRUE);
            $data['sname'] = $this->input->post('_sname',TRUE);
            $data['seo'] = $this->input->post('_seo',TRUE);
            $data['slug'] = $this->input->post('_slug',TRUE);
            $data['desc'] = $this->input->post('_desc',TRUE);
            $data['desc_bottom'] = $this->input->post('_desc_bottom',TRUE);
            $data['order'] = $this->input->post('_order',TRUE);


            if ($this->form_validation->run() == TRUE)
            {                        
                $this->load->model('taxonomy_model');
                $res = $this->taxonomy_model->addTaxonomy($data);

                if($res==1){
                    echo $this->db->insert_id();
                }else{
                    echo $res;   
                }

            }
            else{
                //show dog edit page with validation error                       
                echo validation_errors();
            }//end else        
        }else{
            redirect('admin/login');
        }                        
        
    }//end function
    
    public function remove_category_validation(){
        if($this->session->userdata('is_logged_in')==TRUE){
              $data['table'] = $this->input->post('table',TRUE);
            $data['sn'] = $this->input->post('_sn',TRUE);

            $this->load->model('taxonomy_model');
            $res = $this->taxonomy_model->deleteTaxonomy($data);

            echo $res;
        }else{
            redirect('admin/login');
        }  
        
      
        
    }//end function
    
    public function update_category_validation(){
        if($this->session->userdata('is_logged_in')==TRUE){
               $data['table'] = $this->input->post('table',TRUE);
            $data['sn'] = $this->input->post('_sn',TRUE);
            $data['name'] = $this->input->post('_name',TRUE);
            $data['sname'] = $this->input->post('_sname',TRUE);
            $data['seo_title'] = $this->input->post('_seo_title',TRUE);
            $data['desc'] =  $this->input->post('_desc',TRUE);
            $data['desc_bottom'] =  $this->input->post('_desc_bottom',TRUE);
            $data['slug'] = $this->input->post('_slug',TRUE);
            $data['order'] = $this->input->post('_order',TRUE);

            $this->load->model('taxonomy_model');
            $res = $this->taxonomy_model->updateTaxonomy($data);

            echo $res;
        }else{
            redirect('admin/login');
        }  
     
        
    }//end function

    public function category($cat)
    {        
        if($this->session->userdata('is_logged_in')==TRUE){
             $data= site_data();      
             $data['_page_title']='Category Management';
        
        $this->template->admin_category($data);
        }
       else{
            redirect('admin/login');
        } 
        
    }//end function

    public function getCategoryTable()
    {
        $data['table'] = $this->input->post('table',TRUE);
        $this->load->model('taxonomy_model');
        $data['_table']=$this->taxonomy_model->getItemTaxonomyList($data['table']);
         
        echo json_encode ($data['_table']);
        //print_r($data['_table']);
        
    }//end function

    /*
     * addNewItemVerification
     * Add/Update breeds
     */
    public function addNewItemVerification()
    {

        $this->load->library('form_validation');
        $data['action'] =$this->input->post('action',TRUE);

        if($data['action']=='update')
        {
            $data['item_sn']        =$this->input->post('item_sn',TRUE);            
        }//end if

        $this->form_validation->set_rules('txtName', 'Name', 'trim|required|max_length[250]|xss_clean');
        $this->form_validation->set_rules('txt_item_slug', 'Slug', 'trim|required|max_length[250]|xss_clean');
        $this->form_validation->set_rules('txtOtherName', 'Other Name', 'trim|required|max_length[250]|xss_clean');
        $this->form_validation->set_rules('txtSeoTitle', 'SEO Title', 'trim|required|max_length[250]|xss_clean');
        $this->form_validation->set_rules('txtorigin', 'origin', 'trim|required|max_length[250]|xss_clean');
        $this->form_validation->set_rules('txtlife_span', 'Life Span', 'trim|max_length[250]|required|xss_clean');
        $this->form_validation->set_rules('txtTemperament', 'Temperament', 'trim|max_length[250]|required|xss_clean');
        $this->form_validation->set_rules('txtheight', 'Height', 'trim|max_length[250]|required|xss_clean');
        $this->form_validation->set_rules('txtweight', 'Weight', 'trim|max_length[250]|required|xss_clean');
        $this->form_validation->set_rules('txtcolor', 'Color', 'trim|max_length[250]|required|xss_clean');
        $this->form_validation->set_rules('txtpuppy_price', 'Puppy Price', 'trim|max_length[250]|required|xss_clean');
        $this->form_validation->set_rules('txthypoallergenic', 'Hypo Allergenic','trim|max_length[250]|required|xss_clean');
        $this->form_validation->set_rules('txt_overview', 'Overview', 'trim|max_length[5000]|xss_clean');
        $this->form_validation->set_rules('txt_body_type', 'Body Type', 'trim|max_length[5000]|xss_clean');
        $this->form_validation->set_rules('txt_coat', 'Coat', 'trim|max_length[5000]|xss_clean');
        $this->form_validation->set_rules('txt_color', 'Color', 'trim|max_length[5000]|xss_clean');
        $this->form_validation->set_rules('txt_temperament', 'Temperment', 'trim|max_length[5000]|xss_clean');
        $this->form_validation->set_rules('txt_tasty_tidbits', 'Tasty Tidbits', 'trim|max_length[5000]|xss_clean');
        
        $this->form_validation->set_rules('txt_grooming', 'Grooming', 'trim|max_length[5000]|xss_clean');
        $this->form_validation->set_rules('txt_history', 'History', 'trim|max_length[5000]|xss_clean');
        
        $this->form_validation->set_rules('txt_more', 'More', 'trim|max_length[5000]|xss_clean');

        //Characteristics
        $this->form_validation->set_rules('txtchr_1_text', 'Good with Kids', 'trim|max_length[50]|xss_clean');
        $this->form_validation->set_rules('r_dog_char_1_val', 'Good with Kids', 'trim|numeric|xss_clean');

        $this->form_validation->set_rules('txtchr_2_text', 'Cat Friendly', 'trim|max_length[50]|xss_clean');
        $this->form_validation->set_rules('r_dog_char_2_val', 'Cat Friendly', 'trim|numeric|xss_clean');

        $this->form_validation->set_rules('txtchr_3_text', 'Dog Friendly', 'trim|max_length[50]|xss_clean');
        $this->form_validation->set_rules('r_dog_char_3_val', 'Dog Friendly', 'trim|numeric|xss_clean');

        $this->form_validation->set_rules('txtchr_4_text', 'Trainability', 'trim|max_length[50]|xss_clean');
        $this->form_validation->set_rules('r_dog_char_4_val', 'Trainability', 'trim|numeric|xss_clean');

        $this->form_validation->set_rules('txtchr_5_text', 'Shedding', 'trim|max_length[50]|xss_clean');
        $this->form_validation->set_rules('r_dog_char_5_val', 'Shedding', 'trim|numeric|xss_clean');

        $this->form_validation->set_rules('txtchr_6_text', 'Watchdog', 'trim|max_length[50]|xss_clean');
        $this->form_validation->set_rules('r_dog_char_6_val', 'Watchdog', 'trim|numeric|xss_clean');

        $this->form_validation->set_rules('txtchr_7_text', 'Intelligence', 'trim|max_length[50]|xss_clean');
        $this->form_validation->set_rules('r_dog_char_7_val', 'Intelligence', 'trim|numeric|xss_clean');

        $this->form_validation->set_rules('txtchr_8_text', 'Grooming', 'trim|max_length[50]|xss_clean');
        $this->form_validation->set_rules('r_dog_char_8_val', 'Grooming', 'trim|numeric|xss_clean');

        $this->form_validation->set_rules('txtchr_9_text', 'Popularity', 'trim|max_length[50]|xss_clean');
        $this->form_validation->set_rules('r_dog_char_9_val', 'Popularity', 'trim|numeric|xss_clean');

        $this->form_validation->set_rules('txtchr_10_text', 'Adaptability', 'trim|max_length[50]|xss_clean');
        $this->form_validation->set_rules('r_dog_char_10_val', 'Adaptability', 'trim|numeric|xss_clean');
                

        //BASIC INFO
        $data['item_slug'] = $this->input->post('txt_item_slug',TRUE);
        $data['item_info_name'] = $this->input->post('txtName',TRUE);
        $data['item_info_other_name'] = $this->input->post('txtOtherName',TRUE);
        $data['item_seo_title'] = $this->input->post('txtSeoTitle',TRUE);
        $data['item_info_origin'] = $this->input->post('txtorigin',TRUE);
        $data['item_info_life_span'] = $this->input->post('txtlife_span',TRUE);
        $data['item_info_temperment'] = $this->input->post('txtTemperament',TRUE);
        $data['item_info_height'] = $this->input->post('txtheight',TRUE);
        $data['item_info_weight'] = $this->input->post('txtweight',TRUE);
        $data['item_info_color'] = $this->input->post('txtcolor',TRUE);
        $data['item_info_puppy_price'] = $this->input->post('txtpuppy_price',TRUE);
        $data['item_info_hypoallergenic'] = $this->input->post('txthypoallergenic',TRUE);

        $data['size_sn'] = $this->input->post('cat_size',TRUE);
        $data['breed_sn'] = $this->input->post('cat_breed',TRUE);
        $data['char_sn'] = $this->input->post('cat_char',TRUE);
        $data['color_sn'] = $this->input->post('cat_color',TRUE);

        $data['item_overview_small'] = $this->input->post('txt_brieft',TRUE);

        //Details
        //$data['item_overview_small'] = $this->input->post('txtName',TRUE);
        $data['item_overview'] = $this->input->post('txt_overview',TRUE);
        $data['item_body_type'] = $this->input->post('txt_body_type',TRUE);
        $data['item_coat'] = $this->input->post('txt_coat',TRUE);
        $data['item_color'] = $this->input->post('txt_color',TRUE);
        $data['item_temparment'] = $this->input->post('txt_temperament',TRUE);
        $data['item_tasty_tidbits'] = $this->input->post('txt_tasty_tidbits',TRUE);
        $data['item_grooming'] = $this->input->post('txt_grooming',TRUE);
        $data['item_history'] = $this->input->post('txt_history',TRUE);
        $data['item_more'] = $this->input->post('txt_more',TRUE);       
        
        //Characteristics
        $data['item_char_1_text']   = $this->input->post('txtchr_1_text',TRUE);
        $data['item_char_1_value']  = $this->input->post('r_dog_char_1_val',TRUE);
        $data['item_char_2_text']   = $this->input->post('txtchr_2_text',TRUE);
        $data['item_char_2_value']  = $this->input->post('r_dog_char_2_val',TRUE);
        $data['item_char_3_text']   = $this->input->post('txtchr_3_text',TRUE);
        $data['item_char_3_value']  = $this->input->post('r_dog_char_3_val',TRUE);
        $data['item_char_4_text']   = $this->input->post('txtchr_4_text',TRUE);
        $data['item_char_4_value']  = $this->input->post('r_dog_char_4_val',TRUE);
        $data['item_char_5_text']   = $this->input->post('txtchr_5_text',TRUE);
        $data['item_char_5_value']  = $this->input->post('r_dog_char_5_val',TRUE);
        $data['item_char_6_text']   = $this->input->post('txtchr_6_text',TRUE);
        $data['item_char_6_value']  = $this->input->post('r_dog_char_6_val',TRUE);
        $data['item_char_7_text']   = $this->input->post('txtchr_7_text',TRUE);
        $data['item_char_7_value']  = $this->input->post('r_dog_char_7_val',TRUE);
        $data['item_char_8_text']   = $this->input->post('txtchr_8_text',TRUE);
        $data['item_char_8_value']  = $this->input->post('r_dog_char_8_val',TRUE);
        $data['item_char_9_text']   = $this->input->post('txtchr_9_text',TRUE);
        $data['item_char_9_value']  = $this->input->post('r_dog_char_9_val',TRUE);
        $data['item_char_10_text']   = $this->input->post('txtchr_10_text',TRUE);
        $data['item_char_10_value']  = $this->input->post('r_dog_char_10_val',TRUE);
        
        $data['photo1']  = $this->input->post('photo1',TRUE);        
        $data['upload_1']=$this->input->post('upload_1',TRUE); 
        $data['photo2']  = $this->input->post('photo2',TRUE);
        $data['upload_2']  = $this->input->post('upload_2',TRUE);
        $data['photo3']  = $this->input->post('photo3',TRUE);
        $data['upload_3']  = $this->input->post('upload_3',TRUE);

        if ($this->form_validation->run() == TRUE)
        {

            $this->load->model('dog_model');
            $res=$this->dog_model->update_dog($data);

            if($res==FALSE){
                echo 'failed';
            }else{
                
                $sn=0;
                if($data['action']=='update')
                {
                    $sn =$this->input->post('item_sn',TRUE);                    
                }//end if
                else{
                  $sn=$this->db->insert_id();  
                }
                
                //$this->dog_model->update_dog_photo($sn);
                
                redirect('admin/update_dog/'.$sn.'?status=success');
                  
            }//end else

        }//
        else{
            //show dog edit page with validation error
            
             echo validation_errors();

        }//end else


    }//end function addnewItem

    public function login(){

        $data=site_data();
        $data['_page_title']='Log In';
        $this->template->admin_login($data);
    }//end functon login

    public function login_validation(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('txtuseremail', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('txtuserpassword', 'Password', 'trim|required|xss_clean');

        $data['_user_email']=$this->input->post('txtuseremail',TRUE);

        if($this->form_validation->run()==TRUE){

            $data['txtuserpassword']=$this->input->post('txtuserpassword',TRUE);

            // 1. Match User ID and password through admin model
            // 2. If match pass, set the session and make user loggedin
            
            $this->load->model('user_model');
            
            $user=$this->user_model->checkpassword($data['_user_email'],$data['txtuserpassword']);
            
            //echo 'name: '.$user[0]['user_name'];
            //ex/it();
            //$user=1;
            if(count($user)==1){
                // 2.1  Redirect to Admin Dashboard
                      $data = array(
                            'user_sn' => $user[0]['user_sn'],                            
                            'user_name' => $user[0]['user_name'],
                            'user_email' => $data['_user_email'],
                            
                            'is_logged_in' => true
                    );
                    $this->session->set_userdata($data);
                    
                    //echo 'name: '.$this->session->userdata('user_name');
                    //exit();
                    redirect('admin/index');

            }else{
                // 2.2 Redirect to login page again with error message.
                redirect('admin/login');
            }
        }//end if
        else{
                redirect('admin/login');
        }


    }//end function
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('home');
    }

}//end class
?>