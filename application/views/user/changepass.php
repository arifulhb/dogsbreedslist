<div class="row">
    <div class="col-sm-6">
        <div id="error_message">
            <?php
            if(isset($_operation)){
                if($_operation=='success'){?>
                <div class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Congratulations!</strong> Password Updated.
              </div>
                    <?php                    
                }else{ ?>
                
                    <div class="alert alert-warning fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <strong>Sorry!</strong> <?php echo $_message;?>
                  </div>
                    <?php
                }//else
                
            }//end if set         
            ?>
        </div>
    </div>
    <div class="col-sm-6">
        
            <div class="panel panel-warning">
                <div class="panel-heading"><i class="icon-key"></i> Change Password</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST"
                          action="<?php echo base_url().'user/updatepass';?>">
                    
                    <div class="form-group">
                        <label for="txtnewpass" class="control-label col-sm-4">New Password</label>        
                        <div class="col-sm-8">
                            <input type="password" id="txtnewpass" name="txtnewpass" class="form-control" 
                                   placeholder="New Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtrepass" class="control-label col-sm-4">Re Password</label>        
                        <div class="col-sm-8">
                            <input type="password" id="txtrepass" name="txtrepass" class="form-control" 
                                   placeholder="Re Password" maxlength="50" required>
                        </div>
                    </div>                              
                   <div class="form-group">
                        <label for="" class="control-label col-sm-4"></label>        
                        <div class="col-sm-8">
                            <button type="submit" id="" class="btn btn-success"><i class="icon-pencil"></i> Change</button>
                        </div>
                    </div>            
                    </form>
                </div>
            </div>
                        
    </div>
</div>