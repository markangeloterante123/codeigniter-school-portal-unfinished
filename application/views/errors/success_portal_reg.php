<?php defined('BASEPATH') OR exit('No direct script access allowed'); ob_start();?>
<!DOCTYPE html>
<html>
<head>   
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>myPORTAL</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <link rel="icon" href="<?php echo base_url(); ?>/assets/img/logo1.png">
  <link href="<?php echo base_url();?>assets/login/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/login/css/animate.min.css" rel="stylesheet"/>
  <link href="<?php echo base_url();?>assets/login/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
  <link href="<?php echo base_url();?>assets/login/css/demo.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/login/css/pe-icon-7-stroke.css" rel="stylesheet" />
    
  <link rel="stylesheet" href="<?php echo base_url();?>assets/login/assets_sub/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/login/assets_sub/bootstrap/css/bootstrap-table.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/login/assets_sub/bootstrap/css/bootstrap-theme.min.css">
  <link href="<?php echo base_url();?>assets/login/assets_sub/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/login/assets_sub/fontawesome/fonts/fontawesome-webfont.ttf" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/assets_sub/sweet/sweetalert.css">
    
    
</head>
<body>

<script>
        function key_code(){
             swal({
               title: "Success!",
               text: "Successful Registration Please wait for approval",
               type: "success",
               showCancelButton: false,
               confirmButtonColor: "#8abb6f",
               confirmButtonText: "Ok",
               closeOnConfirm: false
             },
             function(){
                window.open("<?php echo base_url(); ?>pages/index","_self");
               //history.back();

             });
         }
     </script>
    
    <body onload="key_code()">
    </body>

    
    </body>
  <script src="<?php echo base_url();?>assets/login/js/jquery.3.2.1.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/login/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/login/js/chartist.min.js"></script>
  <script src="<?php echo base_url();?>assets/login/js/bootstrap-notify.js"></script>
  <script src="<?php echo base_url();?>assets/login/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
  <script src="<?php echo base_url();?>assets/login/js/demo.js"></script>

<script src="<?php echo base_url();?>assets/login/assets_sub/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url();?>assets/login/assets_sub/tinymce/init-tinymce.js"></script>
<script src="<?php echo base_url();?>assets/login/assets_sub/sweet/sweetalert-dev.js"></script>
<script src="<?php echo base_url();?>assets/login/assets_sub/sweet/sweetalert.min.js"></script>
<script src="<?php echo base_url();?>assets/login/assets_sub/jquery/jquery.js"></script>
<script src="<?php echo base_url();?>assets/login/assets_sub/jquery/main.js"></script>
<script src="<?php echo base_url();?>assets/login/assets_sub/bootstrap/js/bootstrap-table.js"></script>
<script src="<?php echo base_url();?>assets/login/assets_sub/bootstrap/js/bootstrap.min.js"></script>

<script>
document.getElementsByTagName('meta')['viewport'].content='min-width: 980px;'; 
</script>
</html>