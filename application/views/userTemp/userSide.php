
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
            $portal_ID =$values->portal_ID;
            $lastname = $values->last_name;
            $firstname = $values->first_name;
            $course = $values->course;
            $profile = $values->profile;
            $year = $values->year;
            $sec = $values->section;
            $status = $values->status;
            $id = $values->id;
            $student_id = $values->student_id;               
    ?>


    
  <aside class="main-sidebar">
    <section class="sidebar">
       <!-- <div class="user-panel"> -->
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive" style="height: 150px; width: 100%;" src="<?php echo base_url(); ?>/assets/profile/<?php echo $profile;?>" alt="User Image">
        </div>
      <!-- </div> -->

      <ul class="sidebar-menu" data-widget="tree">
       
          <li>
            <a href="<?php echo base_url(); ?>dashboard/UserDash/index/<?php echo $portal_ID; ?>">
              <i class="fa fa-fw fa-home"></i><span>Home</span>
            </a>
          </li>
          <li>
            <a data-toggle="modal" data-target="#edit">
              <i class="fa fa-edit"></i><span>Edit Account</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>pages/modules/<?php echo $portal_ID; ?>">
              <i class="fa fa-book"></i><span>Modules</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>pages/modules/<?php echo $portal_ID; ?>">
              <i class="fa fa-user"></i><span>Online Registration</span>
            </a>
          </li>

      </ul>

      <input type="hidden"  id="id" name="id" value="<?php echo $student_id; ?>">
      <input type="hidden"  id="data" name="data" value="<?php echo $student_id; ?>">
      

    </section>
  </aside>


<div class="modal fade bd-example-modal-sm" id="updatePic" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">            
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
      <form class="profile-username text-center" method="post" action="<?php echo base_url(); ?>pages/uploadPic/<?=$values->id;?>/<?php echo $portal_ID; ?>" enctype="multipart/form-data" id="upload_form">  
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
      <form action="<?php echo base_url(); ?>pages/changePass/<?=$values->student_id;?>/<?php echo $portal_ID; ?>" method="post">
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
         <!--  <a class="btn btn-primary pull-right btn-block btn-sm"><i class="fa fa-info-circle" ></i> Update Account Information</a> -->
          <a class="btn btn-primary pull-right btn-block btn-sm" data-toggle="modal" data-target="#change" class="close" data-dismiss="modal"><i class="fa  fa-user-secret"></i> Change Password</a>
        </div>
      </div>
      <div class="modal-footer">
      </div>   
    </div>
  </div>
</div>




 
 