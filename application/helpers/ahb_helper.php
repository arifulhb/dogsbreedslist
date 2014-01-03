<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function site_data()
    {

        $data['_site_title']='DogBreedsInfo';
        $data['_site_description']='SITE DESCRIPTION';
        $data['_author']='Ariful Haque Bhuiyan';

        $CI = get_instance();
        $CI->load->model('taxonomy_model');
        $data['_tax_size']=$CI->taxonomy_model->getItemTaxonomyList('tbl_size_type');
        $data['_tax_breed']=$CI->taxonomy_model->getItemTaxonomyList('tbl_breed');
        $data['_tax_char']=$CI->taxonomy_model->getItemTaxonomyList('tbl_char');
        $data['_tax_color']=$CI->taxonomy_model->getItemTaxonomyList('tbl_color');

        return $data;

    }// end site_data
    
function getImagePath(){
    return base_url().'store/images/';
}
function getBreedCategory(){
          $cat=array(
            array('name'=>'Size','table'=>'tbl_size_type','slug'=>'size'),
            array('name'=>'Breed Group','table'=>'tbl_breed','slug'=>'breed-group'),
            array('name'=>'Characteristics','table'=>'tbl_char','slug'=>'characteristics'),
            array('name'=>'Color','table'=>'tbl_color','slug'=>'color')                        
        );
          
        return $cat;
}
function getPaginationConfig(){
        $config=array();
        
        //$config['use_page_numbers'] = TRUE;

        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';

        $config['first_link'] = '<i class="icon-fast-backward" title="First"></i>';
        $config['first_tag_open'] = '<span class="pagination_first">&nbsp;';
        $config['first_tag_close'] = '</span>';

        $config['next_link'] = 'Next <i class="icon-double-angle-right"></i>';
        $config['next_tag_open'] = '<span class="pagination_next">';
        $config['next_tag_close'] = '</span>';

        $config['prev_link'] = '<i class="icon-double-angle-left"></i> Previous';
        $config['prev_tag_open'] = '<span class="pagination_previous">';
        $config['prev_tag_close'] = '</span>';

        $config['last_link'] = '<i class="icon-fast-forward" title="Last"></i>';
        $config['last_tag_open'] = '<span class="pagination_last">';
        $config['last_tag_close'] = '</span>';

        return $config;
    }

