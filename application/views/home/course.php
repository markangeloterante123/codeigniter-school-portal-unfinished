
<?php 
        if($collect_data){ 
        foreach ($collect_data as $values) {
            $portal_ID=$values->portal_ID;
            $alias =$values->alias;
            $background = $values->background;
            $campus =$values->Campus;
                                    
    ?>
    <div class="breadcumb-area">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item">Admissions</li>
                <li class="breadcrumb-item active" aria-current="page">Courses Offer</li>
            </ol>
        </nav>
    </div>

    <div class="clever-catagory blog-details bg-img d-flex align-items-center justify-content-center p-3 height-400" style="background-image: url(<?php echo base_url(); ?>/assets/img/<?php echo $background; ?>);">
    </div>
    <section class="popular-courses-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>List of Course Offer</h3>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php 
                if($collect_data){ 
                    $data  = $portal_ID;
                    $field = "portal_ID";
                    $table = "tbl_course";
                        foreach ($this->load->model_users->portaldata($table,$field,$data) as $values){
                            $course = $values->course_code;
                            $title = $values->course_title;
                            $logo =$values->logo;
            ?>

            
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="<?php echo base_url(); ?>/assets/img/<?php echo $logo; ?>" alt="">
                        <div class="course-content">
                            <h4><?php echo $course; ?></h4>
                            <div class="meta d-flex align-items-center">
                                <a href="#"><?php echo $alias; ?></a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#"><?php echo $campus?></a>
                            </div>
                                <h5><?php echo $title; ?></h5>
                        </div>    
                        <a data-toggle="modal" data-target="#onlineRegistration" class="btn btn-block btn-warning">Enroll</a>
                    </div>
                </div>      
            <?php }} ?>
            </div>
        </div>
    </section>

<?php 
  if($collect_data){ 
      $data  = $portal_ID;
      $field = "portal_ID";
      $table = "tbl_counter";
      foreach ($this->load->model_users->data($table,$field,$data) as $values){
          $sems = $values->semester;
          $base_id = $values->base_id;
          $id_count = $values->college_ID_counter;
          $other = $values->other_fee;
          $mis = $values->mis_fee;
          $lecture = $values->lec_fee;
          $laboratory = $values->lab_fee;
          $enrollment_status = $values->enrollment_status;
         
?>
  <div id="onlineRegistration" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form method="post" action="<?php echo base_url(); ?>pages/onlineCollegeRequest/<?php echo $sems; ?>/<?php echo $base_id; ?>/<?php echo $id_count; ?>/<?php echo $other; ?>/<?php echo $mis; ?>/<?php echo $lecture; ?>/<?php echo $laboratory; ?>/<?php echo $portal_ID; ?>/<?php echo $enrollment_status; ?>">
                          <div class="modal-header">            
                            <h4 class="modal-title">Online Registration for Incoming new Student</h4>
                          </div>
                          <div class="modal-body">          
                            <div class="form-group">
                              <label>Last Name</label>
                              <input type="textbox" id="l_name" name="l_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label>Middle Initial</label>
                              <input type="textbox" id="m_i" name="m_i" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>First Name</label>
                              <input type="textbox" id="f_name" name="f_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" id="Email" name="Email" class="form-control" required >
                            </div>
                            <div class="form-group">
                              <label>Contact No.</label>
                              <input type="textbox" id="phone" name="phone" class="form-control" required >
                            </div>
                            <div class="form-group">
                              <label>Address</label>
                              <input type="textbox" id="address" name="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label>Course</label>
                              <select class="form-control" id="course" name="course">
                                    <?php 
                                      if($collect_data){
                                        $data = $portal_ID;
                                        $field = 'portal_ID'; 
                                        $table = 'tbl_course'; 
                                        foreach ($this->load->model_users->get_data_course($data,$field,$table) as $values){
                                        $course = $values->course_title;
                                        $code = $values->program_code;
                                    ?>
                                      <option value="<?php echo $code; ?>">
                                        <?php echo $course; ?>
                                      </option>
                                  <?php }} ?>
                              </select>
                              <div class="form-group">
                                <label>Username</label>
                                <input type="textbox" id="user" name="user" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <label>Password</label>
                                <input type="Password" id="pass" name="pass" class="form-control" required>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <button type="submit" class="btn btn-success" >Register</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php }} ?>

 <?php }} ?>
 <script src="<?php echo base_url(); ?>/assets/page/js/active.js"></script>