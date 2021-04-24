
  <div class="content-wrapper">
    <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                  <h3 style="text-align: center;" name="program">
                    <?php 
                        $this->load->model('model_users','', TRUE);
                        if($title){
                            $data=$title;
                            $table="tbl_course";
                            $field="program_code";
                          
                            foreach ($this->load->model_users->user_data_title($table,$field,$data) as $values) { 
                              $course = $values->course_title;
                              
                    ?>
                      <?php 
                        echo $course;
                      ?>
                  <?php }} ?>
                  </h3>
                </div>