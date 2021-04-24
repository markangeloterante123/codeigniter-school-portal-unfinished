
<?php 
  if($collect_data){
    foreach ($collect_data as  $values) {
      $portal_ID = $values->portal_ID;
?>
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Proffisor List</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Profile</th>
                  <th>Proffesor I.D</th>
                  <th>Proffesor Name</th>
                  <th>Department</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    if($collect_data){
                          $data = $portal_ID;
                          $order = 'admin_id';
                          $table = 'tbl_admin_info';
                          foreach ($this->load->model_users->get_data_sub($data, $table, $order) as $values) {                  
                            $admin_id = $values->admin_id;
                            $admin_lname = $values->last_name;
                            $admin_fname = $values->first_name;
                            $admin_mi = $values->m_i;
                            $department = $values->department;
                            $status = $values->status;
                            $profile = $values->profile;
                  ?>
                <tr>
                  <td><img style=" border-radius: 10%; border:1px solid; width: 80px; height: 50px;" src="<?php echo base_url(); ?>/assets/profile/<?php echo $profile;?>" class="user-image" alt="User Image"> </td>
                  <td><?php echo $admin_id; ?></td>
                  <td><?php echo $admin_lname; echo " "; echo $admin_fname; echo $admin_mi; ?></td>
                  <td>
                      <?php 
                        if($department == 1){
                            echo 'DIIT';
                        }
                        else if($department == 2){
                            echo 'DSA';
                        }
                      ?>
                  </td>
                  <td>
                      <?php 
                        if($status == 0){
                          echo "Regular";
                        }
                        else{
                          echo "Part-Time";
                        }
                      ?>
                  </td>
                  <td>
                    <input type="submit" class="btn btn-block btn-success btn-sm" value="View"></td>
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