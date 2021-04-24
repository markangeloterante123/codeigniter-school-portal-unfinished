
<?php 
  if($collect_data){
   foreach ($collect_data as  $values) {
     $portal_ID = $values->portal_ID;
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>

        <?php 
          $table="tbl_class";
          $field="class_code";
          $data=$class_code;
          if($collect_data){
            foreach ($this->load->model_users->data($table,$field,$data) as $value) {
                $class = $value->class_sub;
                $section = $value->section; 
                 
        ?>
        Subject:    <a style="color:blue;"><?php echo $class; ?></a> <br>
        Section:    <?php echo $section; ?>
      <?php }} ?>

        <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>">
        <input type="hidden" name="profile" value="<?php echo $profile; ?>">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="class_code" value="<?php echo $class_code; ?>">
        <input type="hidden" name="portal_ID" value="<?php echo $portal_ID; ?>">
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">        
          <!-- /.box -->
          
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#posted">Class Announcement</button>
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ActivityPost"> Activity</button>
            </div>
            <!-- /.box-header -->
            <div class="ajax_display">
            <div class="box-body">
              <strong><i class="fa fa-university"></i>Class Members</strong>
              <hr>
              <div class="ajax_student">
         
              </div>
              <hr>
              <p>Request for Approval <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-danger ajax_notification"></span>
             </a></p>

            </div>
            </div>
              <div class="ajax_button_display">
              </div>
              
            <!-- /.box-body -->
          </div>

            <div class="box box-primary">
              <div class="box-header with-border">
                <a href="#" class="btn btn-block btn-success"><h3 class="box-title">View Student Performance</h3></a>
              </div>
            </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Class Wall</a></li>
              <li><a href="#timeline" data-toggle="tab">Actvity Wall</a></li>
              <li><a href="#settings" data-toggle="tab">Class Open Forum</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane displayAllpost" id="activity">
                <!-- Post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                  <div class="user-block">
                  </div>
                    <div class="box-body">
                         <div class="box">
                            <div class="box-header">
                             
                            </div>
                    <div class="box-body">
                          <table  class="table table-bordered table-striped" style="font-size: 16px;">
                            <thead>
                            <tr>
                              <th style="text-align: center;">No.</th>
                              <th style="text-align: center;">Title</th>
                              <th style="text-align: center;">Activity ID</th>
                              <th style="text-align: center;">Deadline</th>
                              <th style="text-align: center;">Status</th>
                              <th style="text-align: center;">Action</th>
                            </tr>
                            </thead>
                            <tbody class="activity_post">
                                                         
                            </tbody>
                     
                          </table>
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
              
                <div  class="box box-success">
                  <div class="box-header">
                    <i class="fa fa-comments-o"></i>
                    <h3 class="box-title">Chat</h3>
                  </div>
                  <div   class="box-body chat" id="chat-box">
                    <!-- chat item -->
                      <div  class="ajax_chat">
                        <!--here chat-->
                      </div>
                    <!-- /.item -->
                  </div>
                  <!-- /.chat -->
                  <div class="box-footer">
                    <div class="input-group">
                      <input class="form-control" name="message" id="message" placeholder="Type message...">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-success sent"><i class="fa fa-send">Sent</i></button>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>



  <div class="modal fade studentRequest" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">            
            <h4 class="modal-title">
              Student Request to Join Classs
            </h4>
      </div>
      <div class="modal-body">
          <table>
            <thead>
              <th>Student Name</th>
             
            </thead>
            <tbody class="ajax_student_offline">
              
            </tbody>
          </table>  
      </div>    
      <div class="modal-footer"> 
        <input type="button" class="btn btn-warning" data-dismiss="modal" value="close">
      </div>
  </div>
</div>
</div>


<div class="modal fade" id="ActivityPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Activity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url(); ?>pages/upload_file_activity/<?php echo $portal_ID; ?>/<?php echo $class_code ?>/<?php echo $name; ?>/<?php echo $profile; ?>" enctype="multipart/form-data" id="upload_form">  
          <div class="modal-body">
              
              <div class="form-group">
                <label>Activity Title</label>
                <input type="textbox" id="activity" name="activity" class="form-control" required>
              </div>
               <div class="form-group">
                  <label for="message-text" class="col-form-label">Instruction:</label>
                  <textarea class="form-control" id="instruction" name="instruction"></textarea>
              </div>
              <div class="form-group">
                <label>Files:</label>
                <input class="form-control" type="file" id="image_file" class="profile-username text-center" name="image_file"/>
              </div>
              <div class="form-group">
                <label>Files Type: Please Properly indecate what File type</label>
                <select class="form-control" name="type">
                  <option value="0">No File Post Only</option>
                  <option value="1">Documents File</option>
                  <option value="2">Image File</option>
                  <option value="3">Video File</option>
                </select>
              </div>
              <div class="form-group">
                <label>Deadline</label>
                <input type="date" id="Deadline" name="Deadline" class="form-control" required>
              </div> 
          </div>
          <div class="modal-footer">
            <a class="btn btn-default" data-dismiss="modal">Cancel</a>
            <input type="submit" class="btn btn-info" id="upload" name="upload" value="Update">
          </div> 
        </form> 
        </div> 
    </div>
  </div>
</div>

<div class="modal fade" id="posted" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Post Class Announcement</h3>
        <p class="text-danger" style="background: lightblue;">Post Here wont appear in your activity wall</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url(); ?>pages/post_clas_announce/<?php echo $portal_ID; ?>/<?php echo $class_code ?>/<?php echo $name; ?>/<?php echo $profile; ?>" enctype="multipart/form-data" id="upload_form">  
          <div class="modal-body">
               <div class="form-group">
                  <label for="message-text" class="col-form-label">Announcement:</label>
                  <textarea style="height: 150px;" class="form-control" id="instruction" name="instruction"></textarea>
              </div>
              <div class="form-group">
                <label>Files:</label>
                <input class="form-control" type="file" id="image_file" class="profile-username text-center" name="image_file"/>
              </div>
              <div class="form-group">
                <label class="">Files Type:</label>
                <select class="form-control" name="type">
                  <option value="0">No File Post Only</option>
                  <option value="1">Documents File</option>
                  <option value="2">Image File</option>
                  <option value="3">Video File</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-default" data-dismiss="modal">Cancel</a>
            <input type="submit" class="btn btn-info" id="upload" name="upload" value="Update">
          </div> 
        </form> 
        </div> 
    </div>
  </div>
</div>

<div class="modal fade" id="openFileLocation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Student Submitted files</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" name="myportal">
          <input type="hidden" name="class_code">
          <input type="hidden" name="activity_download">
          <div class="modal-body">
            <div class="box-body">
                <div class="box">
                <div class="box-header">
                             
                </div>
                    <div class="box-body">
                          <table  class="table table-bordered table-striped" style="font-size: 16px;">
                            <thead>
                            <tr>
                              <th style="text-align: center;">No.</th>
                              <th style="text-align: center;">Activity No.</th>
                              <th style="text-align: center;">Submitted by:</th>
                              <th style="text-align: center;">Action</th>
                            </tr>
                            </thead>
                            <tbody class="activity_post_submitted">
                                                         
                            </tbody>
                     
                          </table>
                    </div>
                  </div>
                </div>

              
          </div>
          <div class="modal-footer">
            <a class="btn btn-default" data-dismiss="modal">Cancel</a>
          </div> 
        </div> 
    </div>
  </div>
</div>




<?php }} ?>
