<?php
//echo 'slug: '.$slug;
$image_path=base_url().'store/images/';
$dog_info=$details[0];
?>
<div class="row">
     
    
    <div class="col-lg-2 hidden-xs hidden-sm hidden-md">
        <?php
        $this->load->view('inc/top10');
        ?>
    </div>
    <div class="col-lg-8 dog_details">
        <h2 class="info_name"><?php echo $dog_info['item_info_name'];?> Information</h2>
        <div class="row">
            <div class="col-sm-12">
                <ul id="social_button">
            <li><div class="fb-like" data-href="<?php echo base_url().'dog/details/'.$dog_info['item_slug'];?>" 
                     data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></li>
            <li><a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </li>
            <li><a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark"  data-pin-color="red">
                    <img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_red_20.png" /></a>
            </li>
        </ul>
            </div>
        </div>
        <div class="row overview">
            <?php
            if($dog_info['photo2']!=''){
                ?>
              <div class="col-xs-7 item_details">
                  <h3 class="item_overview_heading">Overview</h3>
                <p><?php echo $dog_info['item_overview'];?></p>    
            </div>
            <div class="col-xs-5">
                <img class="img-rounde img-thumbnail dog-photo2"
                 src="<?php echo $image_path.$dog_info['photo2'];?>"
                 alt="<?php echo $dog_info['item_info_name'];?>"/>    
            </div>      
                    <?php
            }//end if
            else{
                ?>
              <div class="col-xs-12 item_details">
                <p><?php echo $dog_info['item_overview'];?></p>    
                </div>      
                    <?php
            }//end else
            ?>            
        </div>        
        <div class="row ad-panel text-center">
            <div class="ad72890 col-sm-12">
                728x90 ad
            </div>
        </div>
        
        <div class="row details">
            <div class="col-xs-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Basic Info</div>
                    <div class="panel-body panel_dog_details">
                        <table class="table table-hover table-condensed">
                            <tbody>
                                <tr>
                                    <td class="name">Name</td><td><?php echo $dog_info['item_info_name'];?></td>
                                </tr>
                                <tr>
                                    <td class="name">Other Name</td><td><?php echo $dog_info['item_info_other_name'];?></td>
                                </tr>
                                <tr>
                                    <td class="name">Origin</td><td><?php echo $dog_info['item_info_origin'];?></td>
                                </tr>
                                <tr>
                                    <td class="name">Size Type</td>
                                    <td><a href="<?php echo base_url().'category/size/'.$dog_info['size_slug'];?>"
                                           title="<?php echo $dog_info['size_seo_title'];?>"><?php echo $dog_info['size_name'];?></a></td>
                                </tr>
                                <tr>
                                    <td class="name">Breed Group</td>
                                    <td><a href="<?php echo base_url().'category/breed-group/'.$dog_info['breed_slug'];?>"
                                           title="<?php echo $dog_info['breed_seo_title'];?>"><?php echo $dog_info['breed_name'];?></a></td>
                                </tr>
                                <tr>
                                    <td class="name">Life Span</td><td><?php echo $dog_info['item_info_life_span'];?></td>
                                </tr>
                                <tr>
                                    <td class="name">Temperament</td><td><?php echo $dog_info['item_info_temperment'];?></td>
                                </tr>
                                <tr>
                                    <td class="name">Height</td><td><?php echo $dog_info['item_info_height'];?></td>
                                </tr>
                                <tr>
                                    <td class="name">Weight</td><td><?php echo $dog_info['item_info_weight'];?></td>
                                </tr>
                                <tr>
                                    <td class="name">Colors</td><td><?php echo $dog_info['item_info_color'];?></td>
                                </tr>
                                <tr>
                                    <td class="name">Puppy Price</td><td><?php echo $dog_info['item_info_puppy_price'];?></td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                    <br>                    
                </div><!--end panel-->                
                <div class="ad336280">
                        336x280
                    </div>
                <?php
                if($dog_info['photo3']!=''){
                    ?>
                <img class="img-rounde img-thumbnail dog-photo3"
                 src="<?php echo $image_path.$dog_info['photo3'];?>"
                 alt="<?php echo $dog_info['item_info_name'];?>"/>   
                <?php
                }//end if photo3
                ?>
                <h3 class="info_para">Physical description</h3>
                <h4 class="info_para">Body Type</h4>
                <p><?php echo $dog_info['item_body_type'];?></p>
                <h4 class="info_para">Color</h4>
                <p><?php echo $dog_info['item_color'];?></p>
                <h4 class="info_para">Coat</h4>
                <p><?php echo $dog_info['item_coat'];?></p>
                
            </div>
            <div class="col-xs-6">                
                <!--Characteristics-->
                <div class="panel panel-default">
                    <div class="panel-heading">Characteristics</div>
                    <div class="panel-body panel_dog_details">
                        <table class="table table-condensed table-hover">
                            <tbody>
                                <tr>
                                    <td class="name">Good with Kids</td>
                                    <td><div class="dog_char_item" data-score="<?php echo $dog_info['item_char_1_value']; ?>"></div>&nbsp;<?php echo $dog_info['item_char_1_text']; ?></td>
                                </tr>
                                <tr>
                                    <td class="name">Cat Friendly</td>
                                    <td><div class="dog_char_item" data-score="<?php echo $dog_info['item_char_2_value']; ?>"></div>&nbsp;<?php echo $dog_info['item_char_2_text']; ?></td>
                                </tr>
                                <tr>
                                    <td class="name">Dog Friendly</td>
                                    <td><div class="dog_char_item" data-score="<?php echo $dog_info['item_char_3_value']; ?>"></div>&nbsp;<?php echo $dog_info['item_char_3_text']; ?></td>
                                </tr>
                                <tr>
                                    <td class="name">Trainability</td>
                                    <td><div class="dog_char_item" data-score="<?php echo $dog_info['item_char_4_value']; ?>"></div>&nbsp;<?php echo $dog_info['item_char_4_text']; ?></td>
                                </tr>
                                <tr>
                                    <td class="name">Shedding</td>
                                    <td><div class="dog_char_item" data-score="<?php echo $dog_info['item_char_5_value']; ?>"></div>&nbsp;<?php echo $dog_info['item_char_5_text']; ?></td>
                                </tr>
                                <tr>
                                    <td class="name">Watchdog</td>
                                    <td><div class="dog_char_item" data-score="<?php echo $dog_info['item_char_6_value']; ?>"></div>&nbsp;<?php echo $dog_info['item_char_6_text']; ?></td>
                                </tr>
                                <tr>
                                    <td class="name">Intelligence</td>
                                    <td><div class="dog_char_item" data-score="<?php echo $dog_info['item_char_7_value']; ?>"></div>&nbsp;<?php echo $dog_info['item_char_7_text']; ?></td>
                                </tr>
                                <tr>
                                    <td class="name">Grooming</td>
                                    <td><div class="dog_char_item" data-score="<?php echo $dog_info['item_char_8_value']; ?>"></div>&nbsp;<?php echo $dog_info['item_char_8_text']; ?></td>
                                </tr>
                                <tr>
                                    <td class="name">Popularity</td>
                                    <td><div class="dog_char_item" data-score="<?php echo $dog_info['item_char_9_value']; ?>"></div>&nbsp;<?php echo $dog_info['item_char_9_text']; ?></td>
                                </tr>
                                <tr>
                                    <td class="name">Adaptability</td>
                                    <td><div class="dog_char_item" data-score="<?php echo $dog_info['item_char_10_value']; ?>"></div>&nbsp;<?php echo $dog_info['item_char_10_text']; ?></td>
                                </tr>
                                <tr>
                                    <td class="name">Hypoallergenic</td>
                                    <td></div>&nbsp;<?php echo $dog_info['item_info_hypoallergenic']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                                        
                </div><!--end panel-->
                <div class="ad336280">
                        336x280
                 </div>
                <?php /*
                <!--DOG NAME-->
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo $dog_info['item_info_name'];?> Names</div>
                    <div class="panel-body panel_dog_details">
                        <table class="table table-condensed table-striped dogs_name_list table-hover">
                            <thead>
                                <tr>
                                    <th>SN</th>    
                                    <th>Boy dog names</th>
                                    <th>Girl dog names</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                <?php
                                for($i=0;$i++,$i<=10;){
                                    ?>
                                <tr>
                                    <td class="sn"><?php echo $i;?></td>
                                    <td class="boy"><?php echo $dog_info['item_name_m_'.$i];?></td>
                                    <td class="girl"><?php echo $dog_info['item_name_f_'.$i];?></td>
                                </tr>
                                        <?php
                                }//end for
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div><!--end panel names-->        
                */?>
                <h3 class="info_para">Grooming</h3>
                <p><?php echo $dog_info['item_grooming'];?></p>
                <h3 class="info_para">History</h3>
                <p><?php echo $dog_info['item_history'];?></p>
                <h3 class="info_para">Temperament</h3>
                <p><?php echo $dog_info['item_temparment'];?></p>
        </div>
        </div>
    <div class="row">
        <div class="col-xs-12">                                    
            <hr>            
            <h3 class="info_para">Interesting <?php echo $dog_info['item_info_name'];?> Facts</h3>
            <p><?php echo $dog_info['item_tasty_tidbits'];?></p>
        </div>
    </div>  
    </div>
    <div class="col-lg-2">
        <?php       
        $this->load->view('inc/sidebar');
        ?>
    </div>
</div>
<script>require(['page/dog_details']);</script>
<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>