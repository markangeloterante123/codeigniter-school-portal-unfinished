<script>
        function key_code(){
             swal({
               title: "Success!",
                text: "Welcome to myPORTAL Registrar Side",
               //text: "Weak na Bata! login",
               type: "success",
               showCancelButton: false,
               confirmButtonColor: "#8abb6f",
               confirmButtonText: "Ok",
               closeOnConfirm: false
             },
             function(){
               window.open("<?php echo base_url(); ?>dashboard/SuperDash/index/<?php echo $id; ?>","_self");
             });
         }
     </script>
    
    <body onload="key_code()">
    </body>