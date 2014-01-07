<form id="add_new_dog" class="form-horizontal" role="form" method="post"
    enctype="multipart/form-data" 
    action="<?php echo base_url();?>admin/addNewItemVerification">
    
    <?php
    if(isset($_dog_info)){
        
        $action='update';
        $item=$_dog_info;
        //print_r($item);
        //echo 'size sn: '.$item['size_sn'].'<br>';
        //echo '</pre>';
        ?>
        <input type="hidden" name="action" value="update" />
        <input type="hidden" name="item_sn" value="<?php echo $item['item_sn'];?>" />
        <?php
        if(isset($_GET['status'])){            
        ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-info fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Congratulations!</strong> Data updated successfully!
                  </div>
            </div>
                
        </div>
                       
        <?php
        }//end isset status
    }else{
        $item=array(
            'item_info_name'=>'','item_slug'=>'','item_info_other_name'=>'','item_seo_title'=>'',
            'item_info_origin'=>'','item_info_life_span'=>'','item_info_temperment'=>'',
            'item_info_height'=>'','item_info_weight'=>'','item_info_color'=>'',
            'item_info_puppy_price'=>'','item_info_hypoallergenic'=>'','item_overview_small'=>'',
            'item_overview'=>'','item_body_type'=>'','item_coat'=>'',
            'item_color'=>'','item_temparment'=>'','item_tasty_tidbits'=>'',
            'item_grooming'=>'','item_history'=>'',
            'item_more'=>'',
            'size_sn'=>'','breed_sn'=>'','char_sn'=>'','color_sn'=>'',
            'item_char_1_text'=>'','item_char_1_value'=>'0',
            'item_char_2_text'=>'','item_char_2_value'=>'0',
            'item_char_3_text'=>'','item_char_3_value'=>'0',
            'item_char_4_text'=>'','item_char_4_value'=>'0',
            'item_char_5_text'=>'','item_char_5_value'=>'0',
            'item_char_6_text'=>'','item_char_6_value'=>'0',
            'item_char_7_text'=>'','item_char_7_value'=>'0',
            'item_char_8_text'=>'','item_char_8_value'=>'0',
            'item_char_9_text'=>'','item_char_9_value'=>'0',
            'item_char_10_text'=>'','item_char_10_value'=>'0',
            'item_name_m_1'=>'','item_name_f_1'=>'',            
            'item_name_m_2'=>'','item_name_f_2'=>'',
            'item_name_m_3'=>'','item_name_f_3'=>'',
            'item_name_m_4'=>'','item_name_f_4'=>'',
            'item_name_m_5'=>'','item_name_f_5'=>'',
            'item_name_m_6'=>'','item_name_f_6'=>'',
            'item_name_m_7'=>'','item_name_f_7'=>'',
            'item_name_m_8'=>'','item_name_f_8'=>'',
            'item_name_m_9'=>'','item_name_f_9'=>'',
            'item_name_m_10'=>'','item_name_f_10'=>'',
            'photo1'=>'','photo1'=>'',
            'photo2'=>'','photo2'=>'',
            'photo3'=>'','photo3'=>'');
    }//end if
    
    ?>
    <div class="row">
        <div class="col-xs-6">
            <h2 class="page-title"><?php echo isset($action)?'Update ':'Add New';?> Dog Information</h2>
        </div>
        <div class="col-xs-6">
            <button type="submit" class="pull-right btn btn-large btn-primary"><i class="icon-save"></i> Save</button>
        </div>
    </div>
<div class="row">
    <div class="col-xs-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Basic Info</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="txtName" class="col-lg-3 control-label">Name</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control input-sm" name="txtName"
                                 id="txtName" placeholder="Name" value="<?php echo $item['item_info_name'];?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txt_item_slug" class="col-lg-3 control-label">Slug</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control input-sm" name="txt_item_slug"
                                 id="txt_item_slug" placeholder="slug" value="<?php echo $item['item_slug'];?>" required>
                        </div>
                    </div>
              <div class="form-group">
                <label for="txtOtherName" class="col-lg-3 control-label">Other Name</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control input-sm" id="txtOtherName" name="txtOtherName"
                         placeholder="Other Name" required value="<?php echo $item['item_info_other_name'];?>">
                </div>
              </div>
              <div class="form-group">
                <label for="txtSeoTitle" class="col-lg-3 control-label">SEO Title</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control input-sm" id="txtSeoTitle" name="txtSeoTitle"
                         placeholder="SEO Title" required value="<?php echo $item['item_seo_title'];?>">
                </div>
              </div>                    
              <div class="form-group">
                <label for="txtorigin" class="col-lg-3 control-label">Origin</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control input-sm" id="txtorigin"
                         name="txtorigin" placeholder="Origin"  value="<?php echo $item['item_info_origin'];?>" required>
                </div>
              </div>
             <div class="form-group">
                <label for="cat_size" class="col-lg-3 control-label">Size</label>
                <div class="col-lg-9">
                    <?php
                //print_r($_tax_size);
                    ?>
                  <select class="form-control input-sm" id="cat_size"
                         name="cat_size" >
                      <?php
                      foreach($_tax_size as $_item): ?>
                      <option <?php echo $item['size_sn']==$_item['sn']?'selected="SELECTED"':''; ?> 
                          value="<?php echo $_item['sn'];?>"><?php echo $_item['name'];?></option>
                          <?php
                      endforeach;
                      ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="cat_breed" class="col-lg-3 control-label">Breed Group</label>
                <div class="col-lg-9">
                  <select class="form-control input-sm" id="cat_breed" name="cat_breed" >
                      <?php
                      foreach($_tax_breed as $_item): ?>
                      <option <?php echo $item['breed_sn']==$_item['sn']?'selected="SELECTED"':''; ?>
                          value="<?php echo $_item['sn'];?>"><?php echo $_item['name'];?></option>
                          <?php
                      endforeach;
                      ?>
                  </select>
                </div>
              </div>
             <div class="form-group">
                <label for="cat_char" class="col-lg-3 control-label">Characteristics Type</label>
                <div class="col-lg-9">
                  <select class="form-control input-sm" id="cat_char" name="cat_char">
                      <?php
                      foreach($_tax_char as $_item): ?>
                      <option <?php echo $item['char_sn']==$_item['sn']?'selected="SELECTED"':''; ?>
                          value="<?php echo $_item['sn'];?>"><?php echo $_item['name'];?></option>
                          <?php
                      endforeach;
                      ?>
                  </select>
                </div>
              </div>              
             <div class="form-group">
                <label for="cat_color" class="col-lg-3 control-label">Color</label>
                <div class="col-lg-9">
                  <select class="form-control input-sm" id="cat_color"
                         name="cat_color" >
                      <?php
                      foreach($_tax_color as $_item): ?>
                      <option <?php echo $item['color_sn']==$_item['sn']?'selected="SELECTED"':''; ?>
                          value="<?php echo $_item['sn'];?>"><?php echo $_item['name'];?></option>
                          <?php
                      endforeach;
                      ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword1" class="col-lg-3 control-label">Life Span</label>
                <div class="col-lg-9">                    
                  <input type="text" class="form-control input-sm" id="txtlife_span"
                         name="txtlife_span" placeholder="Life Span" value="<?php echo $item['item_info_life_span'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="txtTemperament" class="col-lg-3 control-label">Temperament</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control input-sm" id="txtTemperament"
                         name="txtTemperament" placeholder="Temperament" value="<?php echo $item['item_info_temperment'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="txtheight" class="col-lg-3 control-label">Height</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control input-sm" id="txtheight"
                         name="txtheight" placeholder="Height" value="<?php echo $item['item_info_height'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="txtweight" class="col-lg-3 control-label">Weight</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control input-sm" id="txtweight"
                         name="txtweight" placeholder="Weight" value="<?php echo $item['item_info_weight'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="txtcolor" class="col-lg-3 control-label">Color</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control input-sm" id="txtcolor"
                         name="txtcolor" placeholder="Color" value="<?php echo $item['item_info_color'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="txtpuppy_price" class="col-lg-3 control-label">Puppy Price</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control input-sm" id="txtpuppy_price"
                         name="txtpuppy_price" placeholder="Puppy Price"  value="<?php echo $item['item_info_puppy_price'];?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="txthypoallergenic" class="col-lg-3 control-label">Hypoallergenic</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control input-sm" id="txthypoallergenic"
                         name="txthypoallergenic" placeholder="Hypoallergenic" value="<?php echo $item['item_info_hypoallergenic'];?>" required>
                </div>
              </div>
               <div class="form-group">
                    <label for="txtchr_8_text" class="col-lg-3 control-label">Brief</label>
                    <div class="col-lg-9">
                        <textarea class="form-control input-sm " id="txt_brieft" rows="3"
                             name="txt_brieft" placeholder="Brief to show in List"><?php echo $item['item_overview_small'];?></textarea>
                    </div>
                </div>
             </div><!--panel body-->
        </div><!--primary panel-->
        <?php /*
        <div class="panel panel-primary">
            <div class="panel-heading">Common Names</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Boy Dogs Name</th>
                                <th>Girl Dogs Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>
                                    <input type="text" class="form-control input-sm col-xs-1" id="txt_name_m_1" size="10"
                                    name="txt_name_m_1" placeholder="Boy Dogs Name" value="<?php echo $item['item_name_m_1'];?>">

                                </td>
                                <td>
                                      <input type="text" class="form-control input-sm col-xs-1" id="txt_name_f_1"
                                             name="txt_name_f_1" placeholder="Girl Dogs Name"  value="<?php echo $item['item_name_f_1'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>
                                    <input type="text" class="form-control input-sm col-xs-1" id="txt_name_m_2" size="10"
                                    name="txt_name_m_2" placeholder="Boy Dogs Name"  value="<?php echo $item['item_name_m_2'];?>">

                                </td>
                                <td>
                                      <input type="text" class="form-control input-sm col-xs-1" id="txt_name_f_2"
                                             name="txt_name_f_2" placeholder="Girl Dogs Name"  value="<?php echo $item['item_name_f_2'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>
                                    <input type="text" class="form-control input-sm col-xs-1" id="txt_name_m_3" size="10"
                                    name="txt_name_m_3" placeholder="Boy Dogs Name"  value="<?php echo $item['item_name_m_3'];?>">

                                </td>
                                <td>
                                      <input type="text" class="form-control input-sm col-xs-1" id="txt_name_f_3"
                                             name="txt_name_f_3" placeholder="Girl Dogs Name"  value="<?php echo $item['item_name_f_3'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>
                                    <input type="text" class="form-control input-sm col-xs-1" id="txt_name_m_4" size="10"
                                    name="txt_name_m_4" placeholder="Boy Dogs Name"  value="<?php echo $item['item_name_m_4'];?>">

                                </td>
                                <td>
                                      <input type="text" class="form-control input-sm col-xs-1" id="txt_name_f_4"
                                             name="txt_name_f_4" placeholder="Girl Dogs Name"  value="<?php echo $item['item_name_f_4'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>
                                    <input type="text" class="form-control input-sm col-xs-1" id="txt_name_m_5" size="10"
                                    name="txt_name_m_5" placeholder="Boy Dogs Name"  value="<?php echo $item['item_name_m_5'];?>">

                                </td>
                                <td>
                                      <input type="text" class="form-control input-sm col-xs-1" id="txt_name_f_5"
                                             name="txt_name_f_5" placeholder="Girl Dogs Name"  value="<?php echo $item['item_name_f_5'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td>6.</td>
                                <td>
                                    <input type="text" class="form-control input-sm col-xs-1" id="txt_name_m_6" size="10"
                                    name="txt_name_m_6" placeholder="Boy Dogs Name"  value="<?php echo $item['item_name_m_6'];?>">

                                </td>
                                <td>
                                      <input type="text" class="form-control input-sm col-xs-1" id="txt_name_f_6"
                                             name="txt_name_f_6" placeholder="Girl Dogs Name"  value="<?php echo $item['item_name_f_6'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td>7.</td>
                                <td>
                                    <input type="text" class="form-control input-sm col-xs-1" id="txt_name_m_7" size="10"
                                    name="txt_name_m_7" placeholder="Boy Dogs Name"  value="<?php echo $item['item_name_m_7'];?>">

                                </td>
                                <td>
                                      <input type="text" class="form-control input-sm col-xs-1" id="txt_name_f_7"
                                             name="txt_name_f_7" placeholder="Girl Dogs Name"  value="<?php echo $item['item_name_f_7'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td>8.</td>
                                <td>
                                    <input type="text" class="form-control input-sm col-xs-1" id="txt_name_m_8" size="10"
                                    name="txt_name_m_8" placeholder="Boy Dogs Name"  value="<?php echo $item['item_name_m_8'];?>">

                                </td>
                                <td>
                                      <input type="text" class="form-control input-sm col-xs-1" id="txt_name_f_8"
                                             name="txt_name_f_8" placeholder="Girl Dogs Name"  value="<?php echo $item['item_name_f_8'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td>9.</td>
                                <td>
                                    <input type="text" class="form-control input-sm col-xs-1" id="txt_name_m_9" size="10"
                                    name="txt_name_m_9" placeholder="Boy Dogs Name"  value="<?php echo $item['item_name_m_9'];?>">

                                </td>
                                <td>
                                      <input type="text" class="form-control input-sm col-xs-1" id="txt_name_f_9"
                                             name="txt_name_f_9" placeholder="Girl Dogs Name" value="<?php echo $item['item_name_f_9'];?>">
                                </td>
                            </tr>
                            <tr>
                                <td>10.</td>
                                <td>
                                    <input type="text" class="form-control input-sm col-xs-1" id="txt_name_m_10" size="10"
                                    name="txt_name_m_1" placeholder="Boy Dogs Name"  value="<?php echo $item['item_name_m_10'];?>">
                                </td>
                                <td>
                                      <input type="text" class="form-control input-sm col-xs-1" id="txt_name_f_10"
                                             name="txt_name_f_10" placeholder="Girl Dogs Name" value="<?php echo $item['item_name_f_10'];?>">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
        */?>
    </div>
        <div class="col-xs-6">

            <div class="panel panel-primary">
                <div class="panel-heading">Photos</div>
                <div class="panel-body admin-upload-photo">
                    <div class="form-group">
                    <label for="" class="col-lg-3 control-label">Image for List <small>Dimension: Min 170w x 128h</small></label><br>                    
                    <div class="col-lg-6">                           
                        <?php
                        if($item['photo1']!=''){                            
                            ?>
                             <img class="img-rounded img-thumbnail" src="<?php echo base_url().'store/images/'.$item['photo1'];?>" />   
                             <?php
                        }//end if
                        echo form_hidden('photo1',$item['photo1']);
                        echo form_upload(array('name' => 'photo1', 'id' => 'photo1'));
                        ?>                                                
                    </div>
                    <div class="col-lg-3">
                        <label class="">Upload <input type="checkbox" name="upload_1"/></label>
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="" class="col-lg-3 control-label">Profile Photo 1 <small>Dimension: Min 295w x 343h</small></label>
                    <div class="col-lg-6">                        
                        <?php
                        if($item['photo2']!=''){
                            ?>
                             <img class="img-rounded img-thumbnail" src="<?php echo base_url().'store/images/'.$item['photo2'];?>" />   
                             <?php
                        }//end if
                        echo form_hidden('photo2',$item['photo2']);
                        echo form_upload(array('name' => 'photo2', 'id' => 'photo2'));
                        ?>                        
                    </div>
                    <div class="col-lg-3">
                        <label class="">Upload <input type="checkbox" name="upload_2"/></label>
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="" class="col-lg-3 control-label">Profile Photo 2 <small>Dimension: Min 360w x 275h</small></label>
                    <div class="col-lg-6">                        
                        <?php
                        if($item['photo3']!=''){
                            ?>
                             <img class="img-rounded img-thumbnail" src="<?php echo base_url().'store/images/'.$item['photo3'];?>" />   
                             <?php
                        }//end if
                        echo form_hidden('photo3',$item['photo3']);
                        echo form_upload(array('name' => 'photo3', 'id' => 'photo3'));
                        ?>                        
                    </div>
                    <div class="col-lg-3">
                        <label class="">Upload <input type="checkbox" name="upload_3"/></label>
                    </div>
                  </div>
                </div><!--end body-->
            </div><!--end panel photos-->
            
            
            <div class="panel panel-primary">
             <div class="panel-heading">Characteristics</div>
            <div class="panel-body">

                <div class="form-group">
                    <label for="txtchr_1_text" class="col-lg-3 control-label">Good with Kids</label>
                    <div class="col-lg-9">
                      <div id="r_dog_char_1" class="r_dog_char" data-score="<?php echo $item['item_char_1_value'];?>"></div>
                      <input type="hidden" id="r_dog_char_1_val" name="r_dog_char_1_val" value="<?php echo $item['item_char_1_value'];?>">
                      <input type="text" class="form-control input-sm dog_rate_details" id="txtchr_1_text"
                             name="txtchr_1_text" placeholder="Good with Kids" value="<?php echo $item['item_char_1_text'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="txtchr_2_text" class="col-lg-3 control-label">Cat Friendly</label>
                    <div class="col-lg-9">
                      <div id="r_dog_char_2" class="r_dog_char" data-score="<?php echo $item['item_char_2_value'];?>"></div>
                      <input type="hidden" id="r_dog_char_2_val" name="r_dog_char_2_val" value="<?php echo $item['item_char_2_value'];?>">
                      <input type="text" class="form-control input-sm dog_rate_details" id="txtchr_2_text" 
                             name="txtchr_2_text" placeholder="Cat Friendly"  value="<?php echo $item['item_char_2_text'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtchr_3_text" class="col-lg-3 control-label">Dog Friendly</label>
                    <div class="col-lg-9">
                      <div id="r_dog_char_3" class="r_dog_char" data-score="<?php echo $item['item_char_3_value'];?>"></div>
                      <input type="hidden" id="r_dog_char_3_val" name="r_dog_char_3_val" value="<?php echo $item['item_char_3_value'];?>">
                      <input type="text" class="form-control input-sm dog_rate_details" id="txtchr_3_text" 
                             name="txtchr_3_text" placeholder="Dog Friendly"  value="<?php echo $item['item_char_3_text'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtchr_4_text" class="col-lg-3 control-label">Trainability</label>
                    <div class="col-lg-9">
                        <div id="r_dog_char_4" class="r_dog_char" data-score="<?php echo $item['item_char_4_value'];?>"></div>
                        <input type="hidden" id="r_dog_char_4_val" name="r_dog_char_4_val" value="<?php echo $item['item_char_4_value'];?>">
                      <input type="text" class="form-control input-sm dog_rate_details" id="txtchr_4_text" 
                             name="txtchr_4_text" placeholder="Trainability"  value="<?php echo $item['item_char_4_text'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtchr_5_text" class="col-lg-3 control-label">Shedding</label>
                    <div class="col-lg-9">
                        <div id="r_dog_char_5" class="r_dog_char" data-score="<?php echo $item['item_char_5_value'];?>"></div>
                        <input type="hidden" id="r_dog_char_5_val" name="r_dog_char_5_val" value="<?php echo $item['item_char_5_value'];?>">
                      <input type="text" class="form-control input-sm dog_rate_details" id="txtchr_5_text" 
                             name="txtchr_5_text" placeholder="Shedding"  value="<?php echo $item['item_char_5_text'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtchr_6_text" class="col-lg-3 control-label">Watchdog</label>
                    <div class="col-lg-9">
                      <div id="r_dog_char_6" class="r_dog_char" data-score="<?php echo $item['item_char_6_value'];?>"></div>
                      <input type="hidden" id="r_dog_char_6_val" name="r_dog_char_6_val" value="<?php echo $item['item_char_6_value'];?>">
                      <input type="text" class="form-control input-sm dog_rate_details" id="txtchr_6_text" 
                             name="txtchr_6_text" placeholder="Watchdog"  value="<?php echo $item['item_char_6_text'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtchr_7_text" class="col-lg-3 control-label">Intelligence</label>
                    <div class="col-lg-9">
                      <div id="r_dog_char_7" class="r_dog_char" data-score="<?php echo $item['item_char_7_value'];?>"></div>
                      <input type="hidden" id="r_dog_char_7_val" name="r_dog_char_7_val" value="<?php echo $item['item_char_7_value'];?>">
                      <input type="text" class="form-control input-sm dog_rate_details" id="txtchr_7_text" 
                             name="txtchr_7_text" placeholder="Intelligence"  value="<?php echo $item['item_char_7_text'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtchr_8_text" class="col-lg-3 control-label">Grooming</label>
                    <div class="col-lg-9">
                      <div id="r_dog_char_8" class="r_dog_char" data-score="<?php echo $item['item_char_8_value'];?>"></div>
                      <input type="hidden" id="r_dog_char_8_val" name="r_dog_char_8_val" value="<?php echo $item['item_char_8_value'];?>">
                      <input type="text" class="form-control input-sm dog_rate_details" id="txtchr_8_text" 
                             name="txtchr_8_text" placeholder="Grooming"  value="<?php echo $item['item_char_8_text'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtchr_9_text" class="col-lg-3 control-label">Popularity</label>
                    <div class="col-lg-9">
                        <div id="r_dog_char_9" class="r_dog_char" data-score="<?php echo $item['item_char_9_value'];?>"></div>
                        <input type="hidden" id="r_dog_char_9_val" name="r_dog_char_9_val" value="<?php echo $item['item_char_9_value'];?>">
                      <input type="text" class="form-control input-sm dog_rate_details" id="txtchr_9_text" 
                             name="txtchr_9_text" placeholder="Popularity"  value="<?php echo $item['item_char_9_text'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtchr_10_text" class="col-lg-3 control-label">Adaptability</label>
                    <div class="col-lg-9">
                      <div id="r_dog_char_10" class="r_dog_char" data-score="<?php echo $item['item_char_10_value'];?>"></div>
                      <input type="hidden" id="r_dog_char_10_val" name="r_dog_char_10_val" value="<?php echo $item['item_char_10_value'];?>">
                      <input type="text" class="form-control input-sm dog_rate_details" id="txtchr_10_text" 
                             name="txtchr_10_text" placeholder="Adaptability"  value="<?php echo $item['item_char_10_text'];?>">
                    </div>
                </div>

            </div><!--end panel body-->
            </div><!--end panel-->                

        </div><!--end body-->

</div>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Details</div>
                <div class="panel-body">
                    <div class="col-sm-6">
                        <div class="form-group">
                            
                            <div class="col-lg-12">
                                <label for="txt_overview" class="control-label">Overview</label>
                                <textarea class="form-control input-sm" id="txt_overview" rows="4"
                                     name="txt_overview" placeholder="Overview"><?php echo $item['item_overview'];?></textarea>
                            </div>
                        </div>
                  <div class="form-group">                    
                    <div class="col-lg-12">
                        <label for="txt_body_type" class="control-label">Body Type</label>
                        <textarea class="form-control input-sm" id="txt_body_type" name="txt_body_type"
                              rows="4" placeholder="Body Type"><?php echo $item['item_body_type'];?></textarea>
                    </div>
                  </div>
                  <div class="form-group">                    
                    <div class="col-lg-12">
                        <label for="txt_coat" class="control-label">Coat</label>
                        <textarea class="form-control input-sm" id="txt_coat" name="txt_coat"
                              rows="4" placeholder="Coat"><?php echo $item['item_coat'];?></textarea>
                    </div>
                  </div>
                  <div class="form-group">                    
                    <div class="col-lg-12">
                        <label for="txt_color" class="control-label">Color</label>
                        <textarea class="form-control input-sm" id="txt_color" name="txt_color"
                              rows="4" placeholder="Color"><?php echo $item['item_color'];?></textarea>
                    </div>
                  </div>
                  <div class="form-group">                    
                    <div class="col-lg-12">
                        <label for="txt_temperament" class="control-label">Temperament</label>
                        <textarea class="form-control input-sm" id="txt_temperament" name="txt_temperament"
                              rows="4" placeholder="Temperament"><?php echo $item['item_temparment'];?></textarea>
                    </div>
                  </div>
                    </div><!--end 6-->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="txt_tasty_tidbits" 
                                   class="control-label">Interesting <?php echo ($item['item_info_name']!=''?$item['item_info_name']:'[Dog Breed]');?> Facts</label>
                            <div class="col-lg-12">
                                <textarea class="form-control input-sm" id="txt_tasty_tidbits" name="txt_tasty_tidbits"
                                      rows="4" placeholder="Tasty Tidbits"><?php echo $item['item_tasty_tidbits'];?></textarea>
                            </div>
                        </div>
                    
                    
                 <div class="form-group">                    
                    <div class="col-lg-12">
                        <label for="txt_grooming" class="control-label">Grooming</label>
                        <textarea class="form-control input-sm" id="txt_grooming" name="txt_grooming"
                              rows="4" placeholder="Grooming"><?php echo $item['item_grooming'];?></textarea>
                    </div>
                  </div>
                 <div class="form-group">                    
                    <div class="col-lg-12">
                        <label for="txt_history" class="control-label">History</label>
                        <textarea class="form-control input-sm" id="txt_history" name="txt_history"
                              rows="4" placeholder="History"><?php echo $item['item_history'];?></textarea>
                    </div>
                  </div>                    
                    
                  <div class="form-group">                    
                    <div class="col-lg-12">
                        <label for="txt_more" class="control-label">More</label>
                        <textarea class="form-control input-sm" id="txt_more" name="txt_more"
                              rows="4" placeholder="More"><?php echo $item['item_more'];?></textarea>
                    </div>
                  </div>
                    </div><!--ebd 6-->                          

                </div><!--end panel body-->
            </div><!--end details panel-->    
</div>
</div><!--end row-->    
        
<div class="row">
    <div class="col-xs-12">
        <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Save</button>
    </div>
</div>
</form>

<!--upload photo-->
<?php


?>
<script>require(['page/dog_entry']);</script>