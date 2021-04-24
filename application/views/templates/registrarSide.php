
<!--sidebar-->
<?php 
  if($collect_data){
    foreach ($collect_data as $values) {
     $portal_ID = $values->portal_ID;
 ?> 
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="<?php echo base_url(); ?>pages/registrar/<?php echo $portal_ID; ?>">
            <i class="fa fa-user-plus"></i> <span>College New Student</span>
          </a>
        </li>
        <li>
          <a data-toggle="modal" data-target="#Transfer">
            <i class="fa fa-user-plus"></i> <span>Transfer Student</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>pages/old_college_enroll/<?php echo $portal_ID; ?>">
            <i class="fa fa-users"></i> <span>College Old Student</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>pages/onlineRegistration/<?php echo $portal_ID; ?>">
            <i class="fa fa-user-plus"></i> <span>Online Student Registration</span>
          </a>
        </li>
        <li>
          <a data-toggle="modal" data-target="#student_bal">
            <i class="fa fa-balance-scale"></i> <span>Student Balance</span>
          </a>
        </li>
        <li>
          <a data-toggle="modal" data-target="#modal-default">
            <i class="fa fa-cogs"></i> <span>Set Fee/Registration/ID</span>
          </a>
        </li>
        <li>
          <a data-toggle="modal" data-target=".onlineReg">
            <i class="fa fa-cogs"></i> <span>Online Registration OFF/ON</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>

  <?php 
          $this->load->model('model_users','', TRUE);
          if($collect_data){
            $table = 'tbl_counter';
            $field = 'portal_ID';
            $data = $portal_ID;
            foreach ($this->load->model_users->data($table,$field,$data) as $value){

              $s_y = $value->schoolYear;
              $sem = $value->semester;
              $base = $value->base_id;
              $count = $value->college_ID_counter;
              $other = $value->other_fee;
              $mis = $value->mis_fee;
              $lec = $value->lec_fee;
              $lab = $value->lab_fee;
              $enroll = $value->enrollment_status;

  ?>


<div class="modal fade onlineReg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">            
            <h4 class="modal-title">Status: <?php 
            if($enroll == 0 ){
              echo '<a><i class="fa fa-circle text-success"></i> ON</a>';
            }else{
              echo '<a><i class="fa fa-circle text-warning"></i> OFF</a>';
            }
            ?>
            </h4>
      </div>

      <form action="<?php echo base_url(); ?>pages/enrollment/<?php echo $portal_ID; ?>" method="post">
      <div class="modal-body">
        <select class="form-control" name="select">
          <option value="0">ON</option>
          <option value="1">OFF</option>
        </select>
      </div>
      <div class="modal-footer"> 
        <input type="submit" class="btn btn-sm btn-success" value="submit">
      </div>
      </form>
    </div>
  </div>
</div>

 <div id="Transfer" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" action="<?php echo base_url(); ?>pages/transCollege/<?php echo $portal_ID; ?>">
          <div class="modal-header">            
            <h4 class="modal-title">Add Transfer Student</h4>
          </div>
          <div class="modal-body">          
            <div class="form-group">
              <label>Last Name</label>
              <input type="textbox" id="l_name" name="l_name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Middle Initial</label>
              <input type="textbox" id="m_i" name="m_i" class="form-control">
            </div>
            <div class="form-group">
              <label>First Name</label>
              <input type="textbox" id="f_name" name="f_name" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Phone No.</label>
              <input type="phone" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="textbox" id="address" name="address" class="form-control" required>
            </div>
            <div class="form-group">
              <select class="form-control" id="course" name="course">
                    <?php 
                      if($collect_data){
                        $data = $portal_ID;
                        $field = 'portal_ID'; 
                        $table = 'tbl_course'; 
                        foreach ($this->load->model_users->get_data_course($data,$field,$table) as $values){
                        $course = $values->course_title;
                        $code = $values->program_code;
                    ?>
                      <option value="<?php echo $code; ?>">
                        <?php echo $course; ?>
                      </option>
                  <?php }} ?>
              </select>
            </div>
            <input type="hidden" id="sems" name="sems" class="form-control" value="<?php echo $sem ?>">
            <input type="hidden" id="base_id" name="base_id" class="form-control" value="<?php echo $base; ?>">
            <input type="hidden" id="count" name="count" class="form-control" value="<?php echo $count; ?>">
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <button type="submit" class="btn btn-success" >Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php } } ?>

    <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="post" action="<?php echo base_url(); ?>pages/regSetup/<?php echo $portal_ID; ?>">
              <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;">Setup Enrollment Information</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>School Year</label>
                  <input type="textbox" class="form-control" name="year" placeholder="School Year Ex 2017-2018" required>
                </div>
                <div class="form-group">
                  <label>Based I.D</label>
                  <input type="textbox" class="form-control" name="id" placeholder="Ex: 1701" required>
                </div>
                <div class="form-group">
                  <label>Semester</label>
                  <select class="form-control" name="sem">
                    <option value="1">
                      1st Sem
                    </option>
                    <option value="2">
                      2nd Sem
                    </option>
                    <option value="3">
                      Summer
                    </option>

                  </select>
                </div>
                <a data-toggle="modal" data-dismiss="modal" data-target="#modal-default_price">
                  <i class="fa fa-cogs"></i> <span>Update Fee Price</span>
                </a>
              </div>

              <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <button type="Submit" class="btn btn-primary">Save Updates</button>
              </div>
              </form>
            </div>
          </div>
        </div>

<div class="modal fade bd-example-modal-sm" id="modal-default_price" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form action="<?php echo base_url(); ?>pages/regSetupFee/<?php echo $portal_ID; ?>" method="post">
      <div class="modal-header">            
            <h4 class="modal-title">Set price of:</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Lecture Fee Price</label>
          <input type="textbox" class="form-control" name="lec" id="lec" required>
          <label>Laboratory Fee Price</label>
          <input type="textbox" class="form-control" name="lab" id="lab" required>
          <label>Miscellaneous Fee Price</label>
          <input type="textbox" class="form-control" name="mis" id="mis" required>
          <label>Other Fee Price</label>
          <input type="textbox" class="form-control" name="other" id="other" required>   
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" data-toggle="modal" data-target="#modal-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i>
        </a>
        <input type="submit" class="btn btn-primary" value="Update">
      </div>
      </form>   
    </div>
  </div>
</div>



<div class="modal fade bd-example-modal-sm" id="edit_modal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">            
            <h4 class="modal-title">Evaluation of Grades</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Student Grades</label>
          <input type="hidden" class="form-control" name="edit" id="edit">
          <input type="textbox" class="form-control" name="edit_grades" id="edit_grades">
          <div class="edit">
          </div>   
        </div>
      </div>
      <div class="modal-footer">
        <input type="button" style="margin-left: 15px;" class="btn btn-default" data-dismiss="modal" value="Cancel">
        <input type="submit" class="btn btn-info update" value="Update">
      </div>   
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-sm" id="student_bal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">            
            <h4 class="modal-title">Student Balance</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Search Student ID</label>
          <input type="hidden" name="portal_ID" id="portal_ID" value="<?php echo $portal_ID; ?>">
          <input type="textbox" class="form-control" name="student_id" id="student_id" placeholder="Enter Student ID:">
        </div>
      </div>
      <div class="modal-footer">
        <a style="margin-left: 15px;" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>Cancel</a>
        <a class="btn btn-success search"><i class="fa fa-search"></i>Search
        </a> 
      </div> 
    </div>
  </div>
</div>

  <div class="modal fade bd-example-modal-sm" id="studentBalanceRecord" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form action="<?php echo base_url(); ?>pages/payment_mode/<?php echo $portal_ID; ?>" method="POST">
      <div class="modal-header">            
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Student Balance</label>
            <table class="table table-striped edit">
            <!--display of data-->
            </table>
          <label>Payment</label>
          <input type="textbox" class="form-control" name="payment" id="payment" placeholder="Enter Payment" required>
          <input type="hidden" name='student'>
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" data-toggle="modal" data-target="#student_bal" data-dismiss="modal"><i class="fa fa-arrow-left"></i>
        </a>
        <input type="submit" class="btn btn-warning payment" value="Payment">
        </div>
      </form> 
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-sm" id="studentHistory" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">            
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Student Balance</label>
            <table class="table table-striped ">
              <thead>
              <tr>
                <td>Student ID</td>
                <td>Paid</td>
                <td>Remaining Balance</td>
                <td>Date of Payment</td>
              </tr>
              </thead>
              <tbody class="editHistory">
                <!--display of data-->  
              </tbody>
            </table>
          <label>Payment</label>
          <input type="textbox" name="student">
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-warning studentPayment"><i class="fa fa-money"></i>Payment
        </a>
        <a target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> 
      </div> 
    </div>
  </div>
</div>
<?php }} ?>