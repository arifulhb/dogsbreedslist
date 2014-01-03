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
        $data['_latest']=$this->dog_model->getList('latest');
        $data['_size']=$this->dog_model->getList('size');
        $data['_breed']=$this->dog_model->getList('breed');
        $data['_char']=$this->dog_model->getList('char');
        $data['_color']=$this->dog_model->getList('color');
        //print_r($data['_color']);
        $this->template->home($data);


    }//end index
    
}//end class
?>