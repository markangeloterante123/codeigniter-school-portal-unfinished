<script>
        function key_code(){
             swal({
               title: "Warning!",
               text: "Unkown Account Required Permission",
               type: "warning",
               showCancelButton: false,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ok",
               closeOnConfirm: false
             },
             function(){
               window.open("<?php echo base_url(); ?>pages/mission/<?php echo $id; ?>","_self");
             });
         }
     </script>
    
    <body onload="key_code()">

    </body>
    