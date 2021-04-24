

    <script>
        function key_code(){
             swal({
               title: "Warning!",
               text: "Undefined Username or Password!",
               type: "warning",
               showCancelButton: false,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Ok",
               closeOnConfirm: false
             },
             function(){
               history.back();
             });
         }
     </script>
    
    <body onload="key_code()">

    </body>
    