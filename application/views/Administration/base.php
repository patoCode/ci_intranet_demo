<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edmin</title>
        <link type="text/css" href="<?php echo base_url();?>public/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url();?>public/admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url();?>public/admin/css/theme.css" rel="stylesheet">
        <link type="text/css" href="<?php echo base_url();?>public/admin/images/icons/css/font-awesome.css" rel="stylesheet">
        <?php
            if(isset($css_files)):
                foreach($css_files as $file):
        ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php   endforeach;
            endif;
        ?>
    </head>
    <body>

        <?php $this->load->view('administration/top'); ?>

        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">

                    <?php $this->load->view('administration/main_menu'); ?>

                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                                <?php
                                    if(isset($output)):
                                        $this->load->view('Administration/bodyCRUD', $output);
                                    else:
                                        $this->load->view('Administration/'.$view);
                                    endif;
                                ?>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright"><?php echo COPYRIGHT; ?></b>Derechos reservados.
            </div>
        </div>
        <script src="<?php echo base_url();?>public/admin/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>public/admin/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>public/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>public/admin/scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>public/admin/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>public/admin/scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
<!--         <script src="<?php echo base_url();?>public/admin/scripts/common.js" type="text/javascript"></script> -->
        <?php
            if(isset($js_files)):
                foreach($js_files as $file):
        ?>
            <script src="<?php echo $file; ?>"></script>
        <?php   endforeach;
            endif;
        ?>
    </body>
