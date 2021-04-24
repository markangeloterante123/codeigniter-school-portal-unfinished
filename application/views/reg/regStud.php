
<?php 
  if($collect_data){
    foreach ($collect_data as $values) {
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

     <div class="row invoice-info">
      <?php 
        if($student_id){
          $data = $student_id;
          $data2 = $portal_ID;
          $table = 'tbl_student_info'; 
          foreach ($this->load->model_users->portalDataRegister($data,$data2,$table) as $values) {
            $id = $values->student_id;
            $f_name = $values->first_name;
            $m_i =$values->m_i;
            $l_name=$values->last_name;
            $course=$values->course;
      ?>

      <div class="col-sm-4 invoice-col">
        <label>Student ID:
        <small><?php echo $id; ?></small>
        </label><br>
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
   
  <!-- ajax display sa taas -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Code</th>
            <th>Course Code</th>
            <th>Course Discreption</th>
            <th>Lec</th>
            <th>Lab</th>
            <th>Unit</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $this->load->model('model_users','', TRUE); 
              if($collect_data){
                $data=$id;
                $data2 = $portal_ID;
                $field="student_id";
                $table="tbl_student_records";
               
                  foreach ($this->load->model_users->data_print($table,$field,$data,$data2) as $values){
                  $portal_ID = $values->portal_ID;
                  $course=$values->course_code;
                  $title=$values->course_title;
                  $lec=$values->lec;
                  $lab=$values->lab;
                  $unit=$values->unit;
                  $status=$values->status;
                  

            ?>
          <tr>
            <td><?php echo $portal_ID; ?></td>
            <td><?php echo $course; ?></td>
            <td><?php echo $title; ?></td>
            <td><?php echo $lec; ?></td>
            <td><?php echo $lab; ?></td>
            <td><?php echo $unit; ?></td>
            <td><?php echo 'Enrolled'; ?></td>
          </tr>
            <?php }} ?>
          </tbody>
        </table>
      </div>
    </div> 

    <div class="row">
        <div class="col-xs-12">
              <a style="margin-top: 15px;" href="<?php echo base_url(); ?>pages/printReg/<?php echo $id; ?>/<?php echo $portal_ID; ?>" class="btn btn-default"><i class="fa fa-print"></i> Print</a>  
        </div>
    </div>
    <?php }} ?>

  </section>
  </section>
</div>

<?php }} ?>


