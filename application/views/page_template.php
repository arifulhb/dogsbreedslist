<?php echo doctype('html5'); ?>
<html lang="en">
<head>
     <title><?php
         if(isset($_page_title)){ echo $_page_title.' - '.$_site_title;}
         else{ echo $_site_title;}
         ?></title>
    <?php
        //Meta
        $meta=array(
            array('name' =>'description',   'content' => $_site_description),
            array('name' =>'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv'),
            array('name' =>'author','content'=>$_author),
            array('name'=>'viewport','content'=>'width=device-width, initial-scale=1.0'));

        $_noindex_meta=array('name'=>'robots','content'=>'noindex,follow');
        if(isset($_noindex)){
            array_push($meta,$_noindex_meta);
        }

        echo meta($meta);

        //Bootstrap
        echo link_tag('assets/plugins/bootstrap/css/bootstrap.min.css');
        //Loading Font-Awesome

        echo link_tag('assets/plugins/font-awesome/css/font-awesome.min.css');

         //LinkTag
        echo link_tag('assets/css/style.css');
        
        //Google Font
        $Oswald=array('href'=>'http://fonts.googleapis.com/css?family=Oswald:400,700',
                    'rel' => 'stylesheet',
                    'type' => 'text/css');
        echo link_tag($Oswald);
        
        //Favicon
        $ficon=array('href'=>'assets/images/dog1_16.png',
                    'rel' => 'icon',
                    'type' => 'image/png');
        echo link_tag($ficon);

    ?>
    <!--favicon-->
    <link rel="icon" type="image/x-icon" sizes="32x32"
          href="<?php echo base_url(); ?>assets/img/favicon/favicon.png" />

    <!--requirejs-->
    <script type="application/javascript"
            src="<?php echo base_url();?>assets/js/require.js"
            data-main="<?php echo base_url();?>assets/js/app"></script>
</head>
<body class="<?php echo isset($_page_class)?$_page_class:'';?>">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=565459230140582";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <!--header-->
    <div class="container">
        <div class="row">
            
                <div id="logo" class="col-xs-3">

                        <a href="<?php echo base_url(); ?>" title="<?php echo $_site_title; ?>">
                                <img src="<?php echo base_url(); ?>/assets/images/logo.jpg"
                                     alt="<?php $_site_title ?>">
                        </a>
                </div>
                <div class="col-xs-9">
                    <p class="text-center">728x90px AD Place</p>
                </div>            
        </div><!--row-->
    
    <!--end header-->

        <!-- Navigation bar starts -->
        <?php
        
        $data['_size']=$_tax_size;
        $data['_breed']=$_tax_breed;

        $data['_char']=$_tax_char;
        $data['_color']=$_tax_color;

        $this->load->view('inc/navbar_home',$data);
        //echo $_navbar_home;
        ?>
        <!-- Navigation bar ends -->

    <!--container starts-->

  
    <?php

    //Body Content
     echo $_content;

     ?>
 
    <!--footer Starts-->
        <?php //echo $_footer;
        $this->load->view('inc/footer');
        ?>
    <!--footer ends-->     

    </div><!--end cotnainer-->
</body>
</html>