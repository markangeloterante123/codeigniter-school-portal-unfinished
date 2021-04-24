<script>
        function key_code(){
             swal({
               title: "Success!",
               text: "Welcome Student",
               type: "success",
               showCancelButton: false,
               confirmButtonColor: "#8abb6f",
               confirmButtonText: "Ok",
               closeOnConfirm: false
             },
             function(){
                window.open("<?php echo base_url(); ?>pages/student/<?php echo $portal_ID; ?>","_self");
               //history.back();

             });
         }
     </script>
    
    <body onload="key_code()">
    </body>