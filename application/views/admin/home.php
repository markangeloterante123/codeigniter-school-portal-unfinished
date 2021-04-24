

<?php
  $id = $this->session->all_userdata();
  if(isset($id['admin_session'])){
?>

    <?php
      if($collect_data){
        foreach ($collect_data as $values) {
          $portal_ID = $values->portal_ID;
    ?>

        <?php
            $this->load->model('model_users','', TRUE);
            $table="tbl_admin_info";
            $field="id";
            if(isset($id['admin_session'])){
            $data=$id['admin_session'];
              foreach ($this->load->model_users->data($table,$field,$data) as $values) { 
                   $lastname = $values->last_name;
                   $firstname = $values->first_name;
                   $profile=$values->profile;
                   $admin_id = $values->admin_id;
        ?>
        
       
      

<div class="content-wrapper">
   <section class="content-header">
     
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <ul class="nav nav-tabs">
              <li class="active"><a href="#wall" data-toggle="tab">myPORTAL</a></li>
              <li><a href="#checklist" data-toggle="tab">View Class</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="wall">
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>/assets/img/logo.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Registrar</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>
                  <hr>
                  <div>
                      <h6>Terante, Mark Angelo A.</h6>
                      <p style="background-color: #e6e6fa;">
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue.
                    </p>
                       <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                  </ul>
                  </div>
                  <h5><strong>Post Comments</strong></h5>
                  <form class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        <input class="form-control input-sm" placeholder="Type a comment">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary pull-right btn-block btn-sm">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                 <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>/assets/img/logo.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Posted 5 photos - 5 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-4">
                      <img class="img-responsive" src="<?php echo base_url(); ?>/assets/img/logo.jpg" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-4">
                          <img class="img-responsive" src="<?php echo base_url(); ?>/assets/img/logo.jpg" alt="Photo">
                          <br>
                          <img class="img-responsive" src="<?php echo base_url(); ?>/assets/img/logo.jpg" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                          <img class="img-responsive" src="<?php echo base_url(); ?>/assets/img/logo.jpg" alt="Photo">
                          <br>
                          <img class="img-responsive" src="<?php echo base_url(); ?>/assets/img/logo.jpg" alt="Photo">
                        </div>
                        <div class="col-sm-4">
                          <img class="img-responsive" src="<?php echo base_url(); ?>/assets/img/logo.jpg" alt="Photo">
                          <br>
                          <img class="img-responsive" src="<?php echo base_url(); ?>/assets/img/logo.jpg" alt="Photo">
                        </div>

                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>
                  <hr>
                  <div>
                      <h6>Terante, Mark Angelo A.</h6>
                      <p style="background-color: #e6e6fa;">
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue.
                    </p>
                       <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                  </ul>
                  </div>
                  <h5><strong>Post Comments</strong></h5>
                  <form class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        <input class="form-control input-sm" placeholder="Type a comment">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary pull-right btn-block btn-sm">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
                  
        <input type="hidden" name="portal_ID" id="portal_ID" value="<?php  echo $portal_ID; ?>">
        <input type="hidden" name="admin_id" id="admin_id" value="<?php  echo $admin_id; ?>">
                <!--create class-->
               <!--  <input type="hidden"  id="data" name="data" value="2001-00001"> -->
                <div class="tab-pane" id="checklist">
                  <div class="user-block">
                    <h3>List of Class</h3>
                  </div>
                    <div class="box-body">
                          <table  class="table table-bordered table-striped" style="font-size: 16px;">
                            <thead>
                            <tr>
                              <th>No.</th>
                              <th>Schedule</th>
                              <th>Course</th>
                              <th>Section</th>
                              <th>Subject</th>
                              <th>Semester</th>
                              <th>Year</th>
                              <th>Status</th>
                              <th>Action</th>        
                            </tr>
                            </thead>
                            <tbody class="ajax_my_class_display">
                              
                            </tbody>
                          </table>
                  </div>
              </div>

            </div>
        </div>
      </div>
    </section>
  </div>
      <?php }} ?>
    <?php }} ?>
  <?php } ?>
