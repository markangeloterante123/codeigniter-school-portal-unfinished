<!DOCTYPE html>
<html>
<head>

<?php
  $id = $this->session->all_userdata();
  if(isset($id['portal_session'])){
?>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>myPORTAL-Admin</title>
  <link rel="icon" href="<?php echo base_url(); ?>/assets/img/logo1.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/page_dash/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/page_dash/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/page_dash/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/page_dash/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/page_dash/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/page_dash/dist/css/skins/_all-skins.min.css">


  <link rel="stylesheet" href="<?php echo base_url();?>assets/login/assets_sub/bootstrap/css/bootstrap-table.css" />
  <link rel="stylesheet" href="<?php echo base_url();?>assets/login/assets_sub/bootstrap/css/bootstrap-theme.min.css">
  <link href="<?php echo base_url();?>assets/login/assets_sub/fontawesome/fonts/fontawesome-webfont.ttf" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/assets_sub/sweet/sweetalert.css">


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" >
  <header class="main-header" >
   
    <a href="#" class="logo" style="background: #800000;">
      <span class="logo-mini" ><img src="<?php echo base_url(); ?>/assets/img/logo1.png"></span>
      <span class="logo-lg"><b>myPORTAL-</b>ADMIN</span>
    </a>

    <nav class="navbar navbar-static-top" style="background:saddlebrown;">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="background: saddlebrown;">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>     
      <div class="navbar-custom-menu" style="background: saddlebrown;">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                  $this->load->model('model_users','', TRUE);
                  $table="tbl_super_info";
                  $field="id";
                  if(isset($id['portal_session'])){
                  $data=$id['portal_session'];
                    foreach ($this->load->model_users->data($table,$field,$data) as $values) { 
                         $lastname = $values->last_name;
                         $firstname = $values->first_name;
                         $middle = $values->middle;
                ?>
              <span class="hidden-xs"><?php echo $firstname; echo $lastname; echo "-"; echo $middle; ?>
                <?php } }?>
              </span>
            </a>
          </li>
          <li>
            <a onclick="test()" title="LOGOUT" class="link">Sign Out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <?php
  }
  ?>

