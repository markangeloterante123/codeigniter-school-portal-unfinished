
         
  <?php 
    if($collect_data){
      foreach ($collect_data as $values) {
        $portal_ID = $values->portal_ID; 
  ?>

  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Student List</h3>
            </div>
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Student Name</th>
                  <th>Student Lastname</th>
                  <th>Email</th>
                  <th>Course</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <input type="hidden" id="portal_ID" name="portal_ID" value="<?php echo $portal_ID; ?>">
                <tbody class="online_request_student"> 
                  
               </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php }} ?>
