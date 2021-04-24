<!DOCTYPE html>
<html>
    <html lang="en">
    <title>MARI</title>
    <head>   
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" type="text/css" href="charts/dist/sweetalert.css">
        <link rel="stylesheet" type="text/css" href="charts/dist/sweetalert.min.js">
        <link rel="icon" type="image/png" href="images/mari.png">
    </head>
    <?php
        include "connect.php";
    $id=$_GET['id'];
        $id_replace=$_GET['replace'];
    ?>
   <script>
        function test(){
        swal({
          title: "Update",
          text: "Are you sure you want to Update?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
                window.open("update_attribute2ss.php?id=<?php echo $id; ?>&replace=<?php echo $id_replace; ?>","_self");
          } else {
                window.open("symptoms.php","_self");
          }
        }); 
        }
    </script>
    <body onload="test()">
        <script src="charts/dist/sweetalert-dev.js"></script>
    </body>
</html>    