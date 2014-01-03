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
                'latest'=>array('name'=>'Latest','slug'=>'_latest'),
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
                 //echo 'item: '.$item['item_info_name'].'<br>';
                  if($i==1 || $i==5){
                ?>                                    
                <div class="row <?php echo 'row-'.$i;?>">         
                <?php            
                }   
            ?>
                <div class="col-lg-3 home_image">
                    <a href="<?php echo base_url().'dog/details/'.$item['slug']; ?>" title="<?php echo $item['item_info_name']; ?>">
                    <img class="img-rounde dog-photo1"
                        src="<?php echo $image_path.$item['photo1']; ?>" 
                        alt="<?php echo $item['item_info_name'];?>"/>
                    <p class="title"><?php echo $item['item_info_name']; ?></p>
                    </a>
                    <?php
                    switch ($cat['slug']):
                        case '_size';
                            ?>
                            <p class="cat"><a href="<?php echo base_url().'category/'.$cat['dbslug'].'/'.$item['size_slug'];?>" 
                                              title="<?php echo $item['size_type'];?>">
                                <?php echo $item['size_type'];?></a>
                            </p>
                            <?php
                            break;
                        case '_breed';
                            ?>
                            <p class="cat"><a href="<?php echo base_url().'category/'.$cat['dbslug'].'/'.$item['breed_slug'];?>" 
                                              title="<?php echo $item['breed_group'];?>">
                                <?php echo $item['breed_group'];?></a>
                            </p>
                            <?php
                            break;
                        case '_char';
                            ?>
                            <p class="cat"><a href="<?php echo base_url().'category/characteristics/'.$item['char_slug'];?>" 
                                              title="<?php echo $item['char_type'];?>">
                                <?php echo $item['char_type'];?></a>
                            </p>
                            <?php
                            break;
                        case '_color';
                            ?>
                            <p class="cat"><a href="<?php echo base_url().'category/'.$cat['dbslug'].'/'.$item['color_slug'];?>" 
                                              title="<?php echo $item['color_type'];?>">
                                <?php echo $item['color_type'];?></a>
                            </p>
                            <?php
                            break;
                        case '_latest';
                            break;
                    endswitch;                    
                    ?>                    
                    
                </div>       
                    <?php
             if($i==4 || $i==8){
                    ?>
                </div><!--end row-->
            <?php      
             }//end 
             
             $i++;    
             }//end foreach
             
             //MANUAL DIV CLOSE
             if($i<8 && $i!=5){
                 
                 //echo 'manual div close '.$i;
                 echo '</div>';
             }
             
        }//end foreach             
        
        ?>
                        
    </div>
    <div class="col-lg-2">
        <?php
       //print_r($_tax_size);
        $this->load->view('inc/sidebar');
        ?>
    </div>
</div>