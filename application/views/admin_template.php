<?php echo doctype('html5'); ?>
<html lang="en">
<head>
     <title>
         <?php
         //If Page Title exist
         //->format is Page Title - Site Title
         //Else
         //->Site Title - Description

         if(isset($_page_title)){ echo $_page_title.' - '.$_site_title;}
         else{ echo $_site_title;}
         ?>
     </title>
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

    ?>
    <!--favicon-->
    <link rel="icon" type="image/x-icon" sizes="32x32"
          href="<?php echo base_url(); ?>assets/img/favicon/favicon.png" />

    <!-- HTML5 Support for IE -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shim.js"></script>
    <![endif]-->

    <!--requirejs-->
    <script type="application/javascript"
            src="<?php echo base_url();?>assets/js/require.js"
            data-main="<?php echo base_url();?>assets/js/app"></script>
</head>
<body class="<?php echo isset($_page_class)?$_page_class:'';?>">
    <!--header-->
    <div class="container">

            <div class="row">
                <div id="logo" class="col-xs-3">

                        <a href="<?php echo base_url(); ?>" title="<?php echo $_site_title; ?>">
                                <img src="<?php echo base_url(); ?>/assets/images/logo.jpg"
                                     alt="<?php echo $_site_title ?>">
                        </a>

                </div>
                <div class="col-xs-9">
                    <h2 class="text-center"><?php echo $_site_title ?> Admin Panel</h2>
                </div>
            </div>
    
    <!--end header-->

        <!-- Navigation bar starts -->
        <?php
        echo isset($_navbar_home)?$_navbar_home:'';
        //echo $_navbar_home;
        //$this->load->view('home/navbar');
        //$this->load->view('inc/navbar_home',$data);
        //echo $_navbar_home;
        ?>
        <!-- Navigation bar ends -->

    <!--container starts-->

  
    <?php
        //Body Content
         echo $_content;
     ?>


  </div><!--end container-->

  </div>
  <!-- content end -->

    <!--footer Starts-->
    <footer class="container">
        <div class="row">
            <div class="col-lg-12">
                <hr>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
            Copyright Note
        </div>
        <div class="col-lg-6">
            <p class="text-right"><small>Developed by GREENTech Consultancy Services</small></p>
        </div>
        </div>
    </footer>
    <!--footer ends-->

</body>
</html>