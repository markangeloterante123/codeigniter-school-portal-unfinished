
<?php  
  if($collect_data){
    foreach ($collect_data as $values) {
     $alias = $values->alias;
     $portal_ID =$values->portal_ID;
?>
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $alias."-"?>Course List</h3>
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
                  <td><?php 
                      if($department ==1){
                        echo 'Department of Science and Arts';
                      }
                      else if($department == 2){
                        echo 'Department of Industrial and Information Techology';
                      }
                      else{
                        echo 'Department of Business and Management';
                      }
                  ?></td>
                  <td>
                    <input type="submit" class="btn btn-block btn-success btn-sm" value="More Information">
                  </td>
                </tr>
                 <?php 
                  }
                  } 
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php }} ?>