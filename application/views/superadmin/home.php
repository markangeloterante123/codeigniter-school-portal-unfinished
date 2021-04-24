
         
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
              <h3 class="box-title">Student List</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Profile</th>
                  <th>Student I.D</th>
                  <th>Student Name</th>
                  <th>Student Course</th>
                  <th>Student Section</th>
                  <th>Action</th>
                </tr>
                </thead>       
                <tbody>
                   <?php
                    if($collect_data){
                          $data = $portal_ID;
                          $table = 'tbl_student_info';
                          $order = 'student_id';
                          foreach ($this->load->model_users->get_data_portal($data,$table,$order) as $values) {                  
                            $student_id = $values->student_id;
                            $student_lname = $values->last_name;
                            $student_fname = $values->first_name;
                            $student_mi = $values->m_i;
                            $course = $values->course;
                            $year = $values->year;
                            $sec = $values->section;
                            $profile = $values->profile;          
                     ?>
                <tr>
                  <td><img style="width: 50px; height: 50px; border-radius: 10%; border:1px solid;" src="<?php echo base_url(); ?>/assets/profile/<?php echo $profile;?>" class="user-image" alt="User Image"> </td>
                  <td><?php echo $student_id; ?></td>
                  <td><?php echo $student_lname; echo " "; echo $student_fname;  echo " "; echo $student_mi;?></td>
                  <td>
                  <?php echo $course; ?>
                  </td>
                  <td>
                     <?php echo $course; echo"-"; echo $year; echo $sec; ?>
                  </td>
                  <td>
                    <input type="submit" class="btn btn-block btn-success btn-sm" value="View">
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
