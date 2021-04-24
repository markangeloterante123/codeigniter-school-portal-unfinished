<script>
        function key_code(){
             swal({
               title: "Success!",
               //text: "Success Action Please click Ok",
               type: "Course Added Successfully",
               showCancelButton: false,
               confirmButtonColor: "#8abb6f",
               confirmButtonText: "Ok",
               closeOnConfirm: false
             },
             function(){
                window.open("<?php echo base_url(); ?>pages/editcurriculom/<?php echo $id; ?>","_self");
             });
         }
     </script>
    <body onload="key_code()">
    </body>