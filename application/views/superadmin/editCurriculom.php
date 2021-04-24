

<?php 
  if($collect_data){
    foreach ($collect_data as  $values) {
      $portal_ID = $values->portal_ID;
      $alias = $values->alias;
?>
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $alias." - "; ?>Edit Curriculum</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr> 
                  <th>Course Code</th>
                  <th>Course Title</th>
                  <th>Department</th>
                  <th>Information</th>
                </tr>
                </thead>
                <tbody>
                 
                 <?php
                    if($collect_data){
                          $data = $portal_ID;
                          $order = 'id';
                          $table = 'tbl_course';
                          foreach ($this->load->model_users->get_data_sub($data, $table, $order) as $values) {
                            $id = $values->id;
                            $course = $values->course_code;
                            $coursetitle = $values->course_title;
                            $department = $values->department;
                   ?>
                <tr>
                  <td><?php echo $course; ?></td>
                  <td><?php echo $coursetitle; ?></td>
                  <td><?php echo $department; ?>  
                  </td>
                  <td>
                    <form method="post" action="<?php echo base_url(); ?>pages/editCourseProgram/<?=$values->program_code;?>/<?php echo $portal_ID; ?>">
                    <input type="submit" class="btn btn-block btn-info btn-sm" value="Edit">
                    </form>
                  </td>
                </tr>
                 <?php 
                  }
                  } 
                  ?>
                </tbody>
              </table>
              <input type="button" data-toggle="modal" data-target="#userModal" class="btn btn-block btn-primary btn-sm" value="Add Course">
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


<div id="userModal" class="modal fade">
  <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" >&times;</button>
            <h4 class="modal-title"><?php echo $alias." - ";?> Course Program</h4>
          </div>
          <div class="modal-body">
                <div class="box-body"> 
                  <form method="post" action="<?php echo base_url() ;?>/pages/portalCourseAdd/<?php echo $portal_ID; ?>">
                <div class="form-group">
                    <label>Program Code</label>
                    <input type="text" id="" name="program_code" class="form-control" required />
                    <label>Course Title</label>
                    <input type="text" id="" name="course_title" class="form-control" required />
                    <label>Department</label>
                    <input type="textbox" class="form-control" name="department" id="department" placeholder="Enter Course Department" required>
                </div>
                <input type="submit" class="btn btn-block btn-success btn-sm" value="submit">
              </form>
                </div>
                <div class="modal-footer">
                </div>         
           </div>
        </div>      
  </div>
</div>
<?php }} ?>
