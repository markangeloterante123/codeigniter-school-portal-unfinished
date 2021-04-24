
<?php 
  if($collect_data){
    foreach ($collect_data as  $values) {
      $portal_ID = $values->portal_ID;
      $alias = $values->alias;
?>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      <th>Code</th>
                      <th>Course Title</th>
                      <th>Lec</th>
                      <th>Lab</th>
                      <th>Unit</th>
                      <th>Required</th>
                      <th>sem</th>
                      <th>year</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    
                    <tbody class="course_subject">
                     
                      <?php 
                      if($title){
                        $portal_ID = $portal_ID;
                        $data = $title;
                        $table = 'tbl_course';
                        $field = 'program_code';
                        foreach ($this->load->model_users->course($table,$field,$data,$portal_ID) as $values){
                          $code=$values->course_code;
                          $portal_ID =$values->portal_ID;
                          $course=$values->course_title;
                          $lec=$values->lec;
                          $lab=$values->lab;
                          $unit=$values->unit;
                          $req=$values->prerequisite;
                          $sem=$values->sem;
                          $year=$values->year;

                          if($year == 1){
                            if($sem ==1){
                              $color="#00ffff";
                            }else{
                              $color="#7fffd4";
                            }
                          }
                          elseif($year == 2){
                            if($sem ==1){
                              $color="#87ceeb";
                            }else{
                              $color="#add8e6";
                            }
                          }
                          
                          elseif($year == 3){
                            if($sem ==1){
                              $color="#d8bfd8";
                            }elseif($sem ==2){
                              $color="#dda0dd";
                            }
                            else{
                              $color="white";
                            }
                          }

                          else{
                            if($sem ==1){
                              $color="#ff7f50";
                            }else{
                              $color="#ff4500";
                            }
                          }
                      ?>
                      <tr style="background-color: <?php echo$color ?>; ">
                        <td><?php echo $portal_ID; ?></td>
                        <td><?php echo $code; ?></td>
                        <td><?php echo $course; ?></td>
                        <td><?php echo $lec; ?></td>
                        <td><?php echo $lab; ?></td>
                        <td><?php echo $unit; ?></td>
                        <td><?php echo $req; ?></td>
                        <td><?php echo $sem; ?>sem</td>
                        <td><?php echo $year; ?>year</td>
                        <td><input type="button" data-toggle="modal" data-target="" class="btn btn-block btn-warning btn-sm" value="Edit"></td>
                      </tr>
                    <?php } } ?>
                 </tbody>

                  </table>
                  <input type="button" data-toggle="modal" data-target="#userModal" class="btn btn-block btn-success btn-sm" value="Add Subject"></td>
                 
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
             
            <h4 class="modal-title"><?php echo $alias." - ";?>Add Subject</h4>
          </div>
          <div class="modal-body">
             
               
               <form method="post" action="<?php echo base_url(); ?>pages/addCourse/<?php echo $title; ?>/<?php echo $portal_ID; ?>">
                   
                <div class="form-group">
                    <label>Course Code</label>
                    <input type="text" id="" name="code" class="form-control" required />
                    <label>Course Title</label>
                    <input type="text" id="" name="course" class="form-control" required />

                    <label>Subject Information</label>
                    <table border="1">
                      <tbody>
                        <tr>
                          <td>
                            <label>Require Subject</label>
                             <input type="textbox" name="req" placeholder="Enter Required " class="form-control" required>
                          </td>
                          <td>
                            <label>Lec Unit</label>
                             <select name="lec" id="lec" class="form-control" >
                              <option value = "0">0 unit</option>
                              <option value = "1">1 unit</option>
                              <option value = "2">2 unit</option>
                              <option value = "3">3 unit</option>
                              </select>
                          </td>
                          <td>
                            <label>Lab Unit</label>
                             <select name="lab" id="lab" class="form-control">
                              <option value = "0">0 unit</option>
                              <option value = "1">1 unit</option>
                              <option value = "2">2 unit</option>
                              <option value = "3">3 unit</option>
                            </select>
                          </td>
                          <td>
                             <label>Semester</label>
                              <select name="sem" id="sem" class="form-control">
                          <option value = "1">1st Sem</option>
                          <option value = "2">2nd Sem</option>
                          <option value = "3">Summer</option>
                            </select>
                          </td>
                          <td>
                            <label>Year Level</label>
                           <select name="year" id="year" class="form-control">
                          <option value = "1">1st Year</option>
                          <option value = "2">2nd Year</option>
                          <option value = "3">3rd Year</option>
                          <option value = "4">4th Year</option>
                          </select>

                          </td>
                        </tr>
                      </tbody>
                    </table>
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