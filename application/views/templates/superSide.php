
<!--sidebar-->
<?php 
  if($collect_data){
    foreach ($collect_data as $values) {
      $portal_ID = $values->portal_ID;
      $logo = $values->Logo;
      $alias =$values->alias;
?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-home"></i> <span>Home</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>dashboard/SuperDash/index/<?php echo $portal_ID; ?>"><i class="fa fa-graduation-cap"></i>Student Lists</a></li>
            <li><a href="<?php echo base_url(); ?>pages/proflist/<?php echo $portal_ID; ?>"><i class="fa fa-users"></i>Professor lists </a></li>
            <li><a href="<?php echo base_url(); ?>pages/portalWall/<?php echo $portal_ID; ?>"><i class="fa fa-university"></i>Portal Wall </a></li>
            <li><a href="<?php echo base_url(); ?>pages/portalModules/<?php echo $portal_ID; ?>"><i class="fa fa-book"></i>Portal Modules </a></li>
          </ul>
        </li>
       
       <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>Course Curriculum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>pages/listcourse/<?php echo $portal_ID; ?>"><i class="fa  fa-th-list"></i>List of Course</a></li>
            <li><a href="<?php echo base_url(); ?>pages/editcurriculom/<?php echo $portal_ID; ?>"><i class="fa fa-tasks"></i>Edit Curriculum</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i> <span>Edit myPORTAL Info</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a data-toggle="modal" data-target="#updateLogo"><i class="fa  fa-gears"></i>my Logo</a></li>
            <li><a data-toggle="modal" data-target="#updateBackground" ><i class="fa  fa-gears"></i>my Background</a></li>
            <li><a data-toggle="modal" data-target="#Mission"><i class="fa  fa-gears"></i>Mission/Vission/About</a></li>
            
          </ul>
        </li>
        <li>
          <a data-toggle="modal" data-target="#posted"><i class="fa fa-bullhorn"></i><span>School Announcement</span>
          </a>
        </li>
        <li>
          <a data-toggle="modal" data-target="#addProf">
            <i class="fa fa-users"></i> <span>Add Professor</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>pages/registrar/<?php echo $portal_ID; ?>">
            <i class="fa fa-user-plus"></i> <span>Student Registration</span>
          </a>
        </li>
        
        
      </ul>
    </section>
  </aside>

<!-- upload logo -->
<div class="modal fade bd-example-modal-sm" id="updateLogo" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">            
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
      <form class="profile-username text-center" method="post" action="<?php echo base_url(); ?>pages/myPortalLogo/<?=$values->portal_ID;?>" enctype="multipart/form-data" id="upload_form">  
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
<!-- upload background -->
<div class="modal fade bd-example-modal-sm" id="updateBackground" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">            
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            
          </div>
      <form class="profile-username text-center" method="post" action="<?php echo base_url(); ?>pages/myPortalBackground/<?=$values->portal_ID;?>" enctype="multipart/form-data" id="upload_form">  
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
<!-- mission  -->
<div class="modal fade bd-example-modal-lg" id="Mission" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
            <h4 class="modal-title">Create</h4>
      </div>
      <div class="modal-body">
        <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">
                <small></small>
              </h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="box-body pad">
              <form action="<?php echo base_url(); ?>pages/missionPortal/<?php echo $portal_ID; ?>" method="post">  
                    <label>Type of Post</label>
                    <select style="text-align: center;" type="textbox" class="form-control" name="option" id="option">
                        <option style="text-align: center;" value="1">Mission</option>
                        <option style="text-align: center;" value="2">Visson</option>
                        <option style="text-align: center;" value="3">About</option>
                        <option style="text-align: center;" value="4">Post Announce</option>
                    </select>
                    <textarea id="editor1" name="editor1" rows="10" cols="80">                                           
                    </textarea>
                    <div class="box-footer">
                      <div class="pull-right">
                        <a class="btn btn-warning" data-dismiss="modal"><i class="fa fa-remove"></i>Close</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                      </div>
                    </div>
              </form>
            </div>
          </div>
      </div> 
    </div>
  </div>
</div>



<div class="modal fade bd-example-modal-sm" id="addProf" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">            
            <h4 class="modal-title">Add Professor</h4>
      </div>
      <form action="<?php echo base_url(); ?>pages/add_professor" method="post">
      <div class="modal-body">
        <img 
        style="width: 100px; height: 100px; border: 1px solid black; background: #FFFADC; display: block;margin-left: auto;margin-right: auto;
          width: 50%; border-radius: 50%;" 
        src="<?php echo base_url(); ?>assets/profile/proficon.png">
        <label>First Name</label>
        <input type="textbox" class="form-control" id="f_name" name="f_name" required>
        <label>M.I</label>
        <input type="textbox" class="form-control" id="m_i" name="m_i">
        <label>Last Name</label>
        <input type="textbox" class="form-control" id="l_name" name="l_name"required>
        <label>Admin ID</label>
        <input type="textbox" class="form-control" id="id" name="id"required>
        
      </div>
      <div class="modal-footer">
        <a style="margin-left: 15px;" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i>Cancel</a>
        <input type="submit" class="btn btn-warning" Value="Add">
      </div>
      </form> 
    </div>
  </div>
</div>

<div class="modal fade" id="posted" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Post Announcement</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url(); ?>pages/post_registrar/<?php echo $portal_ID; ?>/<?php echo $alias ?>/<?php echo $logo; ?>" enctype="multipart/form-data" id="upload_form">  
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

<div class="modal fade" id="module" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Add Module</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url(); ?>pages/post_modules/<?php echo $portal_ID; ?>" enctype="multipart/form-data" id="upload_form">  
          <div class="modal-body">
               <div class="form-group">
                  <label for="message-text" class="col-form-label">Module Title:</label>
                  <textarea  class="form-control" id="title" name="title"></textarea>
              </div>
              <div class="form-group">
                <label>Published by:</label>
                <input type="text" class="form-control" name="publish" >
              </div>
              <div class="form-group">
                <label>Files:</label>
                <input class="form-control" type="file" id="image_file" class="profile-username text-center" name="image_file"/>
              </div>
          </div>
          <div class="modal-footer">
            <a class="btn btn-default" data-dismiss="modal">Cancel</a>
            <input type="submit" class="btn btn-success" id="upload" name="upload" value="Add">
          </div> 
        </form> 
        </div> 
    </div>
  </div>
</div>

<?php }} ?>