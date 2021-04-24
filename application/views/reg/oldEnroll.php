

<?php 
  if($collect_data){
    foreach ($collect_data as  $values) {
     $portal_ID = $values->portal_ID;
      $alias = $values->alias;
      $name = $values->Name;
      $campus = $values->Campus;
      $logo = $values->Logo;
      $contact = $values->contactNo;
      $email = $values->email;
?>
<div class="content-wrapper">
  <section class="content">
  <section class="invoice">
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
      </div>
      <?php echo $student_id; ?>
    <div class="row invoice-info">

      <?php 
        if($student_id){
          $data = $student_id;
          $data2 = $portal_ID;
          $table = 'tbl_student_info';
          foreach ($this->load->model_users-> portalDataRegister($data,$data2,$table) as $values) {
            $id = $values->student_id;
            $f_name = $values->first_name;
            $m_i =$values->m_i;
            $l_name=$values->last_name;
            $course=$values->course;
      ?>
      <div class="col-sm-4 invoice-col">
        <label>Student ID:
        <small><?php echo $id; ?></small>
        </label>
        <br>
        <label>Name:
          <small><?php echo $f_name; echo " "; echo $m_i; echo " "; echo $l_name; ?></small>
        </label><br>
        <label>Course:
          <small><?php echo $course; ?></small>
        </label>
      </div>
      <?php
              $this->load->model('model_users','', TRUE); 
              if($collect_data){
                $data=$portal_ID;
                $field='portal_ID';
                $table="tbl_counter";
                  foreach ($this->load->model_users->data($table,$field,$data) as $values){
                  $sem=$values->semester;
                  $date=$values->date;
                  $s_y=$values->schoolYear;
                  $other=$values->other_fee;
                  $mis=$values->mis_fee;
                  $lec=$values->lec_fee;
                  $lab=$values->lab_fee;

            ?>
      <div class="col-sm-4 invoice-col">
        <label>Semester:
          <small><?php 
          if($sem ==1){
            echo '1st sem';
          }
          else{
            echo '2nd Sem';
          } 
          ?></small>
        </label>
        <br>
        <label>Date:
          <small><?php echo $date; ?></small>
        </label>
      </div>
      <div class="col-sm-4 invoice-col">
        <label>School Year:
          <small><?php echo $s_y; ?></small>
        </label>
      </div>
      <?php }} ?>
    </div>
    <br>
    <input type="hidden" name="data" value="<?php echo $id; ?>">
    <input type="hidden" name="portal_ID" value="<?php echo $portal_ID; ?>">

    <button type="button" class="btn btn-default btn-lrg" data-toggle="modal" data-target="#cancel_enroll" >
        <i class="fa fa-spin fa-refresh"></i>&nbsp; List of Enroll Subject
    </button>
   <br><br>
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table  class="table table-striped" border="1px">
           <thead>
          <tr>
            <th style="text-align: center;">No.</th>
            <th style="text-align: center;">Code</th>
            <th style="text-align: center;">Course Title</th>
            <th style="text-align: center;">Require</th>
            <th style="text-align: center;">Year</th>
            <th style="text-align: center;">Sem</th>
            <th style="text-align: center;">Lec</th>
            <th style="text-align: center;">Lab</th>
            <th style="text-align: center;">Unit</th>
            <!-- <th>Grades</th> -->
            <th style="text-align: center;">Action</th>
          </tr>
          </thead>
          <tbody class="ajax-content">
          </tbody>
        </table>
      </div>
    </div> 
    <hr>

    <!--modal-->
    <div id="cancel_enroll" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">            
            <h4 class="modal-title">List of subject</h4>
          </div>
          <div class="modal-body">
          <!--body-->          
            <div class="row">
              <div class="col-xs-12 table-responsive">
                <label>Enrolled Subject</label>
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Code</th>
                    <th>Course Title</th>
                    <th>Lec|</th>
                    <th>|Lab|</th>
                    <th>|Unit|</th>
                    <th>Gd</th>
                    <th>Yr/Sem</th>
                    <th>Status</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                  </thead>
                  <tbody class="ajax-enroll">
                  </tbody>
                </table>
              </div>
            </div> 

          </div>
          <div class="modal-footer">
            <div class="row">
              <div class="col-xs-12">
                  <a class="btn btn-warning" data-dismiss="modal" value="Close">Close</a>
                  <a href="<?php echo base_url(); ?>pages/trans_enroll/<?php echo $id; ?>/<?php echo $other; ?>/<?php echo $mis; ?>/<?php echo $lec ?>/<?php echo $lab; ?>/<?php echo $portal_ID; ?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              </div>
            </div>
           
          </div>
      </div>
    </div>
  </div>

    <?php }} ?>

  </section>
  </section>
</div>
<?php }} ?>


