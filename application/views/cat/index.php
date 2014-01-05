<?php
$image_path=  getImagePath();
?>
<div class="row">    
    <div class="col-lg-2 hidden-xs hidden-sm hidden-print">
        
        <h2 class="sec_title">Top Breeds</h2>
        <ul id="top30_list" class="sidebar-list list-unstyled">
            
        
<?php
//$image_path=  getImagePath();

foreach ($_top30 as $item) {
    ?>                            
            <li>
            <a href="<?php echo base_url() . 'dog/details/' . $item['slug']; ?>" title="<?php echo $item['dogName']; ?>">            
                <?php echo $item['dogName']; ?>
            </a>    
            </li>
    <?php
}//end foreach
?>
            </ul>
         <?php                         
        //$this->load->view('inc/top10');
        ?>
    </div> 
    <div class="col-lg-8 dog_cat_list">
        <?php
        //echo $_page_url;
        //print_r($_list);
        ?>
        <h1 class="info_name"><?php echo $_header_title;?></h1>
        <ul id="social_button">
            <li><div class="fb-like" data-href="<?php echo $_page_url;?>" 
                     data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></li>
            <li><a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </li>
            <li><a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="red">
                    <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a>
            </li>
        </ul>
        <div class="blurb">
        <?php
        if(isset($_blurb)){
            echo $_blurb;              
        }  
        ?>
        </div>
        <div class="ad72890">
            AD 728X90
        </div>
        <table class="table table-hover table-responsive table-bordered dog_list">
            <thead>
                <tr>
                    <th class="image">Image</th>
                    <th class="breed">Breed</th>
                    <th class="breed_group">Breed Group</th>
                    <th class="size">Size</th>
                    <th class="color">Color</th>                    
                    <th class="overview">Overview</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($_list as $row): ?>
                <tr>
                    <td><a href="<?php echo base_url().'dog/details/'.$row['slug']; ?>" 
                           title="<?php echo $row['dog_name']; ?>">
                        <img src="<?php echo $image_path.$row['photo1'];?>" 
                             class="img-thumbnail img-responsive dog-photo1"
                             alt="<?php echo $row['dog_name']; ?>"/></a>
                    </td>
                    <td><a href="<?php echo base_url().'dog/details/'.$row['slug']; ?>" 
                           title="<?php echo $row['dog_name']; ?>">
                        <?php echo $row['dog_name']; ?></a></td>
                    <td><a href="<?php echo base_url().'category/breed-group/'.$row['breed_slug']; ?>" title="<?php echo $row['breed_name']; ?>"><?php echo $row['breed_name']; ?></a></td>
                    
                    <td><?php if($this->uri->segment(2)!='size'){?>
                        <a href="<?php echo base_url().'category/size/'.$row['size_slug']; ?>" title="<?php echo $row['size_name']; ?>"><?php echo $row['size_name']; ?></a>
                    <?php }//end if
                        else{
                            echo 'Height: <small>'.$row['height'].'</small><br>';
                            echo 'Weight: <small>'.$row['weight'].'</small>';
                        }//end else
                    ?>
                    </td>
                    
                    <td><a href="<?php echo base_url().'category/color/'.$row['color_slug']; ?>" title="<?php echo $row['color']; ?>"><?php echo $row['color']; ?></a></td>
                    <td><?php echo $row['overview']; ?></td>
                </tr>
                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
        <div class="" style="float: left;text-align: left;width: 100%;">
            <div class="ad336280" style="float: left;">
                AD 1 336x280
            </div>
            <div class="ad336280" style="float: right;">
                AD 2 336x280
            </div>
        </div>
        <div class="desc_bottom">
            <?php 
            if(isset($_desc_bottom)){
                echo $_desc_bottom;            
            }
            ?>
        </div>
        <?php echo $this->pagination->create_links();?>
    </div>
    <div class="col-lg-2">
        <?php
       //print_r($_tax_size);
        $this->load->view('inc/sidebar');
        ?>
    </div>
</div>
<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>