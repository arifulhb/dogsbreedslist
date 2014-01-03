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
      <h2 id="header_title"><a class="navbar-brand" href="<?php echo base_url();?>">Home</a></h2>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">

      <li class=""><a href="<?php echo base_url().'category/popular/'; ?>" title="Top Breeds"> 
              <img src="<?php echo base_url().'assets/images/dog1_16.png'?>"> Most Popular Breeds</a></li>
      <?php /*<li><a href="#">Link</a></li>
       */?>

      <li class="dropdown">          
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url().'assets/images/dog1_16.png'?>"> Size <b class="caret"></b></a>
        <ul class="dropdown-menu">
         <?php
         foreach($_size as $item):
             ?>
          <li><a href="<?php echo base_url().'category/size/'.$item['slug'] ; ?>">
                  <img src="<?php echo base_url().'assets/images/dog2_16.png'?>"> <?php echo $item['name_sidebar'];?></a></li>
                 <?php
         endforeach;
         ?>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url().'assets/images/dog1_16.png'?>"> Breed Group<b class="caret"></b></a>
        <ul class="dropdown-menu">
         <?php
         foreach($_breed as $item):
             ?>
          <li><a href="<?php echo base_url().'category/breed-group/'.$item['slug'] ; ?>">
                  <img src="<?php echo base_url().'assets/images/dog2_16.png'?>"> <?php echo $item['name_sidebar'];?></a></li>
                 <?php
         endforeach;
         ?>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url().'assets/images/dog1_16.png'?>"> Characteristics <b class="caret"></b></a>
        <ul class="dropdown-menu">
         <?php
         foreach($_char as $item):
             ?>
          <li><a href="<?php echo base_url().'category/characteristics/'.$item['slug'] ; ?>">
                  <img src="<?php echo base_url().'assets/images/dog2_16.png'?>"> <?php echo $item['name_sidebar'];?></a></li>
                 <?php
         endforeach;
         ?>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo base_url().'assets/images/dog1_16.png'?>"> Color <b class="caret"></b></a>
        <ul class="dropdown-menu">
         <?php
         foreach($_color as $item):
             ?>
          <li><a href="<?php echo base_url().'category/color/'.$item['slug'] ; ?>">
                  <img src="<?php echo base_url().'assets/images/dog2_16.png'?>"> <?php echo $item['name_sidebar'];?></a></li>
                 <?php
         endforeach;
         ?>
        </ul>
      </li>
    </ul>
      
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo base_url().'category/all/'; ?>">All Breeds</a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>