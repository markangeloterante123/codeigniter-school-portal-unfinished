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

<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>/assets/page_dash/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/page_dash/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>/assets/page_dash/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>/assets/page_dash/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->

<script src="<?php echo base_url(); ?>/assets/page_dash/dist/js/pages/dashboard.js"></script>

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
    //load ng pic
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }
    $("#image_file").change(function() {
      readURL(this);
    });
  //load ng data ng student sa grades
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {

  });
</script>

<script type="text/javascript">
  $(document).ready(function () {
    ajax_my_subject();
     ajax_display_student();
     ajax_display_student_request();
     ajax_chat_display_other();
     ajax_request_notification();
     ajax_display_activity();
     ajax_display_submitted();
     ajax_portal_display();

     //display all subject curicullom
     function ajax_my_subject(){
          var portal_ID = $("input[id='portal_ID']").val();
          var admin_id = $("input[id='admin_id']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_display_class',
              type: 'POST',
              data:{admin_id:admin_id, portal_ID:portal_ID},
              dataType : "JSON",
              error: function() {
                      alert('Something is wrong!');
                   },
              success: function (data) {
                var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                         html += 
                        '<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td>'+data[i].sched+'</td>'+
                        '<td>'+data[i].program_code+'</td>'+
                        '<td>'+data[i].section+'</td>'+
                        '<td>'+data[i].class_sub+'</td>'+
                        '<td>'+data[i].sem+'</td>'+
                        '<td>'+data[i].year+'</td>'+
                        '<td>'+'<a><i class="fa fa-circle text-success"></i> Active</a>'+'</td>'+ 
                        '<td style="text-align:left;">'+
                        '<a href="<?php echo base_url(); ?>/pages/onlineClass/'+data[i].portal_ID+'/'+data[i].class_code+'/'+data[i].profile+'/'+data[i].name+'/'+data[i].admin_id+'"  class="btn btn-sm btn-info" >Enter Class</a>'+
                        '</td>'+
                        '</tr>';
                    }
                $('.ajax_my_class_display').html(html);
              }
            });
      }

       function ajax_display_student(){
          var portal_ID = $("input[name='portal_ID']").val();
          var class_code = $("input[name='class_code']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_online_student',
              type: 'post',
              data:{class_code:class_code,portal_ID:portal_ID},
              dataType : "JSON",
              error: function() {
                      alert('Something is wrong');
                   },
              success: function (data) {
                var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<span class="username">'+
                          '<a href="#"><i class="fa fa-square text-success"></i> Member- '+data[i].student_name+'</a>'+
                          ' <br>'+
                          '</span>';
                    }
                $('.ajax_student').html(html);
              }
            });
      }
      //for student offline and requesting
      function ajax_display_student_request(){
          var portal_ID = $("input[name='portal_ID']").val();
          var class_code = $("input[name='class_code']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_request_student',
              type: 'post',
              data:{class_code:class_code,portal_ID:portal_ID},
              dataType : "JSON",
              error: function() {
                      alert('Something is wrong');
                   },
              success: function (data) {
                var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += 
                          '<tr>'+
                          '<td>'+
                          '<a href="#">'+data[i].student_name+'</a>'+
                          '</td>'+
                          '<td>'+'...'+'</td>'+
                          '<td>'+
                              '<a href="javascript:void(0);" class="btn btn-sm btn-info approve" data-id="'+data[i].id+'""><i class="fa fa-plus"></i>Approve</a>'+' '+

                              '<a href="javascript:void(0);" class="btn btn-danger btn-sm delete" data-id="'+data[i].id+'"><i class="glyphicon glyphicon-trash"></i></a>'+
                          '</td>'+
                          '</tr>' 
                          ;
                    }
                $('.ajax_student_offline').html(html);
              }
            });
      }
      //display request notication
      function ajax_request_notification(){
          var portal_ID = $("input[name='portal_ID']").val();
          var class_code = $("input[name='class_code']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_request_student',
              type: 'post',
              data:{class_code:class_code,portal_ID:portal_ID},
              dataType : "JSON",
              error: function() {
                      alert('Something is wrong');
                   },
              success: function (data) {
                var html = '';
                    var i;
                        html += 
                        data.length
                          ;
                var btn = '';
                    var i;
                        if(data.length == '0'){
                          btn +='';
                        }
                        else{
                          btn += '<input type="submit" data-toggle="modal" data-target=".studentRequest" class="btn btn-block btn-info" value="Request to join">';
                        }
                $('.ajax_notification').html(html);
                $('.ajax_button_display').html(btn);
              }
            });
      }

//chat sent message
       
//for displaying Chat messages
       function ajax_chat_display_other(){
          var portal_ID = $("input[name='portal_ID']").val();
          var class_code = $("input[name='class_code']").val();
          var admin_id = $("input[name='admin_id']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_display_message',
              type: 'post',
              data:{class_code:class_code, portal_ID:portal_ID},
              dataType : "JSON",
              error: function() {
                      alert('Something is wrong');
                   },
              success: function (data) {
                var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                      if(data[i].sent != admin_id){
                        html += 
                        '<div class="item">' +
                        '<img src="<?php echo base_url(); ?>assets/profile/'+data[i].profile+'" alt="user image" class="online">'+
                        '<p class="message">'+
                        '<a href="#" class="name">'
                        +data[i].name+'</a>'+
                        '<small class="text-muted pull-left"><i class="fa fa-clock-o"></i> '+data[i].date+'</small> '+
                        ' : '+data[i].message+
                        '</p>'+
                        '</div>'
                        ;
                      }
                      else{
                        html += 
                       '<div class="direct-chat-msg right" >'+
                       '<div style="background: lightgreen;" class="direct-chat-text pull-right">'+data[i].message+'</div>'+
                       '</div>';
                      }
                        
                    }
                $('.ajax_chat').html(html);
              }
            });
      }
//for accepting student
    $('.ajax_student_offline').on('click','.approve',function (){
        var id = $(this).data('id');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_approve_class')?>",
                dataType : "JSON",
                data : {id:id},
                error:function(){
                  alert('Error');
                  },
                success: function(data){
                    alert('Student Approve Success!');
                }

            });
        });
    //rejected student request to joinning class
    $('.ajax_student_offline').on('click','.delete',function (){
        var id = $(this).data('id');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_reject_class')?>",
                dataType : "JSON",
                data : {id:id},
                error:function(){
                  alert('Error');
                  },
                success: function(data){
                    alert('Student Request Rejected');
                }
            });
        });
    //delete post
    $('.activity_post').on('click','.deletePost',function (){
        var id = $(this).data('id');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_delete_post')?>",
                dataType : "JSON",
                data : {id:id},
                error:function(){
                  alert('Error');
                  },
                success: function(data){
                    alert('Activity Delete');
                }
            });
        });
     

///sent
       $('.sent').click(function(){
            var message = $('#message').val();
            var portal_ID = $("input[name='portal_ID']").val();
            var class_code = $("input[name='class_code']").val();
            var profile = $("input[name='profile']").val();
            var name = $("input[name='name']").val();
            var admin_id = $("input[name='admin_id']").val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_sent_message')?>",
                dataType : "JSON",
                data : {message:message ,portal_ID:portal_ID, class_code:class_code, profile:profile, name:name, admin_id:admin_id },
                error:function(){
                  alert('Error');
                  },
                success: function(data){
                    $('#message').val("");
                    ajax_chat_display_other();
                }
            });
        });
//posting activity
 function ajax_display_activity(){
          var portal_ID = $("input[name='portal_ID']").val();
          var class_code = $("input[name='class_code']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_display_activity',
              type: 'post',
              data:{class_code:class_code,portal_ID:portal_ID},
              dataType : "JSON",
              error: function() {
                      alert('Something is wrong');
                   },
              success: function (data) {
                var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                      if(data[i].status == '0'){
                        html += 
                        '<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td>'+data[i].title+'</td>'+
                        //'<td>'+data[i].body+'</td>'+
                        '<td>'+data[i].activityCode+'</td>'+
                        '<td>'+data[i].date+'</td>'+
                        '<td>'+'<a><i class="fa fa-circle text-warning"></i> Not Accepting</a>'+'</td>'+
                        '<td class="pull-right">'+'<a href="javascript:void(0);" class="btn btn-info openFileLocation" data-myportal="'+data[i].portal_ID+'" data-class_code="'+data[i].class_code+'" data-activity="'+data[i].activityCode+'">Records</a>'+' '+
                        '<a href="javascript:void(0);" class="btn btn-warning closeAct" data-id="'+data[i].id+'">Off</a>'+' '+
                        '<a href="javascript:void(0);" class="btn btn-success onAct" data-id="'+data[i].id+'">Allow</a>'+' '+
                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm deletePost" data-id="'+data[i].id+'"><i class="glyphicon glyphicon-trash"></i></a>'
                        +'</td>'+

                        '</tr>'                   
                        ;
                      }
                      else if(data[i].status == '1'){
                        html += 
                        '<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td>'+data[i].title+'</td>'+
                        //'<td>'+data[i].body+'</td>'+
                        '<td>'+data[i].activityCode+'</td>'+
                        '<td>'+data[i].date+'</td>'+
                        '<td>'+'<a><i class="fa fa-circle text-success"></i> Accepting</a>'+'</td>'+
                        '<td class="pull-right">'+'<a href="javascript:void(0);" class="btn btn-info openFileLocation" data-myportal="'+data[i].portal_ID+'" data-class_code="'+data[i].class_code+'" data-activity="'+data[i].activityCode+'">Records</a>'+' '+
                        '<a href="javascript:void(0);" class="btn btn-warning closeAct" data-id="'+data[i].id+'">Off</a>'+' '+
                        '<a href="javascript:void(0);" class="btn btn-success onAct" data-id="'+data[i].id+'">Allow</a>'+' '+
                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm deletePost" data-id="'+data[i].id+'"><i class="glyphicon glyphicon-trash"></i></a>'
                        +'</td>'+

                        '</tr>'                   
                        ;

                      }
                                          }
                $('.activity_post').html(html);
              
              }
            });
      }
      //not allowing to submit student
      $('.activity_post').on('click','.closeAct',function (){
        var id = $(this).data('id');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_not_allow')?>",
                dataType : "JSON",
                data : {id:id},
                error:function(){
                  alert('Error');
                  },
                success: function(data){
                    alert('not accepting any records!');
                }
            });
        });
      //allowing to submit student
       $('.activity_post').on('click','.onAct',function (){
        var id = $(this).data('id');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_allow_submit')?>",
                dataType : "JSON",
                data : {id:id},
                error:function(){
                  alert('Error');
                  },
                success: function(data){
                    alert('accepting any records!');
                }
            });
        });
    
      
      //open to view the file submitted by the student and download 
      $('.activity_post').on('click','.openFileLocation',function (){
      var myportal = $(this).data('myportal');
      var class_code = $(this).data('class_code');
      var activity = $(this).data('activity');
      $('[name="myportal"]').val(myportal);
      $('[name="class_code"]').val(class_code);
      $('[name="activity_download"]').val(activity);
      $('#openFileLocation').modal('show');
    });
    //displaying all student submitted the activity
     function ajax_display_submitted(){
          var myportal = $("input[name='myportal']").val();
          var class_code = $("input[name='class_code']").val();
          var activity = $("input[name='activity_download']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_view_student_sent',
              type: 'post',
              data:{class_code:class_code,myportal:myportal, activity:activity},
              dataType : "JSON",
              error: function() {
                      alert('Something is wrong');
                   },
              success: function (data) {
                var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += 
                        '<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td>'+data[i].title+'</td>'+
                        '<td>'+data[i].submit_by+'</td>'+
                        '<td>'+
                        '<a class="btn btn-block btn-warning " href="<?php echo base_url(); ?>pages/download/'+data[i].file+' ">Download</a>'
                        +'</td>'+
                        '</tr>'                   
                        ;
                      }                     
                $('.activity_post_submitted').html(html);
              
              }
            });
      }
    //portal class pages
    function ajax_portal_display(){
          var portal_ID = $("input[name='portal_ID']").val();
          var class_code = $("input[name='class_code']").val();
          var profile = $("input[name='profile']").val();
          var name = $("input[name='name']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_display_activity',
              type: 'post',
              data:{class_code:class_code,portal_ID:portal_ID},
              dataType : "JSON",
              error: function() {
                      alert('Something is wrong');
                   },
              success: function (data) {
                var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                      if(data[i].type == '0'){
                        html += 
        
                        '<div class="post clearfix">'+
                          '<div class="user-block">'+
                            '<img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>assets/profile/'+data[i].profile+'" alt="User Image">'+
                            '<span class="username">'+
                            '<a href="#">'+data[i].name+'</a>'+
                            '<a href="javascript:void(0);" class="pull-right btn-box-tool deletePost" data-id="'+data[i].id+'"><i class="fa fa-times"></i></a>'+
                            '</span>'+
                          '<span class="description">'+data[i].date+'</span>'+
                        '</div>'+
                        '<p>'+data[i].body+'</p>'+
                        '<div  class="box box-success">'+
                          '</div>'+
                        '</div>'
                        ;
                      }
                      else if(data[i].type == '1'){
                        html += 
                          '<input type="hidden" name="portal_post" value="'+data[i].portal_ID+'">'+
                        '<input type="hidden" name="code_post" value="'+data[i].class_code+'">'+
                        '<input type="hidden" name="post" value="'+data[i].activityCode+'">'+
                          '<div class="post clearfix">'+
                          '<div class="user-block">'+
                            '<img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>assets/profile/'+data[i].profile+'" alt="User Image">'+
                            '<span class="username">'+
                            '<a href="#">'+data[i].name+'</a>'+
                            '<a href="javascript:void(0);" class="pull-right btn-box-tool deletePost" data-id="'+data[i].id+'"><i class="fa fa-times"></i></a>'+
                            '</span>'+
                          '<span class="description">'+data[i].date+'</span>'+
                        '</div>'+
                        '<p>'+data[i].body+'</p>'+
                        '<div class="attachment">'+
                          '<h4>Download This file:</h4>'+
                            '<a  href="<?php echo base_url(); ?>pages/download/'+data[i].file+'" class="filename">'+data[i].file+'</a>'+
                          '<div class="pull-right">'+
                          '<br>'+  
                        '</div>'+
                        '<div  class="box box-success">'+
                          '</div>'+
                        '</div>'            
                        ;
                      }
                      else if(data[i].type == '2'){
                        html += 
                        '<input type="hidden" name="portal_post" value="'+data[i].portal_ID+'">'+
                        '<input type="hidden" name="code_post" value="'+data[i].class_code+'">'+
                        '<input type="hidden" name="post" value="'+data[i].activityCode+'">'+
                          '<div class="post clearfix">'+
                          '<div class="user-block">'+
                            '<img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>assets/profile/'+data[i].profile+'" alt="User Image">'+
                            '<span class="username">'+
                            '<a href="#">'+data[i].name+'</a>'+
                            '<a href="javascript:void(0);" class="pull-right btn-box-tool deletePost" data-id="'+data[i].id+'"><i class="fa fa-times"></i></a>'+
                            '</span>'+
                          '<span class="description">'+data[i].date+'</span>'+
                        '</div>'+
                        '<p>'+data[i].body+'</p>'+
                        '<div class="row margin-bottom">'+   
                            '<img style="padding-left:10px; margin-left:10px;" class="img-responsive" src="<?php echo base_url(); ?>assets/upload/'+data[i].file+'" alt="Photo">'+
                        '</div>'+
                        '<div  class="box box-success">'+
                          '</div>'+  
                        '</div>'              
                        ;
                      }
                      else{
                        html += 
                          '<div class="post clearfix">'+
                          '<div class="user-block">'+
                            '<img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>assets/profile/'+data[i].profile+'" alt="User Image">'+
                            '<span class="username">'+
                            '<a href="#">'+data[i].name+'</a>'+
                            '<a href="javascript:void(0);" class="pull-right btn-box-tool deletePost" data-id="'+data[i].id+'"><i class="fa fa-times"></i></a>'+
                            '</span>'+
                          '<span class="description">'+data[i].date+'</span>'+
                        '</div>'+
                        '<p>'+data[i].body+'</p>'+
                        '<div class="row margin-bottom">'+
                          '<div class="col-sm-6">'+
                            '<video class="img-responsive" muted="" controls="" width="640" height="480">'+
                         '<source type="video/mp4" src="<?php echo base_url();?>assets/upload/'+data[i].file+'">'+
                            '</video>'+
                          '</div>'+
                        '</div>'+
                        '<div  class="box box-success">'+
                          '</div>'+  
                        '</div>'                
                        ;
                      }
                                          }
                $('.displayAllpost').html(html);
                  
              
              }
            });
      }
    // view the comment
   
    //for automatic refresh
      setInterval(function(){
        ajax_my_subject();
        ajax_display_student();
        ajax_display_student_request();
        ajax_chat_display_other();
        ajax_request_notification();
        ajax_display_activity();
        ajax_display_submitted();
        
        }, 2000) 

});
</script> 


 


<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
    
    function userout(){
        swal({
          title: "Log-Out",
          text: "Are you sure you want to end up your session?",
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
                  window.location.href="<?php echo base_url(); ?>pages/adminlogout";
                });
          } else {
            swal("Cancelled", "Continue your session User!", "error");
          }
        }); 
    }
</script>


</body>
</html>