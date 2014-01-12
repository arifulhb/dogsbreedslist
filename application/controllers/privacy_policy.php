<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privacy_Policy extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->library('template');

    }//end constractor

    public function index()
    {
        $data=site_data();
        $this->load->model('dog_model');
        $data['_top10']=$this->dog_model->getTop10();
        $data['_page_title']='Privacy Policy';
        $this->template->privacy_policy($data);
        
        
    }//end function index
    
}//end class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */