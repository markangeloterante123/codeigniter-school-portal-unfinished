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
     ajax_load();
     ajax_register();
     ajax_history();
     ajax_load_request();
     ajax_registrar_post();
     //display all subject curicullom
     //portal post from registrar
     //show comments
    //show comments
    function ajax_comments(){
          var id = $("input[name='id']").val();
          var portal = $("input[name='portal_ID']").val();
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
      //delete post delete
      $('.postRegistrar').on('click','.delete',function (){
          var id = $(this).data('id');
          var portal_ID = $(this).data('portal_ID');
          $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_delete_reg_post',
              type: 'post',
              data:{portal_ID:portal_ID, id:id},
              dataType : "JSON",
              error: function() {
                      alert('Something king ina mo');
                   },
              success: function (data) {
                alert('Delete Post');
                ajax_registrar_post();
              }
            });  
      });

      //post comment in modals
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
                            '<form action="<?php echo base_url(); ?>pages/commentPortal/'+data[i].portal_ID+'/'+data[i].id+'" method="post">'+
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
                            '<form action="<?php echo base_url(); ?>pages/commentPortal/'+data[i].portal_ID+'/'+data[i].id+'" method="post">'+
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
                            '<form action="<?php echo base_url(); ?>pages/commentPortal/'+data[i].portal_ID+'/'+data[i].id+'" method="post">'+
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
                            '<form action="<?php echo base_url(); ?>pages/commentPortal/'+data[i].portal_ID+'/'+data[i].id+'" method="post">'+
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
                          '<a href="javascript:void(0);" class="btn btn-danger delete" data-id="'+data[i].id+'" data-portal="'+data[i].portal_ID+'"><i class="glyphicon glyphicon-trash"></i></a>'+
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
                          '<a href="javascript:void(0);" class="btn btn-danger delete" data-id="'+data[i].id+'" data-portal="'+data[i].portal_ID+'"><i class="glyphicon glyphicon-trash"></i></a>'+
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
                          '<a href="javascript:void(0);" class="btn btn-danger delete" data-id="'+data[i].id+'" data-portal="'+data[i].portal_ID+'"><i class="glyphicon glyphicon-trash"></i></a>'+
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
                          '<a href="javascript:void(0);" class="btn btn-danger delete" data-id="'+data[i].id+'" data-portal="'+data[i].portal_ID+'"><i class="glyphicon glyphicon-trash"></i></a>'+
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
     function ajax_load(){
          var data = $("input[name='data']").val();
          var portal_ID = $("input[name='portal_ID']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_transfer',
              type: 'post',
              data:{data:data,portal_ID:portal_ID},
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
                        '<td>'+data[i].course_code+'</td>'+
                        '<td>'+data[i].course_title+'</td>'+
                        '<td>'+data[i].year+'yr'+'</td>'+
                        '<td>'+data[i].sem+'sem'+'</td>'+
                        '<td>'+data[i].lec+'</td>'+
                        '<td>'+data[i].lab+'</td>'+
                        '<td>'+data[i].unit+'</td>'+
                        '<td>'+data[i].grades+'</td>'+
                        '<td style="text-align:right;">'+
                        '<a href="javascript:void(0);" class="btn btn-sm btn-primary edit" data-grades="'+data[i].grades+'" data-ids="'+data[i].ids+'"><i class="glyphicon glyphicon-pencil"></i></a>'+" "+
                        '<a href="javascript:void(0);" class="btn btn-sm btn-info enroll" data-grades="'+data[i].grades+'" data-ids="'+data[i].ids+'"><i class="fa fa-plus"></i></a>'+
                        '</td>'+
                        '</tr>';
                    }
                $('.ajax-content').html(html);
              }
            });
      }
      //display register subject
      function ajax_register(){
          var data = $("input[name='data']").val();
          var portal_ID = $("input[name='portal_ID']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_transfer_register',
              type: 'post',
              data:{data:data, portal_ID:portal_ID},
              dataType : "JSON",
              success: function (data) {
                  var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                        //'<td>'+data[i].student_id+'</td>'+
                        '<td>'+data[i].course_code+'</td>'+
                        '<td>'+data[i].course_title+'</td>'+
                        '<td>'+data[i].lec+'</td>'+
                        '<td>'+data[i].lab+'</td>'+
                        '<td>'+data[i].unit+'</td>'+
                        '<td>'+data[i].grades+'</td>'+
                        '<td>'+data[i].year+'yr/'+data[i].sem+'sm'+'</td>'+
                        '<td>'+"Pre-Enroll"+'</td>'+
                        '<td style="text-align:right;">'+
                        '<a href="javascript:void(0);" class="btn btn-danger btn-sm cancel_btn" data-grades="'+data[i].grades+'" data-ids="'+data[i].ids+'"><i class="glyphicon glyphicon-trash"></a>'+
                        '</td>'+
                        '</tr>';
                    }
                $('.ajax-enroll').html(html);
              }
            });
          }
          function ajax_history(){
          var data_id = $("input[name='data_id']").val();
          var portal_ID = $("input[name='portal_ID']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_history',
              type: 'post',
              data:{data_id:data_id, portal_ID:portal_ID},
              dataType : "JSON",
              success: function (data) {
                  var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                        '<td>'+(i+1)+'</td>'+
                        '<td>'+data[i].portal_ID+'</td>'+
                        '<td>'+'₱'+data[i].balance+'</td>'+
                        '<td>'+'₱'+data[i].payment+'</td>'+
                        '<td>'+data[i].date+'</td>'+
                        '</tr>';
                    }
                $('.history').html(html);
              }
            });
          }
  //show all online  new student request for confirmation
           function ajax_load_request(){
              var portal_ID = $("input[name='portal_ID']").val();
                $.ajax({
                  url:'<?=base_url()?>index.php/pages/ajax_student_request',
                  type: 'post',
                  data:{portal_ID:portal_ID},
                  dataType : "JSON",
                  success: function (data) {
                      var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<tr>'+
                            '<td>'+(i+1)+'</td>'+
                            //'<td>'+data[i].id+'</td>'+
                            '<td>'+data[i].last_name+'</td>'+
                            '<td>'+data[i].first_name+'</td>'+
                            //'<td>'+data[i].student_id+'</td>'+
                            '<td>'+data[i].email+'</td>'+
                            '<td>'+data[i].course+'</td>'+
                            '<td>'+'For-Approval'+'</td>'+
                            '<td>'+
                            '<a href="javascript:void(0);" class="btn btn_block btn-sm btn-success approveStudent" data-id="'+data[i].id+'" data-email="'+data[i].email+'" data-student="'+data[i].student_id+'">Confirm</a>'+
                            '</td>'+
                            '</tr>';
                            //approveStudent for confirmation 
                        }
                    $('.online_request_student').html(html);
                  }
                });
              } 
   //approve student from online registration
   $('.online_request_student').on('click','.approveStudent',function (){
        var id = $(this).data('id');
        var email = $(this).data('email');
        var student_id = $(this).data('student_id');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_approve_student')?>",
                dataType : "JSON",
                data : {id:id, email:email, student_id:student_id},
                error:function(){
                  alert('Error');
                  },
                success: function(data){
                    alert('Student Approve Success!');
                    ajax_load_request()
                }

            });
        });

  //edit
   $('.ajax-content').on('click','.edit',function (){
      var ids = $(this).data('ids');
      var grades = $(this).data('grades');
      $('[name="edit"]').val(ids);
      $('[name="edit_grades"]').val(grades);
      $('#edit_modal').modal('show');
    });
   //update
      $('.update').click(function(){
            var edit = $('#edit').val();
            var edit_grades = $('#edit_grades').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_edit')?>",
                dataType : "JSON",
                data : {edit:edit ,edit_grades:edit_grades},
                error:function(){
                  alert('Error');
                  },
                success: function(data){
                  $('[name="edit_grades"]').val("");
                  $('#edit_modal').modal('hide');
                    ajax_load();
                    ajax_register();
                }
            });
        });

//add subject for enrollment
      $('.ajax-content').on('click','.enroll',function (){
        var ids = $(this).data('ids');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_enroll')?>",
                dataType : "JSON",
                data : {ids:ids},
                error:function(){
                  alert('Error');
                  },
                success: function(data){
                    ajax_load();
                    ajax_register();
                }

            });
        });
//cancel enroll
      $('.ajax-enroll').on('click','.cancel_btn',function (){
        var ids = $(this).data('ids');
        var grades = $(this).data('grades');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_enroll_cancel')?>",
                dataType : "JSON",
                data : {ids:ids, grades:grades},
                error:function(){
                  alert('Error');
                  },
                success: function(data){
                    ajax_load();
                    ajax_register();
                }

            });
        });
//search for student bal
    $('.search').click(function(){
        var student_id = $("input[name='student_id']").val();
        var portal_ID = $("input[name='portal_ID']").val();
        $('[name="student"]').val(student_id);
        $('#studentBalanceRecord').modal('show');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_search_balance')?>",
                dataType : "JSON",
                data : {student_id:student_id, portal_ID:portal_ID},
                success: function(data){ 
                  var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                          html +=
                          '<label>'+'<h4>'+data[i].student_id+'</h4>'+'</label>'+
                          '<table>'+
                          '<tr>'+
                          '<th>'+'Laboratory Fee:'+'</th'+
                          '<td>'+'₱'+data[i].lab_bal+'</td>'+
                          '</tr>'+
                          '<tr>'+
                          '<th>'+'Lecture Fee:'+'</th'+
                          '<td>'+'₱'+data[i].lecture_bal+'</td>'+
                          '</tr>'+
                          '<tr>'+
                          '<th>'+'Miscellaneous Fee:'+'</th'+
                          '<td>'+'₱'+data[i].mis_bal+'</td>'+
                          '</tr>'+
                          '<tr>'+
                          '<th>'+'Other Fee:'+'</th'+
                          '<td>'+'₱'+data[i].other_bal+'</td>'+
                          '</tr>'+
                          '<tr>'+
                          '<th>'+'Total Ballance:'+'</th'+
                          '<td>'+'₱'+data[i].total_bal+'</td>'+
                          '</tr>'+
                          '</table>';  
                    }
                    $('.edit').html(html);
                    $('[name="student_id"]').val("");
                    $('#student_bal').modal('hide');
                },
            });
        });
    setInterval(function(){
      ajax_load_request();
      }, 2000) 

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