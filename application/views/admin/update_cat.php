<div class="row">
    <div class="col-sm-4">
        <?php
//        $cat=array(
//            array('name'=>'Size','table'=>'tbl_size_type','slug'=>'size'),
//            array('name'=>'Breed Group','table'=>'tbl_breed','slug'=>'breed-group'),
//            array('name'=>'Characteristics','table'=>'tbl_char','slug'=>'characteristics'),
//            array('name'=>'Color','table'=>'tbl_color','slug'=>'color')                        
//        );
        $cat=  getBreedCategory();
        ?>
         <div class="form-group">
        <label for="category">Select a Category</label>        
        <div class="input-group">
        <select id="category" class="form-control">
          <option disabled="DISABLED" SELECTED="SELECTED" >Select a Category</option>
        <?php
        
        foreach($cat as $item){
            ?>
                <option value="<?php echo $item['table'];?>" ><?php echo $item['name'];?></option>
                <?php
        }
        ?>
         </select>    
            <span class="input-group-btn">
            <button class="btn btn-info" id="btn_show_cat_list" disabled="disabled" type="button">Show List</button>
          </span>
        </div>
      </div>  
        <hr>
        <h4 class="text-center">Add New <span id="new_item_name"></span></h4>
        <hr>        
        <form id="new_item_form" class="form-horizontal" style="display: none;">
                    
        <div class="form-group">
            <label for="new_cat_name" class="control-label col-sm-4">Name</label>        
            <div class="col-sm-8">
                <input type="text" id="new_cat_name" class="form-control" placeholder="Category Item Name" required />
            </div>
        </div>
        <div class="form-group">
            <label for="new_cat_name_sidebar" class="control-label col-sm-4">Sidebar Name</label>        
            <div class="col-sm-8">
                <input type="text" id="new_cat_name_sidebar" class="form-control" placeholder="Category Sidebar Name" required />
            </div>
        </div>
        <div class="form-group">
            <label for="new_cat_seo_title" class="control-label col-sm-4">SEO Title</label>        
            <div class="col-sm-8">
                <input type="text" id="new_cat_seo_title" class="form-control" placeholder="Category SEO Title" required />
            </div>
        </div>
        <div class="form-group">
            <label for="new_cat_slug" class="control-label col-sm-4">Slug</label>        
            <div class="col-sm-8">
                <input type="text" id="new_cat_slug" tabindex = "-1" class="form-control" placeholder="Category Slug" required />
            </div>
        </div>
        <div class="form-group">            
            <div class="col-sm-12">                
                <label for="new_cat_slug" class="control-label">Description</label>        
                <textarea id="new_desc" class="form-control" required></textarea>
            </div>
        </div>            
        <div class="form-group">            
            <div class="col-sm-12">
                <label for="new_cat_slug" class="control-label">Description Bottom</label>
                <textarea id="new_desc_bottom" class="form-control" required></textarea>
            </div>
        </div>            
        <div class="form-group">
            <label for="new_cat_order" class="control-label col-sm-4">Order</label>        
            <div class="col-sm-8">
                <input type="number" min="0" id="new_cat_order" class="form-control" required />
            </div>
        </div>            
       <div class="form-group">
            <label for="" class="control-label col-sm-4"></label>        
            <div class="col-sm-8">
                <button type="button" id="btn_add_new" class="btn btn-success"><i class="icon-file"></i> Add</button>
            </div>
        </div>            
        </form>
        <div id="msg">
            
        </div>
    </div><!--col-4-->
    <div class="col-sm-8">
        <h2 id="table_title"></h2>
        <input type="hidden" id="current_table" value="" />
        <table class="table table-bordered table-responsive table-striped table-hover table-condensed">
            <thead>
                <tr id="cat_header">
                    <td id="_ch_order">Order</td>
                    <td id="_ch_name">Name</td>
                    <td id="_ch_sname">Sidebar Name</td>
                    <td id="_ch_seo">SEO Title</td>
                    <td id="_ch_slug">Slug</td>                    
                    <td id="_ch_action">Action</td>
                </tr>
            </thead>
            <tbody id="cat_table_body">
      
            </tbody>
        </table>
        <div id="tbl_msg">
            
        </div>
         <!-- Modal -->
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Update Category Item</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <input type="hidden" id="cat_table" value=""/>
                        <input type="hidden" id="cat_sn" value=""/>
                        <div class="form-group">
                            <label for="cat_name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="cat_name" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat_sidebar_name" class="col-sm-3 control-label">Sidebar Name</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="cat_sidebar_name" placeholder="Sidebar Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat_seo_title" class="col-sm-3 control-label">SEO Title</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="cat_seo_title" placeholder="SEO Title">
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label for="cat_slug" class="col-sm-3 control-label">Slug</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="cat_slug" placeholder="Slug">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cat_slug" class="col-sm-3 control-label">Description [TOP]</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" id="cat_desc" placeholder="Description"></textarea>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label for="cat_slug" class="col-sm-3 control-label">Description [Bottom]</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" id="cat_desc_bottom" placeholder="Description"></textarea>
                            </div>
                        </div>                                                
                        <div class="form-group">
                            <label for="cat_order" class="col-sm-3 control-label">Order</label>
                            <div class="col-sm-9">
                            <input type="number" class="form-control" id="cat_order" placeholder="Order">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" id="save_changes" class="btn btn-primary">Save changes</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
          
          <!--remove model-->
          <div class="modal " id="remove_model" tabindex="-1" role="dialog" 
               aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">Delete Item</h4>
                </div>
                <div class="modal-body">                    
                        <input type="hidden" id="remove_cat_table" value=""/>
                        <input type="hidden" id="remove_cat_sn" value=""/>
                        <input type="hidden" id="remove_cat_name" value=""/>
                        <h4>Are you sure to delete item?</h4>
                        
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" id="delete_item_confirm" class="btn btn-danger"><i class="icon-trash"></i> Delete</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
    </div>
    
</div>
<script>require(['page/admin_cat']);</script>