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
        
        $sql="DELETE FROM symptom_tbl WHERE id='$id'";
        $connect->query($sql);
    ?>
   <script>
                        function test(){
                            swal({
                              title: "Success!",
                              text: "New Overview Successful Added!",
                              type: "success",
                              showCancelButton: false,
                              confirmButtonColor: "#8abb6f",
                              confirmButtonText: "Ok",
                              closeOnConfirm: false
                            },
                            function(){
                              window.open("symptoms.php","_self");
                            });
                        }
    </script>
    <body onload="test()">
        <script src="charts/dist/sweetalert-dev.js"></script>
    </body>
</html>    