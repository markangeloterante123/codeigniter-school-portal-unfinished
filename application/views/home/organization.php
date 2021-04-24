

    <?php 
        if($collect_data){ 
        foreach ($collect_data as $values) {
            $portal_ID=$values->portal_ID;
            $alias =$values->alias;
            $background = $values->background;
                                    
    ?>
    <div class="breadcumb-area">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item">About</li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $alias; ?> Organization</li>
            </ol>
        </nav>
    </div>

    <div class="clever-catagory blog-details bg-img d-flex align-items-center justify-content-center p-3 height-400" style="background-image: url(<?php echo base_url(); ?>/assets/img/<?php echo $background; ?>);">
       
    </div>

    <section class="top-teacher-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3><?php echo $alias; ?> list of Professor</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                            if($collect_data){ 
                                $data  = $portal_ID;
                                $field = "portal_ID";
                                $table = "tbl_admin_info";
                                foreach ($this->load->model_users->portaldata($table,$field,$data) as $values){
                                    $name = $values->first_name;
                                    $last = $values->last_name;
                                    $profile = $values->profile;
                                    $dep = $values->department;
                        ?>
                <div class="col-12 col-md-6 col-lg-4">    
                    <div class="single-instructor d-flex align-items-center mb-30">
                        <div class="instructor-thumb">
                            <img src="<?php echo base_url(); ?>assets/profile/<?php echo $profile ?>" alt="">
                        </div>
                        <div class="instructor-info">
                            <h5><?php echo $name; echo " "; echo $last;  ?></h5>
                            <span>
                                <?php
                                    if($dep == 1 ){
                                        echo 'Professor';
                                    }
                                    else{
                                        echo 'Department';
                                    } 
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
        </div>
    </section>
    <?php }} ?>

    <script src="<?php echo base_url(); ?>/assets/page/js/active.js"></script>