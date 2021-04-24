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
    ajax_my_subject_student();
    ajax_chat_display_other();
    ajax_display_activity();
    ajax_portal_display();
    ajax_registrar_post();
    //ajax_comment_box();
    ajax_done();
     function ajax_my_subject_student(){
          var portal_ID = $("input[name='portal_ID']").val();
          var student_id = $("input[name='student_id']").val();
          var profile = $("input[name='profile']").val();
          var name = $("input[name='name']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_class_join',
              type: 'POST',
              data:{student_id:student_id, portal_ID:portal_ID},
              dataType : "JSON",
              error: function() {
                      alert('Something is wrong!');
                   },
              success: function (data) {
                var html = '';
                    var i;
                    for(i=0; i<data.length; i++){

                      if(data[i].status == '1'){
                        html += 
                        '<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td>'+data[i].sched+'</td>'+
                        '<td>'+'Prof. '+data[i].name+'</td>'+
                        '<td>'+data[i].program_code+'</td>'+
                        '<td>'+data[i].section+'</td>'+
                        '<td>'+data[i].class_sub+'</td>'+
                        '<td>'+data[i].sem+'</td>'+
                        '<td>'+data[i].year+'</td>'+
                        '<td>'+'<a><i class="fa fa-circle text-success"></i> Member</a>'+'</td>'+ 
                        '<td style="text-align:left;">'+
                        '<a href="<?php echo base_url(); ?>/pages/onlineClass_users/'+data[i].portal_ID+'/'+data[i].class_code+'/'+profile+'/'+name+'/'+data[i].student_id+'"  class="btn btn-sm btn-info" >Enter Class</a>'+
                        '</td>'+
                        '</tr>'

                      }
                      else{
                         html += 
                        '<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td>'+data[i].sched+'</td>'+
                        '<td>'+'Prof. '+data[i].name+'</td>'+
                        '<td>'+data[i].program_code+'</td>'+
                        '<td>'+data[i].section+'</td>'+
                        '<td>'+data[i].class_sub+'</td>'+
                        '<td>'+data[i].sem+'</td>'+
                        '<td>'+data[i].year+'</td>'+
                        '<td>'+'<a><i class="fa fa-circle text-warning"></i> Pending</a>'+'</td>'+ 
                        '<td style="text-align:left;">'+
                        '<a href="javascript:void(0);" data-id="'+data[i].id+'"class="btn btn-sm btn-warning cancel" >Cancel Request</a>'+
                        '</td>'+
                        '</tr>'
                        ;
                      }
                        
                    }
                $('.ajax_class_join').html(html);
              }
            });
      }
      //delete the request join class
      $('.ajax_class_join').on('click','.cancel',function (){
        var id = $(this).data('id');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_cancel_join_class')?>",
                dataType : "JSON",
                data : {id:id},
                error:function(){
                  alert('Error');
                  },
                success: function(data){
                   ajax_my_subject_student();
                }

            });
        });
        //for displaying chat
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
                        '<a href="#" class="name">'+
                        '<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> '+data[i].date+'</small>'+data[i].name+'</a>'+
                        data[i].message+
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
      //for sending message
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
      //show moadls to sent files 
      $('.activity_post').on('click','.upload',function (){
          var myportal = $(this).data('myportal');
          var class_code = $(this).data('class_code');
          var activity = $(this).data('activity');
          $('[name="myportal"]').val(myportal);
          $('[name="class_code"]').val(class_code);
          $('[name="activity_download"]').val(activity);
          $('#ActivityPost').modal('show');  
      });
      //display all my submitted files in subject
      
      function ajax_done(){
          var portal_ID = $("input[name='portal_ID']").val();
          var class_code = $("input[name='class_code']").val();
          var student_id = $("input[name='admin_id']").val();

            $.ajax({
              url:'<?=base_url()?>index.php/pages/uploaded_file',
              type: 'post',
              data:{class_code:class_code,portal_ID:portal_ID,student_id:student_id},
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
                            '<td>'+data[i].title+' : </td>'+
                            '<td> </td>'+
                            '<td><i class="fa fa-circle text-success"></i>  Done</td>'+
                          '</tr>'
                        ;
                    }
                $('.ajax_display_activity_complished').html(html);
              
              }
            });
      }
      //display all post
      function ajax_display_activity(){
          var portal_ID = $("input[name='portal_ID']").val();
          var class_code = $("input[name='class_code']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_display_activity',
              type: 'post',
              data:{class_code:class_code,portal_ID:portal_ID},
              dataType : "JSON",
              error: function() {
                      alert('Something is wrongss');
                   },
              success: function (data) {
                var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                      if(data[i].status == '0'){
                        html += 
                        '<tr>'+
                        '<td>'+data[i].title+'</td>'+
                        //'<td>'+data[i].body+'</td>'+
                        '<td>'+data[i].activityCode+'</td>'+
                        '<td>'+data[i].date+'</td>'+
                        '<td>'+'<a><i class="fa fa-circle text-warning"></i> Not Accepting</a>'+'</td>'+
                        '<td>'+'<a class="btn btn-block btn-warning " href="<?php echo base_url(); ?>pages/download/'+data[i].file+'">Download</a>'+
                        '</tr>'                   
                        ;
                      }
                      else if(data[i].status == '1'){
                        html += 
                        '<tr>'+
                        '<td>'+data[i].title+'</td>'+
                        //'<td>'+data[i].body+'</td>'+
                        '<td>'+data[i].activityCode+'</td>'+
                        '<td>'+data[i].date+'</td>'+
                        '<td>'+'<a><i class="fa fa-circle text-success"></i> Accepting</a>'+'</td>'+
                        '<td>'+'<a class="btn btn-info " href="<?php echo base_url(); ?>pages/download/'+data[i].file+'">Download</a>'+' '+
                        '<a href="javascript:void(0);" class="btn btn-success upload"  data-myportal="'+data[i].portal_ID+'" data-class_code="'+data[i].class_code+'" data-activity="'+data[i].activityCode+'">Upload</a>'+
                        '</tr>'                   
                        ;

                      }
                             }
                $('.activity_post').html(html);
              
              }
            });
      }
    //sent comment
    $('.commentSent').click(function(){
          var id = $(this).data('id');
          var portal = $(this).data('portal');
          var comment = $(this).data('comment');
          var profile = $(this).data('profile');
          var name = $(this).data('name');
          $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_comment_sent')?>",
                dataType : "JSON",
                data : {comment:comment ,portal:portal, id:id, profile:profile, name:name},
                error:function(){
                  alert('Error');
                  },
                success: function(data){
                    $('#comment').val("");
                }
            });  

     });
    //show comments
    function ajax_comments(){
          var id = $("input[name='id']").val();
          var portal = $("input[name='portal']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_display_comment',
              type: 'post',
              data:{id:id,portal:portal},
              dataType : "JSON",
              error: function() {
                      alert('Something is wrongss');
                   },
              success: function (data) {
                var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += 
                        '<div class="item">' +
                        '<img src="<?php echo base_url(); ?>assets/img/'+data[i].profile+'" alt="user image" class="online">'+
                        '<p class="message">'+
                        '<a href="#" class="name">'
                        +data[i].name+'</a>'+
                        '<small class="text-muted pull-left"></small> '+
                        ' : '+data[i].text+
                        '</p>'+
                        '</div>'               
                        ;
                      
                    }
                $('.ajax_comment').html(html);
              }
            });
      }
    //open comment box
    $('.postRegistrar').on('click','.comment',function (){
          var id = $(this).data('id');
          var portal_ID = $(this).data('portal');
          $('[name="id"]').val(id);
          $('[name="portal"]').val(portal_ID);
          $('#comment').modal('show');
          
          $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_comment_boxs',
              type: 'post',
              data:{portal_ID:portal_ID, id:id},
              dataType : "JSON",
              error: function() {
                      alert('Something is wrong bakit2');
                   },
              success: function (data) {
                var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        if(data[i].type == '0'){
                        html += 
                        '<div class="post">'+
                          '<div class="user-block">'+
                            '<img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>/assets/img/'+data[i].logo+'" alt="User Image">'+
                                '<span class="username">'+
                                  '<a href="#">'+data[i].name+'</a>'+
                                '</span>'+
                            '<span class="description"></span>'+
                            '<p> '+' : '+data[i].body+'</p>'+
                          '</div>'+
                          '<div class="row margin-bottom">'+
                            
                          '</div>'+
                          '<div  class="box box-success">'+
                            '<div class="box-header">'+
                              '<i class="fa fa-comments-o"></i>'+
                              '<h3 class="box-title">Comment:</h3>'+
                            '</div>'+
                            '<div   class="box-body chat" id="chat-box">'+
                                '<div  class="ajax_comment">'+
                                '</div>'+
                            '</div>'+
                            '<form action="<?php echo base_url(); ?>pages/commentSent/'+data[i].portal_ID+'/'+data[i].id+'" method="post">'+
                            '<div class="box-footer">'+
                              '<div class="input-group">'+
                                '<input class="form-control" name="comment" id="comment" placeholder="Type Comment...">'+
                                '<div class="input-group-btn">'+
                                  '<button type="submit" class="btn btn-success commentSent"><i class="fa fa-send"></i></button>'+
                                '</div>'+
                              '</div>'+
                              '</form>'+
                            '</div>'+ 
                          '</div>'+
                          '</div>'
                        ;
                      }
                      else if(data[i].type == '1'){
                        html += 
                          '<div class="post">'+
                          '<div class="user-block">'+
                            '<img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>/assets/img/'+data[i].logo+'" alt="User Image">'+
                                '<span class="username">'+
                                  '<a href="#">'+data[i].name+'</a>'+
                                '</span>'+
                            '<span class="description"></span>'+
                            '<p> '+' : '+data[i].body+'</p>'+
                          '</div>'+
                          '<div class="row margin-bottom">'+
                            '<div class="attachment">'+
                            '<h4>Download This file:</h4>'+
                              '<a  href="<?php echo base_url(); ?>pages/download/'+data[i].file+'" class="filename">'+data[i].file+'</a>'+
                            '<div class="pull-right">'+
                            '<br>'+  
                          '</div>'+
                          '<div  class="box box-success">'+
                          '<div class="box-header">'+
                              '<i class="fa fa-comments-o"></i>'+
                              '<h3 class="box-title">Comment:</h3>'+
                            '</div>'+
                            '<div   class="box-body chat" id="chat-box">'+
                                '<div  class="ajax_comment">'+
                                '</div>'+
                            '</div>'+
                            '<form action="<?php echo base_url(); ?>pages/commentSent/'+data[i].portal_ID+'/'+data[i].id+'" method="post">'+
                            '<div class="box-footer">'+
                              '<div class="input-group">'+
                                '<input class="form-control" name="comment" id="comment" placeholder="Type Comment...">'+
                                '<div class="input-group-btn">'+
                                  '<button type="submit" class="btn btn-success commentSent"><i class="fa fa-send"></i></button>'+
                                '</div>'+
                              '</div>'+
                              '</form>'+
                            '</div>'+  
                          '</div>'+
                          '</div>'    
                        ;
                      }
                      else if(data[i].type == '2'){
                        html += 
                          '<div class="post">'+
                          '<div class="user-block">'+
                            '<img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>/assets/img/'+data[i].logo+'" alt="User Image">'+
                                '<span class="username">'+
                                  '<a href="#">'+data[i].name+'</a>'+
                                '</span>'+
                            '<span class="description"></span>'+
                            '<p> '+' : '+data[i].body+'</p>'+
                          '</div>'+
                          '<div class="row margin-bottom">'+
                            '<img style="padding-left:5px; height:350px; width:580px;  margin-left:10px;" class="img-responsive" src="<?php echo base_url(); ?>assets/upload/'+data[i].file+'" alt="Photo">'+
                          '</div>'+
                          '<div  class="box box-success">'+
                          '<div class="box-header">'+
                              '<i class="fa fa-comments-o"></i>'+
                              '<h3 class="box-title">Comment:</h3>'+
                            '</div>'+
                            '<div   class="box-body chat" id="chat-box">'+
                                '<div  class="ajax_comment">'+
                                '</div>'+
                            '</div>'+
                            '<form action="<?php echo base_url(); ?>pages/commentSent/'+data[i].portal_ID+'/'+data[i].id+'" method="post">'+
                            '<div class="box-footer">'+
                              '<div class="input-group">'+
                                '<input class="form-control" name="comment" id="comment" placeholder="Type Comment...">'+
                                '<div class="input-group-btn">'+
                                  '<button type="submit" class="btn btn-success commentSent"><i class="fa fa-send"></i></button>'+
                                '</div>'+
                              '</div>'+
                              '</form>'+
                            '</div>'+  
                          '</div>'+
                          '</div>'          
                        ;
                      }
                      else{
                        html += 
                          '<div class="post">'+
                          '<div class="user-block">'+
                            '<img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>/assets/img/'+data[i].logo+'" alt="User Image">'+
                                '<span class="username">'+
                                  '<a href="#">'+data[i].name+'</a>'+
                                '</span>'+
                            '<span class="description"></span>'+
                            '<p> '+' : '+data[i].body+'</p>'+
                          '</div>'+
                          '<div class="row margin-bottom">'+
                            '<div style="padding-left:10px;">'+
                            '<video class="img-responsive" muted="" controls="" width="580" height="280">'+
                             '<source type="video/mp4" src="<?php echo base_url();?>assets/upload/'+data[i].file+'">'+
                                '</video>'+
                              '</div>'+
                          '</div>'+
                          '<div  class="box box-success">'+
                          '<div class="box-header">'+
                              '<i class="fa fa-comments-o"></i>'+
                              '<h3 class="box-title">Comment:</h3>'+
                            '</div>'+
                            '<div   class="box-body chat" id="chat-box">'+
                                '<div  class="ajax_comment">'+
                                '</div>'+
                            '</div>'+
                            '<form action="<?php echo base_url(); ?>pages/commentSent/'+data[i].portal_ID+'/'+data[i].id+'" method="post">'+
                            '<div class="box-footer">'+
                              '<div class="input-group">'+
                                '<input class="form-control" name="comment" id="comment" placeholder="Type Comment...">'+
                                '<div class="input-group-btn">'+
                                  '<button type="submit" class="btn btn-success commentSent"><i class="fa fa-send"></i></button>'+
                                '</div>'+
                              '</div>'+
                              '</form>'+
                            '</div>'+  
                          '</div>'+
                          '</div>'              
                        ;
                      }
                    }                  
                $('.commentPost').html(html);
                ajax_comments();
              }
            });  
      });
    //comment box display  the posted together with the comment box
      
    //portal post from registrar
    function ajax_registrar_post(){
          var portal_ID = $("input[name='portal_ID']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_portal_announce',
              type: 'post',
              data:{portal_ID:portal_ID},
              dataType : "JSON",
              error: function() {
                      alert('Something is wrong bakit');
                   },
              success: function (data) {
                var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        if(data[i].type == '0'){
                        html += 
                        '<div class="post">'+
                          '<div class="user-block">'+
                            '<img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>/assets/img/'+data[i].logo+'" alt="User Image">'+
                                '<span class="username">'+
                                  '<a href="#">'+data[i].name+'</a>'+
                                  '<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>'+
                                '</span>'+
                            '<span class="description"></span>'+
                            '<p> '+' : '+data[i].body+'</p>'+
                          '</div>'+
                          '<div class="row margin-bottom">'+
                            
                          '</div>'+
                          '<a href="javascript:void(0);" class="btn btn-success comment " data-id="'+data[i].id+'" data-portal="'+data[i].portal_ID+'"><i class="fa fa-comments-o margin-r-5"></i>Comment ('+data[i].noCom+')</a>'+
                          '<div  class="box box-success">'+ 
                          '</div>'+
                          '</div>'
                        ;
                      }
                      else if(data[i].type == '1'){
                        html += 
                          '<div class="post">'+
                          '<div class="user-block">'+
                            '<img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>/assets/img/'+data[i].logo+'" alt="User Image">'+
                                '<span class="username">'+
                                  '<a href="#">'+data[i].name+'</a>'+
                                  '<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>'+
                                '</span>'+
                            '<span class="description"></span>'+
                            '<p> '+' : '+data[i].body+'</p>'+
                          '</div>'+
                          '<div class="row margin-bottom">'+
                            '<div class="attachment">'+
                          '<h4>Download This file:</h4>'+
                            '<a  href="<?php echo base_url(); ?>pages/download/'+data[i].file+'" class="filename">'+data[i].file+'</a>'+
                          '<div class="pull-right">'+
                          '<br>'+  
                        '</div>'+  
                          '</div>'+

                          '<a href="javascript:void(0);" class="btn btn-success comment" data-id="'+data[i].id+'" data-portal="'+data[i].portal_ID+'"><i class="fa fa-comments-o margin-r-5"></i>Comment ('+data[i].noCom+')</a>'+
                          '<div  class="box box-success">'+ 
                          '</div>'+
                          '</div>'    
                        ;
                      }
                      else if(data[i].type == '2'){
                        html += 
                          '<div class="post">'+
                          '<div class="user-block">'+
                            '<img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>/assets/img/'+data[i].logo+'" alt="User Image">'+
                                '<span class="username">'+
                                  '<a href="#">'+data[i].name+'</a>'+
                                  '<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>'+
                                '</span>'+
                            '<span class="description"></span>'+
                            '<p> '+' : '+data[i].body+'</p>'+
                          '</div>'+
                          '<div class="row margin-bottom">'+
                            '<img style=" padding-left:10px; height:530px; margin-left:10px;" class="img-responsive" src="<?php echo base_url(); ?>assets/upload/'+data[i].file+'" alt="Photo">'+
                          '</div>'+
                          '<a href="javascript:void(0);" class="btn btn-success comment" data-id="'+data[i].id+'" data-portal="'+data[i].portal_ID+'"><i class="fa fa-comments-o margin-r-5"></i>Comment ('+data[i].noCom+')</a>'+
                          '<div  class="box box-success">'+ 
                          '</div>'+
                          '</div>'          
                        ;
                      }
                      else{
                        html += 
                          '<div class="post">'+
                          '<div class="user-block">'+
                            '<img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>/assets/img/'+data[i].logo+'" alt="User Image">'+
                                '<span class="username">'+
                                  '<a href="#">'+data[i].name+'</a>'+
                                  '<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>'+
                                '</span>'+
                            '<span class="description"></span>'+
                            '<p> '+' : '+data[i].body+'</p>'+
                          '</div>'+
                          '<div class="row margin-bottom">'+
                            '<div class="col-sm-6">'+
                            '<video class="img-responsive" muted="" controls="" width="640" height="480">'+
                         '<source type="video/mp4" src="<?php echo base_url();?>assets/upload/'+data[i].file+'">'+
                            '</video>'+
                          '</div>'+
                          '</div>'+
                          '<a href="javascript:void(0);" class="btn btn-success comment" data-id="'+data[i].id+'" data-portal="'+data[i].portal_ID+'"><i class="fa fa-comments-o margin-r-5"></i>Comment ('+data[i].noCom+')</a>'+
                          '<div  class="box box-success">'+ 
                          '</div>'+
                          '</div>'              
                        ;
                      }
                    }                  
                $('.postRegistrar').html(html);
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
                            '<a class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>'+
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
                            '<a class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>'+
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
                            '<a class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>'+
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
                            '<a class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>'+
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

      setInterval(function(){
        ajax_my_subject_student();
        ajax_chat_display_other();
        ajax_display_activity();
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
                  window.location.href="<?php echo base_url(); ?>pages/userlogout";
                });
          } else {
            swal("Cancelled", "Continue your session User!", "error");
          }
        }); 
    }
</script>


</body>
</html>