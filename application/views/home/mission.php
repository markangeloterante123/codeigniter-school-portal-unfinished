
    <div class="breadcumb-area">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="#">About</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mission &amp; Vission</li>
            </ol>
            

        </nav>
    </div>

    <?php 
        if($collect_data){ 
        foreach ($collect_data as $values) {
            $mission = $values->mission;
            $vission = $values->vission;
            $about = $values->about;
            $background = $values->background;
                                    
    ?>

    <div class="clever-catagory blog-details bg-img d-flex align-items-center justify-content-center p-3 height-400" style="background-image: url(<?php echo base_url(); ?>/assets/img/<?php echo $background; ?>);">
    </div>
    <div class="blog-details-content section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="blog-details-text">
                        <h4>Mission &amp; Vission</h4>
                        <p style="margin-top: 40px;"><?php echo $mission."  ".$vission; ?></p>

                        
                        <p style="margin-top: 40px;"><?php echo $about; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }} ?>
  <script src="<?php echo base_url(); ?>/assets/page/js/active.js"></script>