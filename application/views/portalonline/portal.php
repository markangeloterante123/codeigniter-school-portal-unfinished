<!DOCTYPE html>
<html lang="en">
<head>
	<title>Portal</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/img/logo1.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/main.css">

<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url(); ?>/assets/img/background.jpg');">
			<div style="margin-top: 0px;" class="wrap-login100">
				<img  style="width: 120px; height: 120px; border-radius: 50%; border: white 2px solid;" class="login100-form-logo" src="<?php echo base_url(); ?>/assets/img/logo1.png">
				<span class="login100-form-title p-b-34 p-t-27">
					<a data-toggle="modal" data-target="#exampleModal" style="color: gold; font-size: 18px;">CREATE </a><b>PORTAL</b>	
				</span>	
			</div>

		</div>

			<div style="margin-top:0px;padding-top: 0px; margin-left: 30px; margin-right: 20px; margin-bottom: 50px;" class="box-header">
              <h3 class="box-title">Portal List</h3>
            </div>

			<div style="margin-top:0px;padding-top: 0px; margin-left: 20px; margin-right: 20px; margin-bottom: 50px;">
 				<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Name</th>
                  <th>Campus</th>
                  <th>Status</th>>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </thead>       
                <tbody class="ajax-portal">
                 	
               	</tbody>
                <tbody class="ajax-portal_approve">
                  
                </tbody>
              	</table>
  			</div>

	</div>


	<div class="modal fade bd-example-modal-sm" id="join_modal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">            
            <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Login As:</label>
          

          	<form action="<?php echo base_url(); ?>pages/portalStudent" method="post">
	          	<input type="hidden" class="form-control" name="portal_ID" id="portal_ID">
	          	<input type="submit" class="btn btn-block btn-info student" value="Student">
	          	<br>
          	</form>
          	<form action="<?php echo base_url(); ?>admin/login" method="post">
          		<input type="hidden" class="form-control" name="portal_ID" id="portal_ID">
          		<input type="submit" class="btn btn-block btn-success admin" value="Admin">
          		<br>
          	</form>
          	<form action="<?php echo base_url(); ?>super/login" method="post">
          		<input type="hidden" class="form-control" name="portal_ID" id="portal_ID">
          		<input type="submit" class="btn btn-block btn-warning registrar" value="Registrar">
        	</form>
        </div>
      </div>
      <div class="modal-footer">
        <input type="button" style="margin-left: 15px;" class="btn btn-danger" data-dismiss="modal" value="Cancel">
      </div>   
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">   
              <div class="wrap-login100">
                <button type="button" class=" close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <form class="login100-form validate-form" action="<?php echo base_url(); ?>pages/portalCreateRegistration" method="post">
              <span class="login100-form-logo">
                <img  style="width: 120px; height: 120px; border-radius: 50%; border: white 2px solid;" class="login100-form-logo" src="<?php echo base_url(); ?>/assets/img/logo1.png">
              </span>

              <span class="login100-form-title p-b-34 p-t-27">
                Create Portal
              </span>

              <div class="wrap-input100 validate-input" data-validate = "Enter SchoolName">
                <input class="input100" type="text" name="school" placeholder="College/University Name:" required>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
              </div>
              <div class="wrap-input100 validate-input" data-validate = "Enter Campus">
                <input class="input100" type="text" name="campus" placeholder="Campus/Location" required>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
              </div>
              <div class="wrap-input100 validate-input" data-validate = "Enter Email">
                <input class="input100" type="email" name="email" placeholder="College/University Email" required>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
              </div>
              <div class="wrap-input100 validate-input" data-validate = "Enter YourName">
                <input class="input100" type="text" name="name" placeholder="Enter Name" required>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
              </div>
              <div class="wrap-input100" >
                <input class="input100" type="text" name="m_i" placeholder="Enter M.I" required>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
              </div>
              <div class="wrap-input100 validate-input" data-validate = "Enter LastName">
                <input class="input100" type="text" name="lastname" placeholder="LastName:" required>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
              </div>
              <div class="wrap-input100 validate-input" data-validate = "Enter Campus">
                <input class="input100" type="text" name="Username" placeholder="Username" required>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
              </div>
              <div class="wrap-input100 validate-input" data-validate="Enter password">
                <input class="input100" type="password" name="pass" placeholder="Password" required>
                <span class="focus-input100" data-placeholder="&#xf191;"></span>
              </div>

              <div class="checkbox-group required">
                <input class="input-checkbox100" type="checkbox" id="myCheck" name="myCheck" required>
                <label class="label-checkbox100" for="myCheck">
                  <a>Terms &amp; Agreement</a>
                </label>
                <p id="demo"></p> 
              </div>

              <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                  Create Account
                </button>
              </div>
              
            </form>
          </div>
      
    </div>
  </div>
</div>

	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/login/js/main.js"></script>
  <script src="<?php echo base_url(); ?>assets/wizard/js/jquery.steps.js"></script>

	<script type="text/javascript">
  $(document).ready(function () {
     ajax_portal();
     ajax_approve();
     function ajax_portal(){
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_portal_display',
              type: 'post',
              dataType : "JSON",
              error: function() {
                      alert('Something is Wrong');
                   },
              success: function (data) {
                var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td>'+data[i].Name+'</td>'+
                        '<td>'+data[i].Campus+'</td>'+
                        '<td>'+'<a><i class="fa fa-circle text-success"></i> Live Portal</a>'+'</td>'+
                        '<td>'+'<a>'+data[i].email+'</a>'+'</td>'+
                        '<td style="text-align:right;">'+
                        '<a href="javascript:void(0);" class="btn btn-block btn-sm btn-primary portal" data-portal="'+data[i].portal_ID+'"></i>Join</a>'+" "+
                        '</td>'+
                        '</tr>';
                    }
                $('.ajax-portal').html(html);
              }
            });
      }
      function ajax_approve(){
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_portal_approve',
              type: 'post',
              dataType : "JSON",
              error: function() {
                      alert('Something is Wrong');
                   },
              success: function (data) {
                var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                        '<td>'+"-"+'</td>'+
                        '<td>'+data[i].Name+'</td>'+
                        '<td>'+data[i].Campus+'</td>'+
                        '<td>'+'<a><i class="fa fa-circle text-warning"></i> Offline Portal</a>'+'</td>'+
                        '<td>'+'<a>'+data[i].email+'</a>'+'</td>'+
                        '<td style="text-align:right;">'+
                        '<a href="javascript:void(0);" class="btn btn-block btn-sm btn-danger" data-portal="'+data[i].portal_ID+'"></i>Under Maintenance</a>'+" "+
                        '</td>'+
                        '</tr>';
                    }
                $('.ajax-portal_approve').html(html);
              }
            });
      }
       $('.ajax-portal').on('click','.portal',function (){
      		var portal = $(this).data('portal');
	      	$('[name="portal_ID"]').val(portal);
	      	$('#join_modal').modal('show');
    	});

      //for auto refresh ng page
      setInterval(function(){
       ajax_portal();
       ajax_approve();
      }, 2000) 

});
</script>

<script>
function myFunction() {
  var x = document.getElementById("myCheck").required;
  document.getElementById("demo").innerHTML = x;
}
</script>





</body>
</html>