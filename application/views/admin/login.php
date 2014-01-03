<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading"><i class="icon-signin"></i> Admin Login </div>
            <div class="panel-body">
                <form id="admin_signin" class="form-horizontal" role="form" method="post"
                      action="<?php echo base_url().'admin/login_validation'?>">
                    <div class="form-group">
                      <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
                      <div class="col-lg-10">
                        <input type="email" class="form-control" id="txtuseremail" name="txtuseremail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword1" class="col-lg-2 control-label">Password</label>
                      <div class="col-lg-10">
                        <input type="password" class="form-control" id="txtuserpassword" name="txtuserpassword" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-default">Sign in</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div><!--end panel-->
    </div><!--end span-->
</div><!--end row-->