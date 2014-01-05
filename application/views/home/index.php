<?php
$image_path=  getImagePath();
?>
<div class="row home_page">
    <div class="col-lg-2">                
        <?php
         $this->load->view('inc/top10');
        ?>
    </div>    
    <div class="col-lg-8">
               
        <?php        
        $category=array(         
                'size'=>array('name'=>'Size Type','slug'=>'_size','dbslug'=>'size'),
                'breed'=>array('name'=>'Breed Group','slug'=>'_breed','dbslug'=>'breed-group'),
                'char'=>array('name'=>'Characteristics','slug'=>'_char','dbslug'>'char'),
                'color'=>array('name'=>'Color Type','slug'=>'_color','dbslug'=>'color')
                    );
                
        foreach($category as $cat)
        {
        
            ?>
            <h2 class="sec_title"><?php echo $cat['name'];?></h2>                       
             <?php
             $i=1;
             foreach(${$cat['slug']} as $item)
             {
                 $count=$item['count'];                 
                 ?>
                    <h4><a href="<?php echo base_url().'category/'.$item['slug'].'/'.$item['slug_cat'];?>"><?php echo $item['name'];?></a></h4>
                    <div class="row">
                     <?php
                 
                 $catdata=$item['catdata'];
                 foreach($catdata as $row):                     
                      ?>
                        <div class="col-lg-3 home_image">
                            <a href="<?php echo base_url().'dog/details/'.$row['slug']; ?>" title="<?php echo $row['item_info_name']; ?>">
                            <img class="img-rounde dog-photo1"
                                src="<?php echo $image_path.$row['photo1']; ?>" 
                                alt="<?php echo $row['item_info_name'];?>"/>
                            <p class="title"><?php echo $row['item_info_name']; ?></p>
                            </a>
                        </div>                                                                                     
                     <?php                     
                     
                 endforeach;
                 ?>
                     </div>
                     <?php
                                 
             $i++;    
             
             }//end foreach             
             
        }//end foreach             
        
        ?>
                        
    </div>
    <div class="col-lg-2">
        <?php       
        $this->load->view('inc/sidebar');
        ?>
    </div>
</div>