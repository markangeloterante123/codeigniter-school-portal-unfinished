

<?php
  $id = $this->session->all_userdata();
  if(isset($id['user_session'])){
?>
<?php 
                    $this->load->model('model_users','',TRUE);
                    $table='tbl_student_info';
                    $field='id';
                    if(isset($id['user_session'])){
                    $data=$id['user_session'];
                      foreach ($this->load->model_users->data($table,$field,$data) as $values)
                      {
                        $student_id = $values->student_id;
                        $lname = $values->last_name;
                        $fname = $values->first_name; 
                        $portal_ID = $values->portal_ID;
                        $profile = $values->profile;              
                      ?>

<input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
<input type="hidden" name="portal_ID" value="<?php echo $portal_ID; ?>">
<input type="hidden" name="profile" value="<?php echo $profile; ?>">
<input type="hidden" name="name" value="<?php echo $lname.'-'.$fname; ?>">

<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <ul class="nav nav-tabs">

              <li class="active"><a href="#wall" data-toggle="tab">Wall</a></li>
              <li><a href="#checklist" data-toggle="tab">list</a></li>
              <li><a href="#joinClass" data-toggle="tab">Join Class</a></li>
              <li><a href="#myCourse" data-toggle="tab">My Class</a></li>
            </ul>
            <div class="tab-content">
              <input type="hidden" name="id">
              <input type="hidden" name="portal">
             <div class="active tab-pane postRegistrar" id="wall">

            </div>
              
              <!--create class-->
                <input type="hidden"  id="data" name="data" value="2001-00001">
                <div class="tab-pane" id="checklist">
                  <div class="user-block">
                    <h3>View Check List</h3>
                  </div>
                    <div class="box-body">
                          <table  class="table table-bordered table-striped" style="font-size: 12px;">
                            <thead>
                            <tr>
                              <th style="text-align: center;">No.</th>
                              <th style="text-align: center;">Code</th>
                              <th style="text-align: center;">Course Title</th>
                              <th style="text-align: center;">Require</th>
                              <th style="text-align: center;">Year</th>
                              <th style="text-align: center;">Unit</th>
                              <th style="text-align: center;">Grades</th>
                              
                            </tr>
                            </thead>

                            <?php 
                              $i=0;
                              if(isset($id['user_session'])){
                                $data=$student_id;
                                $data2 = $portal_ID;
                                foreach ($this->load->model_users->grades($data,$data2) as $value){
                                   $i=($i+1);
                                   $code=$value->course_code;
                                   $course=$value->course_title;
                                   $req =$value->prerequisite;
                                   $yr=$value->year;
                                   $sm=$value->sem;
                                   $lec=$value->lec;
                                   $lab=$value->lab;
                                   $unit=$value->unit;
                                   $grades=$value->grades;

                              ?>
                            <tbody>
                              <tr>
                                <td style="text-align: center;"><?php echo $i; ?></td>
                                <td style="text-align: center;"><?php echo $code; ?></td>
                                <td style="text-align: center;"><?php echo $course; ?></td>
                                <td style="text-align: center;"><?php echo $req; ?></td>
                                <td style="text-align: center;"><?php echo $yr; echo "yr/ "; echo $sm; echo "sm"; ?></td>
                                <td style="text-align: center;"><?php echo $unit; ?></td>
                                <td style="text-align: center;"><?php 
                                  if($grades == 4){
                                    echo 'Conditional';
                                  }
                                  else if($grades == 5){
                                    echo 'Failed';
                                  }
                                  else if($grades >= 1){
                                    echo $grades;
                                  }
                                  else{
                                    echo "";
                                  }

                                 ?></td>
                              </tr>                              
                            </tbody>
                          <?php }} ?>
                          </table>
                  </div>
              </div>
              <!-- for displaying all my class -->
               <div class="tab-pane" id="myCourse">
                  <div class="user-block">
                    <h3>Classroom</h3>
                  </div>
                    <div class="box-body">
                           <table  class="table table-bordered table-striped" style="font-size: 16px;">
                            <thead>
                            <tr>
                              <th>No.</th>
                              <th>Schedule</th>
                              <th>Proffessor</th>
                              <th>Course</th>
                              <th>Section</th>
                              <th>Subject</th>
                              <th>Semester</th>
                              <th>Year</th>
                              <th>Status</th>
                              <th>Action</th>        
                            </tr>
                            </thead>
                            <tbody class="ajax_class_join">
                              
                            </tbody>
                          </table>
                  </div>
              </div>
               <div class="tab-pane" id="joinClass">
                  <div class="user-block">
                    <h3>Join Classroom</h3>
                  </div>
                    <div class="box-body">
                         <div class="box">
                            <div class="box-header">
                             
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th>Schedule</th>
                                  <th>Course</th>
                                  <th>Section</th>
                                  <th>Subject</th>
                                  <th>Status</th>
                                  <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if($collect_data){
                                        $data= $portal_ID;
                                        foreach ($this->load->model_users->portal_show_classroom($data) as $values) {
                                       $sched = $values->sched;
                                       $course = $values->course_title;
                                       $sec = $values->section;
                                       $sub = $values->class_sub;
                                       $code = $values->class_code;
                                  ?>
                                <tr>
                                    <td><?php echo $sched; ?></td>
                                    <td><?php echo $course; ?></td>
                                    <td><?php echo $sec; ?></td>
                                    <td><?php echo $sub; ?></td>
                                    <td><a><i class="fa fa-circle text-success"></i> Active</a></td>
                                    <td><a href="<?php echo base_url(); ?>pages/joinClassRoom/<?php echo $code; ?>/<?php echo $portal_ID; ?>/<?php echo $student_id; ?>/<?php echo $lname; ?>/<?php echo $fname; ?>/<?php echo $profile; ?>" class="btn btn-block btn-sm btn-warning">Join</a></td>
                                </tr>
                               <?php }} ?>
                                </tbody>

                              </table>
                            </div>
                            <!-- /.box-body -->
                          </div> 
                  </div>

              </div>
            </div>
        </div>
      </div>
    </section>
  </div>


  <div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h3 class="modal-title" id="exampleModalLabel">Comment Box</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <input type="text" id="id" name="id"> -->
        <div class="commentPost">
          
        </div>
        <div class="commentBox">
          
        </div>
      </div> 
    </div>
  </div>
</div>

  <?php }} ?>
  <?php } 



  