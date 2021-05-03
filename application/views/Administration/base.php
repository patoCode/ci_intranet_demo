<!DOCTYPE html>
<html lang="en">

<head>
    <title>INTRANET</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="author" content="ET" />
      <!-- Favicon icon -->
      <link rel="icon" href="<?php echo base_url(); ?>public/admin/assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->     <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
      <!-- waves.css -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/admin/assets/css/bootstrap/css/bootstrap.min.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/admin/assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/admin/assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/admin/assets/icon/icofont/css/icofont.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/admin/assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/admin/assets/css/jquery.mCustomScrollbar.css">

  </head>
  <body>
    <!-- Pre-loader start -->
    <!-- Pre-loader start -->
    <?php $this->load->view('administration/loader'); ?>
    <!-- Pre-loader end -->

    <?php
            if(isset($css_files)):
                foreach($css_files as $file):
        ?>
          <pre> <?php echo $file ?> </pre>
        <?php   endforeach;
            endif;
        ?>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
<!-- TOP start -->
            <?php $this->load->view('administration/top'); ?>
<!-- TOP end -->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <!-- MAIN MENU start -->
                    <?php $this->load->view('administration/main_menu'); ?>
                    <!-- MAIN MENU end -->

                    <div class="pcoded-content">

                        <!-- Page-header start -->
                        <?php $this->load->view('administration/page_title'); ?>
                        <!-- Page-header end -->

                        <div class="pcoded-inner-content">

                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <?php
                                        if(isset($output)):
                                            $this->load->view('administration/bodyCRUD', $output);
                                        else:
                                            $this->load->view('Administration/'.$view);
                                        endif;
                                    ?>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="<?php echo base_url(); ?>public/admin/assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="<?php echo base_url(); ?>public/admin/assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="<?php echo base_url(); ?>public/admin/assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="<?php echo base_url(); ?>public/admin/assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="<?php echo base_url(); ?>public/admin/assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="<?php echo base_url(); ?>public/admin/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/assets/js/modernizr/modernizr.js "></script>
    <!-- Custom js -->
    <script src="<?php echo base_url(); ?>public/admin/assets/js/pcoded.min.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/assets/js/vertical-layout.min.js "></script>
    <script src="<?php echo base_url(); ?>public/admin/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/admin/assets/js/script.js"></script>

</body>

</html>
