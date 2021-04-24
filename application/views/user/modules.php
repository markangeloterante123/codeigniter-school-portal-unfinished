
         
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
              <h3 ><i class="fa fa-book"></i>Modules</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Publish</th>
                  <th>Action</th>
                </tr>
                </thead>       
                <tbody>
                   <?php 
                    if($collect_data){
                      $data = $portal_ID;
                      $field= 'portal_ID';
                      $table= 'tbl_portal_modules';
                      foreach ($this->load->model_users->data($table,$field,$data) as  $values) {
                       $title=$values->title;
                       $publish=$values->publish;
                       $file = $values->file;
                       $i = '0';
                       $id = $values->id;
                   ?>
                   <td><?php echo ($i+'1'); ?></td>
                   <td><?php echo $title; ?></td>
                   <td><?php echo $publish; ?></td>
                   <td><a href="<?php echo base_url(); ?>pages/downloadModules/<?php echo $file; ?>" class="btn btn-block btn-info">Download</a></td>
                 <?php }} ?>
               </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php }} ?>
