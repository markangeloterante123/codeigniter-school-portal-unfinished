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
     ajax_load();
     ajax_register();
     //display all subject curicullom
     function ajax_load(){
          var data = $("input[name='data']").val();
          var portal_ID = $("input[name='portal_ID']").val();
            $.ajax({
              url:'<?=base_url()?>index.php/pages/ajax_old',
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
                        '<td>'+data[i].prerequisite+'</td>'+
                        '<td>'+data[i].year+'yr'+'</td>'+
                        '<td>'+data[i].sem+'sem'+'</td>'+
                        '<td>'+data[i].lec+'</td>'+
                        '<td>'+data[i].lab+'</td>'+
                        '<td>'+data[i].unit+'</td>'+
                        //'<td>'+data[i].grades+'</td>'+
                        '<td style="text-align:right;">'+
                        '<a href="javascript:void(0);" class="btn btn-block btn-info enroll" data-grades="'+data[i].grades+'" data-ids="'+data[i].ids+'"><i class="fa fa-user-plus"></i>Enroll</a>'+
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
              data:{data:data,portal_ID:portal_ID},
              dataType : "JSON",
              success: function (data) {
                  var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                        //'<td>'+data[i].student_id+'</td>'+
                        //'<td>'+data[i].portal_ID+'</td>'+
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
//student Balance search
       $('.search').click(function(){
        var student_id = $("input[name='student_id']").val();
        $('[name="student"]').val(student_id);
        $('#studentBalanceRecord').modal('show');
        $.ajax({
                type : "POST",
                url  : "<?php echo site_url('pages/ajax_search_balance')?>",
                dataType : "JSON",
                data : {student_id:student_id},
                success: function(data){ 
                  var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                          html +=
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
                          '<td>'+'₱'+data[i].lecture_bal+'</td>'+
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



</body>
</html>