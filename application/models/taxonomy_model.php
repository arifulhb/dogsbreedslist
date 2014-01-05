<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Taxonomy_model extends CI_Model
{
    var $golfer_profile_path;

    public function __construct()
    {
        parent::__construct();        

    }//end constract

    public function addTaxonomy($data=null){
        
        $table=$data['table'];
        $item=array(
            'name'=>$data['name'],
            'name_sidebar'=>$data['sname'],
            'seo_title'=>$data['seo'],
            'desc'=>$data['desc'],
            'desc_bottom'=>$data['desc_bottom'],
            'slug'=>$data['slug'],
            'order'=>$data['order']
        );
        $this->db->set($item);
        
        $res= $this->db->insert($table); 
        
        return $res;
        
    }//end function
    
    public function deleteTaxonomy($data=null){
        
        $table=$data['table'];
        $res=$this->db->delete($table, array('sn' => $data['sn'])); 
        
        return $res;
        
    }//end function

    public function updateTaxonomy($data =null)
    {
        $cat=array( 'sn'=>$data['sn'],
                    'name'=>$data['name'],
                    'name_sidebar'=>$data['sname'],
                    'seo_title'=>$data['seo_title'],
                    'desc'=>$data['desc'],
                    'desc_bottom'=>$data['desc_bottom'],
                    'slug'=>$data['slug'],
                    'order'=>$data['order']
                );
        
        $this->db->where('sn',$data['sn']) ;                                    
        $res=$this->db->update($data['table'],$cat);
        
        return $res;
        
    }//end function
    
    public function getItemTaxonomyList($table){

        $this->db->select('sn, name, name_sidebar, seo_title, desc, desc_bottom, slug, order');
        $this->db->from($table);
        $this->db->order_by('order','ASC');
        $query = $this->db->get();

        return $query->result_array();

    }//end function


    public function getTaxList($tax,$term,$per_page,$offset)
    {
        //$_table='tbl_size_sn';
        if($offset==''){
            $offset=0;
        }
                
        $sn= $this->getTermSN($tax,$term);        
        $this->db->_protect_identifiers=false;
        
        
        $sql='SELECT IFNULL(NULLIF(r.rank, "'.'NaN'.'"),999) as rank, i.item_sn, ';        
        $sql .= 'i.item_info_name as dog_name, i.item_slug as slug, i.item_info_weight as weight, i.item_info_height as height, ';
        $sql .='i.item_overview_small as overview, i.item_info_hypoallergenic,i.photo1, ';
        $sql .='c.name_sidebar as color, c.slug as color_slug, ';
        $sql .='b.name_sidebar as breed_name, b.slug as breed_slug, ';
        $sql .='s.name_sidebar as size_name, s.slug as size_slug ';
        $sql .='FROM tbl_item as i ';
        
        if($tax=='size'){
            $sql .='LEFT JOIN (select r.item_sn, r.rsn, r.rank from tbl_ranking as r where r.cat_sn='.$sn[0]['sn'].' and r.cat="'.'tbl_size_type'.'")as r on r.item_sn=i.item_sn ';  
            $sql .='LEFT JOIN tbl_breed as b ON b.sn=i.breed_sn ';
            $sql .='LEFT JOIN tbl_color as c ON c.sn=i.color_sn ';
            $sql .='LEFT JOIN tbl_char as ch ON ch.sn=i.char_sn ';
            $sql .='LEFT JOIN tbl_size_type as s ON s.sn=i.size_sn ';       
            $sql .=' WHERE i.size_sn='.$sn[0]['sn'] ;
        }elseif($tax=='breed'){
            $sql .='LEFT JOIN (select r.item_sn, r.rsn, r.rank from tbl_ranking as r where r.cat_sn='.$sn[0]['sn'].' and r.cat="'.'tbl_breed'.'")as r on r.item_sn=i.item_sn ';  
            $sql .='LEFT JOIN tbl_breed as b ON b.sn=i.breed_sn ';
            $sql .='LEFT JOIN tbl_color as c ON c.sn=i.color_sn ';
            $sql .='LEFT JOIN tbl_char as ch ON ch.sn=i.char_sn ';
            $sql .='LEFT JOIN tbl_size_type as s ON s.sn=i.size_sn ';       
            $sql .=' WHERE i.breed_sn='.$sn[0]['sn'] ;
        }elseif($tax=='char'){
            $sql .='LEFT JOIN (select r.item_sn, r.rsn, r.rank from tbl_ranking as r where r.cat_sn='.$sn[0]['sn'].' and r.cat="'.'tbl_char'.'")as r on r.item_sn=i.item_sn ';  
            $sql .='LEFT JOIN tbl_breed as b ON b.sn=i.breed_sn ';
            $sql .='LEFT JOIN tbl_color as c ON c.sn=i.color_sn ';
            $sql .='LEFT JOIN tbl_char as ch ON ch.sn=i.char_sn ';
            $sql .='LEFT JOIN tbl_size_type as s ON s.sn=i.size_sn ';       
            $sql .=' WHERE i.char_sn='.$sn[0]['sn'] ;
        }elseif($tax=='color'){            
            $sql .='LEFT JOIN (select r.item_sn, r.rsn, r.rank from tbl_ranking as r where r.cat_sn='.$sn[0]['sn'].' and r.cat="'.'tbl_color'.'")as r on r.item_sn=i.item_sn ';  
            $sql .='LEFT JOIN tbl_breed as b ON b.sn=i.breed_sn ';
            $sql .='LEFT JOIN tbl_color as c ON c.sn=i.color_sn ';
            $sql .='LEFT JOIN tbl_char as ch ON ch.sn=i.char_sn ';
            $sql .='LEFT JOIN tbl_size_type as s ON s.sn=i.size_sn ';       
            $sql .=' WHERE i.color_sn='.$sn[0]['sn'] ;
        }
        
        $sql .=' ORDER BY rank';
        $sql .=' LIMIT '.$offset.','.$per_page;
        //echo $sql.'<br>';
        //exit(0);
        $query=$this->db->query($sql);       
       
        return $query->result_array();
        
    }//end function        
    
    public function getAllList($per_page,$offset){
         //$_table='tbl_size_sn';
        if($offset==''){
            $offset=0;
        }
        
        $this->db->_protect_identifiers=false;        
        
        //$sql='SELECT r.rank, i.item_sn, ';    
        
        $sql = 'SELECT i.item_sn, i.item_info_name as dog_name, i.item_slug as slug ';       
        $sql .='FROM tbl_item as i ';                                       
        $sql .=' ORDER BY i.item_info_name';
        $sql .=' LIMIT '.$offset.','.$per_page;
        
        $query=$this->db->query($sql);       
       
        return $query->result_array();
        
    }//end function
    
    public function getPopularList($per_page,$offset){
         //$_table='tbl_size_sn';
        if($offset==''){
            $offset=0;
        }
        
        $this->db->_protect_identifiers=false;
        
        
        $sql='SELECT r.rank, i.item_sn, ';    
        
        $sql .= 'i.item_info_name as dog_name, i.item_slug as slug, i.item_info_weight as weight, i.item_info_height as height, ';
        $sql .='i.item_overview_small as overview, i.item_info_hypoallergenic,i.photo1, ';
        $sql .='c.name_sidebar as color, c.slug as color_slug, ';
        $sql .='b.name_sidebar as breed_name, b.slug as breed_slug, ';
        $sql .='s.name_sidebar as size_name, s.slug as size_slug ';
        $sql .='FROM tbl_ranking as r ';
        
                   
            $sql .='LEFT JOIN tbl_item as i ON r.item_sn=i.item_sn ';  
            $sql .='LEFT JOIN tbl_breed as b ON b.sn=i.breed_sn ';
            $sql .='LEFT JOIN tbl_color as c ON c.sn=i.color_sn ';
            $sql .='LEFT JOIN tbl_char as ch ON ch.sn=i.char_sn ';
            $sql .='LEFT JOIN tbl_size_type as s ON s.sn=i.size_sn ';       
            $sql .='WHERE r.cat IS NULL';        
        
        $sql .=' ORDER BY rank';
        $sql .=' LIMIT '.$offset.','.$per_page;
        //echo $sql.'<br>';
        //exit(0);
        $query=$this->db->query($sql);       
       
        return $query->result_array();
        
    }//end function

    public function getTaxListNum($tax,$term)
    {       
        $sn= $this->getTermSN($tax,$term);
        
        $this->db->select('i.item_sn');
        $this->db->from('tbl_item i');
        
        if($tax=='size'){                                    
            $this->db->join('tbl_size_type as s','s.sn=i.size_sn','LEFT');            
            $this->db->where('size_sn',$sn[0]['sn']);            
        }elseif($tax=='char'){            
            $this->db->join('tbl_char as c','c.sn=i.char_sn','LEFT');            
            $this->db->where('i.char_sn',$sn[0]['sn']);
        }elseif($tax=='breed'){            
            $this->db->join('tbl_breed as b','b.sn=i.breed_sn','LEFT');            
            $this->db->where('i.breed_sn',$sn[0]['sn']);
        }elseif($tax=='color'){
            //$sn= $this->getTermSN($tax,$term);
            $this->db->join('tbl_color as c','c.sn=i.color_sn','LEFT');            
            $this->db->where('i.color_sn',$sn[0]['sn']);
        }
        
        $res    = $this->db->get();
        return $res->num_rows();
        
    }//end function

    public function getAllNum(){        
        $this->db->select('i.item_sn');
        $this->db->from('tbl_item i');
        //$this->db->where('r.cat',null);
        $res    = $this->db->get();
        return $res->num_rows();
    }//end function
    
    public function getPopularNum(){        
        $this->db->select('r.item_sn');
        $this->db->from('tbl_ranking r');
        $this->db->where('r.cat',null);
        $res    = $this->db->get();
        return $res->num_rows();
    }//end function

    private function getTermSN($tax,$term)
    {
        if($tax=='size'){
            $this->db->select('sn');
            $this->db->from('tbl_size_type');
            $this->db->where('slug',$term);
        }elseif($tax=='char'){
            $this->db->select('sn');
            $this->db->from('tbl_char');
            $this->db->where('slug',$term);
        }elseif($tax=='breed'){
            $this->db->select('sn');
            $this->db->from('tbl_breed');
            $this->db->where('slug',$term);
        }elseif($tax=='color'){
            $this->db->select('sn');
            $this->db->from('tbl_color');
            $this->db->where('slug',$term);
        }
        $res    = $this->db->get();        
        return $res->result_array();
        
    }//end function
    
    public function getTermName($tax,$term)
    {
        $this->db->select('name, seo_title as seo_name, desc, desc_bottom');
        if($tax=='size'){            
            $this->db->from('tbl_size_type');            
        }elseif($tax=='char'){
            $this->db->from('tbl_char');            
        }elseif($tax=='breed'){
            $this->db->from('tbl_breed');            
        }elseif($tax=='color'){
            $this->db->from('tbl_color');            
        }
        $this->db->where('slug',$term);
        
        $res    = $this->db->get();
        return $res->result_array();
    }//end function
    
    
}//end class