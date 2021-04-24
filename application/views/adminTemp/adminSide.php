
<?php
  $id = $this->session->all_userdata();
  if(isset($id['admin_session'])){
?>
    <?php 
        $this->load->model('model_users','',TRUE);
        $table='tbl_admin_info';
        $field='id';
        if(isset($id['admin_session'])){
        $data=$id['admin_session'];
          foreach ($this->load->model_users->data($table,$field,$data) as $values)
          {
            $portal_ID = $values->portal_ID;
            $lastname = $values->last_name;
            $firstname = $values->first_name;
            $profile = $values->profile;
            $admin_id = $values->admin_id;               
    ?>
  </style>

  <aside class="main-sidebar">
    <section class="sidebar">
       <!-- <div class="user-panel"> -->
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive" style="height: 150px; width: 100%;" src="<?php echo base_url(); ?>/assets/profile/<?php echo $profile;?>" alt="User Image">
        </div>
      <!-- </div> -->

      <ul class="sidebar-menu" data-widget="tree">

          <li>
            <a href="<?php echo base_url(); ?>dashboard/AdminDash/index/<?php echo $portal_ID; ?>">
              <i class="fa fa-fw fa-home"></i><span>Home</span>
            </a>
          </li>
          <li>
            <a data-toggle="modal" data-target="#edit">
              <i class="fa fa-edit"></i><span>Edit Account</span>
            </a>
          </li>
          <li>
            <a data-toggle="modal" data-target="#createClass">
              <i class="fa fa-graduation-cap"></i><span>Create ClassRoom</span>
            </a>
          </li>
          <li>
          <a href="<?php echo base_url(); ?>/page/usermail">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
          </a>
        </li>
      </ul>

     

    </section>
  </aside>


<div class="modal fade bd-example-modal-sm" id="updatePic" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">            
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <form class="profile-username text-center" method="post" action="<?php echo base_url(); ?>pages/adminPic/<?=$values->admin_id;?>" enctype="multipart/form-data" id="upload_form">  
              <div class="modal-body">
                    <img style="height: 90%; width: 100%;" id="blah" src="#" alt="Upload New Profile" />
                    <input style="font-size: 11px" type="file" id="image_file" class="profile-username text-center" name="image_file"/>
              </div>
              <div class="modal-footer">
                <a class="btn btn-default" data-toggle="modal" data-target="#edit" data-dismiss="modal"><i class="fa fa-arrow-left"></i>
                </a>
                <input type="submit" class="btn btn-info" id="upload" name="upload" value="Update">
              </div> 
            </form>   
    </div>
  </div>
</div>
  
  <div class="modal fade bd-example-modal-sm" id="change" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form action="<?php echo base_url(); ?>pages/adminPass/<?=$values->admin_id;?>" method="post">
      <div class="modal-header">            
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="form-group">
            <div class="clearfix">
              <label>Change Password</label>
            </div>
            <input type="password" id="pass" name="pass" class="form-control" required="required" placeholder="Enter Password">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" data-toggle="modal" data-target="#edit" data-dismiss="modal"><i class="fa fa-arrow-left"></i>
            </a>
        <input type="submit" class="btn btn-info" id="upload" name="upload" value="Update">
      </div>  
      </form> 
    </div>
  </div>
</div> 


<div class="modal fade" id="createClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">   
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Create Online Classroom</h4>
          </div>
          <form action="<?php echo base_url(); ?>pages/createClass/<?php echo $portal_ID; ?>/<?php echo $admin_id; ?>/<?php echo $profile; ?>/<?php echo $lastname; ?>/<?php echo $firstname; ?>" method="post">
          <div class="modal-body">
            <label>Course:</label>
              <select class="form-control" name="course">
                <?php 
                  if(isset($id['admin_session'])){
                    $portal_ID = $portal_ID;
                    foreach ($this->load->model_users->courseOffer($portal_ID) as $values) {
                      $course=$values->program_code;
                      $title=$values->course_title;
                ?>
                
                    <option value="<?php echo $course; ?>"><?php echo $title; ?></option>>
                
              <?php }} ?>
              </select>
              <label>Online Class Subject</label>
              <input type="textbox" class="form-control" name="classSubject" required="Enter Class" placeholder="Ex: ENG-1" >
              <label>Section</label>
              <input type="textbox" class="form-control" name="section" required="Enter Class">
              <label>Schedule</label>
              <input type="textbox" class="form-control" name="sched" required="Enter Class" placeholder="Ex Mon RM 106 1pm-3pm/Fri RM 108 7am-8:30pm/">
              <label>Semester</label>
                <select class="form-control" name="sem">
                  <option value="1">1st Semester</option>
                  <option value="2">2nd Semester</option>
                  <option value="3">Summer Class</option>
                </select>
              <label>Year</label>
                <select class="form-control" name="year">
                  <option value="1">1st Year</option>
                  <option value="2">2nd Year</option>
                  <option value="3">3rd Year</option>
                  <option value="4">4th Year</option>
                  <option value="5">5th Year</option>
                </select>
          </div>
          <div class="modal-footer">
              <input type="submit" class="bnt btn-block btn-sm btn-success" name="Create">  
          </div>
          </form>
    </div>
  </div>
</div>


  <?php }}?>
  <?php } ?>

  <div class="modal fade bd-example-modal-sm" id="edit" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">            
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <a class="btn btn-primary pull-right btn-block btn-sm" data-toggle="modal" data-target="#updatePic" class="close" data-dismiss="modal"><i class="fa fa-picture-o"></i> Update Profile Picture</a>
          <a class="btn btn-primary pull-right btn-block btn-sm" data-toggle="modal" data-target="#change" class="close" data-dismiss="modal"><i class="fa  fa-user-secret"></i> Change Password</a>
        </div>
      </div>
      <div class="modal-footer">
      </div>   
    </div>
  </div>
</div>


 
 