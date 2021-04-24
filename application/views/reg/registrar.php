 <?php
  if($collect_data){
    foreach($collect_data as $values){
      $portal_ID = $values->portal_ID;
      $alias = $values->alias;
      $name = $values->Name;
      $campus = $values->Campus;
      $logo = $values->Logo;
      $contact = $values->contactNo;
      $email = $values->email
 ?>

 <div class="content-wrapper">
  <section class="content">
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
               <img style="width: 150px; height: 150px;" src="<?php echo base_url(); ?>/assets/img/<?php echo $logo; ?>">
            </div>
            <div class="col-sm-4 invoice-col">  
              <h2 class="page-header" style="text-align: center">
                <small>Republic of the Philippines</small>
                 <?php echo $alias."-".$campus; ?>
                 <small style="font-size: 13px;">
                   <?php echo $name; ?>
                 </small>
                 <small>
                   <i class="fa fa-phone"></i>
                   <span style="font-size: 12px;"><?php echo $contact; ?></span>
                   <span style="font-size: 12px;"><?php echo $email; ?></span>
                 </small>
              </h2>
            </div>
          </div>
          <hr>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
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

        ?>
        <p style="text-align: center; font-size: 16px; margin-top: 0px; padding-top: 0px; margin-bottom: 10px;">REGISTRATION FORM</p>
        <small style="padding-left: 15px; ">School Year:  <?php echo $s_y; ?> | <?php 
            if($sem == '1'){
              echo "1st Sem";
            }
            else{
              echo "2nd Sem";
            }
        ?>  
        </small>
       <section class="content">  
        <form role="form" method="post" action="<?php echo base_url();  ?>pages/regCollege/<?php echo $sem; ?>/<?php echo $base; ?>/<?php echo $count; ?>/<?php echo $other; ?>/<?php echo $mis; ?>/<?php echo $lec; ?>/<?php echo $lab; ?>/<?php echo $portal_ID; ?>">  
          <div class="row">
            <div class="col-md-6">    
                <div class="box body-info">
                  <label>Last Name</label>
                  <div class="form-group">
                    <input type="textbox" class="form-control" name="last" placeholder="Enter Last Name" required>
                  </div>
                  <label>Middle Initials</label>
                  <div class="form-group">
                    <input type="textbox" name="m_i" class="form-control" placeholder="Enter M.I">
                  </div>
                  <label>Address</label>
                  <div class="form-group">
                    <input type="textbox" name="address" class="form-control" placeholder="Enter Address" required>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
              <div class="box box-info">
                  <div class="box body-info">
                    <label>Given Name</label>
                    <div class="form-group">
                      <input type="textbox" class="form-control" name="name" placeholder="Enter Given Name" required>
                    </div>
                    <label>Contact No.</label>
                    <div class="form-group">
                    <input type="textbox" name="contact" class="form-control" placeholder="Contact No." required>
                    </div>
                    <div class="form-group">
                      <label>Course Offers</label>
                    <select class="form-control" name="course">
                    <?php 
                      if($collect_data){
                        $data = $portal_ID;
                        $field = 'portal_ID';
                        $table = 'tbl_course';
                        foreach ($this->load->model_users->get_data_course($data,$field,$table) as $values) {
                        $course = $values->course_title;
                        $code = $values->program_code;
                    ?>
                      <option value="<?php echo $code; ?>">
                        <?php echo $course; ?>
                      </option>
                  <?php }} ?>
                  </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xs-12">
              <input type="submit" class="btn btn-block btn-info btn-sm"  value="Submit">
            </div>
          </div>
        </form>
       </section>
      <?php }} ?>
      </div>
    </section>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <?php } } ?>