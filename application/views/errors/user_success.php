<script>
        function key_code(){
             swal({
               title: "Success!",
               //text: "Welcome to PhilTech SuperAdmin Side!",
               type: "success",
               showCancelButton: false,
               confirmButtonColor: "#8abb6f",
               confirmButtonText: "Ok",
               closeOnConfirm: false
             },
             function(){
               window.open("<?php echo base_url(); ?>dashboard/UserDash/index/<?php echo $id; ?>","_self");
             });
         }
     </script>
    
    <body onload="key_code()">
    </body>