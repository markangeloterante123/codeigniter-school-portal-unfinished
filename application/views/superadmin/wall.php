
         
  <?php 
    if($collect_data){
      foreach ($collect_data as $values) {
        $portal_ID = $values->portal_ID; 
  ?>

  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="tab-content">
            <div class="active tab-pane postRegistrar">
              
            </div>
         </div>
        </div>
      </div>
    </section>
  </div>


  <div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <input type="hidden" name="portal_ID" value="<?php echo $portal_ID; ?>">
        <input type="hidden" name="id">
        
        <h3 class="modal-title" id="exampleModalLabel">Comment Box</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <input type="text" id="id" name="id"> -->
        <div class="commentPost">
          
        </div>
      </div> 
    </div>
  </div>
</div>

<?php }} ?>
