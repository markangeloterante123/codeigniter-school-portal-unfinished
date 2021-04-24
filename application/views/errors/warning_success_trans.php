<script>
        function key_code(){
             swal({
               title: "Success!",
               text: "Please Proceed to Evaluations of Transfer Grades",
               type: "success",
               showCancelButton: false,
               confirmButtonColor: "#8abb6f",
               confirmButtonText: "Ok",
               closeOnConfirm: false
             },
             function(){
                window.open("<?php echo base_url(); ?>pages/transCollege_rec/<?php echo $id; ?>/<?php echo $portal_ID; ?>","_self");
             });
         }
     </script>
    
    <body onload="key_code()">
    </body>