 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <!-- <strong>Copyright &copy; 2014-2019 <a href="#">AdminLTE</a>.</strong> All rights
    reserved. -->
    </div> 
  </footer>
<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url(); ?>/assets/page_dash/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/page_dash/dist/js/demo.js"></script><!-- 
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/jquery-3.3.1.min.js"></script> -->

<script src="<?php echo base_url();?>assets/login/assets_sub/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url();?>assets/login/assets_sub/tinymce/init-tinymce.js"></script>
<script src="<?php echo base_url();?>assets/login/assets_sub/sweet/sweetalert-dev.js"></script>
<script src="<?php echo base_url();?>assets/login/assets_sub/sweet/sweetalert.min.js"></script>
<script src="<?php echo base_url();?>assets/login/assets_sub/jquery/main.js"></script>
<script src="<?php echo base_url();?>assets/login/assets_sub/bootstrap/js/bootstrap-table.js"></script>

<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>/assets/page_dash/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

 <script type="text/javascript">
  $(document).ready(function () {
     ajax_load_portal();
     ajax_load_portal_request();
     ajax_load_portal_remove();
     function ajax_load_portal(){
          $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_portal_display',
              type: 'post',
              dataType : "JSON",
              error: function() {
                      alert('Something is wrong');
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
                        '<a href="javascript:void(0);" class="btn btn-block btn-sm btn-warning remove" data-portal="'+data[i].portal_ID+'" data-email="'+data[i].email+'">LogOut</a>'+
                        '</td>'+
                        '</tr>';
                    }
                $('.myPortal-list').html(html);
              }
            });
          }

    function ajax_load_portal_request(){
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
                        '<td>'+(i+1)+'</td>'+
                        '<td>'+data[i].Name+'</td>'+
                        '<td>'+data[i].Campus+'</td>'+
                        '<td>'+'<a><i class="fa fa-circle text-warning"></i> Offline Portal</a>'+'</td>'+
                        '<td>'+'<a>'+data[i].email+'</a>'+'</td>'+
                        '<td style="text-align:right;">'+
                        '<a href="javascript:void(0);" class="btn btn-sm btn-success approve" data-portal="'+data[i].portal_ID+'" data-email="'+data[i].email+'"></i>Activate</a>'+" "+
                         '<a href="javascript:void(0);" class="btn btn-sm btn-danger delete" data-portal="'+data[i].portal_ID+'" data-email="'+data[i].email+'"></i>Delete</a>'+
                        '</td>'+
                        '</tr>';
                    }
                $('.myPortal-approve').html(html);
              }
            });
      }
      //portal that are remove
        function ajax_load_portal_remove(){
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_portal_remove_display',
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
                        '<td>'+'-'+'</td>'+
                        '<td>'+data[i].Name+'</td>'+
                        '<td>'+data[i].Campus+'</td>'+
                        '<td>'+'<a><i class="fa fa-circle text-danger"></i> Remove</a>'+'</td>'+
                        '<td>'+'<a>'+data[i].email+'</a>'+'</td>'+
                        '<td style="text-align:right;">'+
                        '<a href="javascript:void(0);" class="btn btn-sm btn-warning activate" data-portal="'+data[i].portal_ID+'" data-email="'+data[i].email+'">Activate the Portal</a>'+
                        '</td>'+
                        '</tr>';
                    }
                $('.myPortal-remove').html(html);
              }
            });
      }
    //stop the session of portal

    $('.myPortal-list').on('click','.remove',function (){
        var email = $(this).data('email');
        var portal = $(this).data('portal');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_stop_portal')?>",
                dataType : "JSON",
                data : {portal:portal,email:email},
                error:function(){
                  alert('Please Check Your Internet Connection and Re-Try');
                  },
                success: function(data){
                    ajax_load_portal(); 
                }
            });
        });
    //allowed portal to used portal
    $('.myPortal-approve').on('click','.approve',function (){
        var portal = $(this).data('portal');
        var email = $(this).data('email');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_portal_allow')?>",
                dataType : "JSON",
                data : {portal:portal,email:email},
                error:function(){
                  alert('Please Check Your Internet Connection and Re-Try');
                  },
                success: function(data){
                    ajax_load_portal_request();
                    ajax_load_portal_remove();
                }
            });
        });
    //activate a remove portal
    $('.myPortal-remove').on('click','.activate',function (){
        var portal = $(this).data('portal');
        var email = $(this).data('email');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_portal_allow')?>",
                dataType : "JSON",
                data : {portal:portal,email:email},
                error:function(){
                  alert('Please Check Your Internet Connection and Re-Try');
                  },
                success: function(data){
                    ajax_load_portal_request();
                    ajax_load_portal_remove();
                }
            });
        });
    $('.myPortal-approve').on('click','.delete',function (){
        var portal = $(this).data('portal');
        var email = $(this).data('email');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_portal_delete')?>",
                dataType : "JSON",
                data : {portal:portal,email:email},
                error:function(){
                  alert('Please Check Your Internet Connection and Re-Try');
                  },
                success: function(data){
                    ajax_load_portal_request();
                    ajax_load_portal_remove();
                }
            });
        });

    
});
</script> 


 <script>
  $.ajax({
    url: "<?php echo base_url("Pages/ajax_price");?>",
    type: "POST",
    cache: false,
    success: function(data){
      $('#table').html(data); 
    }
  });
</script>



<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
    
    function test(){
        swal({
          title: "Log-Out",
          text: "Are you sure you want to end up your session?",
          //text: "Mag logout kana Batang Weak!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#FF4500",
          confirmButtonText: "Yes",
          cancelButtonColor: "#00FFFF",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            swal({
                  title: "Logging Out!",
                  text: "User signing out!",
                  type: "success",
                  showCancelButton: false,
                  confirmButtonColor: "#8abb6f",
                  confirmButtonText: "Ok",
                  closeOnConfirm: false
                },
                function(){
                  window.location.href="<?php echo base_url(); ?>pages/logout";
                });
          } else {
            swal("Cancelled", "Continue your session User!", "error");
          }
        }); 
    }
</script>


</body>
</html>