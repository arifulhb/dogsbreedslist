<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dog_model extends CI_Model
{
    var $photo_path;
    
    public function __construct()
    {
        parent::__construct();

        $this->photo_path=realpath(APPPATH.'../store/images');

    }//end constract

    //List only the breeds which are not ranked yet.
    public function getBreedListUnranked()
    {
        
        $this->db->select('item_sn');
        $this->db->from('tbl_ranking');
        $this->db->where('cat',null);
        $tmp = $this->db->get();                
        $item_array=array();        
        foreach($tmp->result_array() as $row):            
            array_push($item_array, $row['item_sn']);
        endforeach;        
        //print_r($item_array);
        
        $this->db->select('i.item_sn, i.item_slug, i.item_info_name');
        $this->db->from('tbl_item as i');
        $this->db->order_by('i.item_info_name');
        if(empty($item_array)==false){
        $this->db->where_not_in('i.item_sn',$item_array);        
        }
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end funciton
    
    public function getBreedListUnrankedByCategory($data){                
        
        $_table = $data['_table'];
        $_sn  = $data['_sn'];
        
        $this->db->select('item_sn');
        $this->db->from('tbl_ranking');
        $this->db->where('cat',$_table);
        $tmp = $this->db->get();                
        $item_array=array();        
        foreach($tmp->result_array() as $row):            
            array_push($item_array, $row['item_sn']);
        endforeach;        
        
        $this->db->select('i.item_sn, i.item_slug, i.item_info_name');
        $this->db->from('tbl_item as i');
        $this->db->order_by('i.item_info_name');
        
        if($_table=='tbl_size_type'){
            $this->db->where('i.size_sn',$_sn);
        }elseif($_table=='tbl_breed'){
            $this->db->where('i.breed_sn',$_sn);   
        }elseif($_table=='tbl_char'){
            $this->db->where('i.char_sn',$_sn);   
        }elseif($_table=='tbl_color'){
            $this->db->where('i.color_sn',$_sn);   
        }
        if(!empty($item_array)){
        $this->db->where_not_in('i.item_sn',$item_array);
        }
        $res=$this->db->get();
                
        return $res->result_array();
        
    }//end function
    
    public function getBreedListRankedByCategory($data){
        
        $_table = $data['_table'];
        $_sn  = $data['_sn'];
        
        $this->db->select('i.item_sn,r.rsn, i.item_info_name, i.item_slug as slug,r.rank,
            i.item_info_other_name as other_name, i.item_info_origin as origin,
            b.name as breed_group, b.sn as breed_sn, b.slug as breed_slug,
            c.name as color_type, c.sn as color_sn, c.slug as color_slug,
            ch.name as char_type, ch.sn as char_sn,ch.slug as char_slug,
            s.name as size_type, s.sn as size_sn, s.slug as size_slug');
        $this->db->from('tbl_ranking as r');       
        
        $this->db->join('tbl_item as i','i.item_sn=r.item_sn','LEFT');
        $this->db->join('tbl_breed as b','b.sn=i.breed_sn','LEFT');
        $this->db->join('tbl_color as c','c.sn=i.color_sn','LEFT');
        $this->db->join('tbl_char as ch','ch.sn=i.char_sn','LEFT');
        $this->db->join('tbl_size_type as s','s.sn=i.size_sn','LEFT');        
        
        $this->db->where('r.cat',$_table);
        $this->db->where('r.cat_sn',$_sn);
        
        $this->db->order_by('r.rank');        
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end function
    
    //
    //Get Breed list from tbl_ranking
    public function getBreedListRanked(){
        
        $this->db->select('i.item_sn,r.rsn, i.item_info_name, i.item_slug as slug,r.rank,
                    i.item_info_other_name as other_name, i.item_info_origin as origin,
                    b.name as breed_group, b.sn as breed_sn, b.slug as breed_slug,
                    c.name as color_type, c.sn as color_sn, c.slug as color_slug,
                    ch.name as char_type, ch.sn as char_sn,ch.slug as char_slug,
                    s.name as size_type, s.sn as size_sn, s.slug as size_slug');
        $this->db->from('tbl_ranking as r');       
        $this->db->where('r.cat',null);
        $this->db->join('tbl_item as i','i.item_sn=r.item_sn','LEFT');
        $this->db->join('tbl_breed as b','b.sn=i.breed_sn','LEFT');
        $this->db->join('tbl_color as c','c.sn=i.color_sn','LEFT');
        $this->db->join('tbl_char as ch','ch.sn=i.char_sn','LEFT');
        $this->db->join('tbl_size_type as s','s.sn=i.size_sn','LEFT');        
          
        
        //$this->db->group_by('i.item_sn');
        $this->db->order_by('r.rank');        
        $res=$this->db->get();
        
        return $res->result_array();
        
    }//end function
    
    public function addBreedCategoryRank($data){
        
        $record=array(  'item_sn'=>$data['_breed_sn'],
                        'rank'=>$data['_rank'],
                        'cat_sn'=>$data['_cat_sn'],
                        'cat'=>$data['_table']);        
           
        $this->db->set($record);        
        $res= $this->db->insert('tbl_ranking'); 
        
        return $res;
        
    }//end function addBreedCategoryRank

   public function addRanking($data){
        $item=array(
            'item_sn'=>$data['item_sn'],
            'rank'=>$data['rank']
        );
        
        $this->db->set($item);        
        $res= $this->db->insert('tbl_ranking'); 
        
        return $res;
        
    }//end function
    
    public function removeRanking($data){
        
        $res=$this->db->delete('tbl_ranking', array('rsn' => $data['rsn'])); 
        return $res;
        
    }//end function

    /*
    public function removeRankingByCategory($data){
        
        $res=$this->db->delete('tbl_ranking', array('rsn' => $data['rsn'])); 
        return $res;
        
    }//end function removeRankingByCategory
    */
    private function set_data($data)
    {                    
         //ADD NEW
            $item =array(
                'size_sn'=>$data['size_sn'],
                'breed_sn'=>$data['breed_sn'],
                'char_sn'=>$data['char_sn'],
                'color_sn'=>$data['color_sn'],

                'item_info_name'=>$data['item_info_name'],
                'item_slug'=>$data['item_slug'],
                'item_info_other_name'=>$data['item_info_other_name'],
                'item_info_origin'=>$data['item_info_origin'],
                'item_seo_title'=>$data['item_seo_title'],
                'item_info_life_span'=>$data['item_info_life_span'],
                'item_info_temperment'=>$data['item_info_temperment'],
                'item_info_height'=>$data['item_info_height'],
                'item_info_weight'=>$data['item_info_weight'],
                'item_info_color'=>$data['item_info_color'],
                'item_info_puppy_price'=>$data['item_info_puppy_price'],
                'item_info_hypoallergenic'=>$data['item_info_hypoallergenic'],
                'item_overview'=>$data['item_overview'],
                'item_overview_small'=>$data['item_overview_small'],
                'item_body_type'=>$data['item_body_type'],
                'item_coat'=>$data['item_coat'],
                'item_color'=>$data['item_color'],
                'item_temparment'=>$data['item_temparment'],
                'item_tasty_tidbits'=>$data['item_tasty_tidbits'],                
                'item_grooming'=>$data['item_grooming'],
                'item_history'=>$data['item_history'],                
                'item_more'=>$data['item_more'],
                'item_name_m_1'=>$data['item_name_m_1'],
                'item_name_f_1'=>$data['item_name_f_1'],
                'item_name_m_2'=>$data['item_name_m_2'],
                'item_name_f_2'=>$data['item_name_f_2'],
                'item_name_m_3'=>$data['item_name_m_3'],
                'item_name_f_3'=>$data['item_name_f_3'],
                'item_name_m_4'=>$data['item_name_m_4'],
                'item_name_f_4'=>$data['item_name_f_4'],
                'item_name_m_5'=>$data['item_name_m_5'],
                'item_name_f_5'=>$data['item_name_f_5'],
                'item_name_m_6'=>$data['item_name_m_6'],
                'item_name_f_6'=>$data['item_name_f_6'],
                'item_name_m_7'=>$data['item_name_m_7'],
                'item_name_f_7'=>$data['item_name_f_7'],
                'item_name_m_8'=>$data['item_name_m_8'],
                'item_name_f_8'=>$data['item_name_f_8'],
                'item_name_m_9'=>$data['item_name_m_9'],
                'item_name_f_9'=>$data['item_name_f_9'],
                'item_name_m_10'=>$data['item_name_m_10'],
                'item_name_f_10'=>$data['item_name_f_10'],

                'item_char_1_text'=>$data['item_char_1_text'],
                'item_char_1_value'=>$data['item_char_1_value'],
                'item_char_2_text'=>$data['item_char_2_text'],
                'item_char_2_value'=>$data['item_char_2_value'],
                'item_char_3_text'=>$data['item_char_3_text'],
                'item_char_3_value'=>$data['item_char_3_value'],
                'item_char_4_text'=>$data['item_char_4_text'],
                'item_char_4_value'=>$data['item_char_4_value'],
                'item_char_5_text'=>$data['item_char_5_text'],
                'item_char_5_value'=>$data['item_char_5_value'],
                'item_char_6_text'=>$data['item_char_6_text'],
                'item_char_6_value'=>$data['item_char_6_value'],
                'item_char_7_text'=>$data['item_char_7_text'],
                'item_char_7_value'=>$data['item_char_7_value'],
                'item_char_8_text'=>$data['item_char_8_text'],
                'item_char_8_value'=>$data['item_char_8_value'],
                'item_char_9_text'=>$data['item_char_9_text'],
                'item_char_9_value'=>$data['item_char_9_value'],
                'item_char_10_text'=>$data['item_char_10_text'],
                'item_char_10_value'=>$data['item_char_10_value'],
                'photo1'=>$data['photo1'],
                'photo2'=>$data['photo2'],
                'photo3'=>$data['photo3']
            );
            
            return $item;
    }// set data

    public function update_dog($data)
    {

        $_sn='';
        if(isset($data['item_sn'])){
            //Update

            $item=$this->set_data($data);
            $_sn=$data['item_sn'];
            
            if($data['upload_1']=='on'){
             $_upres_1= $this->upload_photo('photo1',$_sn,$data['photo1']);            
             $item['photo1']=$_upres_1['file_name'];   
            }                        
            if($data['upload_2']=='on'){
             $_upres_2= $this->upload_photo('photo2',$_sn,$data['photo2']);            
             $item['photo2']=$_upres_2['file_name'];   
            }                        
            if($data['upload_3']=='on'){
             $_upres_3= $this->upload_photo('photo3',$_sn,$data['photo3']);            
             $item['photo3']=$_upres_3['file_name'];   
            }                        
            
            //exit();
            $this->db->where('item_sn',$_sn) ;
                                    
            $res=$this->db->update('tbl_item',$item);
            
            unset($_upres_1);
            unset($_upres_2);
            unset($_upres_3);
            
        }else{
           
            $item=$this->set_data($data);

            $res=$this->db->insert('tbl_item',$item);
            
            
        }// end else

        return $res;        
    }//end public function

    public function deleteItem($data){
        
        $res=$this->db->delete('tbl_item', array('item_sn' => $data['item_sn'])); 
        
        return $res;
        
    }//end function

    public function getList($cat)
    {
        $this->db->select('i.item_sn, i.item_info_name, i.item_slug as slug, i.photo1,
                    i.item_info_other_name as other_name, i.item_info_origin as origin,
                    b.name as breed_group, b.sn as breed_sn, b.slug as breed_slug,
                    c.name as color_type, c.sn as color_sn, c.slug as color_slug,
                    ch.name as char_type, ch.sn as char_sn,ch.slug as char_slug,
                    s.name as size_type, s.sn as size_sn, s.slug as size_slug');
        $this->db->from('tbl_item as i');       
        
        $this->db->join('tbl_breed as b','b.sn=i.breed_sn','LEFT');
        $this->db->join('tbl_color as c','c.sn=i.color_sn','LEFT');
        $this->db->join('tbl_char as ch','ch.sn=i.char_sn','LEFT');
        $this->db->join('tbl_size_type as s','s.sn=i.size_sn','LEFT');
        
        $this->db->limit(8);
        switch ($cat):
            case 'size':
                $this->db->order_by('i.size_sn','desc');
                break;
            case 'breed':
                $this->db->order_by('i.breed_sn','desc');
                break;
            default:
                $this->db->order_by('i.item_sn','desc');
                break;;
        endswitch;
        
        $res=$this->db->get();        
        return $res->result_array();
        
    }// end function


    public function getDogsList()
    {
        $this->db->select('i.item_sn, i.item_seo_title,
                            b.name_sidebar as breed_group, b.sn as breed_sn,
                            c.name_sidebar as color_type, c.sn as color_sn,
                            ch.name_sidebar as char_type, ch.sn as char_sn,
                            s.name_sidebar as size_type, s.sn as size_sn, s.slug as size_slug,
            i.item_info_name, i.item_slug as slug, i.item_info_other_name as other_name, i.item_info_origin as origin');
        $this->db->from('tbl_item as i');       
        
        $this->db->join('tbl_breed as b','b.sn=i.breed_sn','LEFT');
        $this->db->join('tbl_color as c','c.sn=i.color_sn','LEFT');
        $this->db->join('tbl_char as ch','ch.sn=i.char_sn','LEFT');
        $this->db->join('tbl_size_type as s','s.sn=i.size_sn','LEFT');
        $res=$this->db->get();        
        return $res->result_array();
        
    }//end function
    
    public function getTop10()
    {
        $this->db->select('i.item_sn, i.item_info_name, i.item_slug as slug, i.photo1,
                    i.item_info_other_name as other_name, i.item_info_origin as origin,
                    b.name as breed_group, b.sn as breed_sn,
                    c.name as color_type, c.sn as color_sn,
                    ch.name as char_type, ch.sn as char_sn,
                    s.name as size_type, s.sn as size_sn, s.slug as size_slug');
        $this->db->from('tbl_ranking as r');       
        
        $this->db->join('tbl_item as i','i.item_sn=r.item_sn','LEFT');
        $this->db->join('tbl_breed as b','b.sn=i.breed_sn','LEFT');
        $this->db->join('tbl_color as c','c.sn=i.color_sn','LEFT');
        $this->db->join('tbl_char as ch','ch.sn=i.char_sn','LEFT');
        $this->db->join('tbl_size_type as s','s.sn=i.size_sn','LEFT');
        $this->db->order_by('r.rank');        
        $this->db->limit(10);        
        $res=$this->db->get();        
        return $res->result_array();
    }//end function
    
    public function getDetails($slug)
    {
        $this->db->select('i.*,b.name as breed_name, b.slug as breed_slug, b.seo_title as breed_seo_title,
            s.name as size_name, s.slug as size_slug, s.seo_title as size_seo_title');
        $this->db->from('tbl_item as i');
        $this->db->join('tbl_breed as b','b.sn=i.breed_sn','LEFT');
        $this->db->join('tbl_color as c','c.sn=i.color_sn','LEFT');
        $this->db->join('tbl_char as ch','ch.sn=i.char_sn','LEFT');
        $this->db->join('tbl_size_type as s','s.sn=i.size_sn','LEFT');
        $this->db->where('item_slug',$slug);
        $res=$this->db->get();
                
        return $res->result_array();
    }//end function

     public function getDog($sn)
    {
        $this->db->select('i.*');
        $this->db->from('tbl_item as i');
        $this->db->where('item_sn',$sn);
        $res=$this->db->get();
                
        return $res->result_array();
        
    }//end function
    
      /**
     * Upload the User Profile Photo & Thumbnail Photo
     *
     * @param type $field_name
     * @param type $userid
     * @return type
     */
      private function upload_photo($field_name,$dog_sn,$photo){

        /**
         * If File exist, remove that
         */
        if($photo){
            //echo 'file: '.realpath(APPPATH.'../store/images/'.$photo);
            
            if(file_exists(realpath(APPPATH.'../store/images/'.$photo))){
                //Delete file
                unlink(realpath(APPPATH.'../store/images/'.$photo));
                //unlink(realpath(APPPATH.'../store/images/thumbs/'.$photo));
            }
        }//end if file name exist

//exit();

        $config=array(
            'allowed_types'=>'jpg|jpeg|gif|png',
            $config['max_size'] = 2000,
            'file_name'=>md5($dog_sn),
            'upload_path' =>$this->photo_path);

        //echo 'file: '.$field_name.' ITEM id:'.$dog_sn.' <br>';
        $this->load->library('upload',$config);

        if (!$this->upload->do_upload($field_name)) {
            $error = array('error' => $this->upload->display_errors());

            return $error;
        } else {
            //required for thumb upload            
            
            return $this->upload->data();
        }

    }// end function upload_photo
    
    public function getTop30List()
    {
        $this->db->select('i.item_sn, i.item_info_name as dogName, i.item_slug as slug');
        
        $this->db->from('tbl_ranking as r');               
        $this->db->join('tbl_item as i','i.item_sn=r.item_sn','LEFT');        
        $this->db->where('r.cat',NULL);
        $this->db->order_by('r.rank');   
        $this->db->limit(30);
        $res=$this->db->get();
        return $res->result_array();
        
    }//end function
    
}//end class