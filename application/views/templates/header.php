<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>myPORTAL</title>
    <link rel="icon" href="<?php echo base_url(); ?>/assets/img/logo1.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/page/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/own.css">

</head>

<body>
    <?php 
        if($collect_data){ 
        foreach ($collect_data as $values) {
            $portal_ID=$values->portal_ID;
            $alias =$values->alias;
            $fb = $values->fb;
            $email = $values->email;
            $logo =$values->Logo;             
    ?>

    <header class="header-area">
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <nav class="classy-navbar justify-content-between" id="cleverNav">
                    <a class="nav-brand" href="#"><em style="font-style: normal;color:red;font-size: 32px;"><b><?php echo $alias; ?></b></em><b>-Portal</b></a>
                    
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>
                    <div class="classy-menu">
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <div class="classynav">
                            <ul>
                                

                                <li><a href="#">About us</a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo base_url(); ?>/pages/mission/<?php echo $portal_ID; ?>">Mission/Vission</a></li>
                                        <li><a href="<?php echo base_url(); ?>/pages/organization/<?php echo $portal_ID; ?>"><?php echo $alias;?></a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Admission</a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo base_url(); ?>/pages/courseOffer/<?php echo $portal_ID; ?>">Course Offers</a></li>
                                        <li><a href="<?php echo base_url(); ?>/pages/enrollProc//<?php echo $portal_ID; ?>">Enrollment</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Follow us:</a>
                                    <ul class="dropdown">
                                        <li><a href="https://web.facebook.com/pg/philtechgma2013" target="_blank" ><i class="fa fa-facebook" aria-hidden="true"></i>aceBook</a></li>
                                    <li><p><b>Email: <?php echo $email; ?></b></p></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="modal" data-target="#myModal">LogIn</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <style type="text/css">
    body {
        font-family: 'Varela Round', sans-serif;
    }

    .modal-login {
        width: 320px;
    }
    .modal-login .modal-content {
        border-radius: 1px;
        border: none;
    }
    .modal-login .modal-header {
        position: relative;
        justify-content: center;
        background: #f2f2f2;
    }
    .modal-login .modal-body {
        padding: 30px;
    }
    .modal-login .modal-footer {
        background: #f2f2f2;
    }
    .modal-login h4 {
        text-align: center;
        font-size: 26px;
    }
    .modal-login label {
        font-weight: normal;
        font-size: 13px;
    }
    .modal-login .form-control, .modal-login .btn {
        min-height: 38px;
        border-radius: 2px; 
    }
    .modal-login .hint-text {
        text-align: center;
    }
    .modal-login .close {
        position: absolute;
        top: 15px;
        right: 15px;
    }
    .modal-login .checkbox-inline {
        margin-top: 12px;
    }
    .modal-login input[type="checkbox"]{
        margin-top: 2px;
    }
    .modal-login .btn {
        min-width: 100px;
        background: #3498db;
        border: none;
        line-height: normal;
    }
    .modal-login .btn:hover, .modal-login .btn:focus {
        background: #248bd0;
    }
    .modal-login .hint-text a {
        color: #999;
    }
    .trigger-btn {
        display: inline-block;
        margin: 100px auto;
    }
</style>

<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <form action="<?php echo base_url(); ?>user/user_login" method="post">
                <div class="modal-header">
                    <img style="height: 40px; width: 40px; margin-right: 10px;" src="<?php echo base_url() ?>assets/img/<?php echo $logo; ?>">              
                    <h4 class="modal-title">Login</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">  
                    <input type="hidden" name="portal_ID" id="portal_ID" value="<?php echo $portal_ID; ?>" >              
                    <div class="form-group">
                        <label>Student ID</label>
                        <input type="text" class="form-control" id="id" name="id" required="required" placeholder="Enter Student ID">
                    </div>
                    <div class="form-group">
                        <div class="clearfix">
                            <label>Password</label>
                        </div>
                        <input type="password" id="pass" name="pass" class="form-control" required="required" placeholder="Enter Password">
                    </div>
                    <!-- <a data-toggle="modal" data-target="#create" data-dismiss="modal" class="pull-left text-muted"><small>Create Account</small></a> -->
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-block btn-success btn-sm" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>

<div id="create" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <form action="/examples/actions/confirmation.php" method="post">
                <div class="modal-header">
                    <img style="height: 40px; width: 40px; margin-right: 10px;" src="<?php echo base_url() ?>assets/img/logo.jpg">              
                    <h4 class="modal-title">Create Account</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">    
                    <div class="form-group">
                        <label>Student ID</label>
                        <input type="text" class="form-control" required="required" placeholder="Enter Code">
                    </div>          
                    <div class="form-group">
                        <label>Username</label>
                        <input type="password" class="form-control" required="required" placeholder="Enter Old Password">
                    </div>
                    <div class="form-group">
                        <div class="clearfix">
                            <label>Password</label>
                        </div>
                        <input type="password" class="form-control" required="required" placeholder="Enter Password">
                    </div>
                    <a data-toggle="modal" data-target="#myModal" data-dismiss="modal" class="pull-left text-muted"><small>Already have account</small></a>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-block btn-success btn-sm" value="Create Account">
                </div>
            </form>
        </div>
    </div>
</div>  

    <?php }} ?>
    <script src="<?php echo base_url(); ?>/assets/page/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/page/js/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/page/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/page/js/plugins/plugins.js"></script>
    <script src="<?php echo base_url(); ?>/assets/page/js/active.js"></script>