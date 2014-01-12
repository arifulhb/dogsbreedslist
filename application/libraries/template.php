<?php

class Template
{
    protected $_ci;

    function __construct()
    {
        $this->_ci =&get_instance();
    }//end construct

    //Load the Home Page
    function home($data=null)
    {
        //Loadign the template
        //$data['_header']=$this->_ci->load->view('front/header',$data,true);
        $data['_navbar_home']=$this->_ci->load->view('inc/navbar_home',$data,true);        
        $data['_content']=$this->_ci->load->view('home/index',$data,true);
        
        //Page Class Name        
        $data['_page_class']='home';

        //Load the page
        $this->_ci->load->view('page_template.php',$data);

    }//end home

    //Load the Home Page
    function privacy_policy($data=null)
    {
        //Loadign the template        
        $data['_navbar_home']=$this->_ci->load->view('inc/navbar_home',$data,true);        
        $data['_content']=$this->_ci->load->view('inc/privacy',$data,true);
        
        $data['_noindex']=true;
        //Page Class Name        
        $data['_page_class']='home';

        //Load the page
        $this->_ci->load->view('page_template.php',$data);

    }//end home

    
    /**
     * DOG
     */
    function dog_details($data)
    {
                
        //$data['_header']=$this->_ci->load->view('front/header',$data,true);
        $data['_navbar_home']=$this->_ci->load->view('inc/navbar_home',$data,true);        
        $data['_content']=$this->_ci->load->view('dog/details',$data,true);
        
        //Page Class Name
        $data['_page_class']='dog_details';

        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function


    /**
     * Category
     */
    
    function cat_index($data=null)
    {
        //$data['_header']=$this->_ci->load->view('front/header',$data,true);
        $data['_navbar_home']=$this->_ci->load->view('inc/navbar_home',$data,true);        
        $data['_content']=$this->_ci->load->view('cat/index',$data,true);
        
        //Page Class Name
        $data['_page_class']='cat_index';

        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function
    
    
    function cat_all($data=null)
    {        
        $data['_navbar_home']=$this->_ci->load->view('inc/navbar_home',$data,true);        
        $data['_content']=$this->_ci->load->view('cat/all',$data,true);
        
        //Page Class Name
        $data['_page_class']='cat_all';

        //Load the page
        $this->_ci->load->view('page_template.php',$data);
        
    }//end function
    
    function admin_user($data=null)
    {
        //Loadign the template
        $data['_navbar_home']=$this->_ci->load->view('admin/navbar',$data,true);
        $data['_noindex']=true;
        $data['_content']=$this->_ci->load->view('user/index',$data,true);

        //Page Class Name
        $data['_page_class']='admin_users';        

        //Load the page
        $this->_ci->load->view('admin_template.php',$data);

    }//end home

    /*
     * ADMIN
     */

    function admin_home($data=null)
    {
        //Loadign the template
        $data['_navbar_home']=$this->_ci->load->view('admin/navbar',$data,true);

        $data['_content']=$this->_ci->load->view('admin/index',$data,true);

        //Page Class Name
        $data['_page_class']='admin_home';        
        $data['_noindex']=true;

        //Load the page
        $this->_ci->load->view('admin_template.php',$data);

    }//end home

    public function admin_update_category($data=null)
    {
        //Loadign the template
        $data['_navbar_home']=$this->_ci->load->view('admin/navbar',$data,true);
        $data['_noindex']=true;
        $data['_content']=$this->_ci->load->view('admin/update_cat',$data,true);
        
        //Page Class Name
        $data['_page_class']='admin_update_category';
        
        //Load the page
        $this->_ci->load->view('admin_template.php',$data);
        
    }//end home
    
    public function admin_category($data=null)
    {
        $data['_noindex']=true;
        //Loadign the template
        $data['_navbar_home']=$this->_ci->load->view('admin/navbar',$data,true);
        
        $data['_content']=$this->_ci->load->view('admin/index',$data,true);
        
        //Page Class Name
        $data['_page_class']='admin_category';        
        //Load the page
        $this->_ci->load->view('admin_template.php',$data);
        
    }//end home
    
    public function admin_ranking($data=null)
    {
        
            //Loadign the template
        $data['_navbar_home']=$this->_ci->load->view('admin/navbar',$data,true);
                $data['_noindex']=true;
        $data['_content']=$this->_ci->load->view('admin/ranking',$data,true);
        
        $data['_noindex']=true;
                
        //Page Class Name
        $data['_page_class']='admin_ranking';        
        //Load the page
        $this->_ci->load->view('admin_template.php',$data);
    }//end function
    
    public function admin_ranking_category($data=null)
    {
        
        $data['_noindex']=true;        
        
        //Loadign the template
        $data['_navbar_home']=$this->_ci->load->view('admin/navbar',$data,true);
        
        $data['_content']=$this->_ci->load->view('admin/ranking_category',$data,true);
        
        //Page Class Name
        $data['_page_class']='admin_ranking category_ranking';        
        //Load the page
        $this->_ci->load->view('admin_template.php',$data);
    }//end function
    
    function admin_add_dog($data=null)
    {
        //Loadign the template
        $data['_navbar_home']=$this->_ci->load->view('admin/navbar',$data,true);
        $data['_noindex']=true;
        $data['_content']=$this->_ci->load->view('admin/add_dog',$data,true);

        //Page Class Name
        $data['_page_class']='admin_add_dog';

        //Load the page
        $this->_ci->load->view('admin_template.php',$data);

    }//end home
    
    function admin_cp($data=null)
    {
        $data['_noindex']=true;
        //Loadign the template
        $data['_navbar_home']=$this->_ci->load->view('admin/navbar',$data,true);

        $data['_content']=$this->_ci->load->view('user/changepass',$data,true);

        //Page Class Name
        $data['_page_class']='admin_changepass';

        //Load the page
        $this->_ci->load->view('admin_template.php',$data);

    }//end home
    

    function admin_edit_dog($data=null)
    {
            //Loadign the template
        $data['_navbar_home']=$this->_ci->load->view('admin/navbar',$data,true);
        $data['_noindex']=true;
        $data['_content']=$this->_ci->load->view('admin/add_dog',$data,true);
        $data['_noindex']=true;
        //Page Class Name
        $data['_page_class']='admin_add_dog';

        //Load the page
        $this->_ci->load->view('admin_template.php',$data);
        
    }//end function
    
    function admin_login($data=null)
    {
        //Loadign the template
        //$data['_navbar_home']=$this->_ci->load->view('',$data,true);
                $data['_noindex']=true;
        $data['_content']=$this->_ci->load->view('admin/login',$data,true);

        //Page Class Name
        $data['_page_class']='admin_login';

        //Load the page
        $this->_ci->load->view('admin_template.php',$data);

    }//end home

}//end class