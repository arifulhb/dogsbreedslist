<?php
    //echo 'tax size in nav<pre>';
    //print_r($_size);
    //echo '</pre>'
?>
<nav class="container navbar navbar-default" role="navigation">
<!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
      <h1 id="header_title"><a class="navbar-brand" href="<?php echo base_url().'admin';?>">DogBreedsList Admin</a></h1>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
        
        <li class=""><a href="<?php echo base_url().'admin/addNewDog';?>"><i class="icon-file-alt"></i> Add New Dog</a></li>        
        <li class=""><a href="<?php echo base_url().'admin/update_category';?>"><i class="icon-th"></i> Update Category</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-sort-by-order"></i> Ranking<b class="caret"></b></a>           
            <ul class="dropdown-menu">            
                <li><a href="<?php echo base_url().'admin/ranking';?>"> Top Breed Ranking</a></li>
                <li><a href="<?php echo base_url().'admin/ranking_category';?>"> Category Ranking</a></li>
            </ul>
         </li>        
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?php echo $this->session->userdata('user_name');?><b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="<?php echo base_url().'admin/user'?>"><i class="icon-user"></i> User Management</a></li>
            <li><hr></li>
            <li><a href="<?php echo base_url().'user/changepassword'?>"><i class="icon-pencil"></i> Change Password</a></li>
            <li><hr></li>
            <li><a href="<?php echo base_url().'admin/logout'?>"><i class="icon-signout"></i> Log Out</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>