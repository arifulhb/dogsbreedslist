<div class="row">
    <div class="col-sm-4">
        <div class="panel panel-info">
            <div class="panel-heading"><i class="icon-user"></i> Add user</div>
            <div class="panel-body">
                <form id="new_item_form" class="form-horizontal" style="display: block;">
                    
                    <div class="form-group">
                        <label for="txtusername" class="control-label col-sm-4">User Name</label>        
                        <div class="col-sm-8">
                            <input type="text" id="txtusername" class="form-control" 
                                   placeholder="User Name" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtuseremail" class="control-label col-sm-4">User Email</label>        
                        <div class="col-sm-8">
                            <input type="email" id="txtuseremail" class="form-control" 
                                   placeholder="User Email" maxlength="50" required="">
                        </div>
                    </div>                              
                   <div class="form-group">
                        <label for="" class="control-label col-sm-4"></label>        
                        <div class="col-sm-8">
                            <button type="button" id="btn_add_new" class="btn btn-success"><i class="icon-file"></i> Add User</button>
                        </div>
                    </div>            
                    </form>
                <div id="error_message">                       
                
                </div>                
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="panel panel-info">
            <div class="panel-heading"><i class="icon-list"></i> User List</div>
            <div class="panel-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>User Email</th>
                            <th>User Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="user_table">                        
                        <?php 
                        foreach($user_list as $row):?>
                            
                        <tr id="user<?php echo $row['user_sn'];?>">
                            <td class="email"><?php echo $row['user_email'];?></td>
                            <td class="name"><?php echo $row['user_name'];?></td>
                            <td ><button id="edit<?php echo $row['user_sn'];?>" class="btn btn-primary btn-xs edit" value="<?php echo $row['user_sn'];?>"><i class="icon-pencil"></i> Edit</button>
                            <button id="delete<?php echo $row['user_sn'];?>" class="btn btn-danger btn-xs delete" value="<?php echo $row['user_sn'];?>"><i class="icon-trash"></i> Delete</button></td>
                        </tr>
                            
                            <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
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
                <h4>Are you sure to delete user <strong><span id="user_name"></span></strong> ?</h4>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="delete_item_confirm" class="btn btn-danger"><i class="icon-trash"></i> Delete</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--edit model-->
<div class="modal " id="edit_model" tabindex="-1" role="dialog" 
       aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"><i class="icon-user"></i> Edit user</h4>
        </div>
        <div class="modal-body">                                    
        <input type="hidden" id="edit_user_sn" value=""/>
        <form id="new_item_form_up" class="form-horizontal" style="display: block;">
                    
            <div class="form-group">
                <label for="txtusername_up" class="control-label col-sm-4">User Name</label>        
                <div class="col-sm-8">
                    <input type="text" id="txtusername_up" class="form-control" 
                           placeholder="User Name" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="txtuseremail_up" class="control-label col-sm-4">User Email</label>        
                <div class="col-sm-8">
                    <input type="email" id="txtuseremail_up" class="form-control" 
                           placeholder="User Email" maxlength="50" required="">
                </div>
            </div>                                         
        </form>
               
        <div id="update_msg">
            
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>          
          <button type="button" id="btn_update_user" class="btn btn-success"><i class="icon-save"></i> Update User</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<script>require(['page/user']);</script>