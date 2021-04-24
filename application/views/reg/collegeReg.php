
         
  
<?php
  if($collect_data){
    foreach ($collect_data as $values) {
     $portal_ID = $values->portal_ID;
?>
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of College Un-enrolled Student</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Profile</th>
                  <th>Student I.D</th>
                  <th>Student Name</th>
                  <th>Student Course</th>
                  <th>Section</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>       
                <tbody>
                  <?php
                    if($collect_data){
                          $data = $portal_ID;
                          $order = 'student_id';
                          $table = 'tbl_student_info'; 
                          foreach ($this->load->model_users->get_student_unenrolled($table,$order,$data) as $values) {                  
                            $student_id = $values->student_id;
                            $student_lname = $values->last_name;
                            $student_fname = $values->first_name;
                            $student_mi = $values->m_i;
                            $course = $values->course;
                            $year = $values->year;
                            $sec = $values->section;
                            $profile = $values->profile;
                            $enroll=$values->enroll_stat;
                            $enroll_stat=$values->enroll_stat;          
                     ?>
                <tr>
                  <td><img style="width: 50px; height: 50px; border-radius: 10%; border:1px solid;" src="<?php echo base_url(); ?>/assets/profile/<?php echo $profile;?>" class="user-image" alt="User Image"> </td>
                  <td><?php echo $student_id; ?></td>
                  <td><?php echo $student_lname; echo " "; echo $student_fname;  echo " "; echo $student_mi;?></td>
                  <td>
                  <?php echo $course; ?>
                  </td>
                  <td><?php echo $course; echo"-"; echo $year; echo $sec; ?>
                  </td>
                  <td><?php 
                      if($enroll == 0){
                        echo "";
                      }else{
                        echo "Enrolled";
                      }
                   ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>pages/oldCollegeEnroll/<?php echo $student_id; ?>/<?php echo $portal_ID; ?>" class="btn btn-block btn-info btn-sm">Enroll</a>
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