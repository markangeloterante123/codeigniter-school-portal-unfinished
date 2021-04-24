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
    include  "connect.php";
    $id=$_GET['id'];
        $query1 = $connect->query("SELECT * FROM symptom_tbl WHERE id='$id'");
        while($row1 = $query1->fetch(PDO::FETCH_BOTH)){
            $parent_id_str=$row1['name'];}
    ?>
   <script>
        function test(){
        swal({   
            title: "Update <?php echo $parent_id_str; ?>!",   
            text: "Type the word to replace:",   
            type: "input",   
            showCancelButton: true,   
            closeOnConfirm: false,   
            animation: "slide-from-top",   
            inputPlaceholder: "Write something" }, 
            function(inputValue){   
            if (inputValue === "") {     
                swal.showInputError("You need to write something!");     
                return false   } 
            if (inputValue === false) 
                window.open("symptoms.php","_self");    
            else {
            window.open("update_attribute.php?id=<?php echo $id; ?>&replace="+inputValue,"_self"); }
            
            });
        }
    </script>
    <body onload="test()">
        <script src="charts/dist/sweetalert-dev.js"></script>
    </body>
</html>    